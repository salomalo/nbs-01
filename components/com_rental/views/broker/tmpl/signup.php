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

$session 	= JFactory::getSession();
$errors 	= $session->get('errors');
$post 		= $session->get('post');

$user		= $post['user'];
$broker 	= $post['broker'];
$errorEmail = $session->get('error_email');
$billing_information = $post['billing_information'];

var_dump($user);
?>
<div id="main">
  <div class="headMessage"> <span class="contactUs">
    <h5>Questions?</h5>
    <a href="/about/faq/" class=" ">Help/FAQs</a> <span class="veryCalm">|</span> <a href="index.php?option=com_rental&view=about&layout=feedback-form&format=raw" class="feedbackBox cboxElement">Email us</a> <span class="veryCalm">|</span> <strong>646-504-2787</strong> </span>
    <h1>Create your Profile</h1>
    <h2>Just a few questions so we know who you are.</h2>
    <div class="clear"></div>
  </div>
  
  <!--right column-->
  <div id="rightCol">
    <div class="shadowOuterWhite">
      <div class="shadowInnerWhite">
        <div class="testimonial curve first marginBottom20"> "As a Licensed Real Estate Agent with Citi Habitats, Naked Apartments has been a fantastic element for my professional business"
          <p class="attribution">George <span class="calm">Licensed Salesperson</span> </p>
        </div>
        <div class="testimonial curve  marginBottom20"> "naked apartments has been a huge help with generating leads ...my #1 lead generator"
          <p class="attribution">Bobby <span class="calm">Licensed Salesperson</span> </p>
        </div>
        <div class="testimonial curve marginBottom20"> "I use your site religiously...it has increased business for me!"
          <p class="attribution">Ikenna <span class="calm">Licensed Salesperson</span></p>
        </div>
        <div class="testimonial curve marginBottom20"> "...a slew of happy renters and brokers, excited to put Craigslist behind them.   "
          <p class="attribution">The New York Observer <span class="calm">Respected Publication</span></p>
        </div>
        <div class="clear"></div>
        <span class="sideMod">
        <h2>You are who you state you are</h2>
        <p class="calm">By signing up you are stating that you are either a broker or a landlord, have the authority to represent the listings you upload and are using the site for tenant screening purposes. </p>
        </span>
        <table cellspacing="0" cellpadding="2" border="0" title="Click to Verify - This site chose VeriSign? SSL for secure e-commerce and confidential communications." id="verisign">
          <tbody>
            <tr>
              <td valign="top" align="right"><script src="https://seal.verisign.com/getseal?host_name=www.nakedapartments.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!--left column-->
  <div id="leftCol">
    <form method="post" id="new_broker" enctype="multipart/form-data" class="new_broker" action="<?php echo JRoute::_('index.php?option=com_rental&view=broker&layout=signup&format=raw'); ?>" accept-charset="UTF-8">
      <div style="margin:0;padding:0;display:inline">
        <input type="hidden" value="✓" name="utf8">
        <input type="hidden" value="kL5H/rwTqUr+/YrpZvnp3XjwGkEEW5vB2TUGUgwFebw=" name="authenticity_token">
      </div>
      <?php if (!empty($errors)): ?>
	<div class="errorExplanation" id="errorExplanation">
		<h2>oops! There are some errors</h2>
		<ul>
			<?php foreach ($errors as $error): ?>
			<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php 
	endif; 
	?>
      <fieldset class="main noBorder">
        <h2 class=" ">Your Personal Information</h2>
        <div class="rowLine" id="name">
          <label for="user_first_name">First Name</label>
          <input type="text" size="23" value="<?php echo $user['first_name']; ?>" name="user[first_name]" id="user_first_name" class="text idleField">
          <?php if (isset($user) && $user['first_name'] == ''): ?>
        	<div class="formError">can't be blank</div>
        	<?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label for="user_last_name">Last Name</label>
          <input type="text" size="23" value="<?php echo $user['last_name']; ?>" name="user[last_name]" id="user_last_name" class="text idleField">
          <?php if (isset($user) && $user['last_name'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine" id="email">
          <label for="user_email">Email</label>
          <span class="help"> If you have a <strong>RealtyMX</strong> or <strong>OLR</strong> account and 
          want us to auto-import your listings daily, use the <strong>same email address</strong> for both 
          that and your Naked account. </span>
          <input type="text" size="23" value="<?php echo $user['email']; ?>" name="user[email]" id="user_email" class="text idleField">
          <?php if (isset($user) && $user['email'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php elseif ($errorEmail == 'INVALID'): ?>
        <div class="formError">should look like an email address</div>
        <?php elseif ($errorEmail == 'TAKEN'): ?>
        <div class="formError">has already been taken</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine" id="phone">
          <label for="user_phone_number">Phone Number</label>
          <span class="help">Use a <strong>valid, working phone number</strong> so renters can contact you directly.</span>
          <input type="text" size="2" value="<?php echo $user['phone_area']; ?>" name="user[phone_area]" maxlength="3" id="user_phone_area" class="text idleField">
          <input type="text" size="2" value="<?php echo $user['phone_prefix']; ?>" name="user[phone_prefix]" maxlength="3" id="user_phone_prefix" class="text idleField">
          <input type="text" size="3" value="<?php echo $user['phone_sufix']; ?>" name="user[phone_sufix]" maxlength="4" id="user_phone_sufix" class="text idleField">
          <?php 
          $phoneError = array();
          
          if (isset($user) &&  ($user['phone_area'] == '' || $user['phone_prefix'] == '' || $user['phone_sufix'] == '')): 
          	if ($user['phone_area'] == '') 		$phoneError[] = 'Phone area';
          	if ($user['phone_prefix'] == '') 	$phoneError[] = 'Phone prefix';
          	if ($user['phone_sufix'] == '') 	$phoneError[] = 'Phone sufix';
          	
          	$phoneError = implode(' or ', $phoneError);
          ?>
          <div class="formError"><?php echo $phoneError; ?> can't be blank</div>
          <?php endif; ?>
          <div class="clear"></div>
        </div>
      </fieldset>
      <fieldset class="main">
        <h2 class=" ">Your Password <span class="message inline">(Min. 4 characters)</span> </h2>
        <div class="rowLine">
          <label for="user_password">Password</label>
          <input type="password" size="20" name="user[password]" id="user_password" class="text idleField">
          <?php if (isset($user) && strlen($user['password']) < 4): ?>
        <div class="formError">is too short (minimum is 4 characters)</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
      </fieldset>
      <fieldset class="main">
        <h2 class=" ">Your Professional Information</h2>
        <div id="brokerEntityChoices" class="rowSingle">
          <label class="radio">
            <input type="radio" value="1" name="broker[entity_type]" id="broker_entity_type_1" checked="checked">
            Broker/salesperson</label>
          <label class="radio">
            <input type="radio" value="2" name="broker[entity_type]" id="broker_entity_type_2">
            Landlord</label>
          <label class="radio">
            <input type="radio" value="3" name="broker[entity_type]" id="broker_entity_type_3">
            Management company</label>
          <div class="clear"></div>
        </div>
        <div class="hidden" id="brokerProfileDetails" style="display: block;">
          <div class="rowLine">
            <label>Brokerage Firm <span class="message">(optional)</span></label>
            <input type="text" value="<?php echo $broker['brokerage_firm_other'];?>" size="20" name="broker[brokerage_firm_other]" id="broker_brokerage_firm_other" default="Enter brokerage name" class="text idleField">
            <div class="clear"></div>
          </div>
          <div class="rowLine" id="lic"> <span class="help">We need this to verify your status. See our <a data-height="600" data-width="600" class="ajaxModal cboxElement" href="/ajax/privacy_policy">Privacy Policy</a> for details.</span>
            <label>License Number<br>
              <span class="message"> of Broker/Salesperson</span> </label>
            <input type="text" size="20" name="broker[license_number]" id="broker_license_number" value="<?php echo $broker['license_number']; ?>" class="text idleField">
            <?php /* if ($broker['license_number'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; */ ?>
            <div class="clear"></div>
          </div>
        </div>
        <div id="myWebSite" class="rowLine">
          <label for="broker_my_web_site"><a title="" class="tooltip mouseover" href="#">My web site</a> <span class="message">(optional)</span></label>
          <input type="text" size="50" value="<?php echo $broker['my_web_site'];?>" name="broker[my_web_site]" id="broker_my_web_site" class="text idleField">
          <div class="clear"></div>
        </div>
        <div class="hidden" id="landlordProfileDetails" style="display: none;">
          <div class="rowLine">
            <label for="broker_landlord_meta_attributes_company_name">Name of company</label>
            <input type="text" size="20" name="broker[landlord_meta_attributes][company_name]" id="broker_landlord_meta_attributes_company_name" class="text idleField">
            <div class="clear"></div>
          </div>
          <div class="rowLine">
            <label for="broker_landlord_meta_attributes_apartments_managed">Number of apartments you manage</label>
            <input type="text" size="5" name="broker[landlord_meta_attributes][apartments_managed]" id="broker_landlord_meta_attributes_apartments_managed" class="text idleField">
            <div class="clear"></div>
          </div>
          <h2>Info on one apartment you will advertise</h2>
          <div class="rowLine hidden" style="display: none;">
            <label for="broker_landlord_meta_attributes_landlord_name">Landlord name</label>
            <input type="text" size="20" name="broker[landlord_meta_attributes][landlord_name]" id="broker_landlord_meta_attributes_landlord_name" class="text idleField">
            <div class="clear"></div>
          </div>
          <div class="rowLine"> <span class="help">We need the address for verification purposes. It will not be displayed to renters.</span>
            <label for="broker_landlord_meta_attributes_apartment_street_address">Street address</label>
            <input type="text" size="20" name="broker[landlord_meta_attributes][apartment_street_address]" id="broker_landlord_meta_attributes_apartment_street_address" class="text idleField">
            <div class="clear"></div>
          </div>
          <div class="rowLine">
            <label for="broker_landlord_meta_attributes_apartment_unit_number">Unit number</label>
            <input type="text" size="5" name="broker[landlord_meta_attributes][apartment_unit_number]" id="broker_landlord_meta_attributes_apartment_unit_number" class="text idleField">
            <div class="clear"></div>
          </div>
          <div class="rowLine">
            <label for="broker_landlord_meta_attributes_apartment_borough_id">Borough</label>
            <select name="broker[landlord_meta_attributes][apartment_borough_id]" id="broker_landlord_meta_attributes_apartment_borough_id">
              <option value="">Please select</option>			
              <?php foreach ($this->neighborhood as $key => $n): ?>
			  <option value="<?php echo $n->id; ?>" <?php if ($broker['landlord_meta_attributes']['apartment_borough_id'] == $n->id) echo 'selected="selected"' ?>><?php echo $n->title; ?></option>
              <?php endforeach; ?>            
            </select>
            <div class="clear"></div>
          </div>
          <div class="rowLine">
            <label for="broker_landlord_meta_attributes_property_registration_number">Property registration number</label>
            <input type="text" size="20" name="broker[landlord_meta_attributes][property_registration_number]" id="broker_landlord_meta_attributes_property_registration_number" class="text idleField">
            <div class="clear"></div>
          </div>
        </div>
      </fieldset>
      <fieldset id="planDetails" class="main">
        <h2>Plan Details</h2>
        <div class="rowLine"> <span class="text120"><strong>Plus</strong>: $39/mo</span> </div>
        <div class="clear"></div>
        <div id="planFreq">
          <h4 class="rowLine">Automatically charge my card:</h4>
          <div class="checkboxCont">
            <input type="radio" value="1" name="months_per_billing_cycle" id="months_per_billing_cycle_1" data-renewal-date="06/12/2012" checked="checked">
            <label for="months_1">Every Month </label>
          </div>
          <div class="checkboxCont">
            <input type="radio" value="3" name="months_per_billing_cycle" id="months_per_billing_cycle_3" data-renewal-date="08/12/2012">
            <label for="months_3">Every 3 Months <span class="savings">$111.15 <span class="percent">(save 5%)</span></span></label>
          </div>
          <div class="checkboxCont">
            <input type="radio" value="6" name="months_per_billing_cycle" id="months_per_billing_cycle_6" data-renewal-date="11/12/2012">
            <label for="months_6">Every 6 Months <span class="savings">$210.60 <span class="percent">(save 10%)</span></span></label>
          </div>
          <div class="checkboxCont">
            <input type="radio" value="12" name="months_per_billing_cycle" id="months_per_billing_cycle_12" data-renewal-date="05/12/2013">
            <label for="months_12">Every Year <span class="savings">$351.00 <span class="percent">(save 25%)</span></span></label>
          </div>
          <div class="clear"></div>
          <p class="note"> <span class="highlightYellow">Your card will be charged automatically each payment period.</span><br>
            For example, if you choose "Every Month" your card will be charged each month. </p>
          <p class="note"> <span class="highlightYellow">You can cancel anytime during your membership.</span><br>
            Just click "View Account" and then click "Cancel Account". If you don't cancel, your plan will continue. </p>
          <p class="note"> <span class="highlightYellow">Your card will be charged again on <span id="subscriptionNextRenewalAt">06/12/2012</span>. </span> </p>
          <div class="clear"></div>
        </div>
        <input type="hidden" value="11" name="plan_id" id="plan_id">
        <input type="hidden" value="signup" name="plan_state" id="plan_state">
      </fieldset>
      <fieldset class="main" id="cardInfo">
        <h2>Payment Information <span class="message inline"> We accept Credit, Debit and Prepaid Cards.</span></h2>
        <div class="rowLine">
          <label>Card Type</label>
          <?php 
          $cardType = array(
							'master' 			=> 'Mastercard',
							'discover' 			=> 'Discover',
							'visa' 				=> 'Visa',
							'american_express' 	=> 'American Express',
          				);
          ?>
          <select tabindex="1" name="billing_information[credit_card_type]" id="billing_information_credit_card_type">
          	<?php foreach ($cardType as $card_type => $card): ?>
            <option value="<?php echo $card_type; ?>" <?php if ($card_type == $billing_information['credit_card_type']) echo 'selected="selected"'; ?>><?php echo $card; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label>Card Number</label>
          <input type="text" tabindex="2" size="20" value="<?php echo $billing_information['credit_card_number'];?>" name="billing_information[credit_card_number]" id="billing_information_credit_card_number" class="idleField">
          <?php if (isset($billing_information) && $billing_information['credit_card_number']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine"> <span class=" help">Please enter your name exactly as it appears on your card</span>
          <label>Cardholder's First Name</label>
          <input type="text" tabindex="3" size="20" value="<?php echo $billing_information['credit_card_first_name'];?>" name="billing_information[credit_card_first_name]" id="billing_information_credit_card_first_name" class="idleField">
          <?php if (isset($billing_information) && $billing_information['credit_card_first_name']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label>Cardholder's Last Name</label>
          <input type="text" tabindex="4" size="20" value="<?php echo $billing_information['credit_card_last_name'];?>" name="billing_information[credit_card_last_name]" id="billing_information_credit_card_last_name" class="idleField">
          <?php if (isset($billing_information) && $billing_information['credit_card_last_name']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label>Expiration Date</label>
          <select tabindex="5" name="billing_information[credit_card_month]" id="billing_information_credit_card_month">
            <?php 
            for ($i = 1; $i <= 12; $i ++): 
            	$firstDateInMonth = strtotime(date('Y') . '-' . $i . '-1');
            ?>
            <option <?php if ($i == $billing_information['credit_card_month']) echo 'selected="selected"'; ?> value="<?php echo $i; ?>"><?php echo date('m', $firstDateInMonth) . ' - ' . date('M', $firstDateInMonth)?></option>
            <?php endfor;?>
          </select>
          <select tabindex="6" name="billing_information[credit_card_year]" id="billing_information_credit_card_year" class="second">
            <?php for ($i = 2012; $i <= 2042; $i ++): ?>
            <option <?php if ($i == $billing_information['credit_card_year']) echo 'selected="selected"'; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label for="cardCVC">CVC <span title="On MasterCard and Visa, this is the last 3 digits AFTER the credit card number in the signature area of the card. On American Express cards, it's the 4-digit  number above the credit card number on either the right or the left side of the card." class="calm tooltip mouseover">what's this?</span></label>
          <input type="text" tabindex="7" size="3" value="<?php echo $billing_information['credit_card_verification_value']; ?>" name="billing_information[credit_card_verification_value]" id="billing_information_credit_card_verification_value" class="idleField">
          <?php if (isset($billing_information) && $billing_information['credit_card_verification_value']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <h4 class="rowLine"> Billing Address </h4>
        <div class="rowLine">
          <label for="billAddress">Street Address</label>
          <input type="text" tabindex="8" size="20" value="<?php echo $billing_information['billing_address_address']; ?>" name="billing_information[billing_address_address]" id="billing_information_billing_address_address" class="idleField">
          <?php if (isset($billing_information) && $billing_information['billing_address_address']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="rowLine">
          <label for="billZip">Zip</label>
          <input type="text" tabindex="11" size="5" value="<?php echo $billing_information['billing_address_zip']; ?>" name="billing_information[billing_address_zip]" id="billing_information_billing_address_zip" class="idleField">
          <?php if (isset($billing_information) && $billing_information['billing_address_zip']== ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
          <div class="clear"></div>
        </div>
      </fieldset>
      <fieldset class="main">
        <h2>Coupons/Discounts</h2>
        <div id="newCoupon"> Enter any coupons or discounts
          <div class="clear"></div>
          <span class="block">
          <input type="text" id="couponCode" value="<?php echo $post['code']; ?>" name="code" size="30" class="text idleField">
          </span> <a id="applyCouponCode" class="button white noIcon medium" href="#"><span>Apply Discount</span></a>
          <div class="clear"></div>
        </div>
      </fieldset>
      <fieldset class="main">
        <h2><a class="more" onclick="$('#specialities').is(':hidden') ? $('#specialities').fadeIn('fast') : $('#specialities').fadeOut('fast'); return false;" href=""> Select Neighborhood Specialities</a> <span class="message inline">(optional)</span></h2>
        <div style="display:none" id="specialities">
          <ul class="clearfix" id="boroughNav">
          	<?php foreach ($this->neighborhood as $key => $n): ?>
            <li data-id="<?php echo $n->id; ?>" <?php if ($key == 0): ?>class="active"<?php endif; ?>><a href="#"><?php echo $n->title; ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php foreach ($this->neighborhood as $key => $n): ?>
          <div <?php if ($key > 0): ?>style="display: none;"<?php endif; ?> style="" class="boroughs" id="borough_<?php echo $n->id; ?>">
            <div class="clearfix" id="filters">
              <div class="checkboxCont"> <a data-id="1" href="#" class="selectAll button white noIcon medium"><span>Select All</span></a> </div>
              <div class="checkboxCont"> <a data-id="1" href="#" class="unselectAll button white noIcon medium"><span>Unselect All</span></a> </div>
            </div>
            <span>
            	<?php foreach ($n->locations as $loc): ?>	
            	<div class="checkboxCont">
	              <input type="checkbox" value="<?php echo $loc->id; ?>" name="broker[neighborhood_ids][]" id="broker_neighborhood_ids_<?php echo $loc->id; ?>" class="field text" <?php if (isset($broker['neighborhood_ids']) && in_array($loc->id, $broker['neighborhood_ids'])) echo 'checked="checked"'; ?>>
	              <label><?php echo $loc->title; ?></label>
	            </div>
		        <?php endforeach; ?>
            </span>
            <div class="clear"></div>
          </div>
          <?php endforeach; ?>          
      </fieldset>
      <fieldset class="main" id="brokerBioPhoto">
        <h2><a class="more" onclick="$('#personalize').is(':hidden') ? $('#personalize').fadeIn('fast') : $('#personalize').fadeOut('fast'); return false;" href="">Personalize Your Profile</a> <span class="message inline">(optional)</span></h2>
        <div style="display:none" id="personalize"> <span class="note">Please don't include your full name or contact information - your account will be suspended</span>
          <div class="rowSingle"> <strong>Write a personal statement/bio (visible to renters)</strong>
            <textarea style="width: 500px;" rows="7" name="broker[bio]" id="broker_bio" cols="60" class="idleField"><?php echo $broker['bio']; ?></textarea>
            <span lang="en" aria-labelledby="cke_broker_bio_arialbl" role="application" title=" " dir="ltr" class="cke_skin_kama cke_1 cke_editor_broker_bio" id="cke_broker_bio"><span class="cke_voice_label" id="cke_broker_bio_arialbl">Rich Text Editor</span><span role="presentation" class="cke_browser_gecko"><span role="presentation" class="cke_wrapper cke_ltr">
            <table cellspacing="0" cellpadding="0" border="0" role="presentation" class="cke_editor">
              <tbody>
                <tr role="presentation" style="-moz-user-select: none;">
                  <td role="presentation" class="cke_top" id="cke_top_broker_bio"><div onmousedown="return false;" aria-labelledby="cke_5" role="group" class="cke_toolbox"><span class="cke_voice_label" id="cke_5">Editor toolbars</span><span role="toolbar" class="cke_toolbar" id="cke_6"><span class="cke_toolbar_start"></span><span role="presentation" class="cke_toolgroup"><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(4, this); return false;" onfocus="return CKEDITOR.tools.callFunction(3, event);" onkeydown="return CKEDITOR.tools.callFunction(2, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_7_label" role="button" hidefocus="true" tabindex="-1" title="Bold" class="cke_off cke_button_bold" id="cke_7"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_7_label">Bold</span></a></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(7, this); return false;" onfocus="return CKEDITOR.tools.callFunction(6, event);" onkeydown="return CKEDITOR.tools.callFunction(5, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_8_label" role="button" hidefocus="true" tabindex="-1" title="Italic" class="cke_off cke_button_italic" id="cke_8"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_8_label">Italic</span></a></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(10, this); return false;" onfocus="return CKEDITOR.tools.callFunction(9, event);" onkeydown="return CKEDITOR.tools.callFunction(8, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_9_label" role="button" hidefocus="true" tabindex="-1" title="Underline" class="cke_off cke_button_underline" id="cke_9"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_9_label">Underline</span></a></span><span role="separator" class="cke_separator"></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(13, this); return false;" onfocus="return CKEDITOR.tools.callFunction(12, event);" onkeydown="return CKEDITOR.tools.callFunction(11, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_10_label" role="button" hidefocus="true" tabindex="-1" title="Insert/Remove Numbered List" class="cke_off cke_button_numberedlist" id="cke_10"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_10_label">Insert/Remove Numbered List</span></a></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(16, this); return false;" onfocus="return CKEDITOR.tools.callFunction(15, event);" onkeydown="return CKEDITOR.tools.callFunction(14, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_11_label" role="button" hidefocus="true" tabindex="-1" title="Insert/Remove Bulleted List" class="cke_off cke_button_bulletedlist" id="cke_11"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_11_label">Insert/Remove Bulleted List</span></a></span><span role="separator" class="cke_separator"></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(19, this); return false;" onfocus="return CKEDITOR.tools.callFunction(18, event);" onkeydown="return CKEDITOR.tools.callFunction(17, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_12_label" role="button" hidefocus="true" tabindex="-1" title="Undo" class="cke_button_undo cke_disabled" id="cke_12" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_12_label">Undo</span></a></span><span class="cke_button"><a onclick="CKEDITOR.tools.callFunction(22, this); return false;" onfocus="return CKEDITOR.tools.callFunction(21, event);" onkeydown="return CKEDITOR.tools.callFunction(20, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_13_label" role="button" hidefocus="true" tabindex="-1" title="Redo" class="cke_button_redo cke_disabled" id="cke_13" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span class="cke_label" id="cke_13_label">Redo</span></a></span></span><span class="cke_toolbar_end"></span></span></div>
                    <a onclick="CKEDITOR.tools.callFunction(23)" class="cke_toolbox_collapser" tabindex="-1" id="cke_14" title="Collapse Toolbar"><span>▲</span></a></td>
                </tr>
                <tr role="presentation">
                  <td role="presentation" style="height:200px" class="cke_contents" id="cke_contents_broker_bio"><iframe frameborder="0" allowtransparency="true" tabindex="0" src="" title="Rich text editor, broker_bio, press ALT 0 for help." style="width:100%;height:100%"></iframe></td>
                </tr>
                <tr role="presentation" style="-moz-user-select: none;">
                  <td role="presentation" class="cke_bottom" id="cke_bottom_broker_bio"><div onmousedown="CKEDITOR.tools.callFunction(1, event)" title="Drag to resize" class="cke_resizer cke_resizer_ltr"></div></td>
                </tr>
              </tbody>
            </table>
            <style>
.cke_skin_kama{visibility:hidden;}
</style>
            </span></span><span role="presentation" style="position:absolute;" tabindex="-1"></span></span> </div>
          <span class="rowLeft">
          <label><strong>Upload a photo</strong></label>
          <input type="file" name="broker[photo]" id="broker_photo" class="idleField">
          </span> </div>
      </fieldset>
      <div class="formActions green">
        <div class="disclaimer"> By clicking this button, you are indicating that you have read and agree to the <a data-height="600" data-width="600" class="ajaxModal cboxElement" href="/ajax/broker_terms_of_service">Terms of Service</a></div>
        <a title="Create my account" class="button green large" id="submitBrokerSignup" href=""><span>Create Profile</span></a> <a class="cancel" href="/">Cancel</a>
        <div class="clear"></div>
      </div>
    </form>
  </div>
  
  <!--end container-->
  <div class="clear"></div>
</div>

<?php 
//reset session
$session->set('errors', null); 
$session->set('error_email', null);
$session->set('error_email', null);
?>