<?php
/**
 * @version		$Id: rentalcustomagentid.php $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Custom Field class for the Joomla Framework.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @since		1.6
 */
class JFormFieldApartmentsize extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Apartmentsize';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	public function getOptions()
	{
		// Initialize variables.
		$options = array();
		
		$arrBedrooms = JEUtil::getBedrooms();
		
		foreach ($arrBedrooms as $key => $bedroom)
		{
			$option = new stdClass();
			$option->value = $key;
			$option->text = $bedroom;
			
			$options[] = $option;
		}

		//array_unshift($options, JHtml::_('select.option', '', JText::_('COM_RENTAL_SELECT')));

		return $options;
	}
	
	public function getInput()
	{
		$html = '';
		
		$value = unserialize($this->value);
		
		$options = $this->getOptions();
		
		foreach ($options as $option)
		{
			$checked = (in_array($option->value, $value)) ? 'checked="checked"' : '';
			
			$html .= '<span style="float:left; line-height: 23px; margin-right: 10px;">
						<input type="checkbox" name="'.$this->name.'[]" value="'.$option->value.'" ' . $checked . ' />' . $option->text . '
					</span>';
		}
		
		return $html;
	}
}