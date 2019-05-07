
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Anggota
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?= form_open_multipart(base_url().'admin/update_anggota/'.$anggota->id_anggota); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama...." value="<?= $anggota->nama_anggota ?>">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email...." value="<?= $anggota->email_anggota ?>">
              </div>
              <div class="form-group" >
                <label for="jk">Jenis Kelamin</label>
                <select  name="jk" class="form-control" id="jk">
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="foto">Foto</label>
                <img src="<?= base_url().'assets/img/'.$anggota->photo_anggota ?>" style="width:60px; higth:60px;" alt="">
                <input type="file" name="foto" class="form-control" id="foto">
              </div>
              <div class="form-group">
                <label for="tgl-lahir">Tanggal Lahir</label>
                <input type="date" name="tgl-lahir" class="form-control" id="tgl-lahir" value="<?= $anggota->tgl_lahir_anggota ?>">
              </div>
              <div class="form-group">
                <label for="no">No HP</label>
                <input type="number" name="no" class="form-control" id="no" value="<?= $anggota->no_hp_anggota ?>">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat"><?= $anggota->alamat_anggota ?></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-warning">Reset</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          <?= form_close(); ?>
           <!-- /.box-body -->
         </div>
    </div>
    </div>
  </section>
  </div>
