<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<h5>*click on correct answer on question</h5>
				<?php foreach($question as $cpy):?>
	<div class="form-group">
	<div class=container style="margin-top:50px;margin-left:100px;">
	<div class="row">	
				<h4>Question:</h4><tr>
				<div class="col-lg-12">
				<div class="btn btn-primary"><h4><?php echo $cpy->question ?></h4></div></div></div></div>
				<div class=container style="margin-top:20px;margin-left:130px;">
				<div class="row">
				<h4>A):</h4>
				<div class="col-lg-3">
				<div class="btn btn-default" style="list-style: none; border: 1px solid rgba(100,100,100,0.3);"><h5><?php echo $cpy->a ?></h5></div></div>
				<h4>B):</h4>
				<div class="col-lg-3">
				<div class="btn btn-default" style="list-style: none; border: 1px solid rgba(100,100,100,0.3);"><h5><?php echo $cpy->b ?></h5></div></div></div></div>
				<div class=container style="margin-top:20px;margin-left:130px;">
				<div class="row">
				<h4>C):</h4>
				<div class="col-lg-3">
				<div class="btn btn-default" style="list-style: none; border: 1px solid rgba(100,100,100,0.3);"><h5><?php echo $cpy->c ?></h5></div></div>
				<h4>D):</h4>
				<div class="col-lg-3">
				<div class="btn btn-default" style="list-style: none; border: 1px solid rgba(100,100,100,0.3);"><h5><?php echo $cpy->d ?></h5></div></div></div></div>
				<?php endforeach; ?>
				<?php include('footer.php');?>
