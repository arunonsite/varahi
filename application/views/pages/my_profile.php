	<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group" style="margin-top: 100px;">
            <div class="card p-4">
              <div class="card-body">
                <h1>My Profile</h1>
                <p class="text-muted">Change Password</p>
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
				<?php echo form_open('Login/change_password'); ?>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control <?php echo (empty(form_error('password')) ? "" : 'is-invalid');?>" type="password" name="password" id="password" placeholder="Password">
				  <div class="invalid-feedback"><?php echo form_error('password');?></div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Change Password</button>
                  </div>
                </div>
				<?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>