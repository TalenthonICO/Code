<?php
	//echo"<Pre>";
	//print_r($userData);
?>
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<script src="<?=base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.css">
<script src="<?=base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<div class="fullD termSlct"> 
    <div class="acc-page b-30">
		<div class="account-table">
			<?php
				$data	= array();
				$data['menuActive']	=	'personalInfo';
				$this->load->view('account/top_menu_bar',$data);
			?>
			<div class="container">
				<div class="acc-content bs-3"> 
					<script type="text/javascript">
						var us_states = '<option value="">Select State</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>',
						ca_states = '<option value="">Select State</option><option value="AB">Alberta</option><option value="BC">British Columbia</option><option value="MB">Manitoba</option><option value="NB">New Brunswick</option><option value="NL">Newfoundland and Labrador</option><option value="NS">Nova Scotia</option><option value="ON">Ontario</option><option value="PE">Prince Edward Island</option><option value="QC">Quebec</option><option value="SK">Saskatchewan</option>';
					</script>
					<div class="wb pad-panel acc-contact-info acc-right">
						<?php $this->load->view('message_template');?>
						<div class="center-block-sm">
							<form id="account-contact-form" action="/account/personalInfo/upadte" method="post">
								
								<h4 class="group-title text-center t-20">Account Information</h4>
								<div class="form-group field-accountcontactform-name required">
									<input id="first_name" class="form-control" name="first_name" value="<?=@$userData->first_name?>" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								<div class="form-group field-accountcontactform-lastname required">
									<input id="last_name" class="form-control" name="last_name" value="<?=@$userData->last_name?>" autofocus placeholder="Last Name" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								<div class="form-group field-accountcontactform-date_of_birth required">
									<input id="dob" class="form-control" name="dob" value="<?=@$userData->dob?>" placeholder="Date of birth" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								<div class="form-group field-accountcontactform-company">
									<input id="accountcontactform-company" class="form-control" name="company" value="<?=@$userData->company?>" autocomplete="off" placeholder="Company" type="text">
									<div class="help-block"></div>
								</div>
								<div class="form-group field-accountcontactform-phone">
									<input id="accountcontactform-phone" class="form-control" name="phone" autocomplete="off" value="<?=@$userData->phone?>" placeholder="Phone" type="text">
									<div class="help-block"></div>
								</div>
								<!--<h4 class="group-title text-center t-30">Notifications Language</h4>
									<div class="form-group field-accountcontactform-lang required">
									
									<select id="accountcontactform-lang" class="custom-select" name="notification_lang" data-width="100%" aria-required="true">
									<option value="en" selected="selected">English</option>
									<option value="es">Spanish</option>
									<option value="ru">Russian</option>
									<option value="tr">Turkish</option>
									<option value="de">German</option>
									<option value="pl">Polish</option>
									</select>
									<div class="help-block"></div>
								</div>-->
								<h4 class="group-title text-center t-30">Physical address</h4>
								<div class="form-group field-accountcontactform-address required">
									<input id="address_line1" class="form-control" name="address_line1" value="<?=@$userData->address_line1?>" autocomplete="off" placeholder="Address" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								<div class="form-group field-accountcontactform-zip required">
									<input id="post_code" class="form-control" name="post_code" autocomplete="off" value="<?=@$userData->post_code?>" placeholder="Zip" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								
								<?php
									$lgn	=	$userData->country_name;
								?>
								
								<div class="form-group field-accountcontactform-country required">
									<select id="country_name" class="custom-select" name="country_name" data-width="100%" aria-required="true">
										<option value="" > - Select Country - </option>
										<option value="US" <?=$lgn=="US"?'selected="selected"':'';?> >United States</option>
										<option value="AF" <?=$lgn=="AF"?'selected="selected"':'';?>>Afghanistan</option>
										<option value="AX" <?=$lgn=="AX"?'selected="selected"':'';?>>Åland Islands</option>
										<option value="AL" <?=$lgn=="AL"?'selected="selected"':'';?>>Albania</option>
										<option value="DZ" <?=$lgn=="DZ"?'selected="selected"':'';?>>Algeria</option>
										<option value="AS" <?=$lgn=="AS"?'selected="selected"':'';?>>American Samoa</option>
										<option value="AD" <?=$lgn=="AD"?'selected="selected"':'';?>>Andorra</option>
										<option value="AO" <?=$lgn=="AO"?'selected="selected"':'';?>>Angola</option>
										<option value="AI" <?=$lgn=="AI"?'selected="selected"':'';?>>Anguilla</option>
										<option value="AQ" <?=$lgn=="AQ"?'selected="selected"':'';?>>Antarctica</option>
										<option value="AG" <?=$lgn=="AG"?'selected="selected"':'';?>>Antigua and Barbuda</option>
										<option value="AR" <?=$lgn=="AR"?'selected="selected"':'';?>>Argentina</option>
										<option value="AM" <?=$lgn=="AM"?'selected="selected"':'';?>>Armenia</option>
										<option value="AW" <?=$lgn=="AW"?'selected="selected"':'';?>>Aruba</option>
										<option value="AU" <?=$lgn=="AU"?'selected="selected"':'';?>>Australia</option>
										<option value="AT" <?=$lgn=="AT"?'selected="selected"':'';?>>Austria</option>
										<option value="AZ" <?=$lgn=="AZ"?'selected="selected"':'';?>>Azerbaijan</option>
										<option value="BS" <?=$lgn=="BS"?'selected="selected"':'';?>>Bahamas</option>
										<option value="BH" <?=$lgn=="BH"?'selected="selected"':'';?>>Bahrain</option>
										<option value="BD" <?=$lgn=="US"?'selected="selected"':'';?>>Bangladesh</option>
										<option value="BB" <?=$lgn=="BB"?'selected="selected"':'';?>>Barbados</option>
										<option value="BY" <?=$lgn=="BY"?'selected="selected"':'';?>>Belarus</option>
										<option value="BE" <?=$lgn=="BE"?'selected="selected"':'';?>>Belgium</option>
										<option value="BZ" <?=$lgn=="BZ"?'selected="selected"':'';?>>Belize</option>
										<option value="BJ" <?=$lgn=="BJ"?'selected="selected"':'';?>>Benin</option>
										<option value="BM" <?=$lgn=="BM"?'selected="selected"':'';?>>Bermuda</option>
										<option value="BT" <?=$lgn=="BT"?'selected="selected"':'';?>>Bhutan</option>
										<option value="BO" <?=$lgn=="BO"?'selected="selected"':'';?>>Bolivia (Plurinational State of)</option>
										<option value="BQ" <?=$lgn=="BQ"?'selected="selected"':'';?>>Bonaire, Sint Eustatius and Saba</option>
										<option value="BA" <?=$lgn=="BA"?'selected="selected"':'';?>>Bosnia and Herzegovina</option>
										<option value="BW" <?=$lgn=="BW"?'selected="selected"':'';?>>Botswana</option>
										<option value="BV" <?=$lgn=="BV"?'selected="selected"':'';?>>Bouvet Island</option>
										<option value="BR" <?=$lgn=="BR"?'selected="selected"':'';?>>Brazil</option>
										<option value="IO" <?=$lgn=="IQ"?'selected="selected"':'';?>>British Indian Ocean Territory</option>
										<option value="BN" <?=$lgn=="BN"?'selected="selected"':'';?>>Brunei Darussalam</option>
										<option value="BG" <?=$lgn=="BG"?'selected="selected"':'';?>>Bulgaria</option>
										<option value="BF" <?=$lgn=="BF"?'selected="selected"':'';?>>Burkina Faso</option>
										<option value="BI" <?=$lgn=="BI"?'selected="selected"':'';?>>Burundi</option>
										<option value="CV" <?=$lgn=="CV"?'selected="selected"':'';?>>Cabo Verde</option>
										<option value="KH" <?=$lgn=="KH"?'selected="selected"':'';?>>Cambodia</option>
										<option value="CM" <?=$lgn=="CM"?'selected="selected"':'';?>>Cameroon</option>
										<option value="CA" <?=$lgn=="CA"?'selected="selected"':'';?>>Canada</option>
										<option value="KY" <?=$lgn=="KY"?'selected="selected"':'';?>>Cayman Islands</option>
										<option value="CF" <?=$lgn=="CF"?'selected="selected"':'';?>>Central African Republic</option>
										<option value="TD" <?=$lgn=="TD"?'selected="selected"':'';?>>Chad</option>
										<option value="CL" <?=$lgn=="CL"?'selected="selected"':'';?>>Chile</option>
										<option value="CN" <?=$lgn=="CN"?'selected="selected"':'';?>>China</option>
										<option value="CX" <?=$lgn=="CX"?'selected="selected"':'';?>>Christmas Island</option>
										<option value="CC" <?=$lgn=="CC"?'selected="selected"':'';?>>Cocos (Keeling) Islands</option>
										<option value="CO" <?=$lgn=="CO"?'selected="selected"':'';?>>Colombia</option>
										<option value="KM" <?=$lgn=="KM"?'selected="selected"':'';?>>Comoros</option>
										<option value="CG" <?=$lgn=="CG"?'selected="selected"':'';?>>Congo</option>
										<option value="CD" <?=$lgn=="CD"?'selected="selected"':'';?>>Congo (Democratic Republic of the)</option>
										<option value="CK" <?=$lgn=="CK"?'selected="selected"':'';?>>Cook Islands</option>
										<option value="CR" <?=$lgn=="CR"?'selected="selected"':'';?>>Costa Rica</option>
										<option value="CI" <?=$lgn=="CI"?'selected="selected"':'';?>>Côte d'Ivoire</option>
										<option value="HR" <?=$lgn=="HR"?'selected="selected"':'';?>>Croatia</option>
										<option value="CU" <?=$lgn=="CU"?'selected="selected"':'';?>>Cuba</option>
										<option value="CW" <?=$lgn=="CW"?'selected="selected"':'';?>>Curaçao</option>
										<option value="CY" <?=$lgn=="CY"?'selected="selected"':'';?>>Cyprus</option>
										<option value="CZ" <?=$lgn=="CZ"?'selected="selected"':'';?>>Czech Republic</option>
										<option value="DK" <?=$lgn=="DK"?'selected="selected"':'';?>>Denmark</option>
										<option value="DJ" <?=$lgn=="DJ"?'selected="selected"':'';?>>Djibouti</option>
										<option value="DM" <?=$lgn=="DM"?'selected="selected"':'';?>>Dominica</option>
										<option value="DO" <?=$lgn=="DO"?'selected="selected"':'';?>>Dominican Republic</option>
										<option value="EC" <?=$lgn=="EC"?'selected="selected"':'';?>>Ecuador</option>
										<option value="EG" <?=$lgn=="FG"?'selected="selected"':'';?>>Egypt</option>
										<option value="SV" <?=$lgn=="SV"?'selected="selected"':'';?>>El Salvador</option>
										<option value="GQ" <?=$lgn=="GQ"?'selected="selected"':'';?>>Equatorial Guinea</option>
										<option value="ER" <?=$lgn=="ER"?'selected="selected"':'';?>>Eritrea</option>
										<option value="EE" <?=$lgn=="EE"?'selected="selected"':'';?>>Estonia</option>
										<option value="ET" <?=$lgn=="ET"?'selected="selected"':'';?>>Ethiopia</option>
										<option value="FK" <?=$lgn=="FK"?'selected="selected"':'';?>>Falkland Islands (Malvinas)</option>
										<option value="FO" <?=$lgn=="FO"?'selected="selected"':'';?>>Faroe Islands</option>
										<option value="FJ" <?=$lgn=="FJ"?'selected="selected"':'';?>>Fiji</option>
										<option value="FI" <?=$lgn=="FI"?'selected="selected"':'';?>>Finland</option>
										<option value="FR" <?=$lgn=="FR"?'selected="selected"':'';?>>France</option>
										<option value="GF" <?=$lgn=="GF"?'selected="selected"':'';?>>French Guiana</option>
										<option value="PF" <?=$lgn=="PF"?'selected="selected"':'';?>>French Polynesia</option>
										<option value="TF" <?=$lgn=="TF"?'selected="selected"':'';?>>French Southern Territories</option>
										<option value="GA" <?=$lgn=="GA"?'selected="selected"':'';?>>Gabon</option>
										<option value="GM" <?=$lgn=="GM"?'selected="selected"':'';?>>Gambia</option>
										<option value="GE" <?=$lgn=="GE"?'selected="selected"':'';?>>Georgia</option>
										<option value="DE" <?=$lgn=="DE"?'selected="selected"':'';?>>Germany</option>
										<option value="GH" <?=$lgn=="GH"?'selected="selected"':'';?>>Ghana</option>
										<option value="GI" <?=$lgn=="GI"?'selected="selected"':'';?>>Gibraltar</option>
										<option value="GR" <?=$lgn=="GR"?'selected="selected"':'';?>>Greece</option>
										<option value="GL" <?=$lgn=="GL"?'selected="selected"':'';?>>Greenland</option>
										<option value="GD" <?=$lgn=="GD"?'selected="selected"':'';?>>Grenada</option>
										<option value="GP" <?=$lgn=="GP"?'selected="selected"':'';?>>Guadeloupe</option>
										<option value="GU" <?=$lgn=="GU"?'selected="selected"':'';?>>Guam</option>
										<option value="GT" <?=$lgn=="GT"?'selected="selected"':'';?>>Guatemala</option>
										<option value="GG" <?=$lgn=="GG"?'selected="selected"':'';?>>Guernsey</option>
										<option value="GN" <?=$lgn=="GN"?'selected="selected"':'';?>>Guinea</option>
										<option value="GW" <?=$lgn=="GW"?'selected="selected"':'';?>>Guinea-Bissau</option>
										<option value="GY" <?=$lgn=="GY"?'selected="selected"':'';?>>Guyana</option>
										<option value="HT" <?=$lgn=="HT"?'selected="selected"':'';?>>Haiti</option>
										<option value="HM" <?=$lgn=="HM"?'selected="selected"':'';?>>Heard Island and McDonald Islands</option>
										<option value="VA" <?=$lgn=="VA"?'selected="selected"':'';?>>Holy See</option>
										<option value="HN" <?=$lgn=="HN"?'selected="selected"':'';?>>Honduras</option>
										<option value="HK" <?=$lgn=="HK"?'selected="selected"':'';?>>Hong Kong</option>
										<option value="HU" <?=$lgn=="HU"?'selected="selected"':'';?>>Hungary</option>
										<option value="IS" <?=$lgn=="IS"?'selected="selected"':'';?>>Iceland</option>
										<option value="IN" <?=$lgn=="IN"?'selected="selected"':'';?>>India</option>
										<option value="ID" <?=$lgn=="ID"?'selected="selected"':'';?>>Indonesia</option>
										<option value="IR" <?=$lgn=="IR"?'selected="selected"':'';?>>Iran (Islamic Republic of)</option>
										<option value="IQ" <?=$lgn=="IQ"?'selected="selected"':'';?>>Iraq</option>
										<option value="IE" <?=$lgn=="IE"?'selected="selected"':'';?>>Ireland</option>
										<option value="IM" <?=$lgn=="IM"?'selected="selected"':'';?>>Isle of Man</option>
										<option value="IL" <?=$lgn=="IL"?'selected="selected"':'';?>>Israel</option>
										<option value="IT" <?=$lgn=="IT"?'selected="selected"':'';?>>Italy</option>
										<option value="JM" <?=$lgn=="JM"?'selected="selected"':'';?>>Jamaica</option>
										<option value="JP" <?=$lgn=="JP"?'selected="selected"':'';?>>Japan</option>
										<option value="JE" <?=$lgn=="JE"?'selected="selected"':'';?>>Jersey</option>
										<option value="JO" <?=$lgn=="JO"?'selected="selected"':'';?>>Jordan</option>
										<option value="KZ" <?=$lgn=="KZ"?'selected="selected"':'';?>>Kazakhstan</option>
										<option value="KE" <?=$lgn=="KE"?'selected="selected"':'';?>>Kenya</option>
										<option value="KI" <?=$lgn=="KI"?'selected="selected"':'';?>>Kiribati</option>
										<option value="KP" <?=$lgn=="KP"?'selected="selected"':'';?>>Korea (Democratic People's Republic of)</option>
										<option value="KR" <?=$lgn=="KR"?'selected="selected"':'';?>>Korea (Republic of)</option>
										<option value="KW" <?=$lgn=="KW"?'selected="selected"':'';?>>Kuwait</option>
										<option value="KG" <?=$lgn=="KG"?'selected="selected"':'';?>>Kyrgyzstan</option>
										<option value="LA" <?=$lgn=="LA"?'selected="selected"':'';?>>Lao People's Democratic Republic</option>
										<option value="LV" <?=$lgn=="LV"?'selected="selected"':'';?>>Latvia</option>
										<option value="LB" <?=$lgn=="LB"?'selected="selected"':'';?>>Lebanon</option>
										<option value="LS" <?=$lgn=="LS"?'selected="selected"':'';?>>Lesotho</option>
										<option value="LR" <?=$lgn=="LR"?'selected="selected"':'';?>>Liberia</option>
										<option value="LY" <?=$lgn=="LY"?'selected="selected"':'';?>>Libya</option>
										<option value="LI" <?=$lgn=="LI"?'selected="selected"':'';?>>Liechtenstein</option>
										<option value="LT" <?=$lgn=="LT"?'selected="selected"':'';?>>Lithuania</option>
										<option value="LU" <?=$lgn=="LU"?'selected="selected"':'';?>>Luxembourg</option>
										<option value="MO" <?=$lgn=="MO"?'selected="selected"':'';?>>Macao</option>
										<option value="MK" <?=$lgn=="MK"?'selected="selected"':'';?>>Macedonia (the former Yugoslav Republic of)</option>
										<option value="MG" <?=$lgn=="MG"?'selected="selected"':'';?>>Madagascar</option>
										<option value="MW" <?=$lgn=="MW"?'selected="selected"':'';?>>Malawi</option>
										<option value="MY" <?=$lgn=="MY"?'selected="selected"':'';?>>Malaysia</option>
										<option value="MV" <?=$lgn=="MV"?'selected="selected"':'';?>>Maldives</option>
										<option value="ML" <?=$lgn=="ML"?'selected="selected"':'';?>>Mali</option>
										<option value="MT" <?=$lgn=="MT"?'selected="selected"':'';?>>Malta</option>
										<option value="MH" <?=$lgn=="MH"?'selected="selected"':'';?>>Marshall Islands</option>
										<option value="MQ" <?=$lgn=="MQ"?'selected="selected"':'';?>>Martinique</option>
										<option value="MR" <?=$lgn=="MR"?'selected="selected"':'';?>>Mauritania</option>
										<option value="MU" <?=$lgn=="MU"?'selected="selected"':'';?>>Mauritius</option>
										<option value="YT" <?=$lgn=="YT"?'selected="selected"':'';?>>Mayotte</option>
										<option value="MX" <?=$lgn=="MX"?'selected="selected"':'';?>>Mexico</option>
										<option value="FM" <?=$lgn=="FM"?'selected="selected"':'';?>>Micronesia (Federated States of)</option>
										<option value="MD" <?=$lgn=="MD"?'selected="selected"':'';?>>Moldova (Republic of)</option>
										<option value="MC" <?=$lgn=="MC"?'selected="selected"':'';?>>Monaco</option>
										<option value="MN" <?=$lgn=="MN"?'selected="selected"':'';?>>Mongolia</option>
										<option value="ME" <?=$lgn=="ME"?'selected="selected"':'';?>>Montenegro</option>
										<option value="MS" <?=$lgn=="MS"?'selected="selected"':'';?>>Montserrat</option>
										<option value="MA" <?=$lgn=="MA"?'selected="selected"':'';?>>Morocco</option>
										<option value="MZ" <?=$lgn=="MZ"?'selected="selected"':'';?>>Mozambique</option>
										<option value="MM" <?=$lgn=="MM"?'selected="selected"':'';?>>Myanmar</option>
										<option value="NA" <?=$lgn=="NA"?'selected="selected"':'';?>>Namibia</option>
										<option value="NR" <?=$lgn=="NR"?'selected="selected"':'';?>>Nauru</option>
										<option value="NP" <?=$lgn=="NP"?'selected="selected"':'';?>>Nepal</option>
										<option value="NL" <?=$lgn=="NL"?'selected="selected"':'';?>>Netherlands</option>
										<option value="NC" <?=$lgn=="NC"?'selected="selected"':'';?>>New Caledonia</option>
										<option value="NZ" <?=$lgn=="NZ"?'selected="selected"':'';?>>New Zealand</option>
										<option value="NI" <?=$lgn=="NI"?'selected="selected"':'';?>>Nicaragua</option>
										<option value="NE" <?=$lgn=="NE"?'selected="selected"':'';?>>Niger</option>
										<option value="NG" <?=$lgn=="NG"?'selected="selected"':'';?>>Nigeria</option>
										<option value="NU" <?=$lgn=="NU"?'selected="selected"':'';?>>Niue</option>
										<option value="NF" <?=$lgn=="NF"?'selected="selected"':'';?>>Norfolk Island</option>
										<option value="MP" <?=$lgn=="MP"?'selected="selected"':'';?>>Northern Mariana Islands</option>
										<option value="NO" <?=$lgn=="NO"?'selected="selected"':'';?>>Norway</option>
										<option value="OM" <?=$lgn=="OM"?'selected="selected"':'';?>>Oman</option>
										<option value="PK" <?=$lgn=="PK"?'selected="selected"':'';?>>Pakistan</option>
										<option value="PW" <?=$lgn=="PW"?'selected="selected"':'';?>>Palau</option>
										<option value="PS" <?=$lgn=="PS"?'selected="selected"':'';?>>Palestine, State of</option>
										<option value="PA" <?=$lgn=="PA"?'selected="selected"':'';?>>Panama</option>
										<option value="PG" <?=$lgn=="PG"?'selected="selected"':'';?>>Papua New Guinea</option>
										<option value="PY" <?=$lgn=="PY"?'selected="selected"':'';?>>Paraguay</option>
										<option value="PE" <?=$lgn=="PE"?'selected="selected"':'';?>>Peru</option>
										<option value="PH" <?=$lgn=="PH"?'selected="selected"':'';?>>Philippines</option>
										<option value="PN" <?=$lgn=="PN"?'selected="selected"':'';?>>Pitcairn</option>
										<option value="PL" <?=$lgn=="PL"?'selected="selected"':'';?>>Poland</option>
										<option value="PT" <?=$lgn=="PT"?'selected="selected"':'';?>>Portugal</option>
										<option value="PR" <?=$lgn=="PR"?'selected="selected"':'';?>>Puerto Rico</option>
										<option value="QA" <?=$lgn=="QA"?'selected="selected"':'';?>>Qatar</option>
										<option value="RE" <?=$lgn=="RE"?'selected="selected"':'';?>>Réunion</option>
										<option value="RO" <?=$lgn=="RO"?'selected="selected"':'';?>>Romania</option>
										<option value="RU" <?=$lgn=="RU"?'selected="selected"':'';?>>Russian Federation</option>
										<option value="RW" <?=$lgn=="RW"?'selected="selected"':'';?>>Rwanda</option>
										<option value="BL" <?=$lgn=="BL"?'selected="selected"':'';?>>Saint Barthélemy</option>
										<option value="SH" <?=$lgn=="SH"?'selected="selected"':'';?>>Saint Helena, Ascension and Tristan da Cunha</option>
										<option value="KN" <?=$lgn=="KN"?'selected="selected"':'';?>>Saint Kitts and Nevis</option>
										<option value="LC" <?=$lgn=="LC"?'selected="selected"':'';?>>Saint Lucia</option>
										<option value="MF" <?=$lgn=="MF"?'selected="selected"':'';?>>Saint Martin (French part)</option>
										<option value="PM" <?=$lgn=="PM"?'selected="selected"':'';?>>Saint Pierre and Miquelon</option>
										<option value="VC" <?=$lgn=="VC"?'selected="selected"':'';?>>Saint Vincent and the Grenadines</option>
										<option value="WS" <?=$lgn=="WS"?'selected="selected"':'';?>>Samoa</option>
										<option value="SM" <?=$lgn=="SM"?'selected="selected"':'';?>>San Marino</option>
										<option value="ST" <?=$lgn=="ST"?'selected="selected"':'';?>>Sao Tome and Principe</option>
										<option value="SA" <?=$lgn=="SA"?'selected="selected"':'';?>>Saudi Arabia</option>
										<option value="SN" <?=$lgn=="SN"?'selected="selected"':'';?>>Senegal</option>
										<option value="RS" <?=$lgn=="RS"?'selected="selected"':'';?>>Serbia</option>
										<option value="SC" <?=$lgn=="SC"?'selected="selected"':'';?>>Seychelles</option>
										<option value="SL" <?=$lgn=="SL"?'selected="selected"':'';?>>Sierra Leone</option>
										<option value="SG" <?=$lgn=="SG"?'selected="selected"':'';?>>Singapore</option>
										<option value="SX" <?=$lgn=="SX"?'selected="selected"':'';?>>Sint Maarten (Dutch part)</option>
										<option value="SK" <?=$lgn=="SK"?'selected="selected"':'';?>>Slovakia</option>
										<option value="SI" <?=$lgn=="SI"?'selected="selected"':'';?>>Slovenia</option>
										<option value="SB" <?=$lgn=="SB"?'selected="selected"':'';?>>Solomon Islands</option>
										<option value="SO" <?=$lgn=="SO"?'selected="selected"':'';?>>Somalia</option>
										<option value="ZA" <?=$lgn=="ZA"?'selected="selected"':'';?>>South Africa</option>
										<option value="GS" <?=$lgn=="GS"?'selected="selected"':'';?>>South Georgia and the South Sandwich Islands</option>
										<option value="SS" <?=$lgn=="SS"?'selected="selected"':'';?>>South Sudan</option>
										<option value="ES" <?=$lgn=="ES"?'selected="selected"':'';?>>Spain</option>
										<option value="LK" <?=$lgn=="LK"?'selected="selected"':'';?>>Sri Lanka</option>
										<option value="SD" <?=$lgn=="SU"?'selected="selected"':'';?>>Sudan</option>
										<option value="SR" <?=$lgn=="SR"?'selected="selected"':'';?>>Suriname</option>
										<option value="SJ" <?=$lgn=="SJ"?'selected="selected"':'';?>>Svalbard and Jan Mayen</option>
										<option value="SZ" <?=$lgn=="SZ"?'selected="selected"':'';?>>Swaziland</option>
										<option value="SE" <?=$lgn=="SE"?'selected="selected"':'';?>>Sweden</option>
										<option value="CH" <?=$lgn=="CH"?'selected="selected"':'';?>>Switzerland</option>
										<option value="SY" <?=$lgn=="SY"?'selected="selected"':'';?>>Syrian Arab Republic</option>
										<option value="TW" <?=$lgn=="TW"?'selected="selected"':'';?>>Taiwan</option>
										<option value="TJ" <?=$lgn=="TJ"?'selected="selected"':'';?>>Tajikistan</option>
										<option value="TZ" <?=$lgn=="TZ"?'selected="selected"':'';?>>Tanzania, United Republic of</option>
										<option value="TH" <?=$lgn=="TH"?'selected="selected"':'';?>>Thailand</option>
										<option value="TL" <?=$lgn=="TL"?'selected="selected"':'';?>>Timor-Leste</option>
										<option value="TG" <?=$lgn=="TG"?'selected="selected"':'';?>>Togo</option>
										<option value="TK" <?=$lgn=="TK"?'selected="selected"':'';?>>Tokelau</option>
										<option value="TO" <?=$lgn=="TO"?'selected="selected"':'';?>>Tonga</option>
										<option value="TT" <?=$lgn=="TT"?'selected="selected"':'';?>>Trinidad and Tobago</option>
										<option value="TN" <?=$lgn=="TN"?'selected="selected"':'';?>>Tunisia</option>
										<option value="TR" <?=$lgn=="TR"?'selected="selected"':'';?>>Turkey</option>
										<option value="TM" <?=$lgn=="TM"?'selected="selected"':'';?>>Turkmenistan</option>
										<option value="TC" <?=$lgn=="TC"?'selected="selected"':'';?>>Turks and Caicos Islands</option>
										<option value="TV" <?=$lgn=="TV"?'selected="selected"':'';?>>Tuvalu</option>
										<option value="UG" <?=$lgn=="UG"?'selected="selected"':'';?>>Uganda</option>
										<option value="UA" <?=$lgn=="UA"?'selected="selected"':'';?>>Ukraine</option>
										<option value="AE" <?=$lgn=="AE"?'selected="selected"':'';?>>United Arab Emirates</option>
										<option value="GB" <?=$lgn=="GB"?'selected="selected"':'';?>>United Kingdom of Great Britain and Northern Ireland</option>
										<option value="UM" <?=$lgn=="UM"?'selected="selected"':'';?>>United States Minor Outlying Islands</option>
										<option value="UY" <?=$lgn=="UY"?'selected="selected"':'';?>>Uruguay</option>
										<option value="UZ" <?=$lgn=="UZ"?'selected="selected"':'';?>>Uzbekistan</option>
										<option value="VU" <?=$lgn=="VU"?'selected="selected"':'';?>>Vanuatu</option>
										<option value="VE" <?=$lgn=="VE"?'selected="selected"':'';?>>Venezuela (Bolivarian Republic of)</option>
										<option value="VN" <?=$lgn=="VN"?'selected="selected"':'';?>>Viet Nam</option>
										<option value="VG" <?=$lgn=="VG"?'selected="selected"':'';?>>Virgin Islands (British)</option>
										<option value="VI" <?=$lgn=="VI"?'selected="selected"':'';?>>Virgin Islands (U.S.)</option>
										<option value="WF" <?=$lgn=="WF"?'selected="selected"':'';?>>Wallis and Futuna</option>
										<option value="EH" <?=$lgn=="EH"?'selected="selected"':'';?>>Western Sahara</option>
										<option value="YE" <?=$lgn=="YE"?'selected="selected"':'';?>>Yemen</option>
										<option value="ZM" <?=$lgn=="ZM"?'selected="selected"':'';?>>Zambia</option>
										<option value="ZW" <?=$lgn=="ZW"?'selected="selected"':'';?>>Zimbabwe</option>
									</select>
									<div class="help-block"></div>
								</div>
								<!--<div class="form-group field-accountcontactform-state">
									<select id="accountcontactform-state" class="custom-select" name="AccountContactForm[state]" data-width="100%" disabled="disabled">
									<option value="" selected="selected">Select State</option>
									<option value="AL">Alabama</option>
									<option value="AK">Alaska</option>
									<option value="AZ">Arizona</option>
									<option value="AR">Arkansas</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DE">Delaware</option>
									<option value="DC">District Of Columbia</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="IA">Iowa</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="ME">Maine</option>
									<option value="MD">Maryland</option>
									<option value="MA">Massachusetts</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MS">Mississippi</option>
									<option value="MO">Missouri</option>
									<option value="MT">Montana</option>
									<option value="NE">Nebraska</option>
									<option value="NV">Nevada</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NY">New York</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VT">Vermont</option>
									<option value="VA">Virginia</option>
									<option value="WA">Washington</option>
									<option value="WV">West Virginia</option>
									<option value="WI">Wisconsin</option>
									<option value="WY">Wyoming</option>
									</select>
									<div class="help-block"></div>
								</div>-->
								<div class="form-group field-accountcontactform-city required">
									<input id="city_name" class="form-control" name="city_name" value="<?=@$userData->city_name?>" autocomplete="off" placeholder="City" aria-required="true" type="text">
									<div class="help-block"></div>
								</div>
								
								<?php
									$address_line1		=	$userData->address_line1;
									$mailing_address	=	$userData->mailing_address;
									
									$post_code			=	$userData->post_code;
									$mailing_zip		=	$userData->mailing_zip;
									$country_name		=	$userData->country_name;
									$mailing_country	=	$userData->mailing_country;
									$city_name			=	$userData->city_name;
									$mailing_city		=	$userData->mailing_city;
									
									
									
									
									$isSameAddress		=	"";
									
									if(($address_line1	==	$mailing_address) and ($post_code==$mailing_zip) and ($country_name==$mailing_country) and ($city_name==$mailing_city) and $address_line1!="" and $mailing_zip!="" and $mailing_country!="" and $mailing_city!=""){
										$isSameAddress		=	'checked="checked"';
										echo'<script type="text/javascript">
										$(document).ready(function(){
										$(".mailCont").hide();
										});
										</script>';
										}else{
										$isSameAddress		=	'';
										echo'<script type="text/javascript">
										$(document).ready(function(){
										$(".mailCont").show();
										});
										</script>';
									}
								?>
								
								<h4 class="group-title text-center t-30">Mailing Information</h4> 
								<div class="checkbox">
									<input name="AccountContactForm[mailing_same]" value="0" type="hidden">
									<input id="mailing_same" name="mailing_same" value="1" <?=@$isSameAddress?> style="width:16px;height:16px;" type="checkbox">
									<label style="vertical-align: middle" class="pointer mailContBtn" for="mailing_same">Mailing Same</label>
								</div>
								<div id="mailing-contents" class="collapse mailCont">
									<div class="form-group field-accountcontactform-mailing_address required">
										<input id="mailing_address" class="form-control" name="mailing_address" value="<?=@$userData->mailing_address?>" autocomplete="off" placeholder="Address" type="text">
										<div class="help-block"></div>
									</div>
									<div class="form-group field-accountcontactform-mailing_zip required">
										<input id="mailing_zip" class="form-control" name="mailing_zip" autocomplete="off" placeholder="Zip" value="<?=@$userData->mailing_zip?>" type="text">
										<div class="help-block"></div>
									</div>
									<?php
										$lgn	=	$userData->mailing_country;
									?>
									<div class="form-group field-accountcontactform-mailing_country required">
										<select id="mailing_country" class="custom-select" name="mailing_country" data-width="100%">
											<option value=""> - Select Country - </option>
											<option value="US" <?=$lgn=="US"?'selected="selected"':'';?> >United States</option>
											<option value="AF" <?=$lgn=="AF"?'selected="selected"':'';?>>Afghanistan</option>
											<option value="AX" <?=$lgn=="AX"?'selected="selected"':'';?>>Åland Islands</option>
											<option value="AL" <?=$lgn=="AL"?'selected="selected"':'';?>>Albania</option>
											<option value="DZ" <?=$lgn=="DZ"?'selected="selected"':'';?>>Algeria</option>
											<option value="AS" <?=$lgn=="AS"?'selected="selected"':'';?>>American Samoa</option>
											<option value="AD" <?=$lgn=="AD"?'selected="selected"':'';?>>Andorra</option>
											<option value="AO" <?=$lgn=="AO"?'selected="selected"':'';?>>Angola</option>
											<option value="AI" <?=$lgn=="AI"?'selected="selected"':'';?>>Anguilla</option>
											<option value="AQ" <?=$lgn=="AQ"?'selected="selected"':'';?>>Antarctica</option>
											<option value="AG" <?=$lgn=="AG"?'selected="selected"':'';?>>Antigua and Barbuda</option>
											<option value="AR" <?=$lgn=="AR"?'selected="selected"':'';?>>Argentina</option>
											<option value="AM" <?=$lgn=="AM"?'selected="selected"':'';?>>Armenia</option>
											<option value="AW" <?=$lgn=="AW"?'selected="selected"':'';?>>Aruba</option>
											<option value="AU" <?=$lgn=="AU"?'selected="selected"':'';?>>Australia</option>
											<option value="AT" <?=$lgn=="AT"?'selected="selected"':'';?>>Austria</option>
											<option value="AZ" <?=$lgn=="AZ"?'selected="selected"':'';?>>Azerbaijan</option>
											<option value="BS" <?=$lgn=="BS"?'selected="selected"':'';?>>Bahamas</option>
											<option value="BH" <?=$lgn=="BH"?'selected="selected"':'';?>>Bahrain</option>
											<option value="BD" <?=$lgn=="US"?'selected="selected"':'';?>>Bangladesh</option>
											<option value="BB" <?=$lgn=="BB"?'selected="selected"':'';?>>Barbados</option>
											<option value="BY" <?=$lgn=="BY"?'selected="selected"':'';?>>Belarus</option>
											<option value="BE" <?=$lgn=="BE"?'selected="selected"':'';?>>Belgium</option>
											<option value="BZ" <?=$lgn=="BZ"?'selected="selected"':'';?>>Belize</option>
											<option value="BJ" <?=$lgn=="BJ"?'selected="selected"':'';?>>Benin</option>
											<option value="BM" <?=$lgn=="BM"?'selected="selected"':'';?>>Bermuda</option>
											<option value="BT" <?=$lgn=="BT"?'selected="selected"':'';?>>Bhutan</option>
											<option value="BO" <?=$lgn=="BO"?'selected="selected"':'';?>>Bolivia (Plurinational State of)</option>
											<option value="BQ" <?=$lgn=="BQ"?'selected="selected"':'';?>>Bonaire, Sint Eustatius and Saba</option>
											<option value="BA" <?=$lgn=="BA"?'selected="selected"':'';?>>Bosnia and Herzegovina</option>
											<option value="BW" <?=$lgn=="BW"?'selected="selected"':'';?>>Botswana</option>
											<option value="BV" <?=$lgn=="BV"?'selected="selected"':'';?>>Bouvet Island</option>
											<option value="BR" <?=$lgn=="BR"?'selected="selected"':'';?>>Brazil</option>
											<option value="IO" <?=$lgn=="IQ"?'selected="selected"':'';?>>British Indian Ocean Territory</option>
											<option value="BN" <?=$lgn=="BN"?'selected="selected"':'';?>>Brunei Darussalam</option>
											<option value="BG" <?=$lgn=="BG"?'selected="selected"':'';?>>Bulgaria</option>
											<option value="BF" <?=$lgn=="BF"?'selected="selected"':'';?>>Burkina Faso</option>
											<option value="BI" <?=$lgn=="BI"?'selected="selected"':'';?>>Burundi</option>
											<option value="CV" <?=$lgn=="CV"?'selected="selected"':'';?>>Cabo Verde</option>
											<option value="KH" <?=$lgn=="KH"?'selected="selected"':'';?>>Cambodia</option>
											<option value="CM" <?=$lgn=="CM"?'selected="selected"':'';?>>Cameroon</option>
											<option value="CA" <?=$lgn=="CA"?'selected="selected"':'';?>>Canada</option>
											<option value="KY" <?=$lgn=="KY"?'selected="selected"':'';?>>Cayman Islands</option>
											<option value="CF" <?=$lgn=="CF"?'selected="selected"':'';?>>Central African Republic</option>
											<option value="TD" <?=$lgn=="TD"?'selected="selected"':'';?>>Chad</option>
											<option value="CL" <?=$lgn=="CL"?'selected="selected"':'';?>>Chile</option>
											<option value="CN" <?=$lgn=="CN"?'selected="selected"':'';?>>China</option>
											<option value="CX" <?=$lgn=="CX"?'selected="selected"':'';?>>Christmas Island</option>
											<option value="CC" <?=$lgn=="CC"?'selected="selected"':'';?>>Cocos (Keeling) Islands</option>
											<option value="CO" <?=$lgn=="CO"?'selected="selected"':'';?>>Colombia</option>
											<option value="KM" <?=$lgn=="KM"?'selected="selected"':'';?>>Comoros</option>
											<option value="CG" <?=$lgn=="CG"?'selected="selected"':'';?>>Congo</option>
											<option value="CD" <?=$lgn=="CD"?'selected="selected"':'';?>>Congo (Democratic Republic of the)</option>
											<option value="CK" <?=$lgn=="CK"?'selected="selected"':'';?>>Cook Islands</option>
											<option value="CR" <?=$lgn=="CR"?'selected="selected"':'';?>>Costa Rica</option>
											<option value="CI" <?=$lgn=="CI"?'selected="selected"':'';?>>Côte d'Ivoire</option>
											<option value="HR" <?=$lgn=="HR"?'selected="selected"':'';?>>Croatia</option>
											<option value="CU" <?=$lgn=="CU"?'selected="selected"':'';?>>Cuba</option>
											<option value="CW" <?=$lgn=="CW"?'selected="selected"':'';?>>Curaçao</option>
											<option value="CY" <?=$lgn=="CY"?'selected="selected"':'';?>>Cyprus</option>
											<option value="CZ" <?=$lgn=="CZ"?'selected="selected"':'';?>>Czech Republic</option>
											<option value="DK" <?=$lgn=="DK"?'selected="selected"':'';?>>Denmark</option>
											<option value="DJ" <?=$lgn=="DJ"?'selected="selected"':'';?>>Djibouti</option>
											<option value="DM" <?=$lgn=="DM"?'selected="selected"':'';?>>Dominica</option>
											<option value="DO" <?=$lgn=="DO"?'selected="selected"':'';?>>Dominican Republic</option>
											<option value="EC" <?=$lgn=="EC"?'selected="selected"':'';?>>Ecuador</option>
											<option value="EG" <?=$lgn=="FG"?'selected="selected"':'';?>>Egypt</option>
											<option value="SV" <?=$lgn=="SV"?'selected="selected"':'';?>>El Salvador</option>
											<option value="GQ" <?=$lgn=="GQ"?'selected="selected"':'';?>>Equatorial Guinea</option>
											<option value="ER" <?=$lgn=="ER"?'selected="selected"':'';?>>Eritrea</option>
											<option value="EE" <?=$lgn=="EE"?'selected="selected"':'';?>>Estonia</option>
											<option value="ET" <?=$lgn=="ET"?'selected="selected"':'';?>>Ethiopia</option>
											<option value="FK" <?=$lgn=="FK"?'selected="selected"':'';?>>Falkland Islands (Malvinas)</option>
											<option value="FO" <?=$lgn=="FO"?'selected="selected"':'';?>>Faroe Islands</option>
											<option value="FJ" <?=$lgn=="FJ"?'selected="selected"':'';?>>Fiji</option>
											<option value="FI" <?=$lgn=="FI"?'selected="selected"':'';?>>Finland</option>
											<option value="FR" <?=$lgn=="FR"?'selected="selected"':'';?>>France</option>
											<option value="GF" <?=$lgn=="GF"?'selected="selected"':'';?>>French Guiana</option>
											<option value="PF" <?=$lgn=="PF"?'selected="selected"':'';?>>French Polynesia</option>
											<option value="TF" <?=$lgn=="TF"?'selected="selected"':'';?>>French Southern Territories</option>
											<option value="GA" <?=$lgn=="GA"?'selected="selected"':'';?>>Gabon</option>
											<option value="GM" <?=$lgn=="GM"?'selected="selected"':'';?>>Gambia</option>
											<option value="GE" <?=$lgn=="GE"?'selected="selected"':'';?>>Georgia</option>
											<option value="DE" <?=$lgn=="DE"?'selected="selected"':'';?>>Germany</option>
											<option value="GH" <?=$lgn=="GH"?'selected="selected"':'';?>>Ghana</option>
											<option value="GI" <?=$lgn=="GI"?'selected="selected"':'';?>>Gibraltar</option>
											<option value="GR" <?=$lgn=="GR"?'selected="selected"':'';?>>Greece</option>
											<option value="GL" <?=$lgn=="GL"?'selected="selected"':'';?>>Greenland</option>
											<option value="GD" <?=$lgn=="GD"?'selected="selected"':'';?>>Grenada</option>
											<option value="GP" <?=$lgn=="GP"?'selected="selected"':'';?>>Guadeloupe</option>
											<option value="GU" <?=$lgn=="GU"?'selected="selected"':'';?>>Guam</option>
											<option value="GT" <?=$lgn=="GT"?'selected="selected"':'';?>>Guatemala</option>
											<option value="GG" <?=$lgn=="GG"?'selected="selected"':'';?>>Guernsey</option>
											<option value="GN" <?=$lgn=="GN"?'selected="selected"':'';?>>Guinea</option>
											<option value="GW" <?=$lgn=="GW"?'selected="selected"':'';?>>Guinea-Bissau</option>
											<option value="GY" <?=$lgn=="GY"?'selected="selected"':'';?>>Guyana</option>
											<option value="HT" <?=$lgn=="HT"?'selected="selected"':'';?>>Haiti</option>
											<option value="HM" <?=$lgn=="HM"?'selected="selected"':'';?>>Heard Island and McDonald Islands</option>
											<option value="VA" <?=$lgn=="VA"?'selected="selected"':'';?>>Holy See</option>
											<option value="HN" <?=$lgn=="HN"?'selected="selected"':'';?>>Honduras</option>
											<option value="HK" <?=$lgn=="HK"?'selected="selected"':'';?>>Hong Kong</option>
											<option value="HU" <?=$lgn=="HU"?'selected="selected"':'';?>>Hungary</option>
											<option value="IS" <?=$lgn=="IS"?'selected="selected"':'';?>>Iceland</option>
											<option value="IN" <?=$lgn=="IN"?'selected="selected"':'';?>>India</option>
											<option value="ID" <?=$lgn=="ID"?'selected="selected"':'';?>>Indonesia</option>
											<option value="IR" <?=$lgn=="IR"?'selected="selected"':'';?>>Iran (Islamic Republic of)</option>
											<option value="IQ" <?=$lgn=="IQ"?'selected="selected"':'';?>>Iraq</option>
											<option value="IE" <?=$lgn=="IE"?'selected="selected"':'';?>>Ireland</option>
											<option value="IM" <?=$lgn=="IM"?'selected="selected"':'';?>>Isle of Man</option>
											<option value="IL" <?=$lgn=="IL"?'selected="selected"':'';?>>Israel</option>
											<option value="IT" <?=$lgn=="IT"?'selected="selected"':'';?>>Italy</option>
											<option value="JM" <?=$lgn=="JM"?'selected="selected"':'';?>>Jamaica</option>
											<option value="JP" <?=$lgn=="JP"?'selected="selected"':'';?>>Japan</option>
											<option value="JE" <?=$lgn=="JE"?'selected="selected"':'';?>>Jersey</option>
											<option value="JO" <?=$lgn=="JO"?'selected="selected"':'';?>>Jordan</option>
											<option value="KZ" <?=$lgn=="KZ"?'selected="selected"':'';?>>Kazakhstan</option>
											<option value="KE" <?=$lgn=="KE"?'selected="selected"':'';?>>Kenya</option>
											<option value="KI" <?=$lgn=="KI"?'selected="selected"':'';?>>Kiribati</option>
											<option value="KP" <?=$lgn=="KP"?'selected="selected"':'';?>>Korea (Democratic People's Republic of)</option>
											<option value="KR" <?=$lgn=="KR"?'selected="selected"':'';?>>Korea (Republic of)</option>
											<option value="KW" <?=$lgn=="KW"?'selected="selected"':'';?>>Kuwait</option>
											<option value="KG" <?=$lgn=="KG"?'selected="selected"':'';?>>Kyrgyzstan</option>
											<option value="LA" <?=$lgn=="LA"?'selected="selected"':'';?>>Lao People's Democratic Republic</option>
											<option value="LV" <?=$lgn=="LV"?'selected="selected"':'';?>>Latvia</option>
											<option value="LB" <?=$lgn=="LB"?'selected="selected"':'';?>>Lebanon</option>
											<option value="LS" <?=$lgn=="LS"?'selected="selected"':'';?>>Lesotho</option>
											<option value="LR" <?=$lgn=="LR"?'selected="selected"':'';?>>Liberia</option>
											<option value="LY" <?=$lgn=="LY"?'selected="selected"':'';?>>Libya</option>
											<option value="LI" <?=$lgn=="LI"?'selected="selected"':'';?>>Liechtenstein</option>
											<option value="LT" <?=$lgn=="LT"?'selected="selected"':'';?>>Lithuania</option>
											<option value="LU" <?=$lgn=="LU"?'selected="selected"':'';?>>Luxembourg</option>
											<option value="MO" <?=$lgn=="MO"?'selected="selected"':'';?>>Macao</option>
											<option value="MK" <?=$lgn=="MK"?'selected="selected"':'';?>>Macedonia (the former Yugoslav Republic of)</option>
											<option value="MG" <?=$lgn=="MG"?'selected="selected"':'';?>>Madagascar</option>
											<option value="MW" <?=$lgn=="MW"?'selected="selected"':'';?>>Malawi</option>
											<option value="MY" <?=$lgn=="MY"?'selected="selected"':'';?>>Malaysia</option>
											<option value="MV" <?=$lgn=="MV"?'selected="selected"':'';?>>Maldives</option>
											<option value="ML" <?=$lgn=="ML"?'selected="selected"':'';?>>Mali</option>
											<option value="MT" <?=$lgn=="MT"?'selected="selected"':'';?>>Malta</option>
											<option value="MH" <?=$lgn=="MH"?'selected="selected"':'';?>>Marshall Islands</option>
											<option value="MQ" <?=$lgn=="MQ"?'selected="selected"':'';?>>Martinique</option>
											<option value="MR" <?=$lgn=="MR"?'selected="selected"':'';?>>Mauritania</option>
											<option value="MU" <?=$lgn=="MU"?'selected="selected"':'';?>>Mauritius</option>
											<option value="YT" <?=$lgn=="YT"?'selected="selected"':'';?>>Mayotte</option>
											<option value="MX" <?=$lgn=="MX"?'selected="selected"':'';?>>Mexico</option>
											<option value="FM" <?=$lgn=="FM"?'selected="selected"':'';?>>Micronesia (Federated States of)</option>
											<option value="MD" <?=$lgn=="MD"?'selected="selected"':'';?>>Moldova (Republic of)</option>
											<option value="MC" <?=$lgn=="MC"?'selected="selected"':'';?>>Monaco</option>
											<option value="MN" <?=$lgn=="MN"?'selected="selected"':'';?>>Mongolia</option>
											<option value="ME" <?=$lgn=="ME"?'selected="selected"':'';?>>Montenegro</option>
											<option value="MS" <?=$lgn=="MS"?'selected="selected"':'';?>>Montserrat</option>
											<option value="MA" <?=$lgn=="MA"?'selected="selected"':'';?>>Morocco</option>
											<option value="MZ" <?=$lgn=="MZ"?'selected="selected"':'';?>>Mozambique</option>
											<option value="MM" <?=$lgn=="MM"?'selected="selected"':'';?>>Myanmar</option>
											<option value="NA" <?=$lgn=="NA"?'selected="selected"':'';?>>Namibia</option>
											<option value="NR" <?=$lgn=="NR"?'selected="selected"':'';?>>Nauru</option>
											<option value="NP" <?=$lgn=="NP"?'selected="selected"':'';?>>Nepal</option>
											<option value="NL" <?=$lgn=="NL"?'selected="selected"':'';?>>Netherlands</option>
											<option value="NC" <?=$lgn=="NC"?'selected="selected"':'';?>>New Caledonia</option>
											<option value="NZ" <?=$lgn=="NZ"?'selected="selected"':'';?>>New Zealand</option>
											<option value="NI" <?=$lgn=="NI"?'selected="selected"':'';?>>Nicaragua</option>
											<option value="NE" <?=$lgn=="NE"?'selected="selected"':'';?>>Niger</option>
											<option value="NG" <?=$lgn=="NG"?'selected="selected"':'';?>>Nigeria</option>
											<option value="NU" <?=$lgn=="NU"?'selected="selected"':'';?>>Niue</option>
											<option value="NF" <?=$lgn=="NF"?'selected="selected"':'';?>>Norfolk Island</option>
											<option value="MP" <?=$lgn=="MP"?'selected="selected"':'';?>>Northern Mariana Islands</option>
											<option value="NO" <?=$lgn=="NO"?'selected="selected"':'';?>>Norway</option>
											<option value="OM" <?=$lgn=="OM"?'selected="selected"':'';?>>Oman</option>
											<option value="PK" <?=$lgn=="PK"?'selected="selected"':'';?>>Pakistan</option>
											<option value="PW" <?=$lgn=="PW"?'selected="selected"':'';?>>Palau</option>
											<option value="PS" <?=$lgn=="PS"?'selected="selected"':'';?>>Palestine, State of</option>
											<option value="PA" <?=$lgn=="PA"?'selected="selected"':'';?>>Panama</option>
											<option value="PG" <?=$lgn=="PG"?'selected="selected"':'';?>>Papua New Guinea</option>
											<option value="PY" <?=$lgn=="PY"?'selected="selected"':'';?>>Paraguay</option>
											<option value="PE" <?=$lgn=="PE"?'selected="selected"':'';?>>Peru</option>
											<option value="PH" <?=$lgn=="PH"?'selected="selected"':'';?>>Philippines</option>
											<option value="PN" <?=$lgn=="PN"?'selected="selected"':'';?>>Pitcairn</option>
											<option value="PL" <?=$lgn=="PL"?'selected="selected"':'';?>>Poland</option>
											<option value="PT" <?=$lgn=="PT"?'selected="selected"':'';?>>Portugal</option>
											<option value="PR" <?=$lgn=="PR"?'selected="selected"':'';?>>Puerto Rico</option>
											<option value="QA" <?=$lgn=="QA"?'selected="selected"':'';?>>Qatar</option>
											<option value="RE" <?=$lgn=="RE"?'selected="selected"':'';?>>Réunion</option>
											<option value="RO" <?=$lgn=="RO"?'selected="selected"':'';?>>Romania</option>
											<option value="RU" <?=$lgn=="RU"?'selected="selected"':'';?>>Russian Federation</option>
											<option value="RW" <?=$lgn=="RW"?'selected="selected"':'';?>>Rwanda</option>
											<option value="BL" <?=$lgn=="BL"?'selected="selected"':'';?>>Saint Barthélemy</option>
											<option value="SH" <?=$lgn=="SH"?'selected="selected"':'';?>>Saint Helena, Ascension and Tristan da Cunha</option>
											<option value="KN" <?=$lgn=="KN"?'selected="selected"':'';?>>Saint Kitts and Nevis</option>
											<option value="LC" <?=$lgn=="LC"?'selected="selected"':'';?>>Saint Lucia</option>
											<option value="MF" <?=$lgn=="MF"?'selected="selected"':'';?>>Saint Martin (French part)</option>
											<option value="PM" <?=$lgn=="PM"?'selected="selected"':'';?>>Saint Pierre and Miquelon</option>
											<option value="VC" <?=$lgn=="VC"?'selected="selected"':'';?>>Saint Vincent and the Grenadines</option>
											<option value="WS" <?=$lgn=="WS"?'selected="selected"':'';?>>Samoa</option>
											<option value="SM" <?=$lgn=="SM"?'selected="selected"':'';?>>San Marino</option>
											<option value="ST" <?=$lgn=="ST"?'selected="selected"':'';?>>Sao Tome and Principe</option>
											<option value="SA" <?=$lgn=="SA"?'selected="selected"':'';?>>Saudi Arabia</option>
											<option value="SN" <?=$lgn=="SN"?'selected="selected"':'';?>>Senegal</option>
											<option value="RS" <?=$lgn=="RS"?'selected="selected"':'';?>>Serbia</option>
											<option value="SC" <?=$lgn=="SC"?'selected="selected"':'';?>>Seychelles</option>
											<option value="SL" <?=$lgn=="SL"?'selected="selected"':'';?>>Sierra Leone</option>
											<option value="SG" <?=$lgn=="SG"?'selected="selected"':'';?>>Singapore</option>
											<option value="SX" <?=$lgn=="SX"?'selected="selected"':'';?>>Sint Maarten (Dutch part)</option>
											<option value="SK" <?=$lgn=="SK"?'selected="selected"':'';?>>Slovakia</option>
											<option value="SI" <?=$lgn=="SI"?'selected="selected"':'';?>>Slovenia</option>
											<option value="SB" <?=$lgn=="SB"?'selected="selected"':'';?>>Solomon Islands</option>
											<option value="SO" <?=$lgn=="SO"?'selected="selected"':'';?>>Somalia</option>
											<option value="ZA" <?=$lgn=="ZA"?'selected="selected"':'';?>>South Africa</option>
											<option value="GS" <?=$lgn=="GS"?'selected="selected"':'';?>>South Georgia and the South Sandwich Islands</option>
											<option value="SS" <?=$lgn=="SS"?'selected="selected"':'';?>>South Sudan</option>
											<option value="ES" <?=$lgn=="ES"?'selected="selected"':'';?>>Spain</option>
											<option value="LK" <?=$lgn=="LK"?'selected="selected"':'';?>>Sri Lanka</option>
											<option value="SD" <?=$lgn=="SU"?'selected="selected"':'';?>>Sudan</option>
											<option value="SR" <?=$lgn=="SR"?'selected="selected"':'';?>>Suriname</option>
											<option value="SJ" <?=$lgn=="SJ"?'selected="selected"':'';?>>Svalbard and Jan Mayen</option>
											<option value="SZ" <?=$lgn=="SZ"?'selected="selected"':'';?>>Swaziland</option>
											<option value="SE" <?=$lgn=="SE"?'selected="selected"':'';?>>Sweden</option>
											<option value="CH" <?=$lgn=="CH"?'selected="selected"':'';?>>Switzerland</option>
											<option value="SY" <?=$lgn=="SY"?'selected="selected"':'';?>>Syrian Arab Republic</option>
											<option value="TW" <?=$lgn=="TW"?'selected="selected"':'';?>>Taiwan</option>
											<option value="TJ" <?=$lgn=="TJ"?'selected="selected"':'';?>>Tajikistan</option>
											<option value="TZ" <?=$lgn=="TZ"?'selected="selected"':'';?>>Tanzania, United Republic of</option>
											<option value="TH" <?=$lgn=="TH"?'selected="selected"':'';?>>Thailand</option>
											<option value="TL" <?=$lgn=="TL"?'selected="selected"':'';?>>Timor-Leste</option>
											<option value="TG" <?=$lgn=="TG"?'selected="selected"':'';?>>Togo</option>
											<option value="TK" <?=$lgn=="TK"?'selected="selected"':'';?>>Tokelau</option>
											<option value="TO" <?=$lgn=="TO"?'selected="selected"':'';?>>Tonga</option>
											<option value="TT" <?=$lgn=="TT"?'selected="selected"':'';?>>Trinidad and Tobago</option>
											<option value="TN" <?=$lgn=="TN"?'selected="selected"':'';?>>Tunisia</option>
											<option value="TR" <?=$lgn=="TR"?'selected="selected"':'';?>>Turkey</option>
											<option value="TM" <?=$lgn=="TM"?'selected="selected"':'';?>>Turkmenistan</option>
											<option value="TC" <?=$lgn=="TC"?'selected="selected"':'';?>>Turks and Caicos Islands</option>
											<option value="TV" <?=$lgn=="TV"?'selected="selected"':'';?>>Tuvalu</option>
											<option value="UG" <?=$lgn=="UG"?'selected="selected"':'';?>>Uganda</option>
											<option value="UA" <?=$lgn=="UA"?'selected="selected"':'';?>>Ukraine</option>
											<option value="AE" <?=$lgn=="AE"?'selected="selected"':'';?>>United Arab Emirates</option>
											<option value="GB" <?=$lgn=="GB"?'selected="selected"':'';?>>United Kingdom of Great Britain and Northern Ireland</option>
											<option value="UM" <?=$lgn=="UM"?'selected="selected"':'';?>>United States Minor Outlying Islands</option>
											<option value="UY" <?=$lgn=="UY"?'selected="selected"':'';?>>Uruguay</option>
											<option value="UZ" <?=$lgn=="UZ"?'selected="selected"':'';?>>Uzbekistan</option>
											<option value="VU" <?=$lgn=="VU"?'selected="selected"':'';?>>Vanuatu</option>
											<option value="VE" <?=$lgn=="VE"?'selected="selected"':'';?>>Venezuela (Bolivarian Republic of)</option>
											<option value="VN" <?=$lgn=="VN"?'selected="selected"':'';?>>Viet Nam</option>
											<option value="VG" <?=$lgn=="VG"?'selected="selected"':'';?>>Virgin Islands (British)</option>
											<option value="VI" <?=$lgn=="VI"?'selected="selected"':'';?>>Virgin Islands (U.S.)</option>
											<option value="WF" <?=$lgn=="WF"?'selected="selected"':'';?>>Wallis and Futuna</option>
											<option value="EH" <?=$lgn=="EH"?'selected="selected"':'';?>>Western Sahara</option>
											<option value="YE" <?=$lgn=="YE"?'selected="selected"':'';?>>Yemen</option>
											<option value="ZM" <?=$lgn=="ZM"?'selected="selected"':'';?>>Zambia</option>
											<option value="ZW" <?=$lgn=="ZW"?'selected="selected"':'';?>>Zimbabwe</option>
										</select>
										<div class="help-block"></div>
									</div>
									<!--<div class="form-group field-accountcontactform-mailing_state">
										<select id="accountcontactform-mailing_state" class="custom-select" name="mailing_state" data-width="100%" disabled="disabled">
										<option value="" selected="selected">Select State</option>
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District Of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
										</select>
										<div class="help-block"></div>
									</div>-->
									<div class="form-group field-accountcontactform-mailing_city required">
										<input id="mailing_city" class="form-control" name="mailing_city" value="<?=@$userData->mailing_city?>" autocomplete="off" placeholder="City" type="text">
										<div class="help-block"></div>
									</div>
								</div>
								<input style="position: absolute; left: -10000px;top: -10000px;" type="submit">
								
								<div class="text-center t-15">
									<button class="button btn btn-red" id="save-button">Save</button>
								</div>
							</form>
						</div>
					</div>
					<style>
						.custom-select {
						outline: 0 none !important;
						width: 100%;
						font-size: 1rem;
						line-height: 1.25;
						background-clip: padding-box;
						border-radius: .25rem;
						background-color: #efefef;
						color: #222;
						font-weight: 400;
						height: 50px;
						border-color: #efefef !important;
						text-align: center;
						text-align-last: center;
						cursor: pointer;
						padding-left: 25px;
						}
					</style>
				</div>
			</div>
		</div>
	</div>   
</div>
<!--mailing content-->

<script>
	$(document).ready(function(){
		$(".mailContBtn").click(function(){
			$(".mailCont").slideToggle();
			var address_line1	=	$("#address_line1").val();
			var post_code		=	$("#post_code").val();
			var country_name	=	$("#country_name").val();
			var city_name		=	$("#city_name").val();
			
			$("#mailing_country").val(country_name).change();
			
			//alert(mailing_address);
			
			$("#mailing_address").val(address_line1);
			$("#mailing_zip").val(post_code);
			$("#mailing_city").val(city_name);
			
			
		});
	});
</script>
<style>
	#commentForm {
	width: 500px;
	}
	#commentForm label {
	width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
	margin-left: 253px;
	}
	#signupForm {
	width: 670px;
	}
	#signupForm label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
	}
	#newsletter_topics label.error {
	display: none;
	margin-left: 103px;
	}
</style>
<script>
	$(document).ready(function(){
		// validate signup form on keyup and submit
		$("#account-contact-form").validate({
			rules: {
				first_name:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				last_name:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				dob:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				address_line1:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				post_code:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				country_name:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				city_name:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				mailing_address:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				mailing_zip:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				mailing_country:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				mailing_city:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				}
			},
			messages: {
				first_name: "Please enter your first name",
				last_name: "Please enter your last name",
				dob: "Please enter your date of birth",
				address_line1: "Please enter your address",
				post_code: "Please enter your zip code",
				country_name: "Please select your country",
				city_name: "Please enter your city",
				mailing_address: "Please enter your address",
				mailing_zip: "Please enter your zip code",
				mailing_country: "Please select your country",
				mailing_city: "Please enter your city"
			}
		});
	});
</script>

<script>
	$( function() {
		var date = new Date();
		date.setDate(date.getDate() - 1);
		
		$("#dob").datepicker({
			dateFormat: "yy-mm-dd",
			defaultDate: date,
			changeMonth: true,
   			changeYear: true,
			yearRange: "1950:+0",
			onSelect: function () {
				selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
			}
		});
		
		$("#datepicker").datepicker("setDate", date);
		
	} );
</script>
<!--mailing content-->