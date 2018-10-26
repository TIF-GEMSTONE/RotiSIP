<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->library('session');
        $this->load->model('m_grafik');
    }
    function index(){
    	$this->session->set_userdata('username', 'admin');

        //$x['data']=$this->m_grafik->get_data_stok();
        //$this->load->view('v_grafik',$x);

        $data = array(
				'data'=>$this->m_grafik->get_data_grafik());

        $title=array(
	        'title'=>'GrafikPenjualan'
	    );

		$this->load->view('element/header', $title);
		$this->load->view('v_grafik',$data);
		$this->load->view('element/footer');
    }
}