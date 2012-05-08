<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_rental_filter
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Site
 * @subpackage	mod_rental_filter
 * @since		1.5
 */
class modStatsHelper
{
	static function &getList(&$params)
	{
		$db		= JFactory::getDbo();
		$rows	= array();
		$query	= $db->getQuery(true);

		
		return $rows;
	}
}
