<div class="lates">
  <div class="container">
    <div class="col-md-12">
      <div class="text-center">
        <h2>Mengenal Lebih Dekat Dengan BAIK</h2>
      </div>
      <?php
      if($arr_profile->num_rows() == '0'){
        $disabled = 'true';
        echo '<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><h3 class="text-center">Tidak Ada Berita</h3></div>';
      }else{
        $disabled = 'false';
        $delay = 300;
        foreach ($arr_profile->result() as $key) {
          $thumbnail = base_url('assets/img/berita/'.$key->gambar);
      ?>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="<?=$delay;?>ms">
          <img src="<?=$thumbnail;?>" class="img-responsive img-thumbnail" />
          <h3><?=$key->judul;?></h3>
        </div>
      <?php
          $delay += 300;
        }
      }
      ?>

    </div>

  </div>
</div>