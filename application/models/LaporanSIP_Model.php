<?php
class barang_model extends CI_Model{
	function get_barang(){
		$query = $this->db->get('tabel_transaksi_sip');
		return $result = $query->result_array();
	}

	function pesan_detail($id_pesan){
		$this->db->select('pesanan.*, user.NAMA, user.ALAMAT, user.NO_HP, barang.NAMA_BARANG');
		$this->db->from('pesanan');
		$this->db->join('user', 'user.ID_USER_ = pesanan.ID_USER');
		$this->db->join('barang', 'barang.ID_BARANG = pesanan.ID_BARANG');
		$this->db->where(array('ID_PESAN' => $id_pesan));
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	}

?>
