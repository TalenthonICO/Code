<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.js')?>"></script>


<div class="fullD" style="width:100%; min-height:500px; float:left; padding:0 0 60px 0; background:#F3F3F3;">
	<div class="site-signup pb-30 acc-form">
		<div class="container">
			<h1 class="h-xs">Register</h1>
			<?php $this->load->view('message_template');?>
			<div class="row bs-2">
				<div class="col l-col"> </div>
				<div class="col wb pan-hold-sm">
					<div class="center-block-sm">
						<div class="t-8 b-10 clearfix">
							<div class="text-center bg-txt"> Already a member? </div>
							<div class="text-center bg-link"> <a class="upper f-18 t-10 btn-outline-info btn btn-block" href="<?=base_url('login');?>" style="font-weight:900">Log in here</a> </div>
						</div>
						<hr>
						<h4>REGISTER WITH SOCIAL</h4>
						<div class="row">
							<div class="col col-xxs"> 
								<a href="<?=@$fbloginURL?>" tabindex="" class="btn btn-facebook btn-block bld relative"> <img src="<?php echo base_url('assets/img/f.png')?>" alt="">Facebook</a> 
							</div>
							<div class="col col-xxs"> 
								<a href="<?=$oauthURL?>" tabindex="" class="btn btn-linkedin btn-block bld t-0 t-10-xs relative"> 
								<img src="<?php echo base_url('assets/img/linked-white.png')?>" alt="">LinkedIn</a> 
							</div>
							<div class="w-100 t-10"></div>
							
							<div class="col col-xxs">  
			  <a href="<?php echo @$gmailLoginURL;?>"  tabindex="" class="btn btn-google btn-block bld t-0 t-10-xs relative"> <img src="<?=base_url();?>assets/img/g.png" alt="">Google</a> 
			  </div>
			  
							<div class="col col-xxs"> 
							<a href="<?php echo @$twitterLoginURL;?>" tabindex="" class="btn btn-twitter btn-block bld t-0 t-10-xs relative"> 
							<img src="<?=base_url();?>assets/img/soc_twitter.png" alt="">Twitter
							</a> 
							</div>
							
							 
							
						</div>
						<h5 class="t-20 b-10">OR</h5>
						<form id="form-signup" name="form-signup" action="<?=base_url('register/regSuccess');?>" method="post">
							<div class="g-recaptcha" id="recapture1" data-form="form-signup" data-id="1"></div>
							<input class="g-recaptcha-response" name="g-recaptcha-response" type="hidden">
							<div class="form-group field-signupform-name required">
								<input id="user_name" class="form-control" name="user_name" autofocus placeholder="Name" aria-required="true" type="text" autocomplete="off" maxlength="55">
								<p class="help-block help-block-error"></p>
							</div>
							<div class="form-group field-signupform-email required">
								<input id="user_email_id" class="form-control" name="user_email_id" placeholder="Email" aria-required="true" type="text" autocomplete="off" maxlength="55">
								<p class="help-block help-block-error"><?=$this->session->flashdata('flashErrorMsg')?></p>
							</div>
							<div class="form-group text-center t-20">
								<button type="submit" id="signup-submit" class="btn btn-red btn-block" name="signup-button">Register</button>
								<p class="lock t-15 f-13"> <img src="<?=base_url();?>assets/img/lock.png"> We respect your <a class="emailprivacy popBoxFullBtn-emailPrvcy" href="javascript:void(0);">email privacy</a> </p>
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
		$("#form-signup").validate({
			rules: {
						//email:{required: true},
						user_name:{required: true, minlength: 3},
						user_email_id:{
									required:true,
									email:true, //for validate email
									maxlength:50
								}
						
						
			},
			messages: {
						
						user_name: {
										required: "Name cannot be blank.",
										minlength: "Your Name must be at least 3 characters long"
									},
				//email: "Email cannot be blank.",
				user_email_id: {
					required: "Email cannot be blank."
					//maxlength: "Your email  at most 50 characters long"
				},
				
				
				
				
			}
		});
	});
	</script>