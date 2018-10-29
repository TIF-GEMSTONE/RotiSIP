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

    function get_detail($id){
    $query = $this->db->query("SELECT * FROM tabel_detail_sip JOIN tabel_transaksi_sip JOIN tabel_roti WHERE tabel_detail_sip.no_transaksi=tabel_transaksi_sip.no_transaksi AND tabel_detail_sip.id_roti=tabel_roti.id_roti AND tabel_detail_sip.no_transaksi = '$id'");
    return $query->result();
  }
 
}

?>


