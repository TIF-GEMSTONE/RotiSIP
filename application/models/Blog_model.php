<?php
class Blog_model extends CI_Model{
 
    function search_blog($title){
        $this->db->like('nama_roti', $title , 'both');
        $this->db->order_by('nama_roti', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tabel_roti')->result();
    }
 
}