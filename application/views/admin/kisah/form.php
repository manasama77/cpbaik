<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800">
    <i class="fas fa-fw fa-plus"></i> Buat Kisah Baik
    <div class="float-right">
      <a href="<?=site_url('backend/kisah/index');?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-fw fa-backward"></i> Kembali ke List Kisah Baik
      </a>
    </div>
  </h1>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form</h6>
        </div>
        <div class="card-body">
          <form id="form">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" required autofocus>
            </div>
            <div class="form-group">
              <label for="isi">Link Video</label>
              <input type="text" class="form-control" id="video" name="video" required>
            </div>
            <div class="form-group">
              <div class="alert alert-info" role="alert">
                <h4>Cara mengambil link video Youtube <i class="fas fa-question"></i></h4><hr>Untuk menyisipkan video Youtube cukup dengan <b>Copy</b> text pada Address Bar, seperti gambar berikut<br><img src="<?=base_url();?>assets/img/how youtube.png" class="img-responsive img-thumbnail"><br>Lalu <b>Paste</b> pada form diatas.
              </div>
              <button type="submit" class="btn btn-primary btn-block">Buat Kisah Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>

</div>