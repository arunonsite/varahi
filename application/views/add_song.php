<?php
if($this->session->userdata('logged_in') == FALSE) {
  //$this->session->set_flashdata('error','<p class="alert alert-danger">Please login to view this page.</p>');
  redirect('login');
  exit;
}
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-group" style="margin-top: 100px;">
        <div class="card p-4">
          <div class="card-body">
            <h1>Add Song</h1>
            <p style="color:red;">
        		<?php
        			if(isset($error_message)){
        				echo $error_message;
        			}
        		?>
		        </p>
        		<p style="color:green;">
        		<?php 
        			if(isset($success_message)){
        				echo $success_message;
        			}
        		?>
        		</p>
		        <?php echo form_open_multipart('Medias/add_song'); ?>
            <div class="input-group mb-4">
              <?php echo form_input(['name'=>'title', 'class' => 'form-control ' . (empty(form_error('title')) ? "" : "is-invalid"), 'placeholder' => 'Title', 'id' => 'title', 'type' => 'text' ]); ?>
		          <div class="invalid-feedback"><?php echo form_error('title');?></div>
            </div>
		        <div class="input-group mb-4">
              <?php echo form_textarea(['name'=>'description', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description', 'type' => 'textarea' ]); ?>
            </div>
            <div class="input-group mb-4">
              <?php //echo form_input(['name'=>'photo_name', 'class' => 'form-control', 'placeholder' => 'Photo', 'id' => 'photo_name', 'type' => 'file']); ?>
              <input type = "file" name = "song_name" size = "20" /> 
            </div>
            <div class="row">
              <div class="col-6">                    
                <?php echo form_submit(['name'=>'submit', 'class' => 'btn btn-primary px-4', 'value' => 'Submit', 'type' => 'submit' ]); ?>
                <?php echo anchor('Medias/songs', 'Back', array('title' => 'Back', 'class' => 'btn btn-primary')); ?>
              </div>
            </div>
		        <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>