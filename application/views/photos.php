<?php
if($this->session->userdata('logged_in') == FALSE) {
	//$this->session->set_flashdata('error','<p class="alert alert-danger">Please login to view this page.</p>');
	redirect('login');
	exit;
}
?>
<div class="container-fluid">
	<div class="animated fadeIn">            
            <div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-align-justify"></i> Photos
						</div>
						<div class="card-body">
						<div class="col-md-2">
							<?php echo anchor('Medias/add_photo', 'Add', array('title' => 'Add', 'class' => 'btn btn-primary')); ?>
						</div>
							<p style="color:red;">
							<?php
								if($this->session->flashdata('err_msg')){
									echo $this->session->flashdata('err_msg');
								}
							?>
							</p>
							<p style="color:green;">
							<?php 
								if($this->session->flashdata('msg')){
									echo $this->session->flashdata('msg');
								}
							?>
							</p>
							
							<?php //echo "<pre>";
							//print_r($data);
							//echo "</pre>";
							?>
							
							<table class="table table-responsive-sm table-bordered table-striped table-sm">
							<thead>
								<tr>
									<th>Title</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if($data) : ?>
							<?php foreach($data as $days) :?>
								<tr>
									
									<td><?php echo $days->title;?></td>
									<td><?php echo date("d-m-Y", strtotime($days->date));?></td>
									<td><span class="<?php echo ($days->status == 1) ? 'badge badge-success' : 'badge badge-secondary';?>"><?php echo ($days->status == 1) ? 'Active' : 'Inactive';?></span></td>
									<td>
										<?php echo anchor('Medias/edit_photo/'.$days->photo_id, 'Edit', array('title' => 'Edit', 'class' => 'btn btn-brand btn-sm btn-spotify')); ?>
										<?php echo anchor('Medias/delete_photo/'.$days->photo_id, 'Delete', array('title' => 'Delete', 'class' => 'btn btn-brand btn-sm btn-google-plus', 'onclick' => "return confirm('Do you want delete this record')")); ?>
									</td>
								</tr>
							<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="5">No record</td>
							</tr>
							<?php endif;?>
							</tbody>
							</table>
							<nav>
								<?php echo $links; ?>
							</nav>
						</div>
					</div>
				</div>
				<!-- /.col-->
            </div>
            <!-- /.row-->
	</div>
</div>