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
							<i class="fa fa-align-justify"></i> Monthly Important Days
						</div>
						<div class="card-body">
						<div class="col-md-2">
							<!--<a href="index" class="btn btn-primary" aria-pressed="true">Add</a>-->
							<?php echo anchor('Happenings/index', 'Add', array('title' => 'Add', 'class' => 'btn btn-primary')); ?>
						</div>
							<p style="color:red;">
							<?php //echo "<pre>"; print_r($this->session->userdata('logged_in')['user_id']);
							//echo "</pre>";
								if($this->session->flashdata('err_msg')){
									echo $this->session->flashdata('err_msg');
								}
							?>
							</p>
							<p style="color:green;">
							<?php 
								/*if(isset($success_message)){
									echo $success_message;
								}*/
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
										<?php echo anchor('Happenings/edit_monthly_important_days/'.$days->important_days_id, 'Edit', array('title' => 'Edit', 'class' => 'btn btn-brand btn-sm btn-spotify')); ?>
										<!--<a href="<?php echo site_url('Happenings/edit_monthly_important_days/'.$days->important_days_id); ?>" class="btn btn-brand btn-sm btn-spotify">
											<i class="fa fa-edit"></i>
										</a>
										<a href="javascript:void(0);" onclick="delete_item(<?php echo $days->important_days_id;?>);"  class="btn btn-brand btn-sm btn-google-plus">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</a>-->
										<?php echo anchor('Happenings/delete_monthly_important_day/'.$days->important_days_id, 'Delete', array('title' => 'Delete', 'class' => 'btn btn-brand btn-sm btn-google-plus', 'onclick' => "return confirm('Do you want delete this record')")); ?>
									</td>
								</tr>
							<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="4">No record</td>
							</tr>
							<?php endif;?>
							</tbody>
							</table>
							<nav>
								<?php echo $links; ?>
								<!--<ul class="pagination">-->
								
								<?php //foreach ($links as $link) {
									//echo "<li>". $link."</li>";
								//} ?>
									<!--<li class="page-item">
										<a class="page-link" href="#">Prev</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">4</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>-->
							</nav>
						</div>
					</div>
				</div>
				<!-- /.col-->
            </div>
            <!-- /.row-->
	</div>
</div>
<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delete_item(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"index.php/Happenings/delete_monthly_important_day/"+id;
        else
          return false;
        } 
</script>