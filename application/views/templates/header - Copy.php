<?php

?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Temple">
    <meta name="keyword" content="Temple">
    <title>Temple</title>
    <!-- Icons-->
    <!--<link href="https://coreui.io/demo/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">-->
    <!--<link href="https://coreui.io/demo/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php //echo base_url();?>css/font-awesome.min.css" rel="stylesheet">-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <!--<link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">-->
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url("home");?>">
        <!--Temple-->
      </a>
	  <?php if($this->session->userdata('logged_in')): ?>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("home");?>">Dashboard</a>
        </li>
		<li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Rituals/daily_rituals");?>">Today Rituals</a>
        </li>
		<li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Rituals/monthly_rituals");?>">Monthly Rituals</a>
        </li>
		<li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Happenings/monthly_important_days");?>">Monthly Important days</a>
        </li>
		<li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Medias/photos");?>">Upload Photos</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Medias/videos");?>">Youtube Videos</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("Medias/songs");?>">Songs</a>
        </li>
		<li class="nav-item px-3">
          <a class="nav-link" href="<?php echo site_url("News/news");?>">Latest News</a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">        
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="<?php echo base_url();?>img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
          </a>
          <div class="dropdown-menu dropdown-menu-right">            
            <div class="dropdown-header text-center">
              <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="<?php echo site_url("my_profile");?>">
              <i class="fa fa-user"></i> Profile</a>            
            <a class="dropdown-item" href="<?php echo site_url("Login/logout"); ?>">
              <i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
      </ul>
	  <?php endif;?>
    </header>
    <div class="app-body">
		<?php if($this->session->userdata('logged_in')): ?>
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("home");?>">
                <i class="nav-icon icon-speedometer"></i> Dashboard
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Rituals/daily_rituals");?>">
                <i class="nav-icon icon-speedometer"></i> Today Rituals
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Rituals/monthly_rituals");?>">
                <i class="nav-icon icon-speedometer"></i> Monthly Rituals
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Happenings/monthly_important_days");?>">
                <i class="nav-icon icon-speedometer"></i> Monthly Important days
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Medias/photos");?>">
                <i class="nav-icon icon-speedometer"></i> Upload Photos
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Medias/videos");?>">
                <i class="nav-icon icon-speedometer"></i> Video
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Medias/songs");?>">
                <i class="nav-icon icon-speedometer"></i> Songs
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("News/news");?>">
                <i class="nav-icon icon-speedometer"></i> Latest News
                <!--<span class="badge badge-primary">NEW</span>-->
              </a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
		<?php endif;?>
      <main class="main" <?php if(!$this->session->userdata('logged_in')): ?> style="margin-left:0;" <?php endif;?>>
 
