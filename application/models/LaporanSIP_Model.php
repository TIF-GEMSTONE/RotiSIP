<?php
class LaporanSIP_model extends CI_Model{
	function get_laporan(){
		$query = $this->db->query("SELECT tabel_transaksi_sip.no_transaksi,tabel_transaksi_sip.tgl_transaksi,tabel_transaksi_sip.total_jual, SUM(tabel_detail_sip.jumlah) AS jumlah FROM tabel_transaksi_sip LEFT JOIN tabel_detail_sip ON tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi GROUP BY tabel_transaksi_sip.no_transaksi");  
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

 
}

?>


