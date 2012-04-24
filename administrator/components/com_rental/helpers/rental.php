<?php
/**
 * @version		$Id: rental.php $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

defined('_JEXEC') or die;

/**
 * rental component helper.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_APARTMENTS'),
				'index.php?option=com_rental&view=apartments',
				$vName == 'apartments'
			);
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_AMENITIES'),
				'index.php?option=com_rental&view=amenities',
				$vName == 'amenities'
			);
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_IMAGES'),
				'index.php?option=com_rental&view=images',
				$vName == 'images'
			);
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_AGENTS'),
				'index.php?option=com_rental&view=agents',
				$vName == 'agents'
			);
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_LOCATIONS'),
				'index.php?option=com_rental&view=locations',
				$vName == 'locations'
			);

		
			JSubMenuHelper::addEntry(
				JText::_('COM_RENTAL_SUBMENU_CATEGORIES'),
				'index.php?option=com_categories&extension=com_rental',
				$vName == 'categories'
			);
			if ($vName=='categories') {
				JToolBarHelper::title(
					JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE',JText::_('com_rental')),
					'rental');
			}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int		The category ID.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId)) {
			$assetName = 'com_rental';
		} else {
			$assetName = 'com_rental.category.'.(int) $categoryId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
