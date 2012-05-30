<?php
?>
<div id="renterFlagListingModal">
	<div class="basicModal clearfix narrow"
		id="renterFlagListingModalModal">
		<div class="h1">Report Listing Error</div>
		<h2>Help us monitor listings posted on our site.</h2>

		<div class="pad1 curve">
			<form accept-charset="UTF-8" action="/rental/769847/create-flag"
				class="new_listing_renter_flag" data-remote="true"
				id="new_listing_renter_flag" method="post">
				<div style="margin: 0; padding: 0; display: inline">
					<input name="utf8" type="hidden" value="&#x2713;" /><input
						name="authenticity_token" type="hidden"
						value="Jj/guWQQ4+mR298KJlS9pZcZ/611DJnhxY2BR0/9JgI=" />
				</div>

				<div class="rowLine noBorder clearfix">
					<ul>
						<li><input checked="checked" id="reason_1" name="reason"
							type="radio" value="1" /> <label for="reason_1">Apartment no
								longer available</label></li>
						<li><input id="reason_2" name="reason" type="radio" value="2" /> <label
							for="reason_2">Wrong price</label></li>
						<li><input id="reason_3" name="reason" type="radio" value="3" /> <label
							for="reason_3">Wrong photo</label></li>
						<li><input id="reason_4" name="reason" type="radio" value="4" /> <label
							for="reason_4">Inaccurate description</label></li>
						<li><input id="reason_5" name="reason" type="radio" value="5" /> <label
							for="reason_5">Wrong neighborhood/location</label></li>
						<li><input id="reason_6" name="reason" type="radio" value="6" /> <label
							for="reason_6">Too good to be true</label></li>
						<li><input id="reason_7" name="reason" type="radio" value="7" /> <label
							for="reason_7">Spam</label></li>
					</ul>
				</div>

				<div class="formActions green">
					<div>
						<a href="#" class="button  submitButton large"><span>Submit</span>
						</a> <a href="#" class="cancel padLeft10" id="closeModal">cancel</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
