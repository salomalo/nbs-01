<?php

// No direct access
defined('_JEXEC') or die;

class RentalModelUser_man extends JModel
{
	function checkUserType()
	{
		$user = JFactory::getUser();
		$db = JFactory::getDbo();
		
		$query = $db->getQuery(true);
		
		$query->select('*')
				->from('#__rental_renters')
				->where('user_id = ' . (int) $user->id);
			;
			
		$db->setQuery($query);
		$checkUser = $db->loadObject();
		
		if ($db->getErrorMsg())
		{
			var_dump($db->getErrorMsg());
			die;
		}
		
		if (isset($checkUser->id))
			return 'renter';
		else
			return 'broker';
	}
}