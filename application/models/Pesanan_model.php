<?php
class Pesanan_model extends CI_Model {
  
  function get_table(){
        return $this->db->get("tabel_pesanan");
    }
    
  function get_data(){
    $query = $this->db->query("SELECT * FROM tabel_pesanan JOIN tabel_roti WHERE tabel_pesanan.id_roti=tabel_roti.id_roti");
    return $query->result();
  }
  
  function get_detail($id){
    $query = $this->db->query("SELECT * FROM tabel_detail_pesan JOIN tabel_pesanan JOIN tabel_roti WHERE tabel_detail_pesan.id_pesan=tabel_pesanan.id_pesan AND tabel_detail_pesan.id_roti = tabel_roti.id_roti AND tabel_detail_pesan.id_pesan = $id");
    return $query->result();
  }

  function get_roti(){
    $query = $this->db->query("SELECT * FROM tabel_roti");
    return $query->result();
  }
  
  function get_data_edit($id){
    $query = $this->db->query("SELECT * FROM tabel_pesanan WHERE id_pesan = '$id'");
    return $query->result_array();
  }
  
  function input($data = array()){
    return $this->db->insert('tabel_pesanan',$data);
  }

   function input1($data = array()){
    return $this->db->insert('tabel_detail_pesan',$data);
  }
  
  function delete($id){
    $this->db->where('id_pesan', $id);
        return $this->db->delete('tabel_pesanan');
  }
  
  function update($data = array(),$id){
    $this->db->where('id_pesan',$id);
    return $this->db->update('tabel_pesanan',$data);
  }

}
?>