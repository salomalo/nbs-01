<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    renters
 * @subpackage Base
 * @author     neo hoang {@link concept-web.eu}
 * @author     Created on 04-May-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');
require_once dirname(__FILE__) .'/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/all.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/pages.css" type="text/css" />
    <!--[if IE 6]><link href="<?php echo _TMPL_CSS_URL_?>/ie6.css?<?php echo $sess?>" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
  	<!--[if IE 7]><link href="<?php echo _TMPL_CSS_URL_?>/ie7.css?<?php echo $sess?>" media="screen" rel="stylesheet" type="text/css" /><![endif]-->
    
    
    <!-- load js -->
    <?php if($isHomePage):?>
    <script src="<?php echo _TMPL_JS_URL_?>/homepage_all.js" type="text/javascript"></script>
    <?php else:?>
    <script type="text/javascript">
		//<![CDATA[
		var NA_CONFIG = {"user_type":"renter"};
		var LIVE_URL = '<?php echo JURI::base(true)?>';
		//]]>
	</script>
	
    <script src="<?php echo _TMPL_JS_URL_?>/all.js?<?php echo $sess?>" type="text/javascript"></script>
    <script src="<?php echo _TMPL_JS_URL_?>/renter.js?<?php echo $sess?>" type="text/javascript"></script>
    <?php endif;?>
    
    <?php if($isRenterSignup):?>
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/jquery.loader-min.css?<?php echo $sess?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/forms-v2.css?<?php echo $sess?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/signup.css?<?php echo $sess?>" type="text/css" />
    <script src="<?php echo _TMPL_JS_URL_?>/jquery.loader-min.js?<?php echo $sess?>" type="text/javascript"></script>
    <script src="<?php echo _TMPL_JS_URL_?>/step_signup.js?<?php echo $sess?>" type="text/javascript"></script>
    <?php endif;?>
    
    <?php if($isListing):?>
    <?php endif;?>
    
    <?php if($isRentalAgents):?>
    <link rel="stylesheet" href="<?php echo _TMPL_CSS_URL_?>/hall-of-fame.css?<?php echo $sess?>" type="text/css" />
    <?php endif;?>
    
    <?php if($isListingDetail):?>
   	<script src="<?php echo _TMPL_JS_URL_?>/galleria.min.js?<?php echo $sess?>" type="text/javascript"></script>
	<script src="<?php echo _TMPL_JS_URL_?>/galleria.classic.js?<?php echo $sess?>" type="text/javascript"></script>
	<link href="<?php echo _TMPL_CSS_URL_?>/galleria.classic.css?<?php echo $sess?>" media="screen" rel="stylesheet" type="text/css" />
    <?php endif;?>
    
