<?php
class Login extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->library(['template','form_validation']);
    $this->load->model('m_admin');
  }

  public function index(){
    $this->load->view('login');
  }

  public function submit(){
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('pw','Password','required');
    if(!$this->form_validation->run()){
      $this->load->view('login');
    }else{
      $email = ['email_petugas'=>$this->input->post('email')];
      $petugas = $this->m_admin->get_data_one('petugas',$email)->row();

      if(password_verify($this->input->post('pw'),$petugas->password_petugas)){
        $this->session->set_userdata('email',$petugas->email_petugas);
        $this->session->set_userdata('nama',$petugas->nama_petugas);
        $this->session->set_userdata('key',$petugas->id_petugas.uniqid());
        $this->session->set_flashdata('login-berhasil','Berhasil Login');
        redirect('admin');
      }else{
        redirect('login');
      }
    }
  }
}
