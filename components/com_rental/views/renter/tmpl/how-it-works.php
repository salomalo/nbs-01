<?php
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>
<div id="leftCol">
	    <ul class="ajaxContent" id="nav">
        <li class="search active current" data-step="1"><a href="#" class="  active">Reverse Search</a></li>
        <li class="noFee" data-step="2"><a href="#" class=" ">Search No-Fee Apartments</a></li>
        <li class="quality" data-step="3"><a href="#" class=" ">Quality Apartments</a></li>
        <li class="reviews" data-step="4"><a href="#" class=" ">Broker Reviews</a></li>
        <li class="privacy" data-step="5"><a href="#">Privacy</a></li>    		
        <li class="email" data-step="6"><a href="#">Email Notifications</a></li>
    </ul>
</div>
<div class="clearfix" id="rightCol">	
		<div class="floatRight padTop15">
				<a data-tagged-trac="renter-tour-call-to-action|renter_signup" class="button  large" href="index.php?option=com_rental&view=renter&layout=signup"><span>Sign Up (it's FREE)</span></a>	
		</div>
			
	<div id="step1">
			<span class="tout">feature tour</span>
			<h2>Describe what you're looking for...</h2>
			<h3>and agents will send you listings that match</h3>
			
			<ul class="cartoons clearfix">
				<li class="one">
					<span class="number">1</span>
					<span class="text">Describe what you want - location, rent, amenities, etc...</span>
				</li>
				
				<li class="two">
					<span class="number">2</span>
					<span class="text">We broadcast your wants to our far-flung agent base</span>
				</li>
				
				<li class="three last">
					<span class="number">3</span>
					<span class="text">Relax in a comfy chair while they suggest apartments</span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Ready for some chair time?</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end content div-->


<!--step 2-->
	<div style="display:none" id="step2">    
			<span class="tout">feature tour</span>
			<h2>Search No-Fee Apartments</h2>
			<h3>Limit your search to no-fee only</h3>
			
			<ul class="cartoons clearfix">
				<li class="one wide">
					<span class="text wide">Search all apartments or only no-fee apartments - you'll find thousands of options</span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Ready to start saving?</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end step 2 -->
    
    
<!--step 3-->
	<div style="display:none" id="step3">    
			<span class="tout">feature tour</span>
			<h2>Quality Apartments</h2>
			<h3>No junk, no scams, no hassle</h3>
			
			<ul class="cartoons clearfix">
					<li class="one medium"><span class="text">We rank apartments by their Naked Apartments Quality Score - only the best!</span>
				</li>
				
				<li class="two medium last">
					<span class="text"><strong>No duplicate listings:</strong> Just choose a broker when several list the same apartment </span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Ready for some quality?</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end step 3 -->

<!--step 4 -->
	<div style="display:none" id="step4">    
			<span class="tout">feature tour</span>
			<h2>Broker Reviews</h2>
			<h3>Read reviews before you look; write them after</h3>
			
			<ul class="cartoons clearfix">
				<li class="one medium">
					<span class="text">Detailed reviews of brokers help you choose</span>
				</li>
				
				<li class="two medium last">
					<span class="text">Share your experiences with other renters</span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Ready to read some reviews?</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end step 4 -->


<!--step 5 -->
	<div style="display:none" id="step5">    
			<span class="tout">feature tour</span>
			<h2>Privacy</h2>
			<h3>Remain anonymous for as long as you want</h3>
			
			<ul class="cartoons clearfix">
				<li class="one medium">
					<span class="text">Send and receive messages anonymously</span>
				</li>
				
				<li class="two medium last">
					<span class="text">Share your contact information when ready</span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Ready to communicate on your terms?</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end step 5-->
	
	<!--step 6 -->
	<div style="display:none" id="step6">    
			<span class="tout">feature tour</span>
			<h2>Email notifications</h2>
			<h3>Fresh apartments in your inbox</h3>
			
			<ul class="cartoons clearfix">
				<li class="one wide">
					<span class="text">Every morning we'll email you suggested apartments</span>
				</li>
			</ul>
			
		<div class="statement">
			<strong>Wake up to some great apartments!</strong> <a href="index.php?option=com_rental&view=renter&layout=signup">Sign up today!</a>
		</div>
	</div><!--end step 5-->
	
	
</div>
