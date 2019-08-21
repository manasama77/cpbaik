<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?=site_url('/');?>">Beranda</a></li>
      <li>Hubungi Kami</li>
    </div>
  </div>
</div>

<div class="aboutus">
  <div class="container">
      <h3>Hubungi Kami</h3>
      <hr>
      <?php
      if($this->session->flashdata('status') == 'ok'){
      ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Kirim Pesan Berhasil, Terima Kasih</strong>
        </div>
      <?php
      }else{
      ?>
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Kirim Pesan Gagal, Silahkan Coba Kembali</strong>
        </div>
      <?php
      }
      ?>
      <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <?php echo validation_errors(); ?>
        <form class="form" method="post" action="<?=site_url('hubungi/index');?>">
          <div class="form-group">
            <label for="nama" style="color:#000;">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required autofocus>
          </div>
          <div class="form-group">
            <label for="email" style="color:#000;">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="pesan" style="color:#000;">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </div>
        </form>
      </div>
  </div>
</div>