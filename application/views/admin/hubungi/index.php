<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    Buku Tamu
  </h1>

  <div class="row">

    <div class="col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">List Buku Tamu</h6>
        </div>
        <div class="card-body">
          <table class="table table-inverse">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Created Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($arr_bukutamu->result() as $key) {
              ?>
                <tr>
                  <td><?=$key->id;?></td>
                  <td><?=$key->nama;?></td>
                  <td><?=$key->email;?></td>
                  <td><?=$key->pesan;?></td>
                  <td><?=$key->created_date;?></td>
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