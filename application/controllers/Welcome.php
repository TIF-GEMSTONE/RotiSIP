<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public $model = NULL;

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');

		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index (){
		if (isset($_POST['btn_log'])) {
			$this->Login_model->username = $_POST['txt_user'];
			$this->Login_model->password = $_POST['txt_pass'];
			if ($this->Login_model->cek_log()==TRUE) {
				$this->session->set_userdata('username', $this->Login_model->username);
				redirect('Dashboard');
				//$this->load->view('Home_view', ['model'=>$this->model1]);
			}else{
				redirect('Welcome');
			}
		}else{
			$this->load->view('Login_view', ['model'=>$this->Login_model]);
		}
	}
	
	public function Logout(){
		if ($this->session->has_userdata('username')) {
			$this->session->sess_destroy();
		redirect('Welcome');
		}
	}	
}