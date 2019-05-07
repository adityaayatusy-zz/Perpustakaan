<?php

class M_admin extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
  public function input_data($table, $data){
    return $this->db->insert($table,$data);
  }
  public function update_data($table,$data,$id){
    $this->db->where($id);
    return $this->db->update($table,$data);
  }
  public function get_data($table){
    return $this->db->get($table);
  }
  public function get_data_rel($table1,$table2,$key,$table3 = NULL,$key2 = NULL,$table4 = NULL,$key3 = NULL){
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2,$key);
    if(isset($table4)){
      $this->db->join($table3,$key2);
      $this->db->join($table4,$key3);
    }else if(isset($table3)){
      $this->db->join($table3,$key2);
    }
    return $this->db->get();
  }
  public function get_data_one($table,$id){
    $this->db->where($id);
    return $this->db->get($table);
  }
  public function delete_data($table,$id){
    $this->db->where($id);
    return $this->db->delete($table);
  }

  public function cek(){

    if(!$this->session->userdata('email') || !$this->session->userdata('key')){
      redirect('login');
    }
  }
}
