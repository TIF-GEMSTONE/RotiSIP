<?php
class LaporanSIP extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('LaporanSIP_Model');
	}


public function index(){
	if($this->session->userdata('username') =='admin'){
            $data = array(
			'data'=>$this->LaporanSIP_Model->get_laporan());
			$title=array(
		        'title'=>'Laporan'
		    );

			$this->load->view('element/header', $title);
			$this->load->view('laporanSIPview',$data);
			$this->load->view('element/footer');
        }else{
            redirect('login');
        }
}

function detail($id){
	$data = array (
			'detail' =>$this->LaporanSIP_Model->get_detail($id));
	$title=array(
        'title'=>'Laporan'
    );
	$this->load->view('element/header', $title);
	$this->load->view('DetailTransaksiSIP_view', $data);
	$this->load->view('element/footer');
}

}
?>