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

require_once JPATH_COMPONENT_SITE . DS . 'helpers' . DS . 'facebooksdk' . DS . 'facebook.php';

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$Itemid = JRequest::getInt('Itemid');

//domain gorent.com
$facebook = new Facebook(array(
	'appId'  => '419646791426412',
  	'secret' => 'a7fb30ef35a96ece5e0f95e15878069b',
));

$user 	= JFactory::getUser();
$userFB = $facebook->getUser();

$isLogedIn = false;
$fbMe	= null;
if ($user->id) {
	$isLogedIn = true;
} else {
	if ($userFB) {
		try {
	    	// Proceed knowing you have a logged in user who's authenticated.
	    	$fbMe = $facebook->api('/me');
	  	} catch (FacebookApiException $e) {
	    	$userFB = null;
	  	}
	}
}

$logoutUrl= '';
$loginUrl = '';

if ($userFB) {
	$logoutUrl	= $facebook->getLogoutUrl();
} else {
  	$loginUrl	= $facebook->getLoginUrl(
  		array(
  			'scope' => 'email, publish_stream',
  			'redirect_uri' => JRoute::_(JURI::root() . 'index.php?option=com_profile&task=customer.fbregistration', false)
  		)
	);
}
$loginUrl	= $facebook->getLoginUrl(
  		array(
  			'scope' => 'email, publish_stream',
  			'redirect_uri' => JRoute::_(JURI::root() . 'index.php?option=com_profile&task=customer.fbregistration', false)
  		)
	);
?>
<div class="clearfix" id="blueBox"> <span class="admin">Don't have an account? <a class="bold" data-tagged-trac="login|renter_signup" href="index.php?option=com_rental&view=signup<?php echo $Itemid?"&Itemid=".$Itemid:''?>">Sign Up </a></span>
  <h1>Log in</h1>
  <div class="block bgBlue curve clearfix">
    <form method="post" id="new_user_session_1336617616" class="new_user_session" action="/user_session" accept-charset="UTF-8">
      <div style="margin:0;padding:0;display:inline">
        <input type="hidden" value="✓" name="utf8">
        <input type="hidden" value="FMMkutNs1Rl3JU3ZLjwl+l5+EYNdHqoqS95L8NSndUQ=" name="authenticity_token">
      </div>
      <div class="row">
        <label for="user_session_email_Address">Email address</label>
        <input type="text" size="25" name="user_session[email]" id="username" class="text idleField">
      </div>
      <div class="row">
        <label for="user_session_password">Password</label>
        <input type="password" size="25" name="user_session[password]" id="password" class="text idleField">
      </div>
      <div class="loginOptions clearfix">
        <div class="checkboxCont">
          <input type="checkbox" id="rememberMe" value="1" name="user_session[remember_me]">
          <label for="rememberMe">remember me on this computer</label>
        </div>
      </div>
      <a id="loginBtn" class="button login submitButton large" href="#"><span>Log In</span></a>
      <div class="clear"></div>
      <div class="help">Forget your password? <a id="resetPasswordBtn" href="/user_sessions/forgot_password">Reset it</a></div>
    </form>
  </div>
  <div class="block padLeft35">
    <div class="or wide">- or -</div>
    <a class="btnFB wide" href="<?php echo $loginUrl; ?>"><span class=" ">login through facebook</span></a> </div>
</div>
