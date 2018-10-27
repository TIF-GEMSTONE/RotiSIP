<?php
class Penjualan_model extends CI_Model {
	

	function simpan_penjualan($notrans,$session,$total_jual,$uang,$kembalian){
		$this->db->query("INSERT INTO tabel_transaksi_sip (no_transaksi,id_pegawai,tgl_transaksi,total_jual,uang,kembalian) VALUES ('$notrans','40001',CURDATE(),'$total_jual','$uang','$kembalian')");
		/*foreach ($this->cart->contents() as $item) {
			$data=array(
				'no_transaksi' 		=>	$notrans,
				'id_roti'			=>	$item['id_roti'],
				'nama_roti'			=>  $item['nama_roti'],
				'harga'				=>	$item['amount'],
				'qty'				=>	$item['qty'],
				'subtotal'			=>	$item['subtotal']
			);*/
			//$this->db->insert('tabel_detail',$data);
			//$this->db->query("update tabel_roti set stok=stok-'$item[qty]' where id_roti='$item[id]'");
	
		return true;
	}

	function search($title){
        $this->db->like('nama_roti', $title , 'both');
        $this->db->order_by('nama_roti', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tabel_roti')->result();
    }

    function insert($data,$table){
		$this->db->insert($table,$data);
    }

	function get_notrans(){
		/*$q = $this->db->query("SELECT MAX(RIGHT(no_transaksi,1)) AS kd_max FROM tabel_transaksi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }else{
            $kd = "1";
        }*/
          $this->db->select('RIGHT(tabel_transaksi_sip.no_transaksi,4) as kode', FALSE);
		  $this->db->order_by('no_transaksi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tabel_transaksi_sip');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "TR".$kodemax;  
		  return $kodejadi;
	}

	function input_pesan($data,$table){
		$this->db->insert($table,$data);
		
	}

	function update_pesan($data,$table){
		$this->db->query("UPDATE `tabel_detail_sip` SET `jumlah`='',`total`='' WHERE no_transaksi='' id_roti=''");
		
	}

	function get_penjualan($kode){
		$this->db->select('*');
 		$this->db->from('tabel_detail_sip');
 		$this->db->join('tabel_roti','tabel_detail_sip.id_roti=tabel_roti.id_roti');
 		$this->db->where('no_transaksi', $kode);
 		$query = $this->db->get();
		return $query->result();
	}

	function cek_pesanan($no_transaksi,$id_roti){
		$query = $this->db->query("SELECT * FROM `tabel_detail_sip` WHERE no_transaksi='".$no_transaksi."' AND id_roti='".$id_roti."'");
		return $query->result();
	}

	function total($kode){
		$query = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_sip` WHERE no_transaksi='".$kode."'");
		return $query->result();
	}
}

?>