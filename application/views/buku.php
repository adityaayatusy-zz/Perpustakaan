
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
                 <h3 class="box-title">List Buku</h3>
                 <button type="button" name="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus"></i> Add Buku</button>
                 <a href="<?= base_url() ?>admin/exel/buku" class="btn btn-warning btn-sm"><i class="fa fa-file"></i> Export Exel</a>
               </div>
              <!-- /.box-header -->
               <div class="box-body">
                 <table id="table" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>pengadaan</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Rak</th>
                    <th>Action</th>

                  </tr>
                 </thead>
                 <?php foreach ($buku as $key => $a_item):?>
                  <tr>
                    <td><?= $a_item->kode_buku ?></td>
                    <td><?= $a_item->nama_buku ?></td>
                    <td><?= kurang_buku($a_item->jumlah_buku,'pinjaman_buku',['kode_buku'=>'PR123']) ?></td>
                    <td><?= $a_item->tanggal_pengadaan ?></td>
                    <td><?= $a_item->nama_pengarang ?></td>
                    <td><?= $a_item->nama_penerbit ?></td>
                    <td><?= $a_item->kode_rak ?></td>
                    <td>
                      <a href="<?= base_url() ?>admin/edit_buku/<?= $a_item->kode_buku ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url() ?>admin/delete/buku/<?= $a_item->kode_buku ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
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
    <div class="row">
      <div class="col-xs-6">
        <div class="box">
             <div class="box-header">
               <h3 class="box-title">List Pengarang</h3>
               <button type="button" name="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#register1"><i class="fa fa-plus"></i> Add Pengarang</button>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
               <table id="table1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No tlp</th>
                  <th>Action</th>
                </tr>
               </thead>
               <?php foreach ($pengarang as $key => $a_item):?>
                <tr>
                  <td><?= $a_item->nama_pengarang ?></td>
                  <td><?= $a_item->alamat ?></td>
                  <td><?= $a_item->no_tlp ?></td>
                  <td>
                    <a href="<?= base_url() ?>admin/edit_pengarang/<?= $a_item->id_pengarang ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url() ?>admin/delete/pengarang/<?= $a_item->id_pengarang ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
               </table>
             </div>
         <!-- /.box-body -->
       </div>
  </div>
    <div class="col-xs-6">
      <div class="box">
           <div class="box-header">
             <h3 class="box-title">List Penerbit</h3>
             <button type="button" name="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#register2"><i class="fa fa-plus"></i> Add Penerbit</button>
           </div>
          <!-- /.box-header -->
           <div class="box-body">
             <table id="table2" class="table table-bordered table-striped">
             <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No tlp</th>
                <th>Action</th>
              </tr>
             </thead>
             <?php foreach ($penerbit as $key => $a_item):?>
              <tr>
                <td><?= $a_item->nama_penerbit ?></td>
                <td><?= $a_item->alamat ?></td>
                <td><?= $a_item->no_tlp ?></td>
                <td>
                  <a href="<?= base_url() ?>admin/edit_penerbit/<?= $a_item->id_penerbit ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?= base_url() ?>admin/delete/penerbit/<?= $a_item->id_penerbit ?>" class="btn btn-danger btn-sm " onclick="delete_btn(event)"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
             </table>
           </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Input Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_buku'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="kode">Kode</label>
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode....">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="jml">Jumlah</label>
              <input type="number" name="jml" class="form-control" id="jml" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="tgl">Tanggal Pengadaan</label>
              <input type="date" name="tgl" class="form-control" id="tgl">
            </div>
            <div class="form-group" >
              <label for="pengarang">Pengarang</label>
              <select  name="pengarang" class="form-control" id="pengarang">
                <?php foreach ($pengarang as $key => $p_item):?>
                  <option value="<?= $p_item->id_pengarang ?>"><?= $p_item->nama_pengarang ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group" >
              <label for="penerbit">Penerbit</label>
              <select  name="penerbit" class="form-control" id="penerbit">
              <?php foreach ($penerbit as $key => $p_item):?>
                <option value="<?= $p_item->id_penerbit ?>"><?= $p_item->nama_penerbit ?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group" >
              <label for="rak">Rak Buku</label>
              <input type="text" name="rak" class="form-control" id="rak">
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

    <!-- Modal -->
    <div class="modal fade" id="register1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Pengarang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_pengarang'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="no">No Telp</label>
              <input type="number" name="no" class="form-control" id="no">
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

    <!-- Modal -->
    <div class="modal fade" id="register2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Penerbit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart(base_url().'admin/input_penerbit'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama....">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="no">No Telp</label>
              <input type="number" name="no" class="form-control" id="no">
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
