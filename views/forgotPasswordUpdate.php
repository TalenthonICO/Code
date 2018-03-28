<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<script src="<?=base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		// validate signup form on keyup and submit
		$("#request-password-reset-form").validate({
			rules: {
						//email:{required: true},
						password:{
									required:true,
									minlength: 6,
									maxlength:50,
									normalizer: function(value) {
																  return $.trim(value);
																 }
								}
						
			},
			messages: {
				
				
				password: {
									required: "Password cannot be blank.",
									minlength: "Your password must be at least 6 characters long"
						  }
				
				
			}
		});
	});
	</script>
	
<div class="fullD" style="width:100%; min-height:500px; float:left; padding:0 0 60px 0; background:#F3F3F3;">
  <div class="site-request-password-reset pb-50 acc-form">
    <div class="container">
      <h1 class="in-line h-xs">Reset password</h1>
      <div class="row bs-2">
        <div class="col l-col">
          <!--<img src="assets/img/logo.png" alt="">-->
        </div>
        <div class="col wb pan-hold-sm">
          <div class="center-block-sm">
            <p class="text-center">Please choose your new password:</p>
            <form id="request-password-reset-form" action="<?php echo base_url('requestPasswordReset/updateSave')?>" method="post">
				<input type="hidden" name="user_Id" value="<?php echo @$user_Id?>"  />
				<input type="hidden" name="forgot_access_token" value="<?php echo @$forgot_access_token?>"  />
              <div class="form-group field-passwordresetrequestform-email required">
                <input id="password" class="form-control" name="password" autofocus placeholder="" aria-required="true" type="password" maxlength="25">
                <p class="help-block help-block-error"></p>
              </div>
              <div class="form-group text-center t-20">
                <button type="submit" id="reset-submit" class="btn btn-red btn-block">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
