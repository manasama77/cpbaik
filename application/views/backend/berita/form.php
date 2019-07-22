<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800">
    <i class="fas fa-fw fa-plus"></i> Buat Berita Baik
    <div class="float-right">
      <button type="button" class="btn btn-secondary btn-sm">
        <i class="fas fa-fw fa-backward"></i> Kembali ke List Berita Baik
      </button>
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
          <form id="form" enctype="multipart/form-data">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" required autofocus>
            </div>
            <div class="form-group">
              <label for="isi">Isi</label>
              <textarea class="form-control" id="isi" name="isi" required></textarea>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="form-group">
              <label for="gambar" class="sr-only">Gambar</label>
              <button type="submit" class="btn btn-primary btn-block">Buat Berita Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>

</div>