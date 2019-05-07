
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
                 <h3 class="box-title">List Petugas</h3>
                 <button type="button" name="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus"></i> Add Petugas</button>
               </div>
              <!-- /.box-header -->
               <div class="box-body">
                 <table id="table" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>password</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                 <?php foreach ($petugas as $key => $p_item):?>
                  <tr>
                    <td><?= $p_item->nama_petugas ?></td>
                    <td><?= $p_item->email_petugas ?></td>
                    <td><?= substr($p_item->password_petugas,0,20) ?>....</td>
                    <td>
                      <a href="<?= base_url() ?>admin/edit_petugas/<?= $p_item->id_petugas ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url() ?>admin/delete/petugas/<?= $p_item->id_petugas ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Petugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_petugas'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email....">
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
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
