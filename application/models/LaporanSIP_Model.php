<?php
class LaporanSIP_model extends CI_Model{
	function get_laporan(){
		$query = $this->db->query("
			SELECT tabel_transaksi_sip.no_transaksi,tabel_transaksi_sip.tgl_transaksi,tabel_transaksi_sip.total_jual, SUM(tabel_detail_sip.jumlah) AS jumlah 
			FROM tabel_transaksi_sip 
			LEFT JOIN tabel_detail_sip 
			ON tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi 
			GROUP BY tabel_transaksi_sip.no_transaksi");  
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

  // =========================================

  	public function view_by_date($date){
     //    $this->db->where('DATE(tgl_transaksi)', $date); // Tambahkan where tanggal nya 
	    // return $this->db->get('tabel_transaksi_sip')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter

		$this->db->select('*');
		// $this->db->select_sum('jumlah');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
 		$this->db->where('DATE(tgl_transaksi)', $date);
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_by_month($month, $year){
    //     $this->db->where('MONTH(tgl_transaksi)', $month); // Tambahkan where bulan
    //     $this->db->where('YEAR(tgl_transaksi', $year); // Tambahkan where tahun
    // return $this->db->get('tabel_transaksi_sip')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter

    $this->db->select('*');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
 		$this->db->where('MONTH(tgl_transaksi)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_transaksi)', $year); // Tambahkan where tahun
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_by_year($year){
    //     $this->db->where('YEAR(tgl_transaksi)', $year); // Tambahkan where tahun
    // return $this->db->get('tabel_transaksi_sip')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter

    $this->db->select('*');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
 		$this->db->where('YEAR(tgl_transaksi)', $year);
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_all(){
    // return $this->db->get('tabel_transaksi_sip')->result(); // Tampilkan semua data transaksi
    $query = $this->db->query("
			SELECT tabel_transaksi_sip.no_transaksi,tabel_transaksi_sip.tgl_transaksi,tabel_transaksi_sip.total_jual, SUM(tabel_detail_sip.jumlah) AS jumlah 
			FROM tabel_transaksi_sip 
			LEFT JOIN tabel_detail_sip 
			ON tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi 
			GROUP BY tabel_transaksi_sip.no_transaksi Desc");  
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_transaksi) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tabel_transaksi_sip'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_transaksi)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_transaksi)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    function get_detail($id){
    $query = $this->db->query("SELECT * FROM tabel_detail_sip JOIN tabel_transaksi_sip JOIN tabel_roti WHERE tabel_detail_sip.no_transaksi=tabel_transaksi_sip.no_transaksi AND tabel_detail_sip.id_roti=tabel_roti.id_roti AND tabel_detail_sip.no_transaksi = '$id'");
    return $query->result();
  }
 
}

?>


