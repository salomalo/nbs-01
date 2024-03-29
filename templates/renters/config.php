<?php

//-- No direct access
defined('_JEXEC') || die('=;)');

define('_TMPL_URL_', $this->baseurl.'/templates/'.$this->template);
define('_TMPL_CSS_URL_', _TMPL_URL_.'/css');
define('_TMPL_JS_URL_', _TMPL_URL_.'/js');
define('_TMPL_IMG_URL_', _TMPL_URL_.'/images');

// get params
$app                = JFactory::getApplication();
$doc				= JFactory::getDocument();
$user				= JFactory::getUser();
$session 			= JFactory::getSession();
$sess 				= substr($session->getId(),0,10);
$templateparams     = $app->getTemplate(true)->params;
// get params
$logo               = 'images/stories/logo.png';
$path = $this->baseurl.'/templates/'.$this->template;

//check user logon
$isLogin = $user->guest ? false:true;

// get menu item
$itemid = JRequest::getVar('Itemid');
$menu = &JSite::getMenu();
$pageclass = array();
$active = $menu->getItem($itemid);
$params = $menu->getParams( $active->id );
$pageclass[] = $params->get( 'pageclass_sfx' );
if($active) $pageclass[] = "p_".$active->alias;


$option = JRequest::getCmd('option');
$view = JRequest::getCmd('view');
$layout = JRequest::getCmd('layout');

$isHomePage = (isset($active->home) && $active->home >=1)?true:false;
$isLoginPage = (false)?true:false; //TODO

$isLoginPage = ($option=='com_rental'&&( $view=='signup' || $view=='login') || $layout=='signup' || $layout=='login') ? true : false;
//option=com_rental&view=apartment
$isListing = ($option=='com_rental'&& $view=='apartments') ? true : false;
$isListingDetail = ($option=='com_rental'&& $view=='apartment') ? true : false;
$isRentalAgents = ($option=='com_rental'&& $view=='rentalagents') ? true : false;

$isRenterSignup = ($option=='com_rental'&& $view=='createprofile' || $layout=='create-profile') ? true : false;
$isBrokerSignup = ($option=='com_rental'&& $view=='broker' && in_array($layout, array('signup','choose-plan'))) ? true : false;

$isTourpage = ($option=='com_rental'&& $view=='renter' && $layout=='how-it-works') ? true: false;

if($isHomePage) $pageId ='id="home"';
if($isLoginPage) $pageId ='id="login"';
if($isListingDetail) $pageId ='id="listingDetail"';
if($isTourpage) $pageId ='id="tour"';

if($isRenterSignup) {$pageId ='id="renter_signup"'; $pageclass[]="narrow";}
if($isBrokerSignup) {$pageId ='id="broker_signup"'; }


$pageclass = trim(implode(' ', $pageclass));
// check positions
$hasLeftCol  = $this->countModules('left');
$hasRightCol = $this->countModules('right');

// SEO config