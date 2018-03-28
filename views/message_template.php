<?if(@$this->session->flashdata('flashSuccess')):?> 
	<div class="text-center">
		<div class="alert alert-success text-center"><?=$this->session->flashdata('flashSuccess')?></div>
	</div>
<?endif?> 
<?if(@$this->session->flashdata('flashFailure')):?>
	<div class="text-center">
		<div class="alert alert-danger text-center"><?=$this->session->flashdata('flashFailure')?></div>
	</div>
<?endif?>
 <?if(@$this->session->flashdata('flashInformation')):?> 
	<div class="text-center">
		<div class="alert alert-info text-center"><?=$this->session->flashdata('flashInformation')?></div>
	</div>
<?endif?>