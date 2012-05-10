<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_rental_agent_feature
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_rental_agent_feature.content');
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_rental_agent_feature', $params->get('layout', 'default'));
