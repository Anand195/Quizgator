<?php include('header.php');?>
<div class="container" style="margin-top:50px;">
	<h1>Admin Login</h1>
	<?php
	if($company=$this->session->flashdata('company')):
		$company_class=$this->session->flashdata('company_class');?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert <?= $company_class ?>">
					<?php echo $company; ?>
				</div>
			</div>
		</div>

<?php endif;?>

	<?php
	if($error=$this->session->flashdata('Login_failed')):?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert alert-danger">
					<?php echo $error; ?>

				</div>
			</div>
		</div>
<?php endif;?>
<?php echo form_open('clogin');?>
    <div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label for="adminname">Admin Name:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Admin Name','name'=>'adminname','value'=>set_value('adminname')]);?>
		
	</div></div><div class="col-lg-6" style="margin-top:30px;"><?php echo form_error('adminname'); ?></div></div>
	
	<div class="row">
	<div class="col-lg-6" ">
	<div class="form-group">
		<label for="pwd">Password:</label>
		<?php echo form_password(['class'=>'form-control','placeholder'=>'Enter password','type'=>'password','name'=>'password','value'=>set_value('password')]);?>
	</div></div><div class="col-lg-6" style="margin-top:30px;"><?php echo form_error('password'); ?> </div> </div><br/>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'submit'])?>
<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'reset'])?>
<?php echo anchor('company/register','sign up?','class="link-class"')?>
<?php include('footer.php');?>