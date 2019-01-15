	<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group" style="margin-top: 100px;">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <p style="color:red;">
				<?php 
					if(isset($error_message)){
						echo $error_message;
					}
				?>
				</p>
				<?php echo form_open('Login/process'); ?>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control <?php echo (empty(form_error('username')) ? "" : 'is-invalid');?>" name="username" id="username" type="text" placeholder="Username">
				  <div class="invalid-feedback"><?php echo form_error('username');?></div>
                </div>
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
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                </div>
				<?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>