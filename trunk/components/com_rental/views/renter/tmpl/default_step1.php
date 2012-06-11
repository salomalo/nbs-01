<?php
$post = JRequest::get('post');
$user = $post['user'];
$renter = $post['renter'];
$arrBedrooms = JEUtil::getBedrooms();
?>
<form method="post" id="new_renter" data-remote="true" class="new_renter" action="<?php echo JRoute::_('index.php?option=com_rental&view=renter&layout=create-profile&format=raw'); ?>" accept-charset="UTF-8">
    <div style="margin:0;padding:0;display:inline">
      <input type="hidden" value="✓" name="utf8">
      <input type="hidden" value="FMMkutNs1Rl3JU3ZLjwl+l5+EYNdHqoqS95L8NSndUQ=" name="authenticity_token">
    </div>
    <?php if (!empty($this->checkErrors)): ?>
	<div class="errorExplanation" id="errorExplanation">
		<h2>oops! There are some errors</h2>
		<ul>
			<?php foreach ($this->checkErrors as $error): ?>
			<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<div id="signup_step_1" class="main signupStep">
      <div class="headMessage  padBottom20">
        <h1 class="small orange">Create your free account</h1>
      </div>
      <div class="sideContainer">
        <div class="sideBox curveRt"> It's better than Craigslist. Better apartments, better search. <strong>Brittany</strong> </div>
        <div class="sideBox two curveRt"> Naked Apartments did an amazing job helping find a new apartment and I will definitely be using them again. <strong>Sarah</strong> </div>
        <div class="sideBox three curveRt"> Unlike online classifieds, Naked Apartments doesn't tolerate spam or scams. <strong>Mark</strong> </div>
      </div>
      <div class="borderTop pad10-10-15-10 relative" id="name">
        <label for="user_first_name">First Name</label>
        <input type="text" size="30" name="user[first_name]" id="user_first_name" value="<?php echo $user['first_name']; ?>" class="text width250 idleField">
        <?php if ($user['first_name'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix relative">
        <label for="user_last_name">Last Name</label>
        <input type="text" size="30" name="user[last_name]" id="user_last_name" class="text width250 idleField" value="<?php echo $user['last_name']; ?>">
        <?php if ($user['last_name'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
      </div>
      <div class=" borderTop clearfix pad10-10-15-10 relative" id="email"> <span class="sideText"> <strong>Your email is private.</strong> <br>
        You decide whom to share it with. </span>
        <label for="user_email">Email</label>
        <input type="text" size="30" name="user[email]" id="user_email" class="text width250 idleField" value="<?php echo $user['email']; ?>">
        <?php if ($user['email'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php elseif ($this->checkEmailAddress == 'INVALID'): ?>
        <div class="formError">should look like an email address</div>
        <?php elseif ($this->checkEmailAddress == 'TAKEN'): ?>
        <div class="formError">has already been taken</div>
        <?php endif; ?>
      </div>
      <div class="borderTop pad10-10-15-10 clearfix relative" id="phone"> <span class="sideText"> <strong>Your Phone number is private.</strong> <br>
        You decide whom to share it with. </span>
        <label for="user_phone_number">Phone Number</label>
        <input type="text" size="30" name="user[phone_number]" id="user_phone_number" class="text width250 idleField" value="<?php echo $user['phone_number']; ?>">
        <?php if ($user['phone_number'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
        <?php if (strlen($user['phone_number']) != 10 && $user['phone_number'] != ''): ?>
        <div class="formError">is the wrong length (should be 10 characters)</div>
        <?php endif; ?>
      </div>
      <div class=" borderTop pad10-10-15-10 relative">
        <label for="user_Password">Password</label>
        <input type="password" size="30" name="user[password]" id="user_password" class="text width250 idleField" value="<?php echo $user['password']; ?>">
        <?php if (strlen($user['password']) < 4): ?>
        <div class="formError">is too short (minimum is 4 characters)</div>
        <?php endif; ?>
      </div>
      <div class="clear"></div>
    </div>
    <div id="signup_step_2" class="main signupStep hidden">
      <div class="headMessage padBottom20">
        <h1 class="small orange">Where are you looking?</h1>
      </div>      
      <div class="sideContainer">
        <div class="sideBox curveRt"> "Tips on Renting in a Web-Site World"
          <p class="marginTop10">"For Renters-to-Be, the High-Tech Lowdown" <strong>New York Times</strong></p>
        </div>
        <div class="sideBox two curveRt"> We love Naked Apartments!<strong>Refinery29 </strong> </div>
        <div class="sideBox three curveRt"> The incredible Naked Apartments. <strong>HuffPost Tech </strong> </div>
      </div>
      <div class=" borderTop pad10-10-15-10  clearfix">
        <label>Apartment Size <span class="message inline">(choose all that apply)</span></label>
        <div id="selectApartmentSize">
          <ul class="plain clearfix">
          	<?php foreach ($arrBedrooms as $key => $bedroom): ?>          	
            <li class="boxed hoverable">
              <input type="checkbox" value="<?php echo $key; ?>" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_1" <?php if (isset($renter['apartment_size_ids']) && in_array($key, $renter['apartment_size_ids'])) echo 'checked="checked"'; ?>>
              <label for="renter_apartment_size_id_1"><?php echo $bedroom; ?></label>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php if (!isset($renter['apartment_size_ids'])): ?>
        <div class="formError">Please choose at least one apartment size</div>
        <?php endif; ?>
      </div>
      <div class=" borderTop pad10-10-15-10">
        <label>Where are you looking?</label>
        <div class="clear"></div>
        <?php if (!isset($renter['neighborhood_ids'])): ?>
        <div class="formError">Please choose at least one neighborhood</div>
        <?php endif; ?>
        <div class="smallLabel">
          <ul class="clearfix" id="boroughNav">
          	<?php foreach ($this->neighborhood as $key => $n): ?>
            <li data-id="<?php echo $n->id; ?>" <?php if ($key == 0): ?>class="active"<?php endif; ?>><a href="#"><?php echo $n->title; ?></a></li>
            <?php endforeach; ?>
          </ul>
          	<?php foreach ($this->neighborhood as $key => $n): ?>
	          <div <?php if ($key > 0): ?>style="display: none;"<?php endif; ?> class="boroughs" id="borough_<?php echo $n->id; ?>">
	          	<span>
	          		<?php foreach ($n->locations as $loc): ?>
		            <div class="checkboxCont">
		              <input type="checkbox" value="<?php echo $loc->id; ?>" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text" <?php if (isset($renter['neighborhood_ids']) && in_array($loc->id, $renter['neighborhood_ids'])) echo 'checked="checked"'; ?>>
		              <label><?php echo $loc->title; ?></label>
		            </div>
		            <?php endforeach; ?>
	            </span>
	            <div class="clear"></div>
	          </div>
	         <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div id="signup_step_3" class="main signupStep hidden">
      <div class="headMessage  padBottom20">
        <h1 class="small orange">Last step</h1>
      </div>
      <div class="sideContainer">
        <div class="sideBox curveRt"> A slew of happy renters and brokers, excited to put Craigslist behind them. <strong>New York Observer</strong> </div>
        <div class="sideBox curveRt"> NakedApartments is the cleanest, most trustworthy internet apartment search site.<strong>MARY</strong> </div>
      </div>
      <div class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_maximum_rent" class="inline width250 padTop5">What's your maximum rent?</label>
        <input value="<?php echo $renter['maximum_rent']; ?>" type="text" size="10" name="renter[maximum_rent]" id="renter_maximum_rent" default="$" class="text inline width-80 idleField">
        <?php if (intval($renter['maximum_rent']) <= 0): ?>
        <div class="formError">can't be blank</div>
        <?php endif; ?>
      </div>
      <div id="estimatedMoveDate" class=" borderTop pad10-10-15-10 clearfix">
        <label for="renter_move_date" class="inline width250 padTop5">When are you looking to move?</label>
        <input type="text" size="12" name="renter[move_date]" id="renter_move_date" data-min-date="0d" class="w16em dateformat-m-sl-d-sl-Y text inline width-100 hasDatepicker idleField">
        <?php if ($renter['move_date'] == ''): ?>
        <div class="formError">can't be blank</div>
        <?php
        else:
	        //convert move_date
	        $tmp = explode('/', $renter['move_date']);
	        $tmp = $tmp[2] . '-' . $tmp[0] . '-' . $tmp[1];
	        	
	        if (strtotime($tmp) < strtotime(date('Y-m-d'))):
        ?>
        <div class="formError">must be in the future</div>
        <?php 
        	endif;
        endif; ?>
      </div>
      <div id="renterHavePet" class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_have_pet">Do you have a pet?</label>
        <div class="clear"></div>
        <label class="radio">
          <input type="radio" value="1" name="renter[have_pet]" id="renter_have_pet_1" <?php if (isset($renter['have_pet']) && $renter['have_pet'] == 1) echo 'checked="checked"'; ?>>
          No</label>
        <label class="radio">
          <input type="radio" value="2" name="renter[have_pet]" id="renter_have_pet_2" <?php if (isset($renter['have_pet']) && $renter['have_pet'] == 2) echo 'checked="checked"'; ?>>
          Cat</label>
        <label class="radio">
          <input type="radio" value="3" name="renter[have_pet]" id="renter_have_pet_3" <?php if (isset($renter['have_pet']) && $renter['have_pet'] == 3) echo 'checked="checked"'; ?>>
          Dog</label>
          <?php if (!isset($renter['have_pet'])): ?>
          <div class="formError">can't be blank</div>
          <?php endif; ?>
      </div>
      <div id="renterRoommatesTotal" class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_roommates_total">How many roommates are you looking with?</label>
        <div class="clear"></div>
        <label class="radio">
          <input type="radio" value="1" name="renter[roommates_total]" id="renter_roommates_total_1" <?php if (isset($renter['roommates_total']) && $renter['roommates_total'] == 1) echo 'checked="checked"'; ?>>
          0</label>
        <label class="radio">
          <input type="radio" value="2" name="renter[roommates_total]" id="renter_roommates_total_2" <?php if (isset($renter['roommates_total']) && $renter['roommates_total'] == 2) echo 'checked="checked"'; ?>>
          1</label>
        <label class="radio">
          <input type="radio" value="3" name="renter[roommates_total]" id="renter_roommates_total_3" <?php if (isset($renter['roommates_total']) && $renter['roommates_total'] == 3) echo 'checked="checked"'; ?>>
          2</label>
        <label class="radio">
          <input type="radio" value="4" name="renter[roommates_total]" id="renter_roommates_total_4" <?php if (isset($renter['roommates_total']) && $renter['roommates_total'] == 4) echo 'checked="checked"'; ?>>
          3+</label>
          <?php if (!isset($renter['roommates_total'])): ?>
          <div class="formError">can't be blank</div>
          <?php endif; ?>
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix">
        <h2>Sign-up your roommates/spouse for new listing alerts <span class="message inline">(optional)</span></h2>
        <div id="roommates">
          <div class="note">They'll get one email per day with the latest listings that match your criteria. <br>
            They <span class="bold black">WON'T</span> get access to your account and can easily unsubscribe.</div>
          <div style="border: 0;" class="rowLine clearfix">
            <div class="block">
              <label>Email Address</label>
              <input type="text" id="roommmatesEmail" name="renter[roommates_email][]" class="idleField">
            </div>
            <div class="block"> <a id="addRoommatesEmail" class="button small blue large" href="#"><span>Add</span></a> </div>
          </div>
          <ul id="roommateEntries">
          </ul>
        </div>
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix">
        <h2><a class="more" onclick="$('#finInfo').is(':hidden') ? $('#finInfo').fadeIn('fast') : $('#finInfo').fadeOut('fast'); return false;" href="#">Financial Information</a> <span class="message inline">(optional)</span></h2>
      </div>
      <div class="hidden" id="finInfo">
        <div class="  borderTop pad10-10-15-10 clearfix relative" id="salary">
          <label for="renter_gross_salary" class="inline width250 padTop5">Pre-Tax Annual Salary</label>
          <span class="sideText wide"><strong>Roommate/Co-signer?</strong><br>
          Please put your combined pre-tax annual salary</span>
          <input type="text" size="10" name="renter[gross_salary]" id="renter_gross_salary" default="$" class="width-80 inline idleField">
        </div>
        <div class=" borderTop pad10-10-15-10 borderTop clearfix" id="credit">
          <label for="renter_credit_score">How's your credit?</label>
          <ul class="plain">
            <li class="boxed medium hoverable">
              <input type="radio" value="800" name="renter[credit_score]" id="renter_credit_score_800">
              <label><strong>Excellent </strong><span class="calm">(800+)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="799" name="renter[credit_score]" id="renter_credit_score_799">
              <label><strong>Very Good</strong><span class="calm">(700-799)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="699" name="renter[credit_score]" id="renter_credit_score_699">
              <label><strong>Good </strong><span class="calm">(680-699)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="679" name="renter[credit_score]" id="renter_credit_score_679">
              <label><strong>OK/Fair </strong><span class="calm">(620-679)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="619" name="renter[credit_score]" id="renter_credit_score_619">
              <label><strong>Poor </strong><span class="calm">(580-619)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="579" name="renter[credit_score]" id="renter_credit_score_579">
              <label><strong>Bad</strong><span class="calm">(500-579)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="9003" name="renter[credit_score]" id="renter_credit_score_9003">
              <label><strong>Not sure</strong><span class="calm">???</span></label>
            </li>
          </ul>
        </div>
        <div class=" borderTop pad10-10-15-10 relative clearfix" id="guarantor">
          <label>Do you have a Guarantor or co-signer?<span class="message">A guarantor's pre-tax income should be 80x the monthly rent.</span> </label>
          <ul class="plain marginTop10">
            <li class="boxed bordered hoverable">
              <input type="radio" value="true" name="renter[has_guarantor]" id="renter_has_guarantor_true" class="field text">
              <label for="renter_has_guarantor_yes">Yes</label>
            </li>
            <li class="boxed bordered  hoverable">
              <input type="radio" value="false" name="renter[has_guarantor]" id="renter_has_guarantor_false" class="field text">
              <label for="renter_has_guarantor_no">No</label>
            </li>
          </ul>
        </div>
      </div>
      <div class=" borderTop pad10-10-15-10">
        <label>Anything else you want landlords/brokers to know?</label>
        <div class="marginTop10" id="commentsInfo">
          <textarea rows="5" name="renter[comments_for_broker]" id="renter_comments_for_broker" default="eg, prefer to live on the ground floor, must have a washer/dryer, etc..." cols="55" class="has_default_text idleField"></textarea>
        </div>
      </div>
      <fieldset>
        <div class="boxed wide">
          <input type="checkbox" class="field text" value="1" name="terms_confirmation" id="agreeToTerms">
          <label for="agreeToTerms"> I agree to Naked Apartments <a data-height="400" data-width="450" class="ajaxModal cboxElement" href="/ajax/renter_terms_of_service">Terms of Service</a>. </label>
        </div>
      </fieldset>
      <div class="clear"></div>
    </div>
    <input type="hidden" value="2" name="step" id="step">
    <input type="hidden" name="version" id="version">
    <div class="formActions green"> <a id="backStep" class="button  large white arrow left hidden" href="javascript: go_back_to_previous_step(this);"><span>Back</span></a> <a id="nextStep" class="button arrow onGreen submitButton large" href="#"><span>Next</span></a> <a id="createAccountStep" class="button  submitButton large hidden" href="#"><span>Create Account</span></a> <span id="ajaxLoaderContainer"></span> </div>
  </form>