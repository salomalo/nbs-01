<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

$Itemid = JRequest::getInt('Itemid');
?>

<table>
	<tr>
		<th>No.</th>
		<th>Title</th>
		<th>Created</th>
		<th>Action</th>
	</tr>
	<?php foreach ($this->items as $key => $item): ?>
	<tr>
		<td><?php echo $key + 1; ?></td>
		<td>
			<?php 
			$link = JRoute::_('index.php?option=com_rental&view=apartment_man&id=' . (int) $item->id . '&Itemid=' . $Itemid);
			?>
			<a class=" " href="<?php echo $link?>">
              			<?php echo intval($this->escape($item->bedrooms)) . 'bdr, ' . $this->escape($item->retal_location_title) . ', $' . $this->escape($item->price); ?>
              		</a>
		</td>
		<td><?php echo $item->created; ?></td>
		<td>Edit / Del</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="3"><?php echo $this->pagination->getPagesLinks(); ?></td>
	</tr>
</table>