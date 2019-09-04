<div class="lates">
  <div class="container">
    <div class="col-md-6">
      <div class="text-center">
        <h2>Berita BAIK</h2>
      </div>
      <?php
      if($arr_berita->num_rows() == '0'){
        $disabled = 'true';
        echo '<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><h3 class="text-center">Tidak Ada Berita</h3></div>';
      }else{
        $disabled = 'false';
        $delay = 300;
        foreach ($arr_berita->result() as $key) {
          $thumbnail = base_url('assets/img/berita/'.$key->gambar);
      ?>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="<?=$delay;?>ms">
          <a href="<?=site_url('berita/read/'.$key->id);?>">
            <img src="<?=$thumbnail;?>" class="img-responsive img-thumbnail" />
            <h3><?=$key->judul;?></h3>
            <p><?=$key->sekilas;?></p>
          </a>
        </div>
      <?php
          $delay += 300;
        }
      }
      ?>

      <?php
      if($disabled == 'false'){
      ?>
        <div class="col-md-12 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1100ms">
          <a href="<?=site_url('berita');?>" class="btn btn-info">Lihat Semua Berita</a>
        </div>
      <?php
      }
      ?>

    </div>
    <div class="col-md-6">
      <div class="text-center">
        <h2>Kisah BAIK</h2>
      </div>
      <?php
      if($arr_kisah->num_rows() == '0'){
        $disabled = 'true';
        echo '<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms"><h3 class="text-center">Tidak Ada Kisah</h3></div>';
      }else{
        foreach ($arr_kisah->result() as $key) {
      ?>
        <div class="col-md-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="1200ms">
          <h3><?=$key->judul;?></h3>
          <!-- 16:9 aspect ratio -->
          <div class="embed-responsive embed-responsive-16by9">
            <iframe id="player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/<?=$key->video;?>?enablejsapi=1&origin=http://example.com" frameborder="3" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
          </div>
          <br>
        </div>
      <?php 
        }
      } 
      ?>

      <div class="col-md-12 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1700ms">
        <a href="<?=site_url('berita');?>" class="btn btn-info">Lihat Semua Kisah</a>
      </div>

    </div>
  </div>
</div>