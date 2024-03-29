<?php
/**
 * @version		$Id: view.html.php $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * Apartment View class for the rental component
 *
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @since		1.5
 */
class RentalViewAjax_Location extends JView
{
	protected $items;
	protected $boroughInfo;

	function display($tpl = null)
	{
		// Initialise variables.
		$this->items		= $this->get('Items');
		$this->boroughInfo 	= $this->get('BoroughInfo');
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseWarning(500, implode("\n", $errors));
			return false;
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
