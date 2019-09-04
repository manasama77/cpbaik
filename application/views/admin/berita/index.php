<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    Berita Baik
    <div class="float-right">
      <a href="<?=site_url('backend/berita/create');?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Buat Berita Baik
      </a>
    </div>
  </h1>

  <div class="row">

    <div class="col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List Berita Baik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-inverse">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Judul</th>
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
                    <td><?=$key->created_name;?></td>
                    <td><?=$key->created_date;?></td>
                    <td class="text-center"><?=$status;?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm lihat" data-id="<?=$key->id;?>">
                          <i class="fas fa-newspaper"></i> Lihat
                        </button>
                        <?php
                        if($key->status == '0'){
                          ?>
                          <button type="button" class="btn btn-info btn-sm" onClick="verify('<?=$key->id;?>', '<?=$key->judul;?>', '<?=$key->status;?>');">
                            <i class="fas fa-thumbs-up"></i> Terbitkan
                          </button>
                          <?php
                        }else{
                          ?>
                          <button type="button" class="btn btn-warning btn-sm" onClick="verify('<?=$key->id;?>', '<?=$key->judul;?>', '<?=$key->status;?>');">
                            <i class="fas fa-thumbs-down"></i> Turunkan
                          </button>
                          <?php
                        }
                        ?>
                        <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?=$key->id;?>', '<?=$key->judul;?>');">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onClick="edit('<?=$key->id;?>', '<?=$key->judul;?>');">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                      </div>
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

</div>

<!-- Modal -->
<div class="modal fade" id="lihatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" id="jlihat">Detail Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="vlihat">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>