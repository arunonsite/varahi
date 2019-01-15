	<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group" style="margin-top: 100px;">
            <div class="card p-4">
              <div class="card-body">
                <h1>Monthly Important Days</h1>
                <p style="color:red;">
				<?php //echo "<pre>"; print_r($this->session->userdata('logged_in')['user_id']);
				//echo "</pre>";
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
				<?php echo form_open('Happenings/add_monthly_important_days'); ?>
                <div class="input-group mb-4">
                  <input class="form-control <?php echo (empty(form_error('title')) ? "" : 'is-invalid');?>" type="text" name="title" id="title" placeholder="Title">
				  <div class="invalid-feedback"><?php echo form_error('title');?></div>
                </div>
				<div class="input-group mb-4">
                  <input class="form-control <?php echo (empty(form_error('date')) ? "" : 'is-invalid');?> form_datetime" type="date" name="date" id="date" placeholder="Date">
				  <div class="invalid-feedback"><?php echo form_error('date');?></div>
                </div>
				<div class="input-group mb-4">
                  <textarea class="form-control"  name="description" id="description" placeholder="Description"></textarea>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Submit</button>
                  </div>
                </div>
				<?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>