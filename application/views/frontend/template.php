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
  <!--link rel="stylesheet" type="text/css" href="<?=site_url('');?>assets/css/slick.css"/-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
    ======================================================= -->
    <link rel="icon" href="<?=site_url('logo_sm.png');?>">
    <style>
      .borderless td, .borderless th {
        border: none !important;
      }

      .nav-tabs > li > a {
        padding-top:15px !important;
        padding-bottom:4px !important;
      }

      @media (max-width: 767px) {
        .navbar-brand { padding-top: 15px !important;
      }

      #main-slider .carousel .item {
        height:auto !important;
      }
    </style>
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
    <script src="<?=base_url('assets/');?>js/jquery.number.min.js"></script>
    <script src="<?=base_url();?>vendor/blockui/jquery.blockUI.js"></script>
    <!--script type="text/javascript" src="<?=site_url();?>assets/js/slick.min.js"></script-->
    <script>
      $(document).ready(function(){

        $("#myCarousel").carousel({
          interval: 6000,
          pause: "hover"
        });

        /*$('.single-item').slick({
          adaptiveHeight: true,
          infinite:true,
          autoplay: true,
          autoplaySpeed: 2000,
          slideToShow:1,
          slideToScroll:1,
          dots: false,
          fade: true,
          cssEase: 'linear',
          arrows: false,
        });*/

        /*$.ajax({
          url         : '<?=site_url('beranda/sirkah');?>',
          method      : 'GET',
          dataType    : 'JSON',
          beforeSend  : function(){
            $('#jumlah_anggota_block').block({ message: 'Please Wait' });
            $('#outstanding_block').block({ message: 'Please Wait' });
            $('#par_block').block({ message: 'Please Wait' });
          },
          statusCode  : {
            404: function() {
              $('#jumlah_anggota_block').unblock();
              $('#outstanding_block').unblock();
              $('#par_block').unblock();
              generateToast('Warning', 'Page Not Found.', 'error');
            },
            500: function() {
              $('#jumlah_anggota_block').unblock();
              $('#outstanding_block').unblock();
              $('#par_block').unblock();
              generateToast('Warning', 'Not connect with databasae.', 'error');
            }
          }
        })
        .done(function(result){
          console.log(result);
          var jumlahanggota = $.number(result.get_count_anggota[0].count, 0);
          $('#jumlah_anggota').text(jumlahanggota);

          var rawoutstanding = parseInt(result.get_outstanding[0].sum) / 1000000;
          var outstanding = $.number(rawoutstanding, 2);
          $('#outstanding').text(outstanding + ' JUTA');

          var rawpar = (parseInt(result.get_count_par_lancar[0].count) / parseInt(result.get_count_par_all[0].count)) * 100;
          var par = $.number(rawpar, 2);
          $('#par').text(par + ' %');

          $('#jumlah_anggota_block').unblock();
          $('#outstanding_block').unblock();
          $('#par_block').unblock();
        });*/

      });

      function generateToast(heading, message, color){
        $.toast({
          text: message,
          heading: heading,
          icon: color,
          showHideTransition: 'slide',
          allowToastClose: true,
          hideAfter: 5000,
          stack: 5,
          position: 'bottom-right',
          textAlign: 'left',
          loader: true,
          loaderBg: '#9EC600',    
        });
      }

      function addCommas(nStr)
      {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
          x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
      }
    </script>

  </body>

  </html>
