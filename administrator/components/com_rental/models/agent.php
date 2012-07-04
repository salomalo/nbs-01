<?php
/**
 * @version		$Id: agent.php $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */
 
/**
 Generate by Component Gen Code - 2012
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Agent model.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalModelAgent extends JModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_RENTAL_AGENT';

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Agent', $prefix = 'RentalTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_rental.agent', 'agent', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		// Determine correct permissions to check.
		if ($this->getState('agent.id')) {
			// Existing record. Can only edit in selected categories.
			$form->setFieldAttribute('#FIELD_CATEGORY_ID#', 'action', 'core.edit');
		} else {
			// New record. Can only create in selected categories.
			$form->setFieldAttribute('#FIELD_CATEGORY_ID#', 'action', 'core.create');
		}

		// Modify the form based on access controls.
		if (!$this->canEditState((object) $data)) {
			// Disable fields for display.
			$form->setFieldAttribute('ordering', 'disabled', 'true');
			$form->setFieldAttribute('publish_up', 'disabled', 'true');
			$form->setFieldAttribute('publish_down', 'disabled', 'true');
			$form->setFieldAttribute('state', 'disabled', 'true');

			// Disable fields while saving.
			// The controller has already verified this is a record you can edit.
			$form->setFieldAttribute('ordering', 'filter', 'unset');
			$form->setFieldAttribute('publish_up', 'filter', 'unset');
			$form->setFieldAttribute('publish_down', 'filter', 'unset');
			$form->setFieldAttribute('state', 'filter', 'unset');
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_rental.edit.agent.data', array());

		if (empty($data))
			$data = $this->getItem();

		return $data;
	}

	/**
	 * A protected method to get a set of ordering conditions.
	 *
	 * @param	object	A record object.
	 * @return	array	An array of conditions to add to add to ordering queries.
	 * @since	1.6
	 */
	protected function getReorderConditions($table)
	{
		$condition = array();
		
		$condition[] = 'state >= 0';
		return $condition;
	}
	
	public function save($data)
	{
		$post = JRequest::get('post');
		
		$d = $post['jform'];
		
		$data['entity_type'] = $entity_type = $d['entity_type'];
		
		if ($entity_type == 1)
			$broker_entity_info = array(
					'broker_brokerage_firm_other'									=> $d['brokerage_firm_other'],
					'broker_license_number'											=> $d['license_number'],
					'broker_landlord_meta_attributes_company_name' 					=> '',
					'broker_landlord_meta_attributes_apartments_managed' 			=> '',
					'broker_landlord_meta_attributes_landlord_name'					=> '',
					'broker_landlord_meta_attributes_apartment_street_address'		=> '',
					'broker_landlord_meta_attributes_apartment_unit_number'			=> '',
					'broker_landlord_meta_attributes_apartment_borough_id'			=> '',
					'broker_landlord_meta_attributes_property_registration_number'	=> ''
			);
		elseif ($entity_type == 2)		
			$broker_entity_info = array(
					'broker_brokerage_firm_other'									=> '',
					'broker_license_number'											=> '',
					'broker_landlord_meta_attributes_company_name' 					=> $d['landlord_meta_attributes']['company_name'],
					'broker_landlord_meta_attributes_apartments_managed' 			=> $d['landlord_meta_attributes']['apartments_managed'],
					'broker_landlord_meta_attributes_landlord_name'					=> $d['landlord_meta_attributes']['landlord_name'],
					'broker_landlord_meta_attributes_apartment_street_address'		=> $d['landlord_meta_attributes']['apartment_street_address'],
					'broker_landlord_meta_attributes_apartment_unit_number'			=> $d['landlord_meta_attributes']['apartment_unit_number'],
					'broker_landlord_meta_attributes_apartment_borough_id'			=> $d['landlord_meta_attributes']['apartment_borough_id'],
					'broker_landlord_meta_attributes_property_registration_number'	=> $d['landlord_meta_attributes']['property_registration_number']
			);
		else			
			$broker_entity_info = array(
					'broker_brokerage_firm_other'									=> '',
					'broker_license_number'											=> '',
					'broker_landlord_meta_attributes_company_name' 					=> $d['landlord_meta_attributes']['company_name'],
					'broker_landlord_meta_attributes_apartments_managed' 			=> $d['landlord_meta_attributes']['apartments_managed'],
					'broker_landlord_meta_attributes_landlord_name'					=> '',
					'broker_landlord_meta_attributes_apartment_street_address'		=> $d['landlord_meta_attributes']['apartment_street_address'],
					'broker_landlord_meta_attributes_apartment_unit_number'			=> $d['landlord_meta_attributes']['apartment_unit_number'],
					'broker_landlord_meta_attributes_apartment_borough_id'			=> $d['landlord_meta_attributes']['apartment_borough_id'],
					'broker_landlord_meta_attributes_property_registration_number'	=> $d['landlord_meta_attributes']['property_registration_number']
			);
		
		var_dump($broker_entity_info); die;
		
		$data['broker_entity_info'] = serialize($broker_entity_info);
		
		$result = parent::save($data);
		
		return $result;
	}
}
