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
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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
    <!--script src="<?=base_url('assets/');?>js/jquery-migrate.min.js"></script-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url('assets/');?>js/jquery.isotope.min.js"></script>
    <script src="<?=base_url('assets/');?>js/wow.min.js"></script>
    <script src="<?=base_url('assets/');?>js/functions.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.single-item').slick({
          mobileFirst: true,
          adaptiveHeight: true,
          infinite:true,
          autoplay: true,
          autoplaySpeed: 4000,
          slideToShow:1,
          slideToScroll:1,
          dots: false,
          fade: true,
          cssEase: 'linear',
          arrows: false,
        });
      });
    </script>

  </body>

  </html>
