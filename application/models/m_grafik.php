<?php
class M_grafik extends CI_Model{
 
    function get_data_grafik(){
        $query = $this->db->query("SELECT tabel_detail_sip.id_roti,tabel_roti.nama_roti, SUM(tabel_detail_sip.jumlah) AS jumlah FROM tabel_detail_sip LEFT JOIN tabel_roti ON tabel_detail_sip.id_roti=tabel_roti.id_roti GROUP BY tabel_detail_sip.id_roti");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}

?>
