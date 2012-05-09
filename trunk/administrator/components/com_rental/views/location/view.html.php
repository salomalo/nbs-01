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
 * View to edit a location.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @since		1.5
 */
class RentalViewLocation extends JView
{
	protected $form;
	protected $item;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		// Initialiase variables.
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);

		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$isNew		= ($this->item->id == 0);
		$checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $userId);
		$canDo		= RentalHelper::getActions($this->state->get('filter.category_id'));

		JToolBarHelper::title($isNew ? JText::_('COM_RENTAL_MANAGER_LOCATION_NEW') : JText::_('COM_RENTAL_MANAGER_LOCATION_EDIT'), '#xs#.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit') || count($user->getAuthorisedCategories('com_rental', 'core.create')) > 0)) {
			JToolBarHelper::apply('location.apply');
			JToolBarHelper::save('location.save');

			if ($canDo->get('core.create')) {
				JToolBarHelper::save2new('location.save2new');
			}
		}

		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::save2copy('location.save2copy');
		}

		if (empty($this->item->id))  {
			JToolBarHelper::cancel('location.cancel');
		}
		else {
			JToolBarHelper::cancel('location.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}