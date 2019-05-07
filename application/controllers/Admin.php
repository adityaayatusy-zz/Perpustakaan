<?php

class Admin extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->library(['template','form_validation']);
    $this->load->model('m_admin');
    $this->load->model('exel');
    $this->load->helper('kurang_buku');
    $this->m_admin->cek();
  }
  public function index(){
    $data['title'] = 'Dashboard';
    $data['anggota'] = count($this->m_admin->get_data('anggota')->result());
    $data['buku'] = count($this->m_admin->get_data('buku')->result());
    $data['pinjam'] = count($this->m_admin->get_data('pinjaman_buku')->result());
    $data['menu'] = 'home';
    $this->template->admin('home',$data);
  }

  public function anggota(){
    $data['title'] = 'Anggota';
    $data['menu'] = 'anggota';
    $data['anggota'] = $this->m_admin->get_data('anggota')->result();
    $this->template->admin('anggota',$data);
  }
  public function input_anggota(){

    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jk','jk','required');
    $this->form_validation->set_rules('alamat','alamat','required');
    $this->form_validation->set_rules('tgl-lahir','tgl','required');
    $this->form_validation->set_rules('no','Nomor','required|numeric');
    $this->form_validation->set_rules('email','email','required|valid_email');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/anggota');
    }
    // die;
    $config['upload_path'] = './assets/img/';
    $config['file_name'] = uniqid();
    $config['allowed_types'] = 'png|jpg|jpeg';
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('foto')){
        $foto =$this->upload->data('file_name');
    }else{
      $foto = 'user.png';
    }
    $data = [
      'nama_anggota' => $this->input->post('nama'),
      'jk_anggota' => $this->input->post('jk'),
      'alamat_anggota' => $this->input->post('alamat'),
      'tgl_lahir_anggota' => $this->input->post('tgl-lahir'),
      'no_hp_anggota' => $this->input->post('no'),
      'email_anggota' => $this->input->post('email'),
      'photo_anggota' => $foto
    ];
    if($this->m_admin->input_data('anggota', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }
    redirect('admin/anggota');
  }
  public function see_anggota($id){
    $id = ['id_anggota'=>$id];
    $data['anggota'] = $this->m_admin->get_data_one('anggota',$id)->row();
    $this->load->view('print_anggota',$data);
  }
  public function edit_anggota($id){
    $id = ['id_anggota'=>$id];
    $data['menu'] = 'anggota';
    $data['anggota'] = $this->m_admin->get_data_one('anggota',$id)->row();
    $this->template->admin('edit_anggota',$data);
  }
  public function update_anggota($id){
        $id = ['id_anggota'=>$id];
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('jk','jk','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('tgl-lahir','tgl','required');
        $this->form_validation->set_rules('no','Nomor','required|numeric');
        $this->form_validation->set_rules('email','email','required|valid_email');
        if(!$this->form_validation->run()){
          $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
          redirect('admin/anggota');
        }
        $data = [
          'nama_anggota' => $this->input->post('nama'),
          'jk_anggota' => $this->input->post('jk'),
          'alamat_anggota' => $this->input->post('alamat'),
          'tgl_lahir_anggota' => $this->input->post('tgl-lahir'),
          'no_hp_anggota' => $this->input->post('no'),
          'email_anggota' => $this->input->post('email')
        ];
        //image
        $config['upload_path'] = './assets/img/';
        $config['file_name'] = uniqid();
        $config['allowed_types'] = 'png|jpg|jpeg';
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('foto')){
          $data['photo_anggota'] = $foto = $this->upload->data('file_name');
        }

        if($this->m_admin->update_data('anggota', $data,$id)){
          $this->session->set_flashdata('alert-berhasil','Berhasil Update data');
        }
        redirect('admin/anggota');
  }

  public function delete($table,$id){
    if($table == 'buku'){
      $id = ['kode_'.$table=>$id];
    }else{
      $id = ['id_'.$table=>$id];
    }
    if($table == 'pinjaman'){
      $table = 'pinjaman_buku';
    }
    if($this->m_admin->delete_data($table,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Delete data');
    }else{
      $this->session->set_flashdata('alert-gagal','Gagal Delete data');
    }
    if($table == 'penerbit' || $table == 'pengarang'){
      redirect('admin/buku');
    }else{
      if($table == 'pinjaman_buku'){
        $table = 'pinjam';
      }
      redirect('admin/'.$table);
    }

  }
  public function exel($data){
    $result = $this->m_admin->get_data($data)->result();
    $this->exel->print_download($result,$data);
  }
  public function exel_buku(){
    $result = $this->m_admin->get_data_rel('buku','pengarang','id_pengarang','penerbit','id_penerbit')->result();
    $this->exel->print_download($result,'buku');
  }

  public function petugas(){
    $data['title'] = 'Petugas';
    $data['menu'] = 'petugas';
    $data['petugas'] = $this->m_admin->get_data('petugas')->result();
    $this->template->admin('petugas',$data);
  }
  public function input_petugas(){
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('pw','Password','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/petugas');
    }

    $pw = password_hash($this->input->post('pw'),PASSWORD_DEFAULT);
    $data = [
      'nama_petugas'      => $this->input->post('nama'),
      'email_petugas'     => $this->input->post('email'),
      'password_petugas'  => $pw
    ];

    if($this->m_admin->input_data('petugas', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/petugas');

  }
  public function edit_petugas($id){
    $id = ['id_petugas'=>$id];
    $data['menu'] = 'petugas';
    $data['petugas'] = $this->m_admin->get_data_one('petugas',$id)->row();
    $this->template->admin('edit_petugas',$data);
  }
  public function update_petugas($id){
    $id = ['id_petugas'=>$id];
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('pw','Password','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/petugas');
    }

    $pw = password_hash($this->input->post('pw'),PASSWORD_DEFAULT);
    $data = [
      'nama_petugas'      => $this->input->post('nama'),
      'email_petugas'     => $this->input->post('email'),
      'password_petugas'  => $pw
    ];

    if($this->m_admin->update_data('petugas', $data,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Update data');
    }
    redirect('admin/petugas');

  }

  public function logout(){
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('key');

    redirect('login');
  }

  public function buku(){
    $data['title'] = 'Buku';
    $data['menu'] = 'buku';
    $data['buku'] = $this->m_admin->get_data_rel('buku','pengarang','id_pengarang','penerbit','id_penerbit')->result();
    $data['pengarang'] = $this->m_admin->get_data('pengarang')->result();
    $data['penerbit'] = $this->m_admin->get_data('penerbit')->result();
    $this->template->admin('buku',$data);
  }

  public function input_pengarang(){
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('no','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'nama_pengarang'      => $this->input->post('nama'),
      'alamat'     => $this->input->post('alamat'),
      'no_tlp'  => $this->input->post('no'),
    ];

    if($this->m_admin->input_data('pengarang', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }
  public function edit_pengarang($id){
    $id = ['id_pengarang'=>$id];
    $data['menu'] = 'pengarang';
    $data['pengarang'] = $this->m_admin->get_data_one('pengarang',$id)->row();
    $this->template->admin('edit_pengarang',$data);
  }
  public function update_pengarang($id){
    $id = ['id_pengarang'=>$id];
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('no','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'nama_pengarang'      => $this->input->post('nama'),
      'alamat'     => $this->input->post('alamat'),
      'no_tlp'  => $this->input->post('no'),
    ];

    if($this->m_admin->update_data('pengarang', $data,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }

  public function input_penerbit(){
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('no','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'nama_penerbit'      => $this->input->post('nama'),
      'alamat'     => $this->input->post('alamat'),
      'no_tlp'  => $this->input->post('no'),
    ];

    if($this->m_admin->input_data('penerbit', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }
  public function edit_penerbit($id){
    $id = ['id_penerbit'=>$id];
    $data['menu'] = 'penerbit';
    $data['penerbit'] = $this->m_admin->get_data_one('penerbit',$id)->row();
    $this->template->admin('edit_penerbit',$data);
  }
  public function update_penerbit($id){
    $id = ['id_penerbit'=>$id];
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('no','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'nama_penerbit'      => $this->input->post('nama'),
      'alamat'     => $this->input->post('alamat'),
      'no_tlp'  => $this->input->post('no'),
    ];

    if($this->m_admin->update_data('penerbit', $data,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }

  public function input_buku(){
    $this->form_validation->set_rules('kode','Kode Buku','required');
    $this->form_validation->set_rules('nama','Nama Buku','required');
    $this->form_validation->set_rules('jml','Jumlah Buku','required');
    $this->form_validation->set_rules('tgl','Tanggal','required');
    $this->form_validation->set_rules('pengarang','Pengarang','required');
    $this->form_validation->set_rules('penerbit','Penerbit','required');
    $this->form_validation->set_rules('rak','Rak Buku','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'kode_buku'          => $this->input->post('kode'),
      'nama_buku'          => $this->input->post('nama'),
      'id_pengarang'       => $this->input->post('pengarang'),
      'id_penerbit'        => $this->input->post('penerbit'),
      'jumlah_buku'        => $this->input->post('jml'),
      'tanggal_pengadaan'  => $this->input->post('tgl'),
      'kode_rak'           => $this->input->post('rak')
    ];

    if($this->m_admin->input_data('buku', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }
  public function edit_buku($id){
    $id = ['kode_buku'=>$id];
    $data['menu'] = 'buku';
    $data['buku'] = $this->m_admin->get_data_one('buku',$id)->row();
    $data['pengarang'] = $this->m_admin->get_data('pengarang')->result();
    $data['penerbit'] = $this->m_admin->get_data('penerbit')->result();
    $this->template->admin('edit_buku',$data);
  }
  public function update_buku($id){
    $id = ['kode_buku'=>$id];
    $this->form_validation->set_rules('kode','Kode Buku','required');
    $this->form_validation->set_rules('nama','Nama Buku','required');
    $this->form_validation->set_rules('jml','Jumlah Buku','required');
    $this->form_validation->set_rules('tgl','Tanggal','required');
    $this->form_validation->set_rules('pengarang','Pengarang','required');
    $this->form_validation->set_rules('penerbit','Penerbit','required');
    $this->form_validation->set_rules('rak','Rak Buku','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/buku');
    }
    $data = [
      'kode_buku'          => $this->input->post('kode'),
      'nama_buku'          => $this->input->post('nama'),
      'id_pengarang'       => $this->input->post('pengarang'),
      'id_penerbit'        => $this->input->post('penerbit'),
      'jumlah_buku'        => $this->input->post('jml'),
      'tanggal_pengadaan'  => $this->input->post('tgl'),
      'kode_rak'           => $this->input->post('rak')
    ];

    if($this->m_admin->update_data('buku', $data,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/buku');

  }

  public function pinjam(){
    $data['title'] = 'Pinjaman Buku';
    $data['menu'] = 'pinjam';
    $data['buku'] = $this->m_admin->get_data('buku')->result();
    $data['anggota'] = $this->m_admin->get_data('anggota')->result();
    $data['petugas'] = $this->m_admin->get_data('petugas')->result();
    $data['pinjam'] = $this->m_admin->get_data_rel('pinjaman_buku','anggota','id_anggota','petugas','id_petugas','buku','kode_buku')->result();
    $this->template->admin('pinjam',$data);
  }
  public function input_pinjaman(){
    $this->form_validation->set_rules('anggota','Nama','required');
    $this->form_validation->set_rules('kb','Kode Buku','required');
    $this->form_validation->set_rules('tp','Tgl Pinjam','required');
    $this->form_validation->set_rules('tk','Tgl Kembali','required');
    $this->form_validation->set_rules('denda','Denda','required');
    $this->form_validation->set_rules('petugas','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/pinjam');
    }
    $data = [
      'id_anggota'      => $this->input->post('anggota'),
      'kode_buku'     => $this->input->post('kb'),
      'tgl_pinjaman'  => $this->input->post('tp'),
      'tgl_kembali'  => $this->input->post('tk'),
      'denda_telat'  => $this->input->post('denda'),
      'id_petugas'  => $this->input->post('petugas')
    ];

    if($this->m_admin->input_data('pinjaman_buku', $data)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/pinjam');

  }
  public function edit_pinjaman($id){
    $id = ['id_pengarang'=>$id];
    $data['menu'] = 'pinjam';
    $data['buku'] = $this->m_admin->get_data('buku')->result();
    $data['anggota'] = $this->m_admin->get_data('anggota')->result();
    $data['petugas'] = $this->m_admin->get_data('petugas')->result();
    $data['pinjam'] = $this->m_admin->get_data('pinjaman_buku')->row();
    $this->template->admin('edit_pinjaman',$data);
  }
  public function update_pinjaman($id){
    $id = ['id_pinjaman'=>$id];
    $this->form_validation->set_rules('anggota','Nama','required');
    $this->form_validation->set_rules('kb','Kode Buku','required');
    $this->form_validation->set_rules('tp','Tgl Pinjam','required');
    $this->form_validation->set_rules('tk','Tgl Kembali','required');
    $this->form_validation->set_rules('denda','Denda','required');
    $this->form_validation->set_rules('petugas','Nomor Hp','required');
    if(!$this->form_validation->run()){
      $this->session->set_flashdata('alert-gagal',validation_errors("<li style='color:red;list-style-type:none;'>",'</li>'));
      redirect('admin/pinjam');
    }
    $data = [
      'id_anggota'      => $this->input->post('anggota'),
      'kode_buku'       => $this->input->post('kb'),
      'tgl_pinjaman'    => $this->input->post('tp'),
      'tgl_kembali'     => $this->input->post('tk'),
      'denda_telat'     => $this->input->post('denda'),
      'id_petugas'      => $this->input->post('petugas')
    ];

    if($this->m_admin->update_data('pinjaman_buku', $data,$id)){
      $this->session->set_flashdata('alert-berhasil','Berhasil Input data');
    }

    redirect('admin/pinjam');

  }
}
