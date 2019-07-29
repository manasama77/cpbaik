<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    User Management
    <div class="float-right">
      <a href="<?=site_url('admin/user/create');?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Buat User Baru
      </a>
    </div>
  </h1>

  <div class="row">

    <div class="col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List User</h6>
        </div>
        <div class="card-body">
          <?php
          if($this->session->flashdata('status')){
          ?>
            <div class="alert alert-info" role="alert">
              <strong><?=$this->session->flashdata('status');?></strong>.
            </div>
          <?php } ?>
          <table class="table table-inverse">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Creator</th>
                <th>Created Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Last Login</th>
                <th class="text-center"><i class="fas fa-cogs"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($arr_user->result() as $key) {
                $status = 'Tidak Aktif';
                if($key->status == '1'){ $status = 'Aktif'; }
              ?>
                <tr>
                  <td><?=$key->id;?></td>
                  <td><?=$key->username;?></td>
                  <td><?=$key->creator_name;?></td>
                  <td><?=$key->created_date;?></td>
                  <td class="text-center"><?=$status;?></td>
                  <td><?=$key->last_login;?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-sm" onClick="resetpass('<?=$key->id;?>', '<?=$key->username;?>');">
                        <i class="fas fa-key"></i> Reset Password
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" onClick="hapus('<?=$key->id;?>', '<?=$key->username;?>');">
                        <i class="fas fa-trash"></i> Hapus
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

<div class="modal fade" id="modalreset">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
      </div>
      <form class="form" method="post" action="<?=site_url('admin/user/reset');?>">
        <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <div class="form-group">
              <label for="">New Password</label>
              <input type="text" id="pass" name="pass" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Reset Password</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->