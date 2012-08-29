<style>
<!--
.broker-entity { float: left; width: 550px; display: none; }
.clr { clear: both; }
-->
</style>
<?php
/**
 * @version		$Id: brokerentitytype.php $
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
class JFormFieldBrokerEntityType extends JFormFieldList
{
	public function getInput()
	{
		$agentInfo = $this->_getAgentInfo();
		
		$broker_entity_type = $agentInfo->broker_entity_type;
		
		$brokerEntityInfo = unserialize($agentInfo->broker_entity_info);
		
// 		var_dump($brokerEntityInfo);
		
		$check_1 = ($broker_entity_type == 1) ? 'checked="checked"' : '';
		$check_2 = ($broker_entity_type == 2) ? 'checked="checked"' : '';
		$check_3 = ($broker_entity_type == 3) ? 'checked="checked"' : '';
		
		$html = '<div style="float: left; width: 450px;">';
		
		$html .= '<fieldset id="jform_broker_entity_type" class="radio inputbox">
				<input type="radio" value="1" name="jform[entity_type]" id="broker_entity_type_1" '.$check_1.'> <label>Broker/salesperson</label>
				<input type="radio" value="2" name="jform[entity_type]" id="broker_entity_type_2" '.$check_2.'> <label>Landlord</label>
				<input type="radio" value="3" name="jform[entity_type]" id="broker_entity_type_3" '.$check_3.'> <label>Management company</label>
				</fieldset>';
		
		$html .= '<div class="clr"></div>';
		$html .= '<div id="div_broker_entity_type_1" class="broker-entity">
					<label>Brokerage Firm</label>
					<input type="text" name="jform[brokerage_firm_other]" value="'.$brokerEntityInfo['broker_brokerage_firm_other'].'" />
					<label>License Number</label>
					<input type="text" name="jform[license_number]" value="'.$brokerEntityInfo['broker_license_number'].'" />
				</div>';
		
		$html .= '<div class="clr"></div>';
		
		$borough = $this->_getBorough($brokerEntityInfo['broker_landlord_meta_attributes_apartment_borough_id']);
		
		$html .= '<div id="div_broker_entity_type_2" class="broker-entity">
					<label>Name of company</label>
					<input type="text" name="jform[landlord_meta_attributes][company_name]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_company_name'].'" />
					<label>Number of apartments <br>you manage</label>
					<input type="text" name="jform[landlord_meta_attributes][apartments_managed]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_apartments_managed'].'" />
					<label style="font-weight: bold;">
						Info on one apartment you will advertise
					</label>
					<div id="landlord-name">
						<label>Landlord name</label>
						<input type="text" name="jform[broker_landlord_meta_attributes][landlord_name]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_landlord_name'].'" />
					</div>
					<label>Street address</label>
					<input type="text" name="jform[broker_landlord_meta_attributes][apartment_street_address]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_apartment_street_address'].'" />
					<label>Unit number</label>
					<input type="text" name="jform[broker_landlord_meta_attributes][apartment_unit_number]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_apartment_unit_number'].'" />
					<label>Borough</label>
					'.$borough.'
					<label>Property registration <br>number</label>
					<input type="text" name="jform[broker_landlord_meta_attributes][property_registration_number]" value="'.$brokerEntityInfo['broker_landlord_meta_attributes_property_registration_number'].'" />
				</div>';
		
		$html .= '<div class="clr"></div>';
		
		$html .= '</div>';
		
		return $html;
	}
	
	private function _getAgentInfo()
	{
		$id = JRequest::getVar('id');
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*')->from('#__retal_agents')->where('id = ' . (int) $id);
		
		$db->setQuery($query);
		$rec = $db->loadObject();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		return $rec;		
	}
	
	private function _getBorough($catId = 0)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$agentInfo = $this->_getAgentInfo();
		
		$query->select('*')
				->from('#__categories')
				->where('published = 1')
				->where('extension = "com_rental"')
				->where('parent_id = 1')
		;
		
		$db->setQuery($query);
		$rs = $db->loadObjectList();
		
		if ($db->getErrorMsg())
			die ($db->getErrorMsg());
		
		$html = '<select name="jform[landlord_meta_attributes][apartment_borough_id]">';
		
		foreach ($rs as $cat)
		{
			$selected = ($cat->id == $catId) ? 'selected="selected"' : '';
			$html .= '<option value="'.$cat->id.'" '.$selected.'>' . $cat->title . '</option>';
		}
		
		$html .= '</select>';
		
		return $html;
	}
}

?>

<script type="text/javascript">
<!--
window.addEvent('domready', function(){

	var entity = $$('#jform_broker_entity_type input[type="radio"]');
	
	entity.addEvent('click', function(){
		showEntityOption(this.get('value'));
	});

	var checkVal = $$('#jform_broker_entity_type input[type="radio"]:checked').get('value');

	showEntityOption(checkVal);

	function showEntityOption(checkVal)
	{
		$$('.broker-entity').set('styles', {'display': 'none'});
		
		if (checkVal == 1)
			$('div_broker_entity_type_1').set('styles', {'display': 'block'});
		else
		{
			if (checkVal == 3)
				$('landlord-name').set('styles', {'display': 'block'});
			else
				$('landlord-name').set('styles', {'display': 'none'});
			
			$('div_broker_entity_type_2').set('styles', {'display': 'block'});
		}
	}
});

//-->
</script>