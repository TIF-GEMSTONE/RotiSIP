<?php
class Pesanan_model extends CI_Model {
  
  function get_table(){
        return $this->db->get("tabel_pesanan");
    }
    
  function get_data(){
    $query = $this->db->query("SELECT * FROM tabel_pesanan ");
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

  function search($title){
        $this->db->like('nama_roti', $title , 'both');
        $this->db->order_by('nama_roti', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tabel_roti')->result();
    }


  function get_notrans(){
    $this->db->select('RIGHT(tabel_pesanan.id_pesan,4) as kode', FALSE);
    $this->db->order_by('id_pesan','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('tabel_pesanan');     
    if($query->num_rows() <> 0){      
  
     $data = $query->row();      
     $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
    $kodejadi = "TP".$kodemax;  
    return $kodejadi;
  }

  function inputdetail($data,$table) {
    $this->db->insert($table,$data);

  }

  function get_pesanan($kode){
    $this->db->select('*');
    $this->db->from('tabel_detail_pesan');
    $this->db->join('tabel_roti','tabel_detail_pesan.id_roti=tabel_roti.id_roti');
    $this->db->where('id_pesan', $kode);
    $query = $this->db->get();
    return $query->result();
  }

}
?>