
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengarang
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengarang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?= form_open_multipart(base_url().'admin/update_penerbit/'.$penerbit->id_penerbit); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama...." value="<?= $penerbit->nama_penerbit ?>">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control"><?= $penerbit->alamat ?></textarea>
              </div>
              <div class="form-group">
                <label for="no">No Telp</label>
                <input type="number" name="no" class="form-control" id="no" value="<?= $penerbit->no_tlp ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-warning">Reset</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          <?= form_close(); ?>
         </div>
    </div>
    </div>
  </section>
  </div>
