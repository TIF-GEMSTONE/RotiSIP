<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->library('session');
        $this->load->model('m_grafik');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }
    function index(){
        if($this->session->userdata('username')){
                $data = array(
                    'data'=>$this->m_grafik->get_data_grafik()
                );
                 $title=array(
                    'title'=>'GrafikPenjualan'
                );
                $this->load->view('element/header', $title);
                $this->load->view('v_grafik',$data);
                $this->load->view('element/footer');
            }else{
                redirect('welcome');
            }
    }
}