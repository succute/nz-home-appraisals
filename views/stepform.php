		<input type="hidden" id="nzha-plugin-url" value="<?php echo plugins_url('assets/images/icons/', dirname(__FILE__)); ?>" />
		<form action="" method="post" id="nzha-appraisal-form">

			<div class="remodal" data-remodal-id="property" style="max-width: 40%;">
				<div class="nzha-step-form">
					<b style="font-size: 2vw;">How much is your property worth?</b>
					<br />
					<span style="color: #000; font-size: 12px;">Receive a free property report including recent sales in your neighbourhood and a property value estimate from a local real estate professional</span> 
					<br />
					<br />
					<input id="searchTextField" type="text" size="50">
					<br />
					<br />
					<input type="button" id="submitAddressBtn" style="background-color: #0f75bc; color: #fff; font-weight: bold;" value="FIND OUT YOUR PROPERTY'S WORTH" />
					<input type="hidden" id="ajaxUrl" value="<?php echo admin_url('admin-ajax.php'); ?>" />
				</div>
			</div>

			<div class="remodal" data-remodal-id="modal" style="max-width: 40%;">
				<div class="nzha-step-form">
					<input type="hidden" id="ajaxUrl" value="<?php echo admin_url('admin-ajax.php'); ?>" />
					<b>What type of property is <span class="nzha-search-address"></span></b>
					<br />
					<br />
					<ul class="typeofproperty">
						<?php
							foreach (getPropertyType() as $key => $property) {

						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getPropertyTypeIcons($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>" />
										<p style="display: none;">
											<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" type="checkbox" name="nzha_property_type[]" value="<?php echo $key; ?>" /> <?php echo ucfirst($property); ?>
										</p>
									</label>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-modalfirst" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-2" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal2" style="max-width: 40%;">
				<div class="nzha-step-form">
					<b>What is the condition of the property?</b>
					<br />
					<br />
					<ul class="propertycondition">
						<?php
							foreach (getPropertyCondition() as $key => $condition) {
						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getPropertyConditionIcons($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>" />
										<p style="display: none;">
											<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" type="checkbox" name="nzha_property_condition[]" value="<?php echo $key; ?>" /> <?php echo ucfirst($condition); ?>
										</p>
									</label>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-1" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-3" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal3" style="max-width: 40%;">
				<div class="nzha-step-form">
					<b>What is the size of <span class="nzha-search-address"></span>?</b>
					<br />
					<br />
					<ul class="propertysize">
						<?php
							foreach (getPropertySize() as $key => $size) {
						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getPropertySizeIcons($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>" />
										<p style="display: none;">
											<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" type="checkbox" name="nzha_property_size[]" value="<?php echo $key; ?>" /> <?php echo $size; ?>
										</p>
									</label>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-2" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-4" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal4" style="max-width: 60%;">
				<div class="nzha-step-form">
					<b><span class="nzha-search-address"></span> has...</b>
					<br />
					<br />
					<ul class="propertyfeatures">
						<?php
							foreach (getPropertyFeatures() as $key => $features) {
						?>
								<li>
									<img class="nzimage" src="<?php echo plugins_url('assets/images/icons/' . getPropertyFeaturesIcon($key) , dirname(__FILE__)); ?>" />
									<b><?php echo strtoupper($key); ?></b>
									<ul>
										<?php
											foreach (getPropertyFeaturesValue($key) as $num => $value) {
										?>
												<li><input class="nzhaproperty_radio_2nd" type="radio" name="nzha_property_<?php echo $key; ?>[]" value="<?php echo $num; ?>" /> <b><?php echo $value; ?></b></li>
										<?php
											}
										?>
									</ul>
								</li>
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-3" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-5" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal5" style="max-width: 65%;">
				<div class="nzha-step-form">
					<b>Special features of <span class="nzha-search-address"></span></b>
					<br />
					<br />
					<div>
						<div style="width: 60%; float: left;">
							<ul class="propertyspecialfeatures">
								<?php
									foreach (getSpecialFeatures() as $key => $specialfeature) {
								?>
										<li>
											<label for="<?php echo $key; ?>_input">
												<img class="nzimage propertyspecialfeaturesImg <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getSpecialFeaturesIcon($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>" />
												<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" style="display: none;" type="checkbox" name="nzha_property_specialfeatures[]" value="<?php echo $key; ?>" />
											</label>
										</li>	
								<?php
									}
								?>
							</ul>
						</div>
						<div style="width: 40%; float: left; text-align: left;">
							<b>Other Features</b>
							<br />
								<textarea rows="5" cols="40" name="nzha_property_otherspecialfeatures" placeholder="This is an optional field however completing it will help us give you the most accurate value possible.

Helpful things to include are.

·         Recent renovations

·         Unique features

·         Any points of interest that may not be immediately obvious"></textarea>
						</div>
					</div>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-4" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-6" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal6">
				<div class="nzha-step-form">
					<b>What is your relationship to <span class="nzha-search-address"></span>?</b>
					<br />
					<br />
					<ul class="relationship">
						<?php
							foreach (getRelationship() as $key => $relationship) {
						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getRelationshipIcon($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>"/>
										<span>
											<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" style="display: none;" type="checkbox" name="nzha_property_relationship[]" value="<?php echo $key; ?>" />
										</span>
									</label>
								</li>	
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-5" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-7" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal7">
				<div class="nzha-step-form">
					<b>What are your plans for this property?</b>
					<br />
					<br />
					<ul class="plans">
						<?php
							foreach (getPlans() as $key => $plans) {
						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getPlansIcon($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>"/>
										<span>
											<input class="nzhaproperty_radio" type="checkbox" style="display: none;" id="<?php echo $key; ?>_input" name="nzha_property_plans[]" value="<?php echo $key; ?>" />
										</span>
									</label>
								</li>	
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-6" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-8" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal8" style="max-width: 40%;">
				<div class="nzha-step-form">
					<b>What is your timeframe for <span id="timeframeDynamicChange">refinancing</span>?</b>
					<br />
					<br />
					<ul class="timeframe">
						<?php
							foreach (getTimeframe() as $key => $timeframe) {
						?>
								<li>
									<label for="<?php echo $key; ?>_input">
										<img class="nzimage <?php echo $key; ?>_input_image_nzimage" src="<?php echo plugins_url('assets/images/icons/' . getTimeframeIcon($key) , dirname(__FILE__)); ?>" data-key="<?php echo $key; ?>" />
										<span>
											<input class="nzhaproperty_radio" id="<?php echo $key; ?>_input" style="display: none;" type="checkbox" name="nzha_property_timeframe[]" value="<?php echo $key; ?>" />
										</span>
									</label>
								</li>	
						<?php
							}
						?>
					</ul>
				</div>
				<div style="clear: both;"></div>
				<br />
				<hr style="border-color: #0f75bc;" />
				<button id="previous-remodal-7" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
  				<button id="next-remodal-9" class="remodal-confirm display" style="background-color: #0F75BC;">NEXT >></button>
			</div>

			<div class="remodal" data-remodal-id="modal9" style="max-width: 65%;">
				<div class="nzha-step-form">
					<b>Almost here! Just enter your details below</b>
					<br />
					<br />
					
						<table style="border-style: none;">
							<tr>
								<td style="border-style: none;"><b>First Name: </b></td>
								<td style="text-align: right; border-style: none;"><input type="text" class"input_text" name="firstname"  /></td>
								<td style="border-style: none;"><b>Last Name: </b></td>
								<td style="text-align: right; border-style: none;"><input type="text" class"input_text" name="lastname"  /></td>
							</tr>
							<tr>
								<td style="border-style: none;"><b>Contact Number: </b></td>
								<td style="text-align: right; border-style: none;"><input type="text" class"input_text" name="mobile"  /></td>
								<td style="border-style: none;"><b>Email: </b></td>
								<td style="text-align: right; border-style: none;"><input type="text" class"input_text" name="email"  /></td>
							</tr>
						</table>
						<hr style="border: 1px solid #0f75bc;" />
						<input type="checkbox" /> 
						<span style="color: #0f75bc; font-size: 12px; text-align: left;">
							<i>I have read and agree to the Terms & Conditions and Privacy Policy</i>
						</span>

				</div>
				<button id="previous-remodal-8" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
				<button class="remodal-confirm" id="submitReportBtn" name="getmyreport" style="background-color: #0F75BC; width: 150px;">GET MY REPORT</button>
				<br />
				<span style="display: block;color: #000;font-size: 12px;width: 70%;margin: 15px auto;">
							NZ Home Appraisals collect your information to provide our services and may use it to provide you with information about other
							valuable related services. If you don't provide your information you may not be able to access our products or services.
							Our Privacy Policy Contains full details on how your information is used, how may access or correct your information and our
							privacy complaints process.
						</span>
			</div>

			<div class="remodal thankyoumessage-container" data-remodal-id="thankyoumessage" style="min-width: 70%; color: #000 !important; text-align: center;">
				<input type="hidden" id="reportid" />
				<h3 style="color: #000;">Thank you</h3>
				<p>
					Your property information is being assessed, a property report will be emailed to you once completed
				</p>
				<!--
				<br />
				<p>
					Your up-to-the minute Property Report is already on its way to your inbox. This will then be followed by your Market Analysis and Comparable Sales Report prepared by NZ Home Appraisal and a local real estate professional.
				</p>
				<h3 style="color: #000;">Get a free home loan report now</h3>
				<br />
				<p>
					Whether it's your first home or you're refinancing your existing loan, let HomeLoanReport.com.au help you with your home loan decision with a free online report.
					<br />
					<br />
					<a href="http://nzhomeappraisal.ninja.datapower.co.nz/">NZHomeAppraisal.com</a> provides you with borrowing capacity, stamp duty, featured lowest interest rates, recently sold properties and estimated loan repayments. Find out How it Works or View a sample Report
				</p>
				
				<div>
					
					<div class="sep-container">
						<h4 style="color: #000;">What is the purpose of this loan?</h4>
						
						<input type="radio" value="purchasing" name="purpose" /> Purchasing
						<br />
						<input type="radio" value="refinancing" name="purpose" /> Refinancing
					</div>
					<div class="sep-container">
						<h4 style="color: #000;">The property will be...</h4>
						
						<input type="radio" value="owner_occupied" name="the_property_will_be" /> Owner occupied
						<br />
						<input type="radio" value="investment" name="the_property_will_be" /> Investment
					</div>
					<div style="clear: both"></div>
					
					<div class="sep-container">
						<h3 style="color: #000;">Are you a first home buyer?</h3>
						
						<input type="radio" value="yes" name="first_home_buyer" /> Yes
						<input type="radio" value="no" name="first_home_buyer" /> No
					</div>
					<div class="sep-container">
						<h3 style="color: #000;">When do you need the finance?</h3>
						<select name="when_do_you_need_the_finance">
							<option value="as_soon_as_possible">As soon as possible</option>
							<option value="1-3_months">1-3 months</option>
							<option value="4-6_months">4-6 months</option>
							<option value="more_than_6_months">More than 6 months</option>
						</select>
					</div>
					<div style="clear: both"></div>
					
					<div class="the-property-container">
						<h3 style="color: #000;">The Property</h3>
						<br />
						<div class="the-property-one-container">
							<label>Estimated purchase price</label>
							<input type="text" name="estimated_purchase_price" />
							<label>Property Location</label>
							<input type="text" name="property_location" />
							<label>Your funds available</label>
							<i>This field is required</i>
							<input type="text" name="funds_available" />
						</div>
						<div class="the-property-two-container">
							<label>Original purchase price</label>
							<input type="text" name="original_purchase_price" />
							<label>Property Location</label>
							<input type="text" name="property_location" />
							<label>Estimated value</label>
							<input type="text" name="estimated_value" />
							<label>Outstanding balance</label>
							<input type="text" name="outstanding_balance" />
						</div>
					</div>
				</div>
				<br />
				<button id="next-remodal-income" class="remodal-confirm" style="background-color: #0F75BC; width: 150px;">CONTINUE</button>
			-->
			</div>

			<div class="remodal income-container" data-remodal-id="income" style="min-width: 70%; color: #000 !important;">
				<h3 style="color: #000;">Income</h3>
				<h3 style="color: #000;">What is your income type?</h3>
				<input type="radio" name="income_type" value="single"> Single 
				<input type="radio" name="income_type" value="joint"> Joint
				<div style="clear: both"></div>
				<div class="sep-container">
					<h3 style="color: #000;">Gross annual household income</h3>
					<input type="text" name="gross_annual_household_income" />
				</div>
				<div class="sep-container">
					<h3 style="color: #000;">Other gross annual income</h3>
					<input type="text" name="other_gross_annual_income" />
				</div>
				<div style="clear: both"></div>
				<div class="sep-container">
					<h3 style="color: #000;">Number of dependants</h3>
					<select name="number_of_dependants">
						<option value="0">None</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5+">5+</option>
					</select>
				</div>
				<div class="sep-container">
					<h3 style="color: #000;">Other monthly loan repayments</h3>
					<input type="text" name="other_monthly_loan_repayments" />
				</div>
				<div style="clear: both"></div>
				<div class="sep-container">
					<h3 style="color: #000;">Do you have a good credit history?</h3>
					<input type="radio" name="good_credit_history" value="yes" /> Yes 
					<input type="radio" name="good_credit_history" value="no" /> No
				</div>
				<div class="sep-container">
					<h3 style="color: #000;">Your employment status</h3>
					<select name="employment_status">
						<option value="fulltime">Full time</option>
						<option value="casual">Casual</option>
						<option value="parttime">Part time</option>
						<option value="contractor">Contractor</option>
						<option value="selfemployed">Self employed (min 12 months)</option>
						<option value="unemployed">Unemployed</option>
					</select>
				</div>
				<div style="clear: both"></div>
				<div class="sep-container">
					<h3 style="color: #000;">Your postcode</h3>
					<input type="text" name="postcode" />
				</div>
				<div class="sep-container">
					<h3 style="color: #000;">Your mobile number</h3>
					<input type="text" name="mobile_number" />
				</div>
				<div style="clear: both"></div>
			
				<br />
				<div>
					<h3 style="color: #000;">When is the best time to contact you?</h3>
					<br />
					<input type="radio" name="best_time_to_contact_you" value="anytime" /> Anytime
					<span style="margin-right: 30px;"></span>
					<input type="radio" name="best_time_to_contact_you" value="morning" /> Morning
					<span style="margin-right: 30px;"></span>
					<input type="radio" name="best_time_to_contact_you" value="afternoon" /> Afternoon
					<span style="margin-right: 30px;"></span>
					<input type="radio" name="best_time_to_contact_you" value="evening" /> Evening
				</div>
				<br />
				<div>
					<input type="checkbox" value="yes" /> <b>I have read and agree to NZ Home Appraisal Terms & Conditions and Privacy Policy</b>
				</div>
				<br />
				<button id="previous-remodal-thankyoumessage" class="remodal-cancel" style="background-color: #578CA5;"><< BACK</button>
				<button class="remodal-confirm" id="submitReportBtnTwo" style="background-color: #0F75BC; width: 150px;">GET MY REPORT</button>
			</div>

			<div class="remodal thankyoumessage2" data-remodal-id="thankyoumessage2" style="min-width: 70%; color: #000 !important;">
				<h3 style="color: #fff;">Thank you!</h3>
				<p>
					Thank you for your enquiry, please check your email shortly for your free online report. If you do not receive your report email within a few minutes, please check your spam folder.
				</p>
			</div>

		</form>
	
