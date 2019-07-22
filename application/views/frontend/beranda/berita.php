<div class="lates">
  <div class="container">
    <div class="col-md-6">
      <div class="text-center">
        <h2>Berita BAIK <?php echo $arr_berita->num_rows(); ?></h2>
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
          <img src="<?=$thumbnail;?>" class="img-responsive" />
          <h3><?=$key->judul;?></h3>
          <p>
            <?php
            echo mb_strimwidth($key->isi, 0, 200, "...");
            ?>
          </p>
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
      <div class="col-md-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="1200ms">
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/7QU1nvuxaMA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
      </div>

      <div class="col-md-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="1500ms">
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7QU1nvuxaMA"></iframe>
        </div>
        <br>
      </div>

      <div class="col-md-12 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1700ms">
        <button class="btn btn-info">Lihat Semua Kisah</button>
      </div>

    </div>
  </div>
</div>