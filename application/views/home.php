<?php
if($this->session->userdata('logged_in') == FALSE) {
	//$this->session->set_flashdata('error','<p class="alert alert-danger">Please login to view this page.</p>');
	redirect('login');
	exit;
}
?>
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
	<a href="<?php echo site_url("home");?>">Home</a>
  </li>
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
	<div class="row">
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-primary">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("my_profile");?>">Edit my profile</a>
			  </div>
			</div>
			<div>My Profile</div>
			<div class="text-value">&nbsp;</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-info">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
				<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="icon-settings"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="<?php echo site_url("Rituals/add_daily_ritual");?>">Add Today Rituals</a>
				</div>
			</div>
			<div class="text-value"><?php echo $daily_ritual_count;?></div>
			<div>Today Rituals</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-warning">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("Rituals/add_monthly_ritual");?>">Add Monthly Rituals</a>
			  </div>
			</div>
			<div class="text-value"><?php echo $monthly_ritual_count;?></div>
			<div>Monthly Rituals</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-danger">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("Happenings/index");?>">Add Monthly Important days</a>
			  </div>
			</div>
			<div class="text-value"><?php echo $important_days_count;?></div>
			<div>Monthly Important days</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	</div>
	<!-- /.row-->
	
	<div class="row">
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-primary">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("Medias/add_photo");?>">Upload Photos</a>
			  </div>
			</div>
			<div class="text-value"><?php echo $photo_count;?></div>
			<div>Upload Photos</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-info">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
				<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="icon-settings"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="<?php echo site_url("Medias/add_video");?>">Embed youtube videos</a>
				</div>
			</div>
			<div class="text-value"><?php echo $video_count;?></div>
			<div>Youtube Videos</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-warning">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("Medias/add_song");?>">Add Songs</a>
			  </div>
			</div>
			<div class="text-value"><?php echo $song_count;?></div>
			<div>Add Songs</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	  <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-danger">
		  <div class="card-body pb-0">
			<div class="btn-group float-right">
			  <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="icon-settings"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?php echo site_url("Medias/add_mantra");?>">Add Mantra</a>
			  </div>
			</div>
			<div class="text-value"><?php echo $mantra_count;?></div>
			<div>Mantras</div>
		  </div>
		  <div style="height:85px;">
			&nbsp;
		  </div>
		</div>
	  </div>
	  <!-- /.col-->
	</div>
	<!-- /.row-->
	
  </div>
</div>