<?php 
	$cnt = @$kycDocumentNumrow;
	$td_user_role_id	=	@$this->session->userdata("td_user_role_id");
?>
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">
<script src="<?=base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.css">
<script src="<?=base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt?>"  />
<div class="fullD termSlct" style="padding:0;"> 
    <div class="acc-page b-30">
		<div class="account-table">
			<?php
				$data	= array();
				$data['menuActive']	=	'documents';
				$this->load->view('account/top_menu_bar',$data);
				$passport_exp_date		="";
				$passport_number		="";
				$PassIssCountryId		="";
				$photographic_exp_date	="";
				$photographic_number	="";
				$issCountryId			="";
				$pass_file_ext			=		'';
				$photo_file_ext			=		'';
				$pass_file_ext	=	@$kycDocumentList->passport_file_extension;
				$photo_file_ext	=	@$kycDocumentList->photographic_file_extension;
				if(@$kycDocumentList->passport_status!=2){
					if(!empty($kycDocumentList->passport_exp_date))
					{
						$dd						=	@$kycDocumentList->passport_exp_date;
						$passport_exp_date		=	date('d-m-Y', strtotime( $dd )); 
					}
					$passport_number		=	@$kycDocumentList->passport_number;
					$PassIssCountryId		=	@$kycDocumentList->passport_iss_country_id;
				}	
				if(@$kycDocumentList->photographic_status!=2){
					if(!empty($kycDocumentList->photographic_exp_date))
					{
						$photographic_exp_date	=	date('d-m-Y', strtotime( @$kycDocumentList->photographic_exp_date )); 
					}
					$photographic_number	=	@$kycDocumentList->photographic_number;
					$issCountryId			=	@$kycDocumentList->photographic_iss_country_id;
				}
			?>
			<form  id="document_frm" action="<?php echo base_url('account/documents/docUpload');?>" method="post" enctype="multipart/form-data">
			<div class="container">
				<div class="acc-content bs-3">
					<div class="wb pad-panel acc-right boxSh">
						<div class="docInfo2Out">
							<div class="docInfo2In">
								<div class="docInfo2">
									<div class="docInfoT">Now upload your document</div>
									<div class="imgPolicy">
										<div class="imgPolicyTrk trL">
											<div class="imgPolicyTrkH">Make sure image isn't BLURRY</div>
											<img src="<?=base_url();?>assets/img/id-blurry2.png">
										</div>
										<div class="imgPolicyTrk trR">
											<div class="imgPolicyTrkH">Make sure ALL 4 CORNERS are visible</div>
											<img src="<?=base_url();?>assets/img/id-corners2.gif">
										</div>
									</div>
									
										<div class="docInfoD">
											<div class="docInfoDH">Passport copy</div>
											<div class="docInfoDD">
												<div class="docInfoCol colL">
													<div class="docColField">
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Passport Number</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name required">
																	<input class="form-control" name="passport_number" id="passport_number" value="<?=@$passport_number?>" aria-required="true" type="text">
																</div>
															</div>
														</div>
														<?php
															if(@$kycDocumentList->passport_exp_date=="0000-00-00"){
																$passport_exp_date	=	"";
															}
														?>
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Passport Expiration Date</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name required">
																	<input class="form-control" name="passport_exp_date" id="passport_exp_date" value="<?=@$passport_exp_date?>" aria-required="true" type="text" readonly='true' placeholder="">
																</div>
															</div>
														</div>
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Passport Issuing Country</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name required">
																	<select class="custom-select" name="passport_iss_country_id" id="passport_iss_country_id" data-width="100%" aria-required="true">
																		<option value="" selected="selected"> Choose </option>
																		<?php
																			$this->db->select('country_name,country_id'); 
																			$this->db->where('status',1);
																			$query= $this->db->get('td_country_master');
																			foreach($query->result() as $row){ 
																				if($PassIssCountryId==$row->country_id){
																					echo '<option selected value="'.$row->country_id.'">'.$row->country_name.'</option>';
																					}else{
																					echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
																				}
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="docInfoCol colR">
													<div class="docUpCol">
														<?php 
															if(empty($kycDocumentList->passport_name) || ($kycDocumentList->passport_status==2) || ($kycDocumentList->passport_status==0))
															{
															?>
															<div class="form-group field-accountcontactform-name required fileDv classPassport" aria-required="true">
																<a href="#" class="upDC">Upload or drag and drop here</a>
																<input class="form-control" name="passport" id="passport" value="" aria-required="true" type="file">
															</div>
															
															<?php
																
																if(((@$kycDocumentList->passport_status==0) || (@$kycDocumentList->passport_status==2))and @$kycDocumentList->passport_status!='')	{	
															?>
																<div class="upFiles">
																	<?php
																		if(@$pass_file_ext=='pdf' or @$pass_file_ext=='PDF'){
																		?>
																		<div class="PDF" style='margin-top:30px;'>
																			<object data="<?=@$kycDocumentList->passport_abs;?>" type="application/pdf" width="350px" height="180px">
																			</object>
																		</div>
																		<?php	}else{	?>
																		<div class="upSucessImg" style="display:block;">
																			<img src="<?=@$kycDocumentList->passport_abs;?>">
																		</div>
																	<?php	}	?>
																	<?php 
																		$passport_status	=	@$kycDocumentList->passport_status;
																		$statusName			=	getDocumentStatusNameByStatusId(@$passport_status);
																		if(@$passport_status==0 || @$passport_status==3 || @$passport_status==4){
																			echo '<div class="upWaiting"><i class="fa fa-clock-o"></i><span>'.@$statusName.'</span></div>';
																		}else if($passport_status==1){
																			echo '<div class="upSucess"><i class="fa fa-check"></i><span>'.@$statusName.'</span></div>';
																		}else if($passport_status==2){
																			echo '<div class="upRejcet"><i class="fa fa-close"></i><span>'.@$statusName.'</span></div>'; 
																		}
																	?>
																</div>
															<?php	}	?>
															<?php	}	else	{		?>
															<div class="upFiles">
																	<?php
																		if(@$pass_file_ext=='pdf' or @$pass_file_ext=='PDF'){
																		?>
																		<div class="PDF" style='margin-top:30px;'>
																			<object data="<?=@$kycDocumentList->passport_abs;?>" type="application/pdf" width="350px" height="180px">
																			</object>
																		</div>
																		<?php	}else{	?>
																		<div class="upSucessImg" style="display:block;">
																			<img src="<?=@$kycDocumentList->passport_abs;?>">
																		</div>
																	<?php	}	?>
																	<?php 
																		$passport_status	=	$kycDocumentList->passport_status;
																		$statusName			=	getDocumentStatusNameByStatusId(@$passport_status);
																		if(@$passport_status==0 || @$passport_status==3 || @$passport_status==4){
																			echo '<div class="upWaiting"><i class="fa fa-clock-o"></i><span>'.@$statusName.'</span></div>';
																		}else if($passport_status==1){
																			echo '<div class="upSucess"><i class="fa fa-check"></i><span>'.@$statusName.'</span></div>';
																		}else if($passport_status==2){
																			echo '<div class="upRejcet"><i class="fa fa-close"></i><span>'.@$statusName.'</span></div>'; 
																		}
																	?>
															</div>
														<?php	}	?>
													</div>
												</div>
											</div>
										</div>
										<div class="docInfoD">
											<div class="docInfoDH">Recognised form of photographic identification (Driving licence/Selfie)</div>
											<div class="docInfoDD">
												<div class="docInfoCol colL">
													<div class="docColField">
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Id Number</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name ">
																	<input class="form-control" name="photographic_number" id="photographic_number" value="<?=@$photographic_number?>" aria-required="true" type="text" >
																</div>
															</div>
														</div>
														<?php
															if(@$kycDocumentList->photographic_exp_date=="0000-00-00"){
																$photographic_exp_date	=	"";
															}
														?>
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Id Expiration Date</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name ">
																	<input class="form-control" name="photographic_exp_date" id="photographic_exp_date" value="<?=@$photographic_exp_date?>" aria-required="true" type="text" readonly='true' >
																</div>
															</div>
														</div>
														<div class="docColFieldTrk">
															<div class="docColFieldTrkH">Id Issuing Country</div>
															<div class="docColFieldTrkF">
																<div class="form-group field-accountcontactform-name ">
																	<select class="custom-select" name="photographic_iss_country_id" id="photographic_iss_country_id" data-width="100%" aria-required="true">
																		<option value="" selected="selected"> Choose </option>
																		<?php
																			$this->db->select('country_name,country_id');  
																			$this->db->where('status',1);
																			$query= $this->db->get('td_country_master');
																			foreach($query->result() as $row){ 
																				if($issCountryId==$row->country_id){
																					echo '<option selected value="'.$row->country_id.'">'.$row->country_name.'</option>';
																					}else{
																					echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
																				}
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="docInfoCol colR">
													<div class="docUpCol">
														<?php 
															if(empty($kycDocumentList->photographic_name) || ($kycDocumentList->photographic_status==0) || ($kycDocumentList->photographic_status==2))
															{
															?>
															<div class="form-group field-accountcontactform-name required fileDv classPhotographic" aria-required="true">
																<a href="#" class="upDC">Upload or drag and drop here</a>
																<input class="form-control" name="photographic" id="photographic" value="" aria-required="true" type="file">
															</div>
															<?php	if((@$kycDocumentList->photographic_status==0) || (@$kycDocumentList->photographic_status==2) and @$kycDocumentList->photographic_status!='')	{	?>
																<div class="upFiles">
																	<?php
																		if(@$photo_file_ext=='pdf' or @$photo_file_ext=='PDF'){
																		?>
																		<div class="PDF" style='margin-top:30px;'>
																			<object data="<?=@$kycDocumentList->photographic_abs;?>" type="application/pdf" width="350px" height="180px">
																			</object>
																		</div>
																		<?php	}else{	?>
                                                                        <div class="upSucessImg" style="display:block;">
                                                                            <img src="<?=@$kycDocumentList->photographic_abs;?>">
																		</div>
																	<?php	}	?>
																	<?php 
																		//echo "Hello".$photographic_status;
																		$photographic_status	=	@$kycDocumentList->photographic_status;
																		$statusName			=	getDocumentStatusNameByStatusId(@$photographic_status);
																		if(@$photographic_status==0 || @$photographic_status==3 || @$photographic_status==4){
																			echo '<div class="upWaiting"><i class="fa fa-clock-o"></i><span>'.@$statusName.'</span></div>';
																		}else if($photographic_status==1){
																			echo '<div class="upSucess"><i class="fa fa-check"></i><span>'.@$statusName.'</span></div>';
																		}else if($photographic_status==2){
																			echo '<div class="upRejcet"><i class="fa fa-close"></i><span>'.@$statusName.'</span></div>'; 
																		}
																	?>
																</div>
															<?php	}	?>
															<?php	}	else	{		?>
															<div class="upFiles">
																<?php
																	if(@$photo_file_ext=='pdf' or @$photo_file_ext=='PDF'){
																	?>
                                                                    <div class="PDF" style='margin-top:30px;'>
																		<object data="<?=@$kycDocumentList->photographic_abs;?>" type="application/pdf" width="350px" height="180px">
																		</object>
																	</div>
																	<?php	}else{	?>
																	<div class="upSucessImg" style="display:block;">
																		<img src="<?=@$kycDocumentList->photographic_abs;?>">
																	</div>
																<?php	}	?>
																
																<?php 
																	//echo "Hello".$photographic_status;
																	$photographic_status	=	$kycDocumentList->photographic_status;
																	$statusName			=	getDocumentStatusNameByStatusId(@$photographic_status);
																	if(@$photographic_status==0 || @$photographic_status==3 || @$photographic_status==4){
																		echo '<div class="upWaiting"><i class="fa fa-clock-o"></i><span>'.@$statusName.'</span></div>';
																	}else if($photographic_status==1){
																		echo '<div class="upSucess"><i class="fa fa-check"></i><span>'.@$statusName.'</span></div>';
																	}else if($photographic_status==2){
																		echo '<div class="upRejcet"><i class="fa fa-close"></i><span>'.@$statusName.'</span></div>'; 
																	}
																?>

															</div>
														<?php	}	?>
													</div>
												</div>
												<?php 
													if($td_user_role_id>=3) 
													{ 
													?>
													<div class="slectBot1">
														<div class="subHs" style="font-size:18px; font-weight:bold; color:#000;">Documentary and verifiable source of wealth.</div>
														<div class="document_ddl" style="width:46%;">
															<select name="verifiable" id="verifiable">
																<?php 
																	foreach ($sourceWealth as  $value)
																	{
																		$sel = '';
																		if($kycDocumentList->verifiable== $value['source_wealth_id'])
																		{
																			$sel = 'selected="selected"';
																		}
																	?>
																	<option <?php echo $sel;?>  value="<?php echo $value['source_wealth_id']?>"><?php echo $value['wealth_title'];?></option>
																<?php }?>	
															</select>
														</div>
													</div>
												<?php } ?>  
												<?php
													$isKycDocuments		=	isKycDocuments($this->session->userdata('user_Id'));
													if($isKycDocuments===false || ($kycDocumentList->photographic_status==0) || ($kycDocumentList->photographic_status==2) || ($kycDocumentList->passport_status==0) || ($kycDocumentList->passport_status==2)){
													?>
													<input style="position: absolute; left: -10000px;top: -10000px;" type="submit">
													<div class="text-center t-15" style="float:left; width:100%;">
														<button class="button btn btn-green" id="save-button" type="submit">NEXT</button>
													</div>
												<?php	}	?>
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		// validate signup form on keyup and submit
		$("#document_frm").validate({
			rules: {
				passport:{
					required: true,
					extension: "jpeg|jpg|png|pdf|doc|docx|gif|bmp|svg"
				},
				passport_number:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				passport_exp_date:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				passport_iss_country_id:{
					required: true,
					normalizer: function(value) {
						return $.trim(value);
					}
				},
				photographic:{
					required: true,
					extension: "jpeg|jpg|png|pdf|doc|docx|gif|bmp|svg"
				}
			},
			messages: {
				passport:{
				   required: 'Please upload a photographic document',
				   extension: "Only file with 'jpeg|jpg|png|pdf|doc|docx|gif|bmp|svg' extension are allowed"
				},
				passport_number: "Please enter your passport number",
				passport_exp_date: "Please enter your passport expire date",
				passport_iss_country_id: "Please select passport issuing country",
				photographic:{
				   required: 'Please upload a photographic document',
				   extension: "Only file with 'jpeg|jpg|png|pdf|doc|docx|gif|bmp|svg' extension are allowed"
				}
				
			}
		});
	});
</script>
<script>
	$( function() {
		var date = new Date();
		date.setDate(date.getDate() - 1);
		$("#passport_exp_date").datepicker({
			dateFormat: "dd-mm-yy", 
			defaultDate: date,
			changeMonth: true,
			changeYear: true,
			yearRange: "2000:+40",
			onSelect: function () {
				selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
			}
		});
		$("#photographic_exp_date").datepicker({
			dateFormat: "dd-mm-yy", 
			defaultDate: date,
			changeMonth: true,
			changeYear: true,
			yearRange: "2000:+40",
			onSelect: function () {
				selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
			}
		});
		//$("#datepicker").datepicker("setDate", date);
	} );
</script>
<script type="text/javascript">
	$(function() {
		$("#passport").change(function (){
			var fileName = $(this).val();
			$(".classPassport  a").html(fileName);
			//var filename 	= path.replace(/^.*\\/, "");
		});
		$("#photographic").change(function (){
			var fileName = $(this).val();
			$(".classPhotographic  a").html(fileName);
		});
	});
</script>
<?php 
	//echo '<pre>'; print_r($kycDocumentList); exit; 
?>			