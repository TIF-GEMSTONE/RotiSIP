<?php
class Penjualan_model extends CI_Model {

	function simpan_penjualan($notrans,$total_jual,$uang,$kembalian){
		$this->db->query("INSERT INTO tabel_transaksi (no_transaksi,total_jual,uang,kembalian) VALUES ('$notrans','$total_jual','$uang','$kembalian')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'no_transaksi' 		=>	$notrans,
				'id_roti'			=>	$item['id_roti'],
				'nama_roti'			=> $item['nama_roti'],
				'harga'				=>	$item['amount'],
				'qty'				=>	$item['qty'],
				'subtotal'			=>	$item['subtotal']
			);
			$this->db->insert('tabel_detail',$data);
			$this->db->query("update tabel_roti set stok=stok-'$item[qty]' where id_roti='$item[id]'");
		}
		return true;
	}
	function get_notrans(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_transaksi,1)) AS kd_max FROM tabel_transaksi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }else{
            $kd = "1";
        }
	}
}


?>