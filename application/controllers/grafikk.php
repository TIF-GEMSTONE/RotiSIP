<?php 
class grafikk extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mgrafik');
    }
    //public function index()
    //{
    //    $data['report'] = $this->mgrafik->report();
    //    $this->load->view('vgrafik', $data);
    //}

    public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'grafikk/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->mgrafik->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'grafikk/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->mgrafik->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'grafikk/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->mgrafik->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
            
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'grafikk/cetak';
            $transaksi = $this->mgrafik->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->mgrafik->option_tahun();
        $title=array(
	        'title'=>'Grafik'
	    );
		$this->load->view('element/header', $title);
		$this->load->view('vgrafik', $data);
		// $this->load->view('element/footer');
  }

  function detail(){
    $id = $this->input->post('no_transaksi');
	$data = array (
			'detail' =>$this->grafikk->get_detail($id));
	$title=array(
        'title'=>'Grafik'
    );
	$this->load->view('element/header', $title);
	$this->load->view('vgrafik', $data);
	$this->load->view('element/footer');
}

}

?>