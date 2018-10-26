<?php
class Produk_model extends CI_Model {
  public function __construct() {
        parent::__construct();
  }

  public function input($data){
    try{
      $this->db->insert('tabel_roti', $data);
      return true;
    }catch(Exception $e){
    }
  }

  public function data(){
   $this->db->select('*');
   $this->db->from('tabel_roti');
   $data = $this->db->get();
   return $data->result();
 }

 public function gambar($id)
   {
     $this->db->where('id', $id);
     return $this->db->get('tabel_roti')->row();
   }

function get_id(){
  $this->db->select('RIGHT(tabel_roti.id_roti,4) as kode', FALSE);
      $this->db->order_by('id_roti','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('tabel_roti');     
      if($query->num_rows() <> 0){      
    
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "TR".$kodemax;  
      return $kodejadi;
}

function tambah($data){
    $this->db->insert('tabel_roti', $data);
    return TRUE;
}

function ubah($data, $id){
    $this->db->where('id_roti',$id);
    $this->db->update('tabel_roti', $data);
    return TRUE;
}

 public function hapus($id){
   $this->db->where('id', $id);
   $this->db->delete('tabel_roti');
 }



}
?>
