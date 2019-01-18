<?php include('header.php');?>
<div class="container" style="margin-top:50px;">
	<h1>Question</h1>
	
	<?php echo form_open_multipart('company/updatequestion/{$question->qid}');?>
	<?php echo form_hidden('quizname',$this->session->userdata('quizname')) ;?>
	<?php echo form_hidden('field_name',$this->session->userdata('field_name')) ;?>
    <div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label for="question">Enter Question:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Question','name'=>'question','value'=>set_value('question',$question->question)]);?>
		
	</div></div><div class="col-lg-6"style="margin-top:30px;"><?php echo form_error('question'); ?></div></div>
	<div class="row">
	<div class="col-lg-3">
	<div class="form-group">
		<label for="a">A:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Option A','name'=>'a','value'=>set_value('a',$question->a)]);?>
		
	</div></div><div class="col-lg-3"style="margin-top:30px;"><?php echo form_error('a'); ?></div>
	<div class="col-lg-3">
	<div class="form-group">
		<label for="b">B:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Option B','name'=>'b','value'=>set_value('b',$question->b)]);?>
		
	</div></div><div class="col-lg-3"style="margin-top:30px;"><?php echo form_error('b'); ?></div></div>
	<div class="row">
	<div class="col-lg-3">
	<div class="form-group">
		<label for="c">C:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Option C','name'=>'c','value'=>set_value('c',$question->c)]);?>
		
	</div></div><div class="col-lg-3"style="margin-top:30px;"><?php echo form_error('c'); ?></div>
	<div class="col-lg-3">
	<div class="form-group">
		<label for="d">D:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'Option D','name'=>'d','value'=>set_value('d',$question->d)]);?>
		
	</div></div><div class="col-lg-3"style="margin-top:30px;"><?php echo form_error('d'); ?></div></div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Edit question'])?>
	<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'reset Question'])?>

<?php include('footer.php');?>