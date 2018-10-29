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
	if($this->session->userdata('username')){
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
	$this->load->view('v_detail_laporan', $data);
	$this->load->view('element/footer');
}

}
?>