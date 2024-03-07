<!doctype html>
<html lang="en" dir="ltr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Isport - Result Alfamart Run 2023</title>

   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

   <!-- inject:css-->

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/bootstrap/bootstrap.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/fontawesome.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/footable.standalone.min.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/jquery-jvectormap-2.0.5.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/jquery.mCustomScrollbar.min.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/assets/vendor_assets/css/line-awesome.min.css">

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/style.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets-frontend/app.css">

   <!-- endinject -->

   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets-frontend/img/favicon.ico">

   <!-- Fonts -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="layout-light side-menu">

   <div class="mobile-author-actions"></div>

   <header class="header-top">
      <nav class="navbar navbar-light">
         <div class="navbar-left">
            <div class="logo-area">
               <a class="navbar-brand" href="<?php echo base_url('home'); ?>">
                  <img class="dark img-fluid" src="<?php echo base_url(); ?>assets-frontend/img/logo-alfa.png" alt="logo">
                  <img class="light img-fluid" src="<?php echo base_url(); ?>assets-frontend/img/logo-alfa.png" alt="logo">
               </a>
               
            </div>
         </div>
         <!-- ends: navbar-left -->
         <div class="navbar-right">
            <ul class="navbar-right__menu">
               <li class="nav-flag-select">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle">
                        5KM
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper dropdown-wrapper--small">
                           <a href="<?= base_url('result/male_5k') ?>">Male</a>
                           <a href="<?= base_url('result/female_5k') ?>">Female</a>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-flag-select">
                  <div class="dropdown-custom">
                     <a href="javascript:;" class="nav-item-toggle">
                        10KM
                     </a>
                     <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper dropdown-wrapper--small">
                           <a href="<?= base_url('result/male_10k') ?>">Male</a>
                           <a href="<?= base_url('result/female_10k') ?>">Female</a>
                        </div>
                     </div>
                  </div>
               </li>
               <!-- ends: .nav-flag-select -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
               <a href="#" class="btn-author-action">
                  <img class="svg" src="<?php echo base_url(); ?>assets-frontend/img/svg/more-vertical.svg" alt="more-vertical">
               </a>
            </div>
         </div>
         <!-- ends: .navbar-right -->
      </nav>
   </header>