</head>
<body class="<?php echo $pageclass;?>" <?php echo $pageId;?>>
	<div id="wrapper">
		<!-- BEGIN masthead containing everything in blue background-->
  		<div id="masthead">
  			<?php if(!$isRenterSignup && !$isLoginPage):?>
  			<div id="adminBar">
  				<jdoc:include type="modules" name="adminNav" />
  			</div>
  			<?php endif;?>
  			<div id="logo">
			  <a href="index.php" title="Naked Apartments: NYC apartment rentals">
			    <img src="<?php echo _TMPL_IMG_URL_?>/logo_inside.gif" alt="NYC apartments">
			  </a>
  			</div>
  			<div class="clear"></div>
  			<?php if(($isListing || $isListingDetail) && $this->countModules('siteNav')):?>
  			<jdoc:include type="modules" name="siteNav" />
  			<?php endif;?>
  		</div><!-- close masthead -->
  		<div class="clear"></div>
  		
  		<!-- right column --> 
		<div id="right">
		</div><!-- close right col -->
		
		<!-- left column --> 
		<div id="left">
		</div><!-- close left col -->
		<div class="clear"></div>
		
		<div>
			<jdoc:include type="message" />
            <jdoc:include type="component" />
		</div>
		
		<?php if(!$isLoginPage && ($isRenterSignup && $this->countModules('footNav'))):?>
		<!-- BEGIN Footer -->
  		<div id="footerWrapper" class="curve">
  			<div id="footer">
  			<jdoc:include type="modules" name="footNav" />
  			</div>
  		</div><!-- End: Footer -->
  		<?php endif;?>
  		
  		<span class="copyright">&copy; Copyright JE Team 2012 <br> 
  			<a class="hud" href="/about/fair-housing">Fair Housing and Equal Opportunity</a><span class="madeinNYC"> Made in Ha Noi</span>
 		</span>
 		
 		 
	</div><!-- close wrapper -->
	<div id="feedback">
  		<a rel="nofollow" href="/about/feedback_form" class="feedbackBox cboxElement"><img src="<?php echo _TMPL_IMG_URL_?>/buttons/feedback.gif"></a>
	</div>
	
	<div class="hidden"> 
	  <!-- - - - OVERVIEW  - - - - - -->
	  <div id="overviewModalContainer">
	    <div id="md_home" class="basicModal clearfix mediumWide anon">
	      <div class="h1"><a data-tagged-trac="sitewide-modal-overview-top|renter_signup" href="index.php?option=com_rental&view=signup">Sign up</a> for even more features!</div>
	      <div class="middle clearfix"> <span class="block" id="one"> <span class="image"></span> <strong>Email Notifications</strong> Each morning we'll email the latest apartments matching your criteria. </span> <span class="block" id="two"> <span class="image"></span> <strong>Reverse Search</strong> Get recommended listings and offers from agents and landlords. </span> <span class="block" id="three"> <span class="image"></span> <strong>Suggestions</strong> Apartments we think you'll like, based on your profile. </span> </div>
	      <div class="formActions green">
	        <div class="block"> <a data-tagged-trac="sitewide-modal-overview-bottom|renter_signup" class="button  large" href="index.php?option=com_rental&view=signup"><span>Sign Up (it's FREE!)</span></a>
	          <div class="clear"></div>
	          <span class="block padTop5">Already have an account? <a class="bold" href="index.php?option=com_rental&view=login">Log in</a></span> </div>
	      </div>
	    </div>
	  </div>
	  <!-- - - - FAVES  - - - - - -->
	  <div id="favoritesModalContainer">
	    <div id="md_faves" class="basicModal clearfix mediumWide anon">
	      <div class="h1"><a data-tagged-trac="sitewide-modal-faves-top|renter_signup" href="index.php?option=com_rental&view=signup">Sign up</a> to save your favorite listings!</div>
	      <div class="middle clearfix"> <strong>Your favorite listings in one place!</strong> Click the save button, save the listing. Simple. Unsave the listing by clicking the save button again. Still simple.
	        <p></p>
	      </div>
	      <div class="formActions green">
	        <div class="block"> <a data-tagged-trac="sitewide-modal-faves-bottom|renter_signup" class="button  large" href="index.php?option=com_rental&view=signup"><span>Sign Up (it's FREE!)</span></a>
	          <div class="clear"></div>
	          <span class="block padTop5">Already have an account? <a class="bold" href="index.php?option=com_rental&view=login">Log in</a></span> </div>
	      </div>
	    </div>
	  </div>
	  <!-- - - - SAVED SEARCHES  - - - - - -->
	  <div id="savedSearchesModalContainer">
	    <div id="md_saved_searches" class="basicModal clearfix mediumWide anon">
	      <div class="h1"><a data-tagged-trac="sitewide-modal-saved-searches-top|renter_signup" href="index.php?option=com_rental&view=signup">Sign up</a> to save your common searches!</div>
	      <div class="middle clearfix"> <strong>Save time: Save your searches</strong> Save searches by neighborhood, price, amenities, whatever. No need to 'select' everything again. </div>
	      <div class="formActions green">
	        <div class="block"> <a data-tagged-trac="sitewide-modal-saved-searches-bottom|renter_signup" class="button  large" href="index.php?option=com_rental&view=signup"><span>Sign Up (it's FREE!)</span></a>
	          <div class="clear"></div>
	          <span class="block padTop5">Already have an account? <a class="bold" href="index.php?option=com_rental&view=login">Log in</a></span> </div>
	      </div>
	    </div>
	  </div>
	  <!-- - - - HALL OF FAME/TOP AGENTS   - - - - - -->
	  <div id="HOFModalContainer">
	    <div id="md_HOF" class="basicModal clearfix mediumWide anon">
	      <div class="h1"><a data-tagged-trac="sitewide-modal-hall_of_fame|renter_signup" href="/rental-agents">Sign up</a> to work with top NYC agents!</div>
	      <div class="middle clearfix">
	        <div class="image"></div>
	        <div class="text"> <strong>Work with the best</strong> We've created a Hall of Fame of some of the best agents on our site, based on things like listing quality, response time, reviews, and more. </div>
	      </div>
	      <div class="formActions green">
	        <div class="block"> <a data-tagged-trac="sitewide-modal-hall_of_fame|renter_signup" class="button  large" href="/renter/signup"><span>Sign Up (it's FREE!)</span></a>
	          <div class="clear"></div>
	          <span class="block padTop5">Already have an account? <a class="bold" href="http://www.nakedapartments.com/login?return_to=http%3A%2F%2Fwww.nakedapartments.com%2Frental%2F734432-2-bedroom-e29th-kips-bay">Log in</a></span> </div>
	      </div>
	    </div>
	  </div>
	  <!-- - - - REVIEWS  - - - - - -->
	  <div id="reviewsModalContainer">
	    <div id="md_reviews" class="basicModal clearfix mediumWide anon">
	      <div class="h1"><a data-tagged-trac="sitewide-modal-reviews-top|renter_signup" href="index.php?option=com_rental&view=signup">Sign up</a> to review agents!</div>
	      <div class="clearfix middle"> <strong>Know who you're dealing with</strong> Our review system helps renters assess agents before working with them. We require that renters sign up before submitting reviews to verify the legitimacy of all reviews. </div>
	      <div class="formActions green">
	        <div class="block"> <a data-tagged-trac="sitewide-modal-reviews-bottom|renter_signup" class="button  large" href="index.php?option=com_rental&view=signup"><span>Sign Up (it's FREE!)</span></a>
	          <div class="clear"></div>
	          <span class="block padTop5">Already have an account? <a class="bold" href="index.php?option=com_rental&view=login">Log in</a></span> </div>
	      </div>
	    </div>
	  </div>
	  <div id="anonymousFavoriteListingModal">
	    <div id="anonFaves" class="basicModal clearfix medium">
	      <div class="h1">Sign up and save this listing!</div>
	      <h2>Your saved listings in one place! </h2>
	      <div class="bordered light clearfix">
	        <div class="block marginTop5"> <a data-tagged-trac="modal-favorite-listing|renter_signup" class="button  large" href="index.php?option=com_rental&view=signup"><span>Sign Up (it's FREE)</span></a> </div>
	        <a id="closeModal" class="bold block padTop20" href="#">No, thanks</a> </div>
	      <a class="bold" href="/renter/how-it-works">Learn more</a> about Naked Apartments </div>
	  </div>
	</div><!-- hidden -->
	<script src="<?php echo _TMPL_JS_URL_?>/functions.js" type="text/javascript"></script>
</body>
</html>