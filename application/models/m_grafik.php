<?php    
class m_grafik extends CI_Model{
    function index(){
        $query = $this->db->query("SELECT tabel_detail_sip.id_roti,tabel_roti.nama_roti, SUM(tabel_detail_sip.jumlah) AS jumlah FROM tabel_detail_sip LEFT JOIN tabel_roti ON tabel_detail_sip.id_roti=tabel_roti.id_roti GROUP BY tabel_detail_sip.id_roti");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function view_by_date($date){
     //    $this->db->where('DATE(tgl_transaksi)', $date); // Tambahkan where tanggal nya 
	    // return $this->db->get('tabel_transaksi_sip')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter

		$this->db->select('*');
		$this->db->select_sum('jumlah');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
    	$this->db->join('tabel_roti', 'tabel_detail_sip.id_roti=tabel_roti.id_roti');
    	$this->db->group_by('tabel_detail_sip.id_roti');
 		$this->db->where('DATE(tgl_transaksi)', $date);
 		$query = $this->db->get();
		return $query->result();


  }
    
  public function view_by_month($month, $year){
    $this->db->select('*');
    $this->db->select_sum('jumlah');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
    	$this->db->join('tabel_roti', 'tabel_detail_sip.id_roti=tabel_roti.id_roti');
    	$this->db->group_by('tabel_detail_sip.id_roti');
 		$this->db->where('MONTH(tgl_transaksi)', $month); // Tambahkan where bulan
    	$this->db->where('YEAR(tgl_transaksi)', $year); // Tambahkan where tahun
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_by_year($year){
    $this->db->select('*');
    $this->db->select_sum('jumlah');
 		$this->db->from('tabel_transaksi_sip');
 		$this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
    $this->db->join('tabel_roti', 'tabel_detail_sip.id_roti=tabel_roti.id_roti');
    $this->db->group_by('tabel_detail_sip.id_roti');
 		$this->db->where('YEAR(tgl_transaksi)', $year);
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_all(){
    $this->db->select('*');
    $this->db->select_sum('jumlah');
    $this->db->from('tabel_transaksi_sip');
    $this->db->join('tabel_detail_sip','tabel_transaksi_sip.no_transaksi=tabel_detail_sip.no_transaksi');
    $this->db->join('tabel_roti', 'tabel_detail_sip.id_roti=tabel_roti.id_roti');
    $this->db->group_by('tabel_detail_sip.id_roti');
    $query = $this->db->get();
    return $query->result();
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
