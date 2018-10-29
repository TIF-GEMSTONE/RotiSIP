<?php
class M_grafik extends CI_Model{
 
    function get_data_grafik(){
        $query = $this->db->query("SELECT id_roti,SUM(jumlah) AS jumlah FROM tabel_detail_sip GROUP BY id_roti");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}

?>
