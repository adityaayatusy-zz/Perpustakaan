
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Anggota
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anggota</li>
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
                 <h3 class="box-title">List Anggota</h3>
                 <button type="button" name="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus"></i> Add Anggota</button>
                 <a href="<?= base_url() ?>admin/exel/anggota" class="btn btn-warning btn-sm"><i class="fa fa-file"></i> Export Exel</a>
               </div>
              <!-- /.box-header -->
               <div class="box-body">
                 <table id="table" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                 <?php foreach ($anggota as $key => $a_item):?>
                  <tr>
                    <td><?= $a_item->nama_anggota ?></td>
                    <td><?= $a_item->jk_anggota ?></td>
                    <td><?= $a_item->alamat_anggota ?></td>
                    <td><?= $a_item->email_anggota ?></td>
                    <td><?= $a_item->no_hp_anggota ?></td>
                    <td>
                      <a href="<?= base_url() ?>admin/see_anggota/<?= $a_item->id_anggota ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
                      <a href="<?= base_url() ?>admin/edit_anggota/<?= $a_item->id_anggota ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url() ?>admin/delete/anggota/<?= $a_item->id_anggota ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Input Anggota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_anggota'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email....">
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
              <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <div class="form-group">
              <label for="tgl-lahir">Tanggal Lahir</label>
              <input type="date" name="tgl-lahir" class="form-control" id="tgl-lahir">
            </div>
            <div class="form-group">
              <label for="no">No HP</label>
              <input type="number" name="no" class="form-control" id="no">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control" id="alamat"></textarea>
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
