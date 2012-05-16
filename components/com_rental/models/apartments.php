<?php
/**
 * @version		$Id: apartments.php $
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
 * Apartments model for the rental component.
 *
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalModelApartments extends JModelList
{
	/**
	 * Gets a list of apartments
	 *
	 * @return	array	An array of apartments objects.
	 * @since	1.6
	 */
	function getListQuery()
	{
		$db			= $this->getDbo();
		$query		= $db->getQuery(true);
		
		$post = JRequest::get('post');
		
		#var_dump($post); die;
		
		$data = isset($post['jform']) ? $post['jform'] : array();
		
		$query->select(
			'a.*'
		);
		
		$query->from('`#__rental_apartments` a');
		
		// Join over the retal_location
		$query->select('retal_location.title AS retal_location_title');
		$query->join('INNER', '#__retal_location AS retal_location ON retal_location.id = a.location_id');
		
		$query->select('CONCAT(agent.first_name, " ", agent.last_name) AS agent');
		$query->join('INNER', '#__retal_agents AS agent ON agent.id = a.agent_id');
		
		//filter
		$nullDate	= $db->Quote($db->getNullDate());
		$nowDate	= $db->Quote(JFactory::getDate()->toSql());
		
		//neighborhood
		if (isset($data['location']) && !empty($data['location']))
		{
			$locs = implode(',', $data['location']);
			
			$query->where('a.location_id IN ('.$locs.')');
		}
		else
		{
			if (isset($post['bid']))
			{
				//get all locations
				$query->where('a.location_id IN (SELECT id FROM #__retal_location WHERE catid = '. (int) $post['bid'].')');
			}
		}
		
		if (isset($data['bedroom']) && !empty($data['bedroom']))
		{
			$bedrooms = implode(',', $data['bedroom']);
			
			$query->where('a.bedrooms IN ('.$bedrooms.')');
		}
		
		if (isset($data['min_rent']) && intval($data['min_rent']) > 0)
			$query->where('a.price >= ' . intval($data['min_rent']));
		
		if (isset($data['max_rent']) && intval($data['max_rent']) > 0)
			$query->where('a.price <= ' . intval($data['max_rent']));
		
		if (isset($data['amenity']) && !empty($data['amenity']))
		{
			$amenities = implode(',', $data['amenity']);
			
			//$query->join('#__retal_apartment_amenities aa ON a.id = aa.apartment_id');
			$query->where('a.id IN (SELECT apartment_id FROM #__retal_apartment_amenities WHERE amenities_id IN ('.$amenities.'))');
		}
		
		//move by
		if (isset($data['move_date']) && $data['move_date'] != '')
			$query->where('(a.available_on = '.$nullDate.' OR a.available_on >= '.$nowDate.')');
		
		echo $query;
		
		return $query;
	}
	
	/**
	 * Get category level 1
	 */
	public function getCategories()
	{
		$db			= $this->getDbo();
		$query		= $db->getQuery(true);
		
		$query->select('*')
				->from('#__categories')
				->where('parent_id = 1')
				->where('extension = "com_rental"')
		;
		
		$db->setQuery($query);
		$result = $db->loadObjectList();
		
		return $result;
	}
	
	public function getAmenities()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
		$query->select('a.*')
				->from('#__rental_amenities a')
				//->join('INNER', '#__rental_amenities a ON a.id = aa.amenities_id')
				//->where('aa.apartment_id = ' . (int) $apartmentId)
				->order('a.title');
	
		$db->setQuery($query);
		$amenities = $db->loadObjectList();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg());
	
		return $amenities;
	}
}