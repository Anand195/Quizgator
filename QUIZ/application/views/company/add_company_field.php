<?php include('header.php');?>
<div class="container" style="margin-top:50px;">
	<h1>Create Quiz</h1>
	
	<?php echo form_open_multipart('company/uservalidation');?>
	<?php echo form_hidden('user_id',$this->session->userdata('id')) ;?>
	<?php echo form_hidden('created_at',date('Y-m-d H:i:s'));?>
	<?php echo form_hidden('adminname',$this->session->userdata('adminname')) ;?>
    <div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label for="quizname">Quiz Name:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Quiz name','name'=>'quizname','value'=>set_value('quizname')]);?>
		
	</div></div><div class="col-lg-6"style="margin-top:30px;"><?php echo form_error('quizname'); ?></div></div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label for="Field">Field Name:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Field name','name'=>'field_name','value'=>set_value('field_name')]);?>
		
	</div></div><div class="col-lg-6"style="margin-top:30px;"><?php echo form_error('field_name'); ?></div></div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'submit'])?>
<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'reset'])?>

<?php include('footer.php');?>