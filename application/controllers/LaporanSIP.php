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
		$this->load->view('laporanSIPview',$data);
	}

    function detail($id){
    	$data = array (
				'detail' =>$this->TransaksiSIP_Model->get_detail($id));
		$this->load->view('DetailTransaksiSIP_view', $data);
    }

}
?>