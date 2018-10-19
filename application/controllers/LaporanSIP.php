<?php
class LaporanSIP extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('TransaksiSIP_Model');
	}


	public function index(){
		$this->session->set_userdata('username', 'admin');
		//$this->load->view('StokSalesview');
		$data = array(
				'data'=>$this->TransaksiSIP_Model->get_laporan());
		$title=array(
	        'title'=>'Laporan'
	    );
		$this->load->view('element/header', $title);
		$this->load->view('laporanSIPview',$data);
		$this->load->view('element/footer');
	}

    function detail($id){
    	$data = array (
				'detail' =>$this->TransaksiSIP_Model->get_detail($id));
    	$title=array(
	        'title'=>'Laporan'
	    );
		$this->load->view('element/header', $title);
		$this->load->view('DetailTransaksiSIP_view', $data);
		$this->load->view('element/footer');
    }

}
?>