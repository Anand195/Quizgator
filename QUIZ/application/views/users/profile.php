<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<br/>
<?php $enrollment=$this->session->userdata('enrollment'); ?>
<div class=container>
	<div class="row">
				<div class="btn btn-success"><h2 style="width:1050px;"><?php echo $enrollment ?></h2></div></div></div>
<div class=container style="margin-top:30px; margin-left:350px ">
<div class="table"><table>
   <thead><tr><th><h2>Played Quiz</h2></th></tr></thead>
          <tbody>
                 <?php
                  if(!$question): ?>
                    <tr><td><h4>You Have Not Applied For Any Company</h4></td></tr>
                    	<tr><td><a href="<?= base_url('Home/index'); ?> " class="btn btn-primary">Play Quiz</a></td></tr>
                    <?php
                        else : ?>
      					<div class="table">
						<table>
						<thead>
						<tr>
					<th>QUIZ NAME</th>
					<th>FIELD NAME</th>
					<th>RESULT</th>
					<th>TIME OF QUIZ PLAY</th>
						</tr>
						</thead>
						<tbody><tr><td>
						<?php $company_name=$this->session->userdata('quizname'); ?>
						<?php echo $company_name; ?></td>
						<td>
						<?php $field_name=$this->session->userdata('field_name'); ?>
						<?php echo $field_name; ?></td>
						<td>
						<?php $salary=$this->session->userdata('result'); ?>
						<?php echo $result; ?></td>
						<tr><td><a href="<?= base_url('Home/index'); ?> " class="btn btn-primary">Playmore Quiz</a></td></tr>
        				<?php endif; ?>
						</tbody></table></div>
						
<?php include('footer.php');?>