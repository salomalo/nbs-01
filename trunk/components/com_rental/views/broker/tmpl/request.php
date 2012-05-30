<?php
$broker_id = JRequest::getInt('broker_id');
$broker = JFactory::getUser($broker_id);
if(!$broker) jexit(); 
$listing_id = JRequest::getInt('listing_id');
?>
<div id="contactModal"><div class="basicModal clearfix wide" id="contactModalModal"><div class="h1">Contact <?php echo $broker->get('name');?></div>  

  <h3>(646) 481-5044 | <a href="mailto:igor@anchornyc.com?body=WebID%3A%20na_NKA_anchornyc_291086%0ANA%20Link%3A%20http%3A%2F%2Fwww.nakedapartments.com%2Frental%2F769887%3B%0ANumber%20of%20Bedrooms%3A%201br%0AMonthly%20Rent%3A%20%242%2C750&amp;subject=I%20saw%20your%20listing%20%28na_NKA_anchornyc_291086%29%20on%20Naked%20Apartments."><?php echo $broker->get('email')?></a></h3>
  
  <div class="modalContent">
    <div class="floatLeft border2 pad1 curve" id="anonymousContactForm">
      <div class="ajaxUpdateStage">
        <form accept-charset="UTF-8" action="/renter/contacts/anoymous_modal_request_confirmation" class="new_anonymous_message" data-remote="true" id="new_anonymous_message" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="Jj/guWQQ4+mR298KJlS9pZcZ/611DJnhxY2BR0/9JgI=" /></div>
  
  
  <input id="anonymous_message_listing_id" name="anonymous_message[listing_id]" type="hidden" value="769887" />
  
  <div class="rowLine noLine inputOnly clearfix">
	  <textarea class="text" cols="40" id="anonymous_message_text" name="anonymous_message[text]" rows="20">I would like to set a time to view this apartment. And please send any more info you have on the listing. Thanks.</textarea>
	  
  </div>    
  
  <div class="rowLine clearfix inputOnly">
	  <input class="text" default="Your name" id="anonymous_message_name" name="anonymous_message[name]" size="35" type="text" />
	  
  </div>
  
  <div class="rowLine inputOnly clearfix">
	  <input class="text" default="Your email address" id="anonymous_message_email" name="anonymous_message[email]" size="35" type="text" />
	  
  </div>
  
  <div class="rowLine inputOnly clearfix">
	  <input class="text" default="Your phone # (optional)" id="anonymous_message_phone" name="anonymous_message[phone]" size="35" type="text" />
	  
  </div>
  
  <div class="formActions green">
    <div>
    	<a href="#" class="button  submitButton large"><span>Send Message</span></a>
      <a href="#" class="cancel padLeft10" id="closeModal">Cancel</a>
    </div>
    
    <p class="calm green center padTop10">By sending, you agree to Naked Apartments <a href="/about/terms-and-conditions" target="_blank">Terms of Service</a>.
  </div>
</form>
      </div>
    </div>
    
    <div class="floatLeft" id="sideBar">
      <div class="blockBorder curve">
        <p class="center bold">Or, Sign Up and Enjoy More Features</p>
        
        <ul>
          <li>Send anonymous messages. <!-- <a href="#" class="tooltip grey mouseover" title="Agents don't see your email, phone or last name. They will respond to you via the Naked Apartments private messaging system.">[?]</a> --></li>
          <li>Get new listing alerts.</li>
          <li>Contact agents with one click.</li>
          <li>Get offers from brokers.</li>
        </ul>
        
        <p class="signupButton">
          <a href="/renter/signup" class="button large" data-tagged-trac="modal-instant-contact|renter_signup"><span>Sign up (it's free)</span></a>
        </p>
      </div>
    </div>
  </div>
</div></div>