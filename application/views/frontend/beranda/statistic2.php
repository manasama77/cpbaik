<div class="feature" style="padding:5px !important;">
  <div class="container">
    <div class="text-center">
      <div class="col-md-4" id="jumlah_anggota_block">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <!--i class="fa fa-users"></i-->
          <?php
          $get_count_anggota  = $sirkah['get_count_anggota'][0]->count;
          $get_outstanding    = $sirkah['get_outstanding'][0]->sum / 1000000;
          $get_angsuran_tepat = ($sirkah['get_count_par_lancar'][0]->count / $sirkah['get_count_par_all'][0]->count) * 100;
          ?>
          <h1 id="jumlah_anggota" class="text-success" style="font-size:31px !important; margin-top:10px; margin-bottom:0px;"><?=number_format($get_count_anggota,0);?></h1>
          <h3 style="font-size:21px !important; margin-top:2px; margin-bottom:0px;">Jumlah Anggota</h3>
        </div>
      </div>
      <div class="col-md-4" id="outstanding_block">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <!--i class="fa fa-money"></i-->
          <h1 id="outstanding" class="text-success" style="font-size:31px !important; margin-top:10px; margin-bottom:0px;"><?=number_format($get_outstanding,0);?> JUTA</h1>
          <h3 style="font-size:21px !important; margin-top:2px; margin-bottom:0px;">Outstanding Pembiayaan</h3>
        </div>
      </div>
      <div class="col-md-4" id="par_block">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <!--i class="fa fa-clock-o"></i-->
          <h1 id="par" class="text-success" style="font-size:31px !important; margin-top:10px; margin-bottom:0px;"><?=number_format($get_angsuran_tepat,2);?> %</h1>
          <h3 style="font-size:21px !important; margin-top:2px; margin-bottom:0px;">Angsuran Tepat Waktu</h3>
        </div>
      </div>
    </div>
  </div>
</div>