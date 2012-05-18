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
		
		$query->select('*')->from('#__retal_agents')->where('id=' . (int) $id);
		
		$db->setQuery($query);
		$obj = $db->loadObject();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		$apartments = self::_getAparmtents($id);
		
		return $obj;
		
	}
	
	private function _getAparmtents($id)
	{
		$db			= $this->getDbo();
		$query		= $db->getQuery(true);
		
		$query->select('*')->from('`#__rental_apartments` a')->where('agent_id = ' . $id);
		
		$db->setQuery($query);
		$obj = $db->loadObject();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		return $obj;
	} 
}