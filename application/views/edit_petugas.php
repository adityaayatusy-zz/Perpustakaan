
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Petugas
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Petugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?= form_open_multipart(base_url().'admin/update_petugas/'.$petugas->id_petugas); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama...." value="<?= $petugas->nama_petugas ?>">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email...." value="<?= $petugas->email_petugas ?>">
              </div>
              <label for="pw">Password</label>
              <div class="input-group">
                <input type="password" name="pw" class="form-control" id="pw" placeholder="Password....">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" id="see_pw"> <i class="fa fa-eye"></i></button>
                </span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-warning">Reset</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          <?= form_close(); ?>
         </div>
    </div>
    </div>
  </section>
  </div>
