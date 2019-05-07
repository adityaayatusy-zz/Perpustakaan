
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pinjam Buku
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pinjam Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?= form_open_multipart(base_url().'admin/update_pinjaman/'.$pinjam->id_pinjaman); ?>
            <div class="modal-body">
              <div class="form-group" >
                <label for="anggota">Anggota</label>
                <select  name="anggota" class="form-control" id="anggota">
                <?php foreach ($anggota as $key => $a): ?>
                  <option value="<?= $a->id_anggota ?>" <?= ($pinjam->id_anggota== $a->id_anggota ? 'selected' : '') ?>><?= $a->nama_anggota ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group" >
                <label for="kb">Kode Buku</label>
                <select  name="kb" class="form-control" id="kb">
                  <?php foreach ($buku as $key => $a): ?>
                    <option value="<?= $a->kode_buku ?>" <?= ($pinjam->kode_buku== $a->kode_buku ? 'selected' : '') ?>><?= $a->nama_buku ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="tp">Tanggal Pinjam</label>
                <input type="date" name="tp" class="form-control" id="tp" value="<?= $pinjam->tgl_pinjaman  ?>">
              </div>
              <div class="form-group">
                <label for="tk">Tanggal Kembali</label>
                <input type="date" name="tk" class="form-control" id="tk" value="<?= $pinjam->tgl_kembali  ?>">
              </div>
              <div class="form-group">
                <label for="denda">Denda</label>
                <input type="text" name="denda" class="form-control" id="denda" value="<?= $pinjam->denda_telat  ?>">
              </div>
              <div class="form-group" >
                <label for="Petugas">Petugas</label>
                <select readonly  name="petugas" class="form-control" id="petugas">
                  <?php foreach ($petugas as $key => $a):
                    if($a->email_petugas == $this->session->userdata('email')):?>
                    <option value="<?= $a->id_petugas ?>"><?= $a->nama_petugas ?></option>
                  <?php endif; endforeach; ?>
                </select>
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
    <!-- /.content -->
  </div>
