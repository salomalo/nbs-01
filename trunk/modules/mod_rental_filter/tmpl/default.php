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
<h1>Filter</h1>
<?php foreach ($list as $item) : ?>
	<dt><?php echo $item->title;?></dt>
	<dd><?php echo $item->data;?></dd>
<?php endforeach; ?>
</dl>
