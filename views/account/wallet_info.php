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
						<form  id="wallet_info_frm" action="<?php echo base_url('account/walletInfo/saveWalletInfo');?>" method="post" >
							<div class="col">
								<div class="titleDivIn">
									<div class="titleTx">
										<div class="titleTxH">Add your Ethereum wallet address to our whitelist</div>
										<div class="titleTxP">This is the wallet address from where you will send your payment to us. Make sure <br />it’s a personal ERC-20 compatible wallet and not a wallet of an exchange.</div>
									</div>
								</div>
							</div>
							<div class="box b-vallet">
								<div class="new-wallet" <?=@$new_wallet?>>
									<p class="box-p">&nbsp;</p>
									<div class="row justify-content-center">
										<div class="col">
											<input class="form-control" id="account_wallet" value="<?=@$this->session->userdata('account_wallet');?>" name="account_wallet" placeholder="Enter your ETH Wallet" type="text">
											<label id="account_wallet_error" style='display:none;' class="error" for="first_name">Enter Valid Ethereum Wallet Address.</label>
										</div>
									</div>
								</div>
							</div>
							<div class="box b-vallet">
								<div class="wltCheckDiv">
									<label class="wltCheckLbl">
										<input type="checkbox" checked="true" value="checkWallet" name="" <?=@$chkBox;?> />
										<span>Send my Talent Coins to the above wallet address</span>
									</label>
								</div>
								<div style="display:none;" class="new-wallet-other" <?=@$new_wallet_other?>>
									<div class="row justify-content-center t-20 checkWallet othrWalletBox" >
										<div class="col inputOthrWalt">
											<input class="form-control" value="<?=@$this->session->userdata('account_wallet_other');?>" name="account_wallet_other" id="account_wallet_other" placeholder="SEND TALENT COINS TO THIS WALLET" type="text">
											<label id="account_wallet_other_error" style='display:none;' class="error" for="first_name">Enter Valid Wallet Address.</label>
										</div>
										<!--<div class="col no-grow btnOthrWalt">
											<button class="btn btn-red ajaxAccountWalletOther" id="save-wallet-other">Save</button>
										</div>	-->
									</div>
								</div>
							</div>
							<div class="col no-grow">
								<button class="btn btn-red smButton ajaxAccountWallet" id="save-wallet">Save</button>
							</div>
						</form>
						<div class="box b-recommend">
							<div class="row">
								<div class="col col-l">
									<p>Recommended wallets:</p>
									<ul>
										<li><a target="_blank" href="https://www.myetherwallet.com/">MyEtherWallet</a> (no download needed) </li>
										<li><a target="_blank" href="https://metamask.io/">MetaMask</a> (Chrome and Firefox ext) </li>
										<li><a target="_blank" href="">Mist</a> (desktop)</li>
										<li><a target="_blank" href="">Parity</a> (desktop)</li>
										<li><a target="_blank" href="">imToken</a> (iPhone/Android)</li>
									</ul>
								</div>
								<div class="col col-r">
									<p>Incompatible wallets:</p>
									<ul>
										<li>Wallet of any BTC/ETH/LTC exchange (Kraken, Coinbase, Bitstamp, Bitfinex, Bittrex, etc)</li>
										<li>Wallet you do not own a private key to.</li>
									</ul>
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
				$('#account_wallet_other_error').css("display", "none");
			}
		});
		/*$('#account_wallet').change(function(){
			var val	=	$(this).val();
			if($.trim(val)!=""){
				$('#account_wallet_error').css("display", "none");
				}else{
				$('#account_wallet_error').css("display", "block");
			}
		});
		$('#account_wallet_other').change(function(){
			var val	=	$(this).val();
			if($.trim(val)!=""){
				$('#account_wallet_other_error').css("display", "none");
				}else{
				$('#account_wallet_other_error').css("display", "block");
			}
		});*/
		$('.ajaxAccountWallet').click(function(e) {
			var val1	=	$('#account_wallet').val();
			if($.trim(val1)!=""){
				$('#account_wallet_error').css("display", "none");
				var isTrue	= isAddress(val1);
				if(isTrue===false){
					$('#account_wallet_error').css("display", "block");
					return false;
				}
			}else{
				var isTrue	= isAddress(val1);
				if(isTrue===false){
					$('#account_wallet_error').css("display", "block");
					return false;
				}
				$('#account_wallet_error').css("display", "block");
			}
			if($('input[type="checkbox"]').is(':checked')){
				$('#account_wallet_other_error').css("display", "none");
				if(val1!=""){
					$( "#wallet_info_frm" ).submit();
				}
			}else{
				var val	=	$("#account_wallet_other").val();
				if($.trim(val)!=""){
					$('#account_wallet_other_error').css("display", "none");
					var isTrue	= isAddress(val);
					if(isTrue===false){
						$('#account_wallet_other_error').css("display", "block");
						return false;
					}else if(isTrue===true){
						$( "#wallet_info_frm" ).submit();
					}
				}else{
					var isTrue	= isAddress(val);
					if(isTrue===false){
						$('#account_wallet_other_error').css("display", "block");
						return false;
					}
				}
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
		</script>		
	<script src="<?=base_url('assets/js/registerJs.js')?>"></script>		