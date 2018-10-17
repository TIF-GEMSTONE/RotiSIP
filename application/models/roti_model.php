<?php
class roti_model extends CI_Model{

	function tampil_roti(){
		$hsl=$this->db->query("SELECT * FROM tabel_roti");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}


	function get_roti($id_roti){
		$hsl=$this->db->query("SELECT * FROM tabel_roti where id_roti='$id_roti'");
		return $hsl;
	}

	function get_id_roti(){
		$q = $this->db->query("SELECT MAX(RIGHT(id_roti,3)) AS kd_max FROM tabel_roti");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "70".$kd;
	}

}