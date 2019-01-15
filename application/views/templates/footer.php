      </main>      
    </div>
    <footer class="app-footer" <?php if(!$this->session->userdata('logged_in')): ?> style="margin-left: 0;"<?php endif;?>>
      <div>
        <a href="<?php echo site_url("home");?>">Temple</a>
        <span>&copy; 2018</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="<?php echo site_url("home");?>">Temple</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <!--<script src="https://coreui.io/demo/vendors/pace-progress/js/pace.min.js"></script>-->
    <!--<script src="https://coreui.io/demo/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/popper.min.js" ></script> <!-- For Dashboard Icon dropdown-->
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/coreui.min.js" ></script>
  </body>
</html>