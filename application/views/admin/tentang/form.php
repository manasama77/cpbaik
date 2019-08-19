<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800">
    <i class="fas fa-fw fa-table"></i> Tentang Kami
  </h1>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Tentang Kami</h6>
        </div>
        <div class="card-body">
          <?php
          foreach ($arr_tentang->result() as $key) {
          ?>
            <form id="form" enctype="multipart/form-data">
              <div class="form-group">
                <img id="image-preview" alt="image-preview" class="img-thumbnail" width="300px" src="<?=base_url();?>assets/img/tentang/<?=$key->banner;?>">
                <br>
                <br>
                <label for="gambar">Banner</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <input type="hidden" class="form-control" id="prev_gambar" name="prev_gambar" value="<?=$key->banner;?>">
              </div>
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?=$key->judul;?>" required autofocus>
              </div>
              <div class="form-group">
                <label for="isi">Isi 1</label>
                <textarea class="form-control" id="isi1" name="isi1" rows="10" required><?=$key->isi1;?></textarea>
              </div>
              <div class="form-group">
                <label for="isi">Isi 2</label>
                <textarea class="form-control" id="isi2" name="isi2" rows="10" required><?=$key->isi2;?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update Tentang Kami</button>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>

    </div>

  </div>

</div>