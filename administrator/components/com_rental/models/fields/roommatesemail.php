<script type="text/javascript">
<!--
window.addEvent('domready', function(){
	$('roommates_email').addEvent('click', function(){
		var clone = $('tmp-block-email')
										.clone()
										.inject('tmp-block-email','before')
										.setStyles({'display': 'block'});
		return false;
	});

	$$('.remove-block-email').addEvent('click', function(){

		if (!confirm('Are you sure?'))
			return false;
		
		parent = this.getParent();
		previous = parent.getPrevious();
		
		parent.dispose();
		previous.dispose();
		
		return false;
	});
});
//-->
</script>
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
class JFormFieldRoommatesEmail extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'RoommatesEmail';
	
	public function getInput()
	{
		$vals = unserialize($this->value);
		
		$removeBlockEmail = '<a href="#" style="float: left; line-height: 25px;" class="remove-block-email">Remove</a>';
		
		$html = '<div style="float: left;"><a href="#" id="roommates_email">Add</a></div>';
		
		if (is_array($vals))
		{
			foreach ($vals as $val)
			{
				if ($val != '')
					$html .= '<label>&nbsp;</label><div style="float: left;"><input type="text" name="'.$this->name.'[]" value="'.$val.'" /> '.$removeBlockEmail.'</div>';
			}
		}
		else
			$html .= '<label>&nbsp;</label><div style="float: left;"><input type="text" name="'.$this->name.'[]" value="" /></div>';
		
		$html .= '<div style="display: none;" id="tmp-block-email"><label>&nbsp;</label><div style="float: left;"><input type="text" name="'.$this->name.'[]" value="" /> '.$removeBlockEmail.'</div></div>';
		
		return $html;
	}
}
