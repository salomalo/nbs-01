<?php
/**
 * @version		$Id: edit.php $
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'agent.cancel' || document.formvalidator.isValid(document.id('agent-form'))) {
			Joomla.submitform(task, document.getElementById('agent-form'));
		}
	}
</script>

<style>
	#neighborhoods_id span, #neighborhoods_id div { float: left; }
	#neighborhoods_id ul { float: left; width: 300px; }
	#neighborhoods_id ul span { width: 150px; }
</style>

<form action="<?php echo JRoute::_('index.php?option=com_rental&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="agent-form" class="form-validate" enctype="multipart/form-data">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_RENTAL_NEW_AGENT') : JText::sprintf('COM_RENTAL_AGENT_DETAILS', $this->item->id); ?></legend>
			<ul class="adminformlist">
				
				<li><?php echo $this->form->getLabel('user_id'); ?>
				<?php echo $this->form->getInput('user_id'); ?></li>
				
				<li><?php echo $this->form->getLabel('first_name'); ?>
				<?php echo $this->form->getInput('first_name'); ?></li>
				
				<li><?php echo $this->form->getLabel('last_name'); ?>
				<?php echo $this->form->getInput('last_name'); ?></li>
				
				<li><?php echo $this->form->getLabel('apartment_size'); ?>
				<?php echo $this->form->getInput('apartment_size'); ?></li>
				
				<li><?php echo $this->form->getLabel('neighborhood_ids'); ?>
				<?php echo $this->form->getInput('neighborhood_ids'); ?></li>
				
				<li><?php echo $this->form->getLabel('max_rent'); ?>
				<?php echo $this->form->getInput('max_rent'); ?></li>
				
				<li><?php echo $this->form->getLabel('move_date'); ?>
				<?php echo $this->form->getInput('move_date'); ?></li>
				
				<li><?php echo $this->form->getLabel('have_a_pet'); ?>
				<?php echo $this->form->getInput('have_a_pet'); ?></li>
				
				<li><?php echo $this->form->getLabel('roommate'); ?>
				<?php echo $this->form->getInput('roommate'); ?> </li>
				
				<li><?php echo $this->form->getLabel('email_alert'); ?>
				<?php echo $this->form->getInput('email_alert'); ?> 
				<span style="float: left;">[ Add email ]</span></li>
				
				<li><?php echo $this->form->getLabel('renter_credit_score'); ?>
				<?php echo $this->form->getInput('renter_credit_score'); ?></li>
				
				<li><?php echo $this->form->getLabel('renter_has_guarantor'); ?>
				<?php echo $this->form->getInput('renter_has_guarantor'); ?></li>

				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
			</ul>
			<div class="clr"> </div>
			<?php echo $this->form->getLabel('more_info'); ?>
			<div class="clr"> </div>
			<?php echo $this->form->getInput('more_info'); ?>
		</fieldset>
	</div>

<div class="width-40 fltrt">
	<?php echo JHtml::_('sliders.start','agent-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

	<?php echo JHtml::_('sliders.panel',JText::_('COM_RENTAL_GROUP_LABEL_PUBLISHING_DETAILS'), 'publishing-details'); ?>
		<fieldset class="panelform">
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset('publish') as $field): ?>
				<li><?php echo $field->label; ?>
					<?php echo $field->input; ?></li>
			<?php endforeach; ?>
			</ul>
		</fieldset>

	<?php echo JHtml::_('sliders.end'); ?>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</div>

<div class="clr"></div>
</form>
