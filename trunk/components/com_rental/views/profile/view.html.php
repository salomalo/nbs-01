<?php
/**
 * version $Id: view.html.php $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		thaiht
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

jimport('joomla.application.component.view');


class RentalViewProfile extends JView
{

	function display($tpl = null)
	{
		// check user
		$user = JFactory::getUser();
		
		if ($user->guest)
		{
			$link = JRoute::_('index.php?option=com_rental&view=login', false);
			JFactory::getApplication()->redirect($link);
			
			exit();
		}
		
		// only renter can login to this section
		if (JFactory::getSession()->get('user_type') == 'broker')
		{
			// set link to profile
			$link = JRoute::_('index.php?option=com_rental&view=apartments_man', false);
			
			//redirect
			JFactory::getApplication()->redirect($link);
			
			exit();
		}
		
		$this->_prepareDocument();

		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		//TODO: prepare document
	}
}
