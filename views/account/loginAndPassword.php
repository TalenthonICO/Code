<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<script src="<?=base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="fullD termSlct"> 
    <div class="acc-page b-30">
		<div class="account-table">
			<?php
				$data	= array();
				$data['menuActive']	=	'resetPassword';
				$this->load->view('account/top_menu_bar',$data);
			?>
			<div class="container">
				
				<div class="acc-content bs-3">
					<div class="wb pad-panel acc-right">
						<div class="center-block-sm">
							<h4>Change Your Password</h4>
							<?php $this->load->view('message_template');?>
							<form id="login-password-form" class="site-form" action="<?php echo base_url('account/login-and-password')?>" method="post">
								<div class="form-group">
									<input id="accountloginpasswordform-email" class="form-control" name="email" value="<?php echo @$this->session->userdata('email');?>" disabled="disabled" style="color: #b9b9b9" autocomplete="off" type="text" readonly="readonly">
									<div class="text-danger"></div>
								</div>
								
								<div class="form-group">
									<div>
										<input id="new_password" class="form-control" name="new_password" placeholder="New Password" autocomplete="off" type="password" maxlength="25">
										<div class="text-danger"></div>
									</div>
								</div>
								<div class="form-group">
									<div>
										<input id="new_password2" class="form-control" name="new_password2" placeholder="Retype New Password" autocomplete="off" type="password" maxlength="25">
										<div class="text-danger"></div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-red t-15" type="submit" id="update-button">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>   
</div>

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
		$("#login-password-form").validate({
			rules: {
				new_password: {required: true,minlength: 6, normalizer: function(value) {
					return $.trim(value);
				}
				},
				new_password2: {required: true,minlength: 6,equalTo: "#new_password", normalizer: function(value) {
					return $.trim(value);
				}
				}
				
				
				/*new_password2 : {					
					equalTo : "#new_password"
				}	*/			
			},			
			messages: {
				
				new_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				},
				
				new_password2: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long",
					equalTo: "Please enter the same password as above"
				},			
				
				//new_password: "Please enter your new password",
				//new_password2: "Please retype your new password"
				
			}
		});
	});
</script>
