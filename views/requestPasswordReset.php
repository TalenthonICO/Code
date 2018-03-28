<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="fullD" style="width:100%; min-height:500px; float:left; padding:0 0 60px 0; background:#F3F3F3;">
  <div class="site-request-password-reset pb-50 acc-form">
    <div class="container">
      <h1 class="in-line h-xs">Request password reset</h1>
	  <?php $this->load->view('message_template');?>
      <div class="row bs-2">
        <div class="col l-col">
          <!--<img src="assets/img/logo.png" alt="">-->
        </div>
        <div class="col wb pan-hold-sm">
          <div class="center-block-sm">
            <p class="text-center">Please fill out your email. A link to reset password will be sent there.</p>
            <form id="request-password-reset-form" name="request-password-reset-form" action="<?php echo base_url('requestPasswordReset');?>" method="post">
              <div class="g-recaptcha" id="recapture1" data-form="request-password-reset-form" data-id="1"></div>
              <input class="g-recaptcha-response" name="g-recaptcha-response" type="hidden">
              <div class="form-group field-passwordresetrequestform-email required">
                <input id="email" class="form-control" name="email" autofocus placeholder="Email" aria-required="true" type="text" maxlength="50">
                <p class="help-block help-block-error"></p>
              </div>
              <div class="form-group text-center t-20">
                <button type="submit" id="reset-submit" class="btn btn-red btn-block">Send</button>
                <p class="lock t-15 f-13"> <img src="assets/img/lock.png"> We respect your <a class="emailprivacy popBoxFullBtn-emailPrvcy" href="javascript:void(0);">email privacy</a> </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $(".popBoxFullBtn-emailPrvcy").click(function(){
		$(".popOver").show();
    });
    $(".closePop").click(function(){
		$(".popOver").hide();
    });
});
</script>
<div class="popOver" style="display:none;">
  <div class="popBoxFull">
    <div class="popBox">
      <div class="closePop"> <a href="javascript:void(0);" class="closePop-btn">X</a> </div>
      <div class="popData">
      	<div class="h5">Email Privacy Policy</div>
      	<div class="popData-content">
        
        	<p>We have created this email privacy policy to demonstrate our firm commitment to your privacy and the protection of your information.</p>
        	<p><strong>Why did you receive an email from us?</strong></p>
            <p>If you received a mailing from us, (a) you are listed with us as someone who has expressly shared your email address for the purpose of receiving information in the future ("opt-in"), or (b) you have registered or purchased or otherwise have an existing relationship with us. We respect your time and attention by limiting the frequency of our mailings.</p>
            <p><strong>How we protect your privacy?</strong></p>
            <p>We use security measures to protect against the loss, misuse and alteration of data used by our system.</p>
            <p><strong>Sharing and usage</strong></p>
            <p>We will never share, sell, or rent individual personal information without your advance permission or unless ordered to by a court of law. Information submitted to us is only available to employees managing this information for purposes of contacting you based on your request for information and to contracted service providers for purposes of providing services relating to our communications with you.</p>
            <p><strong>How can you stop receiving email from us?</strong></p>
            <p>Each email contains an easy, automated way for you to cease receiving email from us or to change your expressed interests. If you wish to do this, simply follow the instructions at the end of any email.
If you have received unwanted, unsolicited email sent via this system or purporting to be sent via this system, please forward a copy of that email with your comments to info@talenthon.io for review.</p>

        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<script src="<?=base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		// validate signup form on keyup and submit
		$("#request-password-reset-form").validate({
			rules: {
						//email:{required: true},
						email:{
									required:true,
									email:true, //for validate email
									maxlength:50
								}
						
			},
			messages: {
				//email: "Email cannot be blank.",
				email: {
					required: "Email cannot be blank."
					//maxlength: "Your email  at most 50 characters long"
				}
				
				
			}
		});
	});
	</script>
