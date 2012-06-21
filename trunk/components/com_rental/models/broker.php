<?php
/**
 * @version		$Id: apartment.php $
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.helper');

/**
 * Apartment model for the rental component.
 *
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalModelBroker extends JModel
{
	/**
	 * Gets a list of apartment
	 *
	 * @return	#x# object or false.
	 * @since	1.6
	 */
	function getItem()
	{
		//init vars
		$db			= $this->getDbo();
		$id 		= JRequest::getInt('id');
		$query		= $db->getQuery(true);
		
		$query->select('a.*')
				->from('#__retal_agents a')
				->where('a.id=' . (int) $id)
				->select('users.email AS user_email')
				->join('INNER', '#__users users ON a.user_id = users.id')
		;
		
		$db->setQuery($query);
		$obj = $db->loadObject();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		$obj->apartments = self::_getAparmtents($id);
		
		return $obj;
		
	}
	
	private function _getAparmtents($id)
	{
		$db			= $this->getDbo();
		$query		= $db->getQuery(true);
		
		$bedrooms = JEUtil::getBedrooms();
		
		$query->select('a.*')
				->from('`#__rental_apartments` a')
				->where('a.agent_id = ' . $id)
				->order('a.id DESC')
				->select('location.title AS location')
				->join('INNER', '#__retal_location location ON a.location_id = location.id')
		;
		
		$db->setQuery($query, 0, 5);
		$objs = $db->loadObjectList();
		
		foreach ($objs as & $obj)
		{
			$tmp = intval($obj->bedrooms);
			$obj->bedrooms = $bedrooms[$tmp];
		}
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		return $objs;
	} 
	
	function register($user, $post)
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
		$activeUser = new stdClass();
		$activeUser->id = $userId;
		$activeUser->block = 0;
		$db->updateObject('#__users', $activeUser, 'id');
		
		//add info to broker table: #__retal_agents
		$broker = $post['broker'];
		$billing_information = $post['billing_information'];
		
		//reset query
		$query = $db->getQuery(true);
		
		$broker_entity_info = array();
		
		switch ($broker['broker_entity_type'])
		{
			case 1:
				$broker_entity_info = array(
					'brokerage_firm_other'	=> $broker['brokerage_firm_other'],
					'license_number'		=> $broker['license_number'],
										);
				break;
			case 2:
				$broker_entity_info = array(
					'landlord_meta_attributes_company_name' => $broker['landlord_meta_attributes']['company_name'],
					'landlord_meta_attributes_apartments_managed' => $broker['landlord_meta_attributes']['apartments_managed'],
				);
				break;
			case 3:
				$broker_entity_info = array(
					
				);
				break;
		}
		
		$broker_entity_info = serialize($brocker_entity_info);
		
		$neighborhood = serialize($broker['neighborhood_ids']);
	
		//insert into table renter user		
		$query->insert('#__retal_agents (user_id, first_name, last_name, phone_area, phone_prefix, phone_sufix, broker_entity_type, broker_entity_info, brokerage_firm_other, license_number, my_web_site, months_per_billing_cycle, credit_card_type, credit_card_number, credit_card_first_name, credit_card_last_name, credit_card_month, credit_card_year, credit_card_verification_value, billing_address_address, billing_address_zip, neighborhood_ids, broker_bio)')
		->values('"'.$userId.'", "'.$user['first_name'] . '", "' . $user['last_name'] .'", "' . $user['phone_area'] .'", "' . $user['phone_prefix'] .'", "' . $user['phone_sufix'] .'", "' . $broker['entity_type'] .'", \''.$broker_entity_info.'\', \''.$broker['brokerage_firm_other'].'\', \''.$broker['license_number'].'\', \''.$broker['my_web_site'].'\', \''.$post['months_per_billing_cycle'].'\', \''.$billing_information['credit_card_type'].'\', \''.$billing_information['credit_card_number'].'\', \''.$billing_information['credit_card_first_name'].'\', \''.$billing_information['credit_card_last_name'].'\', \''.$billing_information['credit_card_month'].'\', \''.$billing_information['credit_card_year'].'\', \''.$billing_information['credit_card_verification_value'].'\', \''.$billing_information['billing_address_address'].'\', \''.$billing_information['billing_address_zip'].'\', \''.$neighborhood.'\', "'.$broker['bio'].'"');
	
	
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