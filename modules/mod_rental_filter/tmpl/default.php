<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_rental_filter
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
	jQuery(function($){
		$('#location').change(function(){
			var t = $(this);
			
			var link = 'index.php?option=com_rental&view=ajax_location&location=' + t.val();

			
		});
		
		$('#click-to-show').click(function(){
			if ($('#location').val() == '')
			{
				alert('You must select location first');
				return false;
			}
			
			$('#container-location').show();
		});
		
		$(document).click(function() {
			$('#container-location').hide();
		});
		
		$("#container-location, #click-to-show").click(function(e) {
			e.stopPropagation(); // This is the preferred method.
			return false;
		});
	});
</script>

<div id="searchWrapperOuter" class="curveBottom">

	<select id="location" style="float: left;">
		<option value="">- Select -</option>
		<option value="bronx">Bronx</option>
		<option value="Mylyn">Mylyn</option>
	</select>
	
	<div id="show-location" style="float: left;">
		<div id="click-to-show" style="border: 1px solid #AAA; width: 95px; padding: 3px; margin-bottom: 1px;">Select Location</div>
		<div id="container-location" style="float: left; border: 2px solid #AAA; display: none;">
			
		</div>
	</div>
	
</div>