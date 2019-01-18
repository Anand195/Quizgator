<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php $quizname=$this->session->userdata('quizname'); ?>
<div class=container>
	<div class="row">
				<div class="btn btn-success"><h2 style="width:1050px;"><?php echo $quizname ?></h2></div></div></div>

<div class="container" style="margin-top:50px;">


<div class="container" style="margin-top:50px;">
	
<?php
	if($msg=$this->session->flashdata('msg')):
		$msg_class=$this->session->flashdata('msg_class');?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert <?= $msg_class ?>">
					<?php echo $msg; ?>
				</div>
			</div>
		</div>

<?php endif;?>
</div>
	<div class="table">
		<table>
			<thead>
			<tr>
				<th>S.no</th>
				<th>QUESTION</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
			</thead>
			<tbody>
				<?php if(count($question)) :
					$count=$this->uri->segment(3);?>
				<?php foreach($question as $cpy):?>
					
				<tr>
				<td><?= ++$count; ?></td>
				<td><?php echo $cpy->question; ?></td>
				<td><?php echo $cpy->a; ?></td>
				<td><?php echo $cpy->b; ?></td>
				<td><?php echo $cpy->c; ?></td>
				<td><?php echo $cpy->d; ?></td>
				<td><?= anchor("company/editquestion/{$cpy->qid}",'Edit',['class'=>'btn btn-primary']);
					?>
				</td>
				<td>
					<?= form_open('company/delquestion'),
						form_hidden('qid',$cpy->qid),
						form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
						form_close();
					?>


				</td>
				</tr>
				<?php endforeach; ?>
				<?php else : ?>
				<tr>
				<td colspan="3">Not Data Availlable</td>
				</tr>
				<?php endif; ?>
			</tbody>

		</table>
		<div>
		<?php echo $this->pagination->create_links();?>
		</div>
	</div>
	<div class="row">
		<a href="quiz" class="btn btn-lg btn-primary">Add Question</a>
	</div>

</div>
<?php include('footer.php');?>