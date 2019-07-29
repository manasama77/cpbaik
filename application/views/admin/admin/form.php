<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800">
    <i class="fas fa-fw fa-plus"></i> Buat User Baru
    <div class="float-right">
      <a href="<?=site_url('admin/user/index');?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-fw fa-backward"></i> Kembali ke List User
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
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>
            <div class="form-group">
              <label for="keypass">Password</label>
              <input type="password" class="form-control" id="keypass" name="keypass" required>
            </div>
            <div class="form-group">
              <label for="keypass2">Re-Password</label>
              <input type="password" class="form-control" id="keypass2" name="keypass2" required>
            </div>
            <div class="form-group">
              <button id="x" type="submit" class="btn btn-primary btn-block">Buat User Baru</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>

</div>