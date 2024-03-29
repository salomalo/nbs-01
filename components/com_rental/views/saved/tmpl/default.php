<?php
/**
 * @version		$Id: default.php $
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');


?>

<ul class="items">
	<?php foreach($this->items as $item): ?>	
		
			<li>
			<?php echo '<label>search_phrase</label>: '. $this->escape($item->search_phrase); ?>
			</li>
			<li>
			<?php echo '<label>created</label>: '. $this->escape($item->created); ?>
			</li>
	<?php endforeach; ?>
</ul>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>