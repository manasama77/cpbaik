<?php
foreach ($arr->result() as $key) {
?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800">
    <i class="fas fa-fw fa-edit"></i> Edit Berita Baik
    <div class="float-right">
      <a href="<?=site_url('admin/berita/index');?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-fw fa-backward"></i> Kembali ke List Berita Baik
      </a>
    </div>
  </h1>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form</h6>
        </div>
        <div class="card-body">
          <form id="formedit" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$key->id;?>" readonly>
            <input type="hidden" class="form-control" id="prev_gambar" name="prev_gambar" value="<?=$key->gambar;?>" readonly>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" value="<?=$key->judul;?>" required autofocus>
            </div>
            <div class="form-group">
              <label for="isi">Isi</label>
              <textarea class="form-control" id="isi" name="isi" rows="10" required><?=$key->isi;?></textarea>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <br>
              <img src="<?=base_url('assets/img/berita/'.$key->gambar);?>" class="img-thumbnail img-responsive" width="200px">
              <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="form-group">
              <label for="gambar" class="sr-only">Gambar</label>
              <button type="submit" class="btn btn-primary btn-block">Edit Berita Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>

</div>
<?php } ?>