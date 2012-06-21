<?php
/**
 * @version		$Id: saved.php $
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
jimport('joomla.application.component.helper');

/**
 * Saved model for the rental component.
 *
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalModelRenter extends JModel
{
	/**
	 * Check email exist.
	 * @param String $email
	 * @return True if email exist, false if not exist
	 */
	function checkEmailExist($email)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*')
				->from('#__users')
				->where('email = "'.$email.'"');
		;
		
		$db->setQuery($query);
		$obj = $db->loadObject();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg());
		
		if (isset($obj->email))
			return true;
		
		return false;
	}
	
	/**
	 * Function to get categories & locations
	 * @return List of categories objects
	 */
	function getNeighborhood()
	{
		//get in categories
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*')
				->from('#__categories')
				->where('published = 1')
				->where('extension = "com_rental"')
				->where('parent_id = 1')
		;
		
		$db->setQuery($query);
		$categories = $db->loadObjectList();
		
		foreach ($categories as & $cat)
		{
			//select location
			$query = $db->getQuery(true);
			
			$query->select('*')
					->from('#__retal_location')
					->where('catid = ' . (int) $cat->id . ' OR catid IN (SELECT id FROM #__categories WHERE parent_id = '. (int) $cat->id .')')
			;
			
			#echo str_replace('#__', 'jos_', $query);
			
			$db->setQuery($query);
			$cat->locations = $db->loadObjectList();
		}
		
		return $categories;
	}
	
	function register($user, $renter)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		// Initialise variables.
		$app	= JFactory::getApplication();
		
		JModel::addIncludePath(JPATH_ROOT.DS.'components'.DS.'com_users'.DS.'models');
		$model	= JModel::getInstance('Registration', 'UsersModel');
		
		// Get the user data.
		//$requestData = JRequest::getVar('jform', array(), 'post', 'array');
		$requestData = array(
				'name'      => $user['first_name'] . ' ' . $user['last_name'],
				'username'  => $user['email'],
				'password1' => $user['password'],
				'password2' => $user['password'],
				'email1'    => $user['email'],
				'email2'    => $user['email']
		);
		
		// Validate the posted data.
		JForm::addFormPath(JPATH_ROOT.DS.'components'.DS.'com_users'.DS.'models'.DS.'forms');
		$form	= $model->getForm();
		if (!$form) {
			$return['code'] = 11;
			$return['msg']  = 'system error: form not exists';
			return $return;
		}
		
		$data	= $model->validate($form, $requestData);
		
		// Check for validation errors.
		if ($data === false) {
			// Get the validation messages.
			$errors	= $model->getErrors();
			
			var_dump($errors); die;
		}
		
		// Attempt to save the data.
		$model->register($data);
		
		$username = $user['email'];
		$userId = $this->getUserId($username);
		
		//Active user
		$db = JFactory::getDbo();
		$activeUser = new stdClass();
		$activeUser->id = $userId;
		$activeUser->block = 0;
		$db->updateObject('#__users', $activeUser, 'id');
		
		$apartmenSize = serialize($renter['apartment_size_ids']);
		$neighborhood = serialize($renter['neighborhood_ids']);
		$roommatesEmail = serialize($renter['roommates_email']);
		$financialInfo = array(
								'gross_salary' 	=> isset($renter['gross_salary']) ? $renter['gross_salary'] : '',
								'credit_score' 	=> isset($renter['credit_score']) ? $renter['credit_score'] : '',
								'has_guarantor' => isset($renter['has_guarantor']) ? $renter['has_guarantor'] : ''
							);
		
// 		var_dump($user, $renter, $financialInfo);
		
		$financialInfo = serialize($financialInfo);
		
		// move date
		$tmpDate = explode('/', $renter['move_date']);
		$moveDate = $tmpDate[2] . '-' . $tmpDate[0] . '-' . $tmpDate[1];
		
		//insert into table renter user
		$query = $db->getQuery(true);
		$query->insert('#__rental_renters (user_id, first_name, last_name, phone_number, apartment_size, neighborhood_ids, move_date, max_rent, have_a_pet, roommate, email_alert, financial_info, more_info, created)')
				->values('"'.$userId.'", "'.$user['first_name'] . '", "' . $user['last_name'] .'", "' . $user['phone_number'] .'", \''.$apartmenSize.'\', \''.$neighborhood.'\', "'.$moveDate.'", "'.$renter['maximum_rent'].'", "'.$renter['have_pet'].'", "'.$renter['roommates_total'].'", \''.$roommatesEmail.'\', \''.$financialInfo.'\', "'.$renter['comments_for_broker'].'", "'.date('Y-m-d H:i:s').'"');
		
// 		echo $query; die;
		
		$db->setQuery($query);
		$db->query();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		return true;
	}
	
	/**
	 * Fucntion to get userId
	 * @param 	string 		$username
	 * @return 	integer		$userId
	 */
	function getUserId($username)
	{
		$db = JFactory::getDbo();
		$query = "SELECT id FROM #__users WHERE username = '$username'";
		$db->setQuery($query);
	
		return $db->loadResult();
	}
}