<?php

// No direct access.
defined('_JEXEC') or die;
$user = JFactory::getUser();
?>

<ul id="siteNav">
<?php
foreach ($list as $i => &$item) :
	
	$id_css = JFilterOutput::stringURLSafe($item->title);
	$class = '';
	if ($item->id == $active_id) {
		$class .= ' current';
	}

	if (in_array($item->id, $path)) {
		$class .= ' active';
	}
	elseif ($item->type == 'alias') {
		$aliasToId = $item->params->get('aliasoptions');
		if (count($path) > 0 && $aliasToId == $path[count($path)-1]) {
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path)) {
			$class .= ' alias-parent-active';
		}
	}

	if ($item->deeper) {
		$class .= ' deeper';
	}

	if ($item->parent) {
		$class .= ' parent';
	}

	if (!empty($class)) {
		$class = ' class="'.trim($class) .'"';
	}

	
	if($user->guest) {
		echo '<li id="'.$id_css.'"'.$class.'>';
		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				if(!empty($item->note)){
					echo $anchor = '<a href="'.$item->note.'" class="infoModal cboxElement">'.$item->title.'</a>';
				}else {
					require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
				}
				break;
	
			default:
				if(!empty($item->note)){
					echo $anchor = '<a href="'.$item->note.'" class="infoModal cboxElement">'.$item->title.'</a>';
				}else {
					require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				}
				break;
		endswitch;
		
		// The next item is deeper.
		if ($item->deeper) {
			echo '<ul>';
		}
		// The next item is shallower.
		elseif ($item->shallower) {
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else {
			echo '</li>';
		}
	}else {
		echo '<li id="'.$id_css.'"'.$class.'>';
		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
				break;
	
			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;
		
		// The next item is deeper.
		if ($item->deeper) {
			echo '<ul>';
		}
		// The next item is shallower.
		elseif ($item->shallower) {
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else {
			echo '</li>';
		}
	}
endforeach;
?></ul>
