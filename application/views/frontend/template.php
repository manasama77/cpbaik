<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title;?></title>

  <!-- Bootstrap -->
  <link href="<?=base_url('assets/');?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/');?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/');?>css/animate.css">
  <link href="<?=base_url('assets/');?>css/prettyPhoto.css" rel="stylesheet">
  <link href="<?=base_url('assets/');?>css/style.css" rel="stylesheet" />
  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <?php $this->load->view('frontend/partials/header'); ?>
  <?php $this->load->view('frontend/'.$content); ?>
  <?php $this->load->view('frontend/partials/footer'); ?>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?=base_url('assets/');?>js/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>js/jquery-migrate.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/');?>js/jquery.prettyPhoto.js"></script>
  <script src="<?=base_url('assets/');?>js/jquery.isotope.min.js"></script>
  <script src="<?=base_url('assets/');?>js/wow.min.js"></script>
  <script src="<?=base_url('assets/');?>js/functions.js"></script>

</body>

</html>