<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<div class="fullD termSlct" > 
    <div class="acc-page b-30">
		<div class="account-table">
			<?php
				$data	= array();
				$data['menuActive']	=	'dashboard';
				$this->load->view('account/top_menu_bar',$data);
			?>
			<div class="container">
				<div class="acc-content bs-3">
					<div class="acc-right wb pad-panel pb-0">
						<?php $this->load->view('message_template');?>
						<!--<div class="alert alert-success text-center">Please, fill out additional personal <a href="<?=base_url('account/personal-info');?>">contact details</a></div>-->
						<?php
							$first_name	=	trim($this->session->userdata('first_name'));
							$last_name	=	$this->session->userdata('last_name');
							$dob		=	$this->session->userdata('dob');
							//$first_name	=	$this->session->userdata('first_name');
							if($first_name=="" || $last_name=="" || $dob=="" || $dob=="0000-00-00"){
							?>
							<div class="alert alert-success text-center">Please, fill out additional personal <a href="<?=base_url('account/personal-info');?>">contact details</a></div>
							<?php
							}
							
							
							$account_wallet			=	$this->session->userdata('account_wallet');
							$new_wallet=	'style="display: none;"';
							$old_wallet=	'style="display: block; opacity: 1"';
							if(!isset($account_wallet)){
								$new_wallet=	'style="display: block;"';
								$old_wallet=	'style="display: none; opacity: 1 "';
							}
							
							
							$account_wallet_other	=	$this->session->userdata('account_wallet_other');
							$new_wallet_other=	'style="display: none;"';
							$old_wallet_other=	'style="display: block; opacity: 1"';
							
							if(!isset($account_wallet_other)){
								$new_wallet_other=	'style="display: none;"';
								$old_wallet_other=	'style="display: none; opacity: 1 "';
							}
						?>
                        
                        <div class="col">
                        	<div class="titleDivIn">
                                <div class="titleTx">
                                	<div class="titleTxH">Make the payment</div>
                                </div>
                            </div>
                        </div>
                        
						<div class="box b-vallet">
							
							<div class="new-wallet" <?=@$new_wallet?>>
								<p class="box-p">&nbsp;</p>
								<div class="row justify-content-center">
									<div class="col">
										<input class="form-control" value="<?=@$this->session->userdata('account_wallet');?>" id="account_wallet" placeholder="Enter your ETH Wallet" type="text">
										<label id="account_wallet_error" style='display:none;' class="error" for="first_name">Enter Valid Ethereum Wallet Address.</label>
									</div>
									
									<div class="col no-grow">
										<button class="btn btn-red ajaxAccountWallet" id="save-wallet">Save</button>
									</div>
								</div>
							</div>
							
							<div class="old-wallet" <?=@$old_wallet?> style="opacity: 1">
								<p class="box-p">&nbsp;</p>
								<div class="row justify-content-center">
									<div class="col">
										<div class="box-blue">
											<div class="row justify-content-center">
												<div class="col tot align-self-center text-right"> Total amount: </div>
												<div class="col wal-tot text-left"><?=getRealNumber(@$user_tcoin);?> Talent Coins</div>
											</div>
											<p class="ac-wallet"><?=@$this->session->userdata('account_wallet');?></p>
										</div>
									</div>
									<div class="col no-grow align-self-center">
										<button class="btn btn-outline-primary" id="edit-wallet">Edit</button>
									</div>
								</div>
							</div>
							
						</div>
						<?php
							//$account_wallet_other	=	$this->session->userdata('account_wallet_other');
							
							
							$chkBox	=	'checked="checked"';
							$new_wallet_other=	'style="display: none;"';
							$old_wallet_other=	'style="display: none; opacity: 1 "';
								
							if($account_wallet_other!=""){
								$chkBox		=	"";
								$new_wallet_other=	'style="display: none;"';
								$old_wallet_other=	'style="display: block; opacity: 1 "';
							}
						?>
						<div class="box b-vallet">
							<div class="wltCheckDiv">
								<label class="wltCheckLbl">
									<input type="checkbox" value="checkWallet" name="" <?=@$chkBox;?> />
									<span>Send my Talent Coins to the above wallet address</span>
								</label>
							</div>
							<div class="new-wallet-other" <?=@$new_wallet_other?>>
								<div class="row justify-content-center t-20 checkWallet othrWalletBox" >
									<div class="col inputOthrWalt">
										<input class="form-control" value="<?=@$this->session->userdata('account_wallet_other');?>" id="account_wallet_other" placeholder="SEND TALENT COINS TO THIS WALLET" type="text">
										<label id="account_wallet_other_error" style='display:none;' class="error" for="first_name">Enter Valid Wallet Address.</label>
									</div>
									<div class="col no-grow btnOthrWalt">
										<button class="btn btn-red ajaxAccountWalletOther" id="save-wallet-other">Save</button>
									</div>
								</div>
							</div>

							<div class="old-wallet-other" <?=@$old_wallet_other?> >
								<div class="row justify-content-center">
									<div class="col">
										<div class="box-blue">
											<!--<div class="row justify-content-center">
												<div class="col tot align-self-center text-right"> Total amount: </div>
												<div class="col wal-tot text-left">0 Talent Coins</div>
											</div>-->
											<p class="ac-wallet-other"><?=@$this->session->userdata('account_wallet_other');?></p>
										</div>
									</div>
									<div class="col no-grow align-self-center">
										<button class="btn btn-outline-primary" id="edit-wallet-other">Edit</button>
									</div>
								</div>
							</div>
							
						</div>

                        
                        <div class="col">
                        	<div class="hrDiv"><div class="hrDivBdr"></div></div>
                        </div>
                        
                        <div class="col">
                            <div class="titleDivIn">
                                <div class="titleTx">
                                    <div class="titleTxP">Buy Talent Coins with one of the following currencies</div>
                                </div>
                            </div>
                        </div>
                        
						<div class="gr-back pay-block">
							<div class="box b-cur">
								<div class="row" style="display: inline-flex;padding: 0 55px;">
									<div class="col-12 col-md-6 col-lg-3">
										<div class="w-box" data-ref="eth">
											<div class="pref">Preferred method</div>
										<span class="w-circle"><img src="<?=base_url();?>assets/img/plus-gr.png" alt=""></span> <span class="img-hold"><img class="img-fluid" src="<?=base_url();?>assets/img/cur-eth.png" alt=""></span> </div>
									</div>
									<div class="col-12 col-md-6 col-lg-3">
										<div class="w-box" data-ref="btc"> <span class="w-circle"><img src="<?=base_url();?>assets/img/plus-gr.png" alt=""></span> <span class="img-hold"><img class="img-fluid" src="<?=base_url();?>assets/img/cur-btc.png" alt=""></span> </div>
									</div>
									<div class="col-12 col-md-6 col-lg-3">
										<div class="w-box" data-ref="ltc"> <span class="w-circle"><img src="<?=base_url();?>assets/img/plus-gr.png" alt=""></span> <span class="img-hold"><img class="img-fluid" src="<?=base_url();?>assets/img/cur-ltc.png" alt=""></span> </div>
									</div>
									<div class="col-12 col-md-6 col-lg-3">
										<div class="w-box" data-ref="dash"> <span class="w-circle"><img src="<?=base_url();?>assets/img/plus-gr.png" alt=""></span> <span class="img-hold"><img class="img-fluid" src="<?=base_url();?>assets/img/cur-dash.png" alt=""></span> </div>
									</div>
								</div>
							</div>
							<div class="box w-row eth">
								<h4 class="b-30">Send ETH to this address to purchase Talent Coins:</h4>
								<p class="p-ex text-center b-10">Do not send ETH from an exchange wallet (Kraken, Coinbase, Bitstamp, Bitfinex, Bittrex or any other)</p>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad">
                                    	<img src="<?=base_url();?>assets/img/barcode-eth.bmp" />
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input value="<?=@$eth_company_address;?>" class="w-link pointer" data-coin="eth">
											<button class="btn btn-red hd-md btn-addr">Copy</button>
										</div>
										<p class="p-red t-10">Send at least 200,000 gas and at least 60 gwei</p>
										<div class="btn-hold text-center t-10">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$eth_company_address;?>">Copy</button>
											<button class="btn btn-outline-info cur-back"> ← Back to Currencies</button>
										</div>
									</div>
								</div>
							</div>
							<div class="box w-row btc empBxW">
								<h4 class="b-30">Please enter your BTC address from which you are going to make an investment</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
                                    	<!--<img src="<?=base_url();?>assets/img/barcode-btc.bmp" />-->
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="pointer" id='btc_user_address' value="<?=@$btc_user_address;?>">
											<label id="btc_user_address_error" style='display:none;' class="error" for="first_name">Enter Valid BTC Wallet Address.</label>
											<!--<button class="btn btn-red hd-md btn-addr" data-address="">Copy</button>-->
										</div>
										<div class="btn-hold text-center">
											<!--<button class="btn btn-red sh-md btn-addr" data-address="1BuBAVyxdSf79Sv97MaC2HEJqrFhrp7tBi">Copy</button>-->
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
                                            <button class="btn btn-outline-info btnBoth nxtToggBTC ajaxClassUserWallet" data-coin='bitcoin' data-id='2'>Next</button>
										</div>
									</div>
								</div>
							</div>
                            <div class="box w-row nxtWlt-btc" style="display:none;">
								<h4 class="b-30">Send BTC to this address to purchase Talent Coins:</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
										<img src="<?=base_url();?>assets/img/barcode-btc.bmp" />
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="w-link pointer" value="<?=@$btc_company_address;?>" data-coin="btc">
											<button class="btn btn-red hd-md btn-addr" data-address="<?=@$btc_company_address;?>">Copy</button>
										</div>
										<div class="btn-hold text-center">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$btc_company_address;?>">Copy</button>
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
										</div>
									</div>
								</div>
							</div>
							<div class="box w-row ltc empBxW">
								<h4 class="b-30">Please enter your LTC address from which you are going to make an investment</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
                                    	<!--<img src="<?=base_url();?>assets/img/barcode-ltc.bmp" />-->
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="pointer" id='ltc_user_address' value="<?=@$ltc_user_address;?>" data-coin="ltc">
											<label id="ltc_user_address_error" style='display:none;' class="error" for="first_name">Enter Valid LTC Wallet Address.</label>
											<!--<button class="btn btn-red hd-md btn-addr" data-address="LURtseNxoi9DJySEKsMiS6gHJriTBGmLky">Copy</button>-->
										</div>
										<div class="btn-hold text-center">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$ltc_user_address;?>">Copy</button>
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
                                            <button class="btn btn-outline-info btnBoth nxtToggLTC ajaxClassUserWallet" data-coin='litecoin' data-id='3'>Next</button>
										</div>
									</div>
								</div>
							</div>
                            <div class="box w-row nxtWlt-ltc" style="display:none;">
								<h4 class="b-30">Send LTC to this address to purchase Talent Coins:</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
                                    	<img src="<?=base_url();?>assets/img/barcode-ltc.bmp" />
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="w-link pointer" value="<?=@$ltc_company_address?>" data-coin="ltc">
											<button class="btn btn-red hd-md btn-addr" data-address="<?=@$ltc_company_address?>">Copy</button>
										</div>
										<div class="btn-hold text-center">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$ltc_company_address?>">Copy</button>
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
										</div>
									</div>
								</div>
							</div>
							<div class="box w-row dash empBxW">
								<h4 class="b-30">Please enter your DASH address from which you are going to make an investment</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
                                    	<!--<img src="<?=base_url();?>assets/img/barcode-dash.bmp" />-->
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="pointer" id='dash_user_address' value="<?=@$dash_user_address;?>" data-coin="dash">
											<label id="dash_user_address_error" style='display:none;' class="error" for="first_name">Enter Valid DASH Wallet Address.</label>
											<!--<button class="btn btn-red hd-md btn-addr" data-address="XtGMRfXVbuqoncVvuzGyB2BCoRMtGVL2e6">Copy</button>-->
										</div>
										<div class="btn-hold text-center">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$dash_user_address;?>">Copy</button>
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
                                            <button class="btn btn-outline-info btnBoth nxtToggDASH ajaxClassUserWallet" data-coin='dash' data-id='4'>Next</button>
										</div>
									</div>
								</div>
							</div>
                            <div class="box w-row nxtWlt-dash" style="display:none;">
								<h4 class="b-30">Send DASH to this address to purchase Talent Coins:</h4>
								<div class="row justify-content-center">
									<div class="col no-grow cl-pad"> 
                                    	<img src="<?=base_url();?>assets/img/barcode-dash.bmp" />
                                    </div>
									<div class="col relative">
										<div class="link-hold">
											<input class="w-link pointer" value="<?=@$dash_company_address?>" data-coin="dash">
											<button class="btn btn-red hd-md btn-addr" data-address="<?=@$dash_company_address?>">Copy</button>
										</div>
										<div class="btn-hold text-center">
											<button class="btn btn-red sh-md btn-addr" data-address="<?=@$dash_company_address?>">Copy</button>
											<button class="btn btn-outline-info cur-back btnBoth"> ← Back to Currencies</button>
										</div>
									</div>
								</div>
							</div>
						</div>
                        
                        <div class="col">
                        	<div class="hrDiv"><div class="hrDivBdr"></div></div>
                        </div>
                        
                        <div class="col">
                            <div class="titleDivIn">
                                <div class="titleTx">
                                    <div class="titleTxH">Calculator</div>
                                    <div class="titleTxP">Enter the amount you invest and see how many Talent Coins you will get</div>
                                </div>
                            </div>
                        </div>
                        
						<div class="box b-calc">
                        	<p class="p-tit" style="margin-bottom:0;">&nbsp;</p>
							<div class="row">
								<div class="col">
									<label for="">Amount</label>
									<input class="ex-val" value="1" placeholder="" type="text">
								</div>
								<div class="col">
									<label for="">Currency</label>
									<div class="btn-group bootstrap-select bdrNn">
										<button type="button" class="btn dropdown-toggle btn-default hideCountSelct" data-toggle="dropdown" role="button" data-id="select-coin" title="ETH"><span class="filter-option pull-left">ETH</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
										<div class="dropdown-menu open" role="combobox">
											<ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
												<li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">ETH</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
												<li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">BTC</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
												<li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">LTC</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
												<li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">DASH</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
											</ul>
										</div>
										<select class="selectpicker" id="select-coin" tabindex="-98">
											<option selected="selected" value="eth">ETH</option>
											<option value="btc">BTC</option>
											<option value="ltc">LTC</option>
											<option value="dash">DASH</option>
										</select>
									</div>
								</div>
								<div class="col no-grow align-self-center">=</div>
								<div class="col col-full">
									<label>Talent Coins you will get</label>
									<div class="ex-token"> 1835 </div>
								</div>
							</div>
							<input class="token-rate" value="<?=@$rowRateData->token_rate;?>" type="hidden">
							<input class="btc-rate" value="<?=@$rowRateData->btc_rate;?>" type="hidden">
							<input class="ltc-rate" value="<?=@$rowRateData->ltc_rate;?>" type="hidden">
							<input class="dash-rate" value="<?=@$rowRateData->dash_rate;?>" type="hidden">
							<input class="token-bonus" value="<?=@$rowRateData->token_bonus;?>" type="hidden">
							<input class="eth-rate" value="<?=@$rowRateData->eth_rate;?>" type="hidden">
						</div>
						<div class="gr-back" style="display:none;">
							<div class="box b-prog">
								<h4>Crowdsale Progress</h4>
								<div class="car-hold">
									<div class="car-row" id="mainNav">
										<div class="car-progress" data-width="52"> <span>2,486.02 ETH</span> </div>
										<div class="blc-1 blc"> <b>Start</b> <em>0</em> </div>
										<div class="blc-2 blc"> <b>Stage I</b> <em>1290</em> </div>
										<div class="blc-3 blc"> <b>Bonus 25%</b> <em>SOFT CAP</em> </div>
										<div class="blc-4 blc"> <b>Stage II</b> <em>4950 ETH</em> </div>
									</div>
								</div>
								<div class="row desc-row">
									<div class="col-6 col-l"> Current period: </div>
									<div class="col-6 col-r"> Stage II of VI </div>
									<div class="col-6 col-l"> Price: </div>
									<div class="col-6 col-r"> 1 ETH = 20 000 + stage bonus 25% </div>
									<div class="col-6 col-l"> Soft Cap: </div>
									<div class="col-6 col-r"> 3 300 ETH </div>
									<div class="col-6 col-l"> Hard Cap: </div>
									<div class="col-6 col-r"> 23 250 ETH </div>
									<div class="col-6 col-l"> Accepted currencies: </div>
									<div class="col-6 col-r"> ETH, BTC, LTC, DASH </div>
								</div>
							</div>
						</div>
						<style>
							.b-prog .blc-2 {left: 26.060606060606% !important;}
							.b-prog .blc-3 {left: 66.666666666667% !important;}
							.b-prog .blc-3:before {}
							.b-prog .blc-3:after {display: block !important;}
							.b-prog .blc-3 b {left: -53px !important;}
						</style>
					</div>
				</div>
			</div>
		</div>
	</div>   
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".w-box").click(function(){
        $(".titleTxP-mkPay").hide();
    });
    $(".cur-back").click(function(){
        $(".titleTxP-mkPay").show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	//$('input[type="checkbox"]').trigger("change");
    $('input[type="checkbox"]').change(function(){
		if($('input[type="checkbox"]').is(':checked')){
			//alert('Checked');
			$('.new-wallet-other').hide();
			$('.old-wallet-other').hide();
			$('#account_wallet_other_error').css("display", "none");
			$('#account_wallet_other').val('');
		}else{
			$('.new-wallet-other').show();
			$('.old-wallet-other').hide();
		}
    });
	$('#account_wallet').change(function(){
		var val	=	$(this).val();
		if($.trim(val)!=""){
			var isTrue	= isAddress(val);
			if(isTrue===false){
				$('#account_wallet_error').css("display", "block");
				return false;
			}
			$('#account_wallet_error').css("display", "none");
		}else{
			$('#account_wallet_error').css("display", "block");
		}
	});
	$('#account_wallet_other').change(function(){
		var val	=	$(this).val();
		if($.trim(val)!=""){
			var isTrue	= isAddress(val);
			if(isTrue===false){
				$('#account_wallet_other_error').css("display", "block");
				return false;
			}
			$('#account_wallet_other_error').css("display", "none");
		}else{
			$('#account_wallet_other_error').css("display", "block");
		}
	});
	
	$('#btc_user_address').change(function(){
		var val	=	$(this).val();
		if($.trim(val)!=""){
			$('#btc_user_address_error').css("display", "none");
		}else{
			$('#btc_user_address_error').css("display", "block");
		}
	});
	$('#ltc_user_address').change(function(){
		var val	=	$(this).val();
		if($.trim(val)!=""){
			$('#ltc_user_address_error').css("display", "none");
		}else{
			$('#ltc_user_address_eroor').css("display", "block");
		}
	});
	$('#dash_user_address').change(function(){
		var val	=	$(this).val();
		if($.trim(val)!=""){
			$('#dash_user_address_error').css("display", "none");
		}else{
			$('#dash_user_address_error').css("display", "block");
		}
	});
	
});
</script>

