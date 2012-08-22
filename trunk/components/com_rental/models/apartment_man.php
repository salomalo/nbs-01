<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');

/**
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @since 1.5
 */
class RentalModelApartment_man extends JModelForm
{
	/**
	 * @since	1.6
	 */
	protected $view_item = 'apartment_man';

	protected $_item = null;

	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_rental.apartment_man';

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('site');

		// Load state from the request.
		$pk = JRequest::getInt('id');
		$this->setState('apartment_man.id', $pk);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		$user = JFactory::getUser();
		if ((!$user->authorise('core.edit.state', 'com_rental')) &&  (!$user->authorise('core.edit', 'com_rental'))){
			$this->setState('filter.published', 1);
			$this->setState('filter.archived', 2);
		}
	}

	/**
	 * Method to get the apartment_man form.
	 *
	 * The base form is loaded from XML and then an event is fired
	 *
	 *
	 * @param	array	$data		An optional array of data for the form to interrogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_rental.apartment_man', 'apartment_man', array('control' => 'jform', 'load_data' => true));
		if (empty($form)) {
			return false;
		}

		$id = $this->getState('apartment_man.id');
		$params = $this->getState('params');
		$apartment_man = $this->_item[$id];
		$params->merge($apartment_man->params);

		if(!$params->get('show_email_copy', 0)){
			$form->removeField('apartment_man_email_copy');
		}

		return $form;
	}

	protected function loadFormData()
	{
		$data = (array)JFactory::getApplication()->getUserState('com_rental.apartment_man.data', array());
		
		if (empty($data)) {
			$data = $this->getItem();
		}
		
		return $data;
	}
	
	public function save($data)
	{
		$result = $this->_save($data);
		
		$itemId = $this->getState($this->getName().'.id');
		$record = $this->getItem($itemId);
		
		if ($result)
		{
			$db = JFactory::getDbo();
			
			//save amenities
			$this->_saveAmenities($data);
			
			$post = JRequest::get('post');
			
			$uploadPath 		= JPATH_ROOT . DS . 'images' . DS . 'com_rental' . DS . 'upload' . DS;
				
			//upload file
			$imagesUpload = $this->uploadFiles('img-' . $record->id, $uploadPath);
				
			$delImage = isset($post['jform']['del_image']) ? $post['jform']['del_image'] : null;
				
			//get old images
			$oldImages = unserialize($record->images);
			
			$listImg = array();
			
			//get list images
			if(is_array($oldImages))
			{			
				foreach ($oldImages as $oldImg)
				{
					$listImg[] = $oldImg['image'];
				}
			}
				
			if(is_array($oldImages) && is_array($delImage))
			{
				foreach ($delImage as $img)
				{
					if(in_array($img, $listImg))
					{
						//search key by value
						$delKey = array_search($img, $listImg);
			
						//remove image
						@unlink($uploadPath . $img);
			
						//unset in old image
						unset($oldImages[$delKey]);
					}
				}
			}
				
			$oldImages = (is_array($oldImages)) ? $oldImages : array();
				
			//set image to update
			$images = (is_array($imagesUpload)) ? array_merge($oldImages, $imagesUpload) : $oldImages;
				
			//save image
			$query = "UPDATE #__rental_apartments SET images = '".serialize($images)."' WHERE id = " . (int) $record->id;
			$db->setQuery($query);
				
			$db->query();
			
			if ($db->getErrorMsg())
				die($db->getErrorMsg());
		}
		
		return $result;
	}
	
	function uploadFiles($fileName, $uploadPath)
	{
		//require upload file
		require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers/upload.class.php';
	
		//define upload path
		$uploadPathMore = date('Y') . DS . date('m') . DS . date('d') . DS;
		$uploadPath .= $uploadPathMore;
	
		//echo $uploadPath; die;
	
		$files = JRequest::get('files');
		$post = JRequest::get('post');
	
		$files = $files['jform'];
			
		$name = array();
		$data = array();
	
		foreach ($post['jform']['images']['type'] as $key => $type)
		{
				
			if($files['name']['images'][$key] != '' && !$files['error']['images'][$key])
			{
				//set image name
				$imageName = $fileName . '-' . time() . '.' . end(explode('.', $files['name']['images'][$key]));
	
				//upload file
				$upload = upload::file($files, 'images', $uploadPath, $imageName, $key, false);
	
				//if upload OK
				if(is_array($upload) && $upload['result'] == 'OK')
				{
					$data[] = array( 'image' => str_replace(DS, '/', $uploadPathMore) . $upload['file_name'], 'type' => $type );
				}
				else
				{
					JError::raiseNotice('UPLOAD_ERROR', 'Upload Error');
				}
			}
		}
	
		//$data = serialize($data);
	
		return $data;
	}
	
	private function _checkPermission($itemId = 0)
	{
		$db = JFactory::getDbo();		
		$query = $db->getQuery(true);
		
		$userId = JFactory::getUser()->id;
		
		$query->select('*')
				->from('#__rental_apartments')
				->where('id = ' . $itemId)
				->where('agent_id = (SELECT id FROM #__retal_agents WHERE user_id = '.$userId.')')
			;
		
//		echo str_replace('#__', 'jos_', $query);
		
		$db->setQuery($query);
		$obj = $db->loadObject();
		
		if ($db->getErrorMsg())
		{
			var_dump($db->getErrorMsg());
			return false;
		}
		
		return $obj;
	}

	public function _save($data)
	{
		// Initialise variables;
		$table	= $this->getTable('Apartment', 'RentalTable');
		$key	= $table->getKeyName();
		$pk		= (!empty($data[$key])) ? $data[$key] : (int) $this->getState($this->getName() . '.id');
		$isNew	= true;

		// Allow an exception to be thrown.
		try
		{
			// Load the row if saving an existing record.
			if ($pk > 0)
			{
				$table->load($pk);
				$isNew = false;
			}
			
			if (!$isNew)
			{
				$checkPermission = $this->_checkPermission($pk);
				
				if (!$checkPermission)
					die('Error when check permission !');
			}

			// Bind the data.
			if (!$table->bind($data))
			{
				$this->setError($table->getError());
				return false;
			}

			// Check the data.
			if (!$table->check())
			{
				$this->setError($table->getError());
				return false;
			}

			// Store the data.
			if (!$table->store())
			{
				$this->setError($table->getError());
				return false;
			}

			// Clean the cache.
			$this->cleanCache();
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());

			return false;
		}

		$pkName = $table->getKeyName();

		if (isset($table->$pkName))
		{
			$this->setState($this->getName() . '.id', $table->$pkName);
		}
		$this->setState($this->getName() . '.new', $isNew);
		
		return true;
	}

	/**
	 * Gets a list of apartment_mans
	 * @param array
	 * @return mixed Object or null
	 */
	public function &getItem($pk = null)
	{
		// Initialise variables.
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('apartment_man.id');

		if ($this->_item === null) {
			$this->_item = array();
		}

		if (!isset($this->_item[$pk])) {
			try
			{
				$db = $this->getDbo();
				$query = $db->getQuery(true);

				$query->select('*')->from('#__rental_apartments')->where('id = ' . (int) $pk);
				$db->setQuery($query);
				
				$data = $db->loadObject();
				
				$data->amenities = $this->_getAmenities($data->id);
				
//				var_dump($data);

				$this->_item[$pk] = $data;
			}
			catch (JException $e)
			{
				$this->setError($e);
				$this->_item[$pk] = false;
			}

		}
		
  		return $this->_item[$pk];

	}
	
	private function _getAmenities($apartmentId)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
		$query->select('amenities_id')
				->from('#__retal_apartment_amenities')
				->where('apartment_id = ' . (int) $apartmentId);
	
		$db->setQuery($query);
		$amenities = $db->loadResultArray();
	
		return $amenities;
	}
	
	private function _saveAmenities($data)
	{
		$db = JFactory::getDbo();
	
		$amenities = array();
	
		if (isset($data['amenities']))
			$amenities = $data['amenities'];
	
		//delete all amenities before save
		$query = $db->getQuery(true);
	
		$query->delete('#__retal_apartment_amenities')
				->where('apartment_id = ' . (int) $data['id']);
	
		$db->setQuery($query);
		$db->query();
	
		if ($db->getErrorMsg())
			die($db->getErrorMsg());
	
		if (!empty($amenities))
		{
			$query = $db->getQuery(true);
				
			//insert
			$query->insert('#__retal_apartment_amenities (apartment_id, amenities_id)');
				
			foreach ($amenities as $amenity)
			{
				$query->values($data['id'] . ',' . $amenity);
			}
				
			$db->setQuery($query);
			$db->query();
				
			if ($db->getErrorMsg())
				die($db->getErrorMsg());
		}
	}
}
