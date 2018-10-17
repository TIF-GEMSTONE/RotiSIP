<?php
class Retur_model extends CI_Model {
  
  function get_table(){
        return $this->db->get("tabel_stok_sales");
    }
    
  function get_data(){
    $query = $this->db->query("SELECT * FROM tabel_stok_sales 
      JOIN tabel_roti on tabel_stok_sales.id_roti=tabel_roti.id_roti
      JOIN tabel_sales on tabel_stok_sales.id_sales=tabel_sales.id_sales 
      WHERE tabel_stok_sales.id_roti='70007' ");
    return $query->result();
  }

  function input($data = array()){
    return $this->db->insert('tabel_stok_sales',$data);
  }

  function retur($id,$data){
    try{
       $this->db->where('id_stok_sales',$id)->limit(1)->update('tabel_stok_sales', $data);
       return true;
     }catch(Exception $e){}
  }
  
  // function cari($nama_sales){
  //  $query = $this->db->query("SELECT * FROM tabel_retur JOIN tabel_roti JOIN tabel_sales WHERE tabel_retur.id_roti=tabel_roti.id_roti AND tabel_retur.id_sales=tabel_sales.id_sales AND tabel_sales.nama_sales = '$nama_sales'");
  //   return $query->result();
  // }

}

?>