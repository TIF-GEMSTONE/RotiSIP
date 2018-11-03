<?php
	class LaporanSIP extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('LaporanSIP_Model');

			if(!$this->session->userdata('username')){
				redirect('Login');
			}
		}

	public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'LaporanSIP/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->LaporanSIP_Model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
                $pesanan = $this->LaporanSIP_Model->view_by_date_pesanan($tgl);

            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'LaporanSIP/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->LaporanSIP_Model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
                $pesanan = $this->LaporanSIP_Model->view_by_month_pesanan($bulan, $tahun);

            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'LaporanSIP/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->LaporanSIP_Model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                $pesanan = $this->LaporanSIP_Model->view_by_year_pesanan($tahun);
            }
            
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'LaporanSIP/cetak';
            $transaksi = $this->LaporanSIP_Model->view_all();
            $pesanan = $this->LaporanSIP_Model->view_pesanan();
            // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['transaksi'] = $transaksi;
        $data['pesanan'] = $pesanan;
        $data['option_tahun'] = $this->LaporanSIP_Model->option_tahun();
        $title=array(
	        'title'=>'Laporan'
	    );
		$this->load->view('element/header', $title);
		$this->load->view('laporanSIPview', $data);
  }
  
  public function cetak(){

        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan   
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->LaporanSIP_Model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
                $pesanan = $this->LaporanSIP_Model->view_by_date_pesanan($tgl);
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->LaporanSIP_Model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
                $pesanan = $this->LaporanSIP_Model->view_by_month_pesanan($bulan, $tahun);
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->LaporanSIP_Model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->LaporanSIP_Model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        $data['pesanan'] = $pesanan;

    $this->load->view('laporanSIPviewFilter', $data);
    $this->load->view('element/footer');
  }


function detail(){
    $id= $this->uri->segment(3);
        $cek = $this->db->query("SELECT * FROM `tabel_transaksi_sip` JOIN tabel_detail_pesan WHERE tabel_transaksi_sip.no_transaksi=tabel_detail_pesan.id_pesan AND no_transaksi='".$id."'")->num_rows();
        if ($cek >= 1){
             $data=array(
            'data'=>$this->LaporanSIP_Model->get_detail_pesanan($id),
        );
        $this->load->view('LaporanSIPdetail', $data);
        $this->load->view('element/footer');
        }
        else{
            $data=array(
            'data'=>$this->LaporanSIP_Model->get_detail($id),
        );
        $this->load->view('LaporanSIPdetail', $data);
        $this->load->view('element/footer');
        }

        /*
        */
}

}
?>