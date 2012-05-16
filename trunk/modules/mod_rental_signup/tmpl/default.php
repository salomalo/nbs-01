<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_rental_signup
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$app                = JFactory::getApplication();
$tmpl_url = JURI::base(true).'/templates/'.$app->getTemplate();
?>
<h1>Finding NYC Apartments Just Got Easier!</h1>
<h2>Free sign up, anonymous messaging, <br>search by no-fee or fee, broker reviews!</h2>

<div id="links-vb" class="clearfix">            
    <div class=" " id="btn_signup">
        <a class=" " href="index.php?option=com_rental&view=signup" data-tagged-trac="hp-large-call-to-action|renter_signup">
        	<img src="<?php echo $tmpl_url?>/images/home/blank.gif?20100113" title="Sign Up" alt="Create your free profile!" align="Left" height="57" width="338">
        </a>
    </div>
    <a href="index.php?option=com_rental&view=broker&layout=choose-plan" class="btLinkLg">Landlords, Brokers &amp; Agents: <strong>Sign Up here</strong></a>
</div>