<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="container">
  	<div class="row">
  <div class="table"><table>
			<thead>
			<tr><th><center><img src="<?= base_url("download/d3")?>"alt="" width="300" height="200"></th>
		<th><img src="<?= base_url("download/d2")?>"alt="" width="800" height="200"></th></th></thead></table><br/>
		<center><font color="red"><h4><b><marquee>Play The Quiz For Given Field</marquee></b></h4></font></center>
		</div></div></div>
		<div class="container">
  		<div class="row">
		<div class="table">
		<table>
			<thead>
			<tr>
				<th>FIELD NAME</th>
				<th>QUIZ NAME</th>
				<th>PUBLISHED ON</th>
				<th>PLAY</th>
			</tr>
			</thead>
			<tbody>

				<?php foreach($companys as $que):?>
					
				<tr>
				<td><?php echo $que->field_name; ?></td>
				<td><?php echo $que->quizname; ?></td>
				<td><?= date('d M y H:i:s',strtotime($que->created_at));?></td>
				<td><?= anchor("home/quiz/{$que->quizname}",'Play',['class'=>'btn btn-primary']);
					?>
				</td>
				</tr>
				<?php endforeach; ?>

			</tbody>

		</table>
	</div></div></div>
<?php include('footer.php');?>