<script>
	var base_url	=	"<?=base_url();?>"; 
	/**
		* Checks if the given string is an address
		*
		* @method isAddress
		* @param {String} address the given HEX adress
		* @return {Boolean}
		*/
		var isAddress = function (address) {
			if (!/^(0x)?[0-9a-f]{40}$/i.test(address)) {
				// check if it has the basic requirements of an address
				return false;
				} else if (/^(0x)?[0-9a-f]{40}$/.test(address) || /^(0x)?[0-9A-F]{40}$/.test(address)) {
				// If it's all small caps or all all caps, return true
				return true;
				} else {
				// Otherwise check each case
				return isChecksumAddress(address);
			}
		};
		/**
			* Checks if the given string is a checksummed address
			*
			* @method isChecksumAddress
			* @param {String} address the given HEX adress
			* @return {Boolean}
			*/
			var isChecksumAddress = function (address) {
				// Check each case
				address = address.replace('0x','');
				var addressHash = sha3(address.toLowerCase());
				for (var i = 0; i < 40; i++ ) {
					// the nth letter should be uppercase if the nth digit of casemap is 1
					if ((parseInt(addressHash[i], 16) > 7 && address[i].toUpperCase() !== address[i]) || (parseInt(addressHash[i], 16) <= 7 && address[i].toLowerCase() !== address[i])) {
						return false;
					}
				}
				return true;
			};
			$(document).ready(function(){
				$('#edit-wallet').click(function(e) {
					$('.old-wallet').css("display", "block");
					$('.new-wallet').css("display", "none");
				});
				$('#edit-wallet-other').click(function(e) {
					$('.old-wallet-other').css("display", "none");
					//$('.old-wallet-other').show();
					$('.new-wallet-other').css("display", "block");
					//$('.new-wallet-other').hide();
				});
				// For Ethereum wallet update
				$('.ajaxAccountWallet').click(function(e) {
					var account_wallet 		= 	$('#account_wallet').val();
					/*if(isAddress(account_wallet)){
						alert('True');
						return false;
					}*/
					$('#account_wallet_error').css("display", "none");
					if(account_wallet==""){
						$('#account_wallet_error').css("display", "block");
						$('#account_wallet').focus();
						return false;
					}
					var isTrue	= isAddress(account_wallet);
					if(isTrue===false){
						$('#account_wallet_error').css("display", "block");
						$('#account_wallet').focus();
						return false;
					}
			
					$.ajax({
						type: "POST",
						url: base_url + "account/ajaxrequest/updateAccountWalletId", 
						dataType: 'html',
						data: {'account_wallet': account_wallet},  
						cache:false,
						beforeSend: function() {
							//$('.generic_lightbox_Full').css("display", "block");
							//$('.generic_lightbox').css("display", "block");
						},
						complete: 
							function(){
								$('.old-wallet').css("display", "block");
								$('.old-wallet').css("opacity", "1");
								$('.new-wallet').css("display", "none");
								$('.ac-wallet').text(account_wallet);
							},
						success:
							function(data){
								
							},
						error: 
							function(e) {
								//$(".statusUpdateSucess"+appid).html('Error during update status.');
								//$('.setAjaxData').html('<div class="jobTrack">No Recrod Found!</div>');
							}
					});	
				});
				
				// Update Other wallet address
				$('.ajaxAccountWalletOther').click(function(e) {
					var account_wallet 		= 	$('#account_wallet_other').val();
					//Enter Valid Wallet Address.
					$('#account_wallet_other_error').css("display", "none");
					if(account_wallet==""){
						$('#account_wallet_other_error').css("display", "block");
						$('#account_wallet_other').focus();
						return false;
					}
					var isTrue	= isAddress(account_wallet);
					if(isTrue===false){
						$('#account_wallet_other_error').css("display", "block");
						$('#account_wallet_other').focus();
						return false;
					}
					$.ajax({
						type: "POST",
						url: base_url + "account/ajaxrequest/updateAccountWalletOther", 
						dataType: 'html',
						data: {'account_wallet': account_wallet},  
						cache:false,
						beforeSend: 
							function() {

							},
						complete: 
							function(){
								$('.old-wallet-other').css("display", "block");
								//$('.old-wallet-other').css("opacity", "1");
								$('.new-wallet-other').css("display", "none");
								$('.ac-wallet-other').text(account_wallet);
							},
						success:
							function(data){
								
							},
						error: 
							function(e) {

							}
					});	
				});
				
				// Update USers wallet address
				$('.ajaxClassUserWallet').click(function(e) {
				
					var wallet_id	=	 $(this).attr("data-id");
					var dataAction	=	 $(this).attr("data-coin");
					
					if(dataAction=='bitcoin'){
						var user_wallet_address 		= 	$('#btc_user_address').val();
						if($.trim(user_wallet_address)==""){
							$('#btc_user_address_error').css("display", "block");
							$('#btc_user_address').focus();
							return false;
						}else{
							$('#btc_user_address_error').css("display", "none");
						}
					}else if(dataAction=='litecoin'){
						var user_wallet_address 		= 	$('#ltc_user_address').val();
						if($.trim(user_wallet_address)==""){
							$('#ltc_user_address_error').css("display", "block");
							$('#ltc_user_address').focus();
							return false;
						}else{
							$('#ltc_user_address_error').css("display", "none");
						}
					}else if(dataAction=='dash'){
						var user_wallet_address 		= 	$('#dash_user_address').val();
						if($.trim(user_wallet_address)==""){
							$('#dash_user_address_error').css("display", "block");
							$('#dash_user_address').focus();
							return false;
						}else{
							$('#dash_user_address_error').css("display", "none");
						}
					}

					$.ajax({
						type: "POST",
						url: base_url + "account/ajaxrequest/updateCurrUserWallet", 
						dataType: 'html',
						data: {'user_wallet_address': user_wallet_address,'wallet_id': wallet_id,'dataAction': dataAction},  
						cache:false,
						beforeSend: function() {

						},
						complete: function(){
							if(dataAction=='bitcoin'){
								$(".nxtWlt-btc").show();
								$(".btc").hide();
							}else if(dataAction=='litecoin'){
								$(".nxtWlt-ltc").show();
								$(".ltc").hide();
								//var user_wallet_address 		= 	$('#ltc_user_address').val();
							}else if(dataAction=='dash'){
								$(".nxtWlt-dash").show();
								$(".dash").hide();
								//var user_wallet_address 		= 	$('#dash_user_address').val();
							}
						},
						success:
						function(data){
							//alert(data);
							if(data==1){
								//alert('Successfully updated wallet address.');
							}
						},
						error: 
						function(e) {

						}
					});	
				});
			});
		</script>		
		
	<script src="<?=base_url('assets/js/registerJs.js')?>"></script>	