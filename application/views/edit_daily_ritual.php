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
            <h1>Edit Daily Ritual</h1>
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
		        <?php echo form_open('Rituals/edit_daily_ritual/'.$data['ritual_id']); ?>
            <div class="input-group mb-4">
              <?php $title = $data['title']; echo form_input(['name'=>'title', 'class' => 'form-control ' . (empty(form_error('title')) ? "" : "is-invalid"), 'placeholder' => 'Title', 'id' => 'title', 'type' => 'text', 'value' => "$title" ]); ?>
		          <div class="invalid-feedback"><?php echo form_error('title');?></div>
            </div>
		        <div class="input-group mb-4">
              <?php $date = $data['date']; echo form_input(['name'=>'date', 'class' => 'form-control ' . (empty(form_error('date')) ? "" : "is-invalid"), 'placeholder' => 'Date', 'id' => 'date', 'type' => 'date', 'value' => "$date" ]); ?>
		          <div class="invalid-feedback"><?php echo form_error('date');?></div>
            </div>
		        <div class="input-group mb-4">
              <?php $description = $data['description']; echo form_textarea(['name'=>'description', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description', 'type' => 'textarea', 'value' => "$description" ]); ?>
            </div>
		        <div class="input-group mb-4">
            <?php 
              $status = $data['status'];
              $options = array(
                '1'         => 'Active',
                '0'           => 'Inactive'
              );
              $additional = array(
                'id' => 'status',
                'class' => 'form-control'
              );
              echo form_dropdown('status', $options, $status, $additional); 
            ?>
            </div>
            <div class="row">
              <div class="col-6">
                <?php echo form_submit(['name'=>'submit', 'class' => 'btn btn-primary px-4', 'value' => 'Submit', 'type' => 'submit' ]); ?>
                <?php echo anchor('Rituals/monthly_rituals', 'Back', array('title' => 'Back', 'class' => 'btn btn-primary')); ?>
              </div>
            </div>
		        <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>