
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
            <?php if($this->session->flashdata('alert-gagal')): ?>
            <script type="text/javascript">
            Swal.fire({
                  title: 'Gagal!',
                  html: "<?= preg_replace("/\r|\n/", "", $this->session->flashdata('alert-gagal')) ?>",
                  type: 'error',
                  confirmButtonText: 'OKE'
                })
            </script>
          <?php elseif($this->session->flashdata('alert-berhasil')): ?>
            <script type="text/javascript">

            Swal.fire({
                  title: 'Berhasil!',
                  html: "<?= preg_replace("/\r|\n/", "", $this->session->flashdata('alert-berhasil')) ?>",
                  type: 'success',
                  confirmButtonText: 'OKE'
                })
            </script>
          <?php endif; ?>
               <div class="box-header">
                 <h3 class="box-title">List Pinjam Buku</h3>
                 <button type="button" name="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus"></i> Add Pinjam Buku</button>
              </div>
              <!-- /.box-header -->
               <div class="box-body">
                 <table id="table" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Denda</th>
                    <th>Petugas</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                 <?php foreach ($pinjam as $key => $a_item):?>
                  <tr>
                    <td><?= $a_item->nama_anggota ?></td>
                    <td><?= $a_item->nama_buku ?></td>
                    <td><?= $a_item->tgl_pinjaman ?></td>
                    <td><?= $a_item->tgl_kembali ?></td>
                    <td><?= $a_item->denda_telat ?></td>
                    <td><?= $a_item->nama_petugas ?></td>
                    <td>
                      <a href="<?= base_url() ?>admin/edit_pinjaman/<?= $a_item->id_pinjaman ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url() ?>admin/delete/pinjaman/<?= $a_item->id_pinjaman ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                 </table>
               </div>
               <script type="text/javascript">
                function delete_btn(e){
                  var link = e.target.getAttribute('href');
                  e.preventDefault();
                   Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        window.location = link;
                      }
                    })
                 }

               </script>
           <!-- /.box-body -->
         </div>
    </div>
    </div>
  </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Pinjam Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_pinjaman'); ?>
          <div class="modal-body">
            <div class="form-group" >
              <label for="anggota">Anggota</label>
              <select  name="anggota" class="form-control" id="anggota">
              <?php foreach ($anggota as $key => $a): ?>
                <option value="<?= $a->id_anggota ?>"><?= $a->nama_anggota ?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group" >
              <label for="kb">Kode Buku</label>
              <select  name="kb" class="form-control" id="kb">
                <?php foreach ($buku as $key => $a): ?>
                  <?php if($a->jumlah_buku > 1): ?>
                  <option value="<?= $a->kode_buku ?>"><?= $a->nama_buku ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="tp">Tanggal Pinjam</label>
              <input type="date" name="tp" class="form-control" id="tp">
            </div>
            <div class="form-group">
              <label for="tk">Tanggal Kembali</label>
              <input type="date" name="tk" class="form-control" id="tk">
            </div>
            <div class="form-group">
              <label for="denda">Denda</label>
              <input type="text" name="denda" class="form-control" id="denda">
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
  </div>
