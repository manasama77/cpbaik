<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?=site_url('/');?>">Beranda</a></li>
      <li>Tentang Kami</li>
    </div>
  </div>
</div>

<div class="aboutus">
  <div class="container">
    <?php
    foreach ($tentang->result() as $key) {
    ?>
      <h3><?=$key->judul;?></h3>
      <hr>
      <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="<?=base_url();?>assets/img/tentang/<?=$key->banner;?>" class="img-responsive img-thumbnail" width="500px">
        <p><?=$key->isi1;?></p>
      </div>
      <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="skill">
          <p><?=$key->isi2;?></p>

        </div>
      </div>
    <?php } ?>
  </div>
</div>