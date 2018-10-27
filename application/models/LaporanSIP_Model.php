<?php
class LaporanSIP_model extends CI_Model{
	function get_laporan(){
	//	$query = $this->db->get('tabel_detail_sip');
	//	return $result = $query->result_array();
	
		$query = $this->db->query("SELECT no_transaksi,SUM(jumlah) AS jumlah, SUM(total) AS total FROM tabel_detail_sip GROUP BY no_transaksi");  
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

	}

?>


