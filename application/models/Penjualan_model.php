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

	function search($title){
        $this->db->like('nama_roti', $title , 'both');
        $this->db->order_by('nama_roti', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tabel_roti')->result();
    }

    function insert($roti){
    	$this->db->like('nama_roti', $roti);
    	$result = $this->db->get('tabel_roti')->result(); 
    	return $result;
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
		  $query = $this->db->get('tabel_transaksi_sip');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "TR".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;
	}
}


?>