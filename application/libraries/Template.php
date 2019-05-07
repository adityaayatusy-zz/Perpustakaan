<?php

class Template {
  public function __construct(){
    $this->c =& get_instance();

  }

  public function admin($template='home', $data = null){
      $data['email_petugas'] = $this->c->session->userdata('email');
      $this->c->load->view('templates/head',$data);
      $this->c->load->view('templates/nav',$data);
      $this->c->load->view($template,$data);
      $this->c->load->view('templates/footer',$data);
  }
}
