
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buku
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?= form_open_multipart(base_url().'admin/update_buku/'.$buku->kode_buku); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode...." value="<?= $buku->kode_buku  ?>">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama...." value="<?= $buku->nama_buku  ?>">
              </div>
              <div class="form-group">
                <label for="jml">Jumlah</label>
                <input type="number" name="jml" class="form-control" id="jml" placeholder="jml...." value="<?= $buku->jumlah_buku  ?>">
              </div>
              <div class="form-group">
                <label for="tgl">Tanggal Pengadaan</label>
                <input type="date" name="tgl" class="form-control" id="tgl"  value="<?= $buku->tanggal_pengadaan  ?>">
              </div>
              <div class="form-group" >
                <label for="pengarang">Pengarang</label>
                <select  name="pengarang" class="form-control" id="pengarang">
                  <?php foreach ($pengarang as $key => $p_item):?>
                    <option value="<?= $p_item->id_pengarang ?>" <?= ($buku->id_pengarang == $p_item->id_pengarang?'selected':'') ?>><?= $p_item->nama_pengarang ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group" >
                <label for="penerbit">Penerbit</label>
                <select  name="penerbit" class="form-control" id="penerbit">
                <?php foreach ($penerbit as $key => $p_item):?>
                  <option value="<?= $p_item->id_penerbit ?>"  <?= ($buku->id_penerbit == $p_item->id_penerbit?'selected':'') ?>><?= $p_item->nama_penerbit ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group" >
                <label for="rak">Rak Buku</label>
                <input type="text" name="rak" class="form-control" id="rak"  value="<?= $buku->kode_rak  ?>">
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
