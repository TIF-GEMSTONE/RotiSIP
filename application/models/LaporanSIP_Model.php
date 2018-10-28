<?php
class LaporanSIP_model extends CI_Model{
	function get_laporan(){
		$query = $this->db->query("SELECT no_transaksi,SUM(jumlah) AS jumlah, SUM(total) AS total FROM tabel_detail_sip GROUP BY no_transaksi");  
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_table(){
    	$query = $this->db->query("SELECT * FROM tabel_transaksi");
    return $query->result();
    }

    function get_data(){
    	$query = $this->db->query("SELECT * FROM tabel_detail_sip ");
    return $query->result();
    }

    function get_detail($id){
    $query = $this->db->query("SELECT * FROM tabel_detail_sip JOIN tabel_transaksi WHERE tabel_detail_sip.no_transaksi=tabel_transaksi.no_transaksi AND tabel_detail_sip.no_transaksi = '$id'");
    return $query->result();
  }

	}

?>


