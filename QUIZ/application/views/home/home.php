<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  		<div class="container" style="position:absolute; width:200px; height:100%; background:white;border-right: 1px solid rgba(100,100,100,0.3);">
		<ul>
  			<li style="list-style: none; padding:15px 10px; border-bottom: 1px solid rgba(100,100,100,0.3);">Field Of Quiz</li></ul>	
				<?php foreach($companys as $cpy):?>
					<ul><li style="list-style: none; padding:15px 10px; border-bottom: 1px solid rgba(100,100,100,0.3);">
				<?= anchor("home/editfield/{$cpy->field_name}",$cpy->field_name,['class'=>'btn btn-primary']);
					?></li>
  			</ul>
			<?php endforeach; ?>
			<?php echo $this->pagination->create_links();?>
		</div>
		<div class="container" style="margin-left:250px;">
  	<div class="row">
  <div class="table"><table>
			<thead>
			<tr><th><center><img src="<?= base_url("download/d3")?>"alt="" width="200" height="200"></th>
		<th><img src="<?= base_url("download/d2")?>"alt="" width="600" height="200"></th></th></thead></table><br/>
		<center><font color="red"><h4><b><marquee>Play The Quiz For Given Field</marquee></b></h4></font></center>
		</div></div></div>

		<div class="container" >
  		<div class="row">
  			<div class="table" style="width:300px; margin-left:200px; border-style:solid; border-radius:10px;">
		<table>
		<thead style="padding-left:90px;">
			<tr>
				<th>Latest Quiz</th></tr>
		</thead>
		<tbody>
				<?php foreach($companys as $cpy):?>
				<tr>
				<td><?= anchor("home/editcompany/{$cpy->id}",$cpy->quizname,['class'=>'btn btn-primary']);
					?></td>
					<td><?=$cpy->created_at;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
		</div><div class="table" style="width:300px; margin-left:50px;padding-left:60px; border-style:solid; border-radius:10px;">
		<table>
		<thead>
			<tr>
				<th>Recently Played Quiz</th></tr>
		</thead>
		</table>
		</div></div></div>
<?php include('footer.php');?>
