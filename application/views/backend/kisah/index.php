<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    Kisah Baik
    <div class="float-right">
      <a href="<?=site_url('backend/kisah/create');?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Buat Kisah Baik
      </a>
    </div>
  </h1>

  <div class="row">

    <div class="col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List Kisah Baik</h6>
        </div>
        <div class="card-body">
          <table class="table table-inverse">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Video</th>
                <th>Creator</th>
                <th>Created Date</th>
                <th class="text-center">Status</th>
                <th class="text-center"><i class="fas fa-cogs"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($arr_berita->result() as $key) {
                $status = 'Tidak Aktif';
                if($key->status == '1'){ $status = 'Aktif'; }
              ?>
                <tr>
                  <td><?=$key->id;?></td>
                  <td><?=$key->judul;?></td>
                  <td><?=$key->video;?></td>
                  <td><?=$key->created_name;?></td>
                  <td><?=$key->created_date;?></td>
                  <td class="text-center"><?=$status;?></td>
                  <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?=$key->id;?>', '<?=$key->judul;?>');">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </td>
                </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>
          <?=$this->pagination->create_links();?>
        </div>
      </div>

    </div>

  </div>

</div>