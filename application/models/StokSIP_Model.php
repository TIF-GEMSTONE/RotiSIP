<?php
class StokSIP_Model extends CI_Model {
  
  function get_table(){
        return $this->db->get("tabel_roti");
    }
    
  function get_data(){
    $query = $this->db->query("SELECT * FROM tabel_roti");
    return $query->result();
  }
 
  function input($data = array()){
    return $this->db->insert('tabel_roti',$data);
  }

  function delete($id){
    $this->db->where('id_roti', $id);
        return $this->db->delete('tabel_roti');
  }
 
}
?>