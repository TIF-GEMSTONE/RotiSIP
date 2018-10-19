<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public $model = NULL;

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->model1 = $this->Login_model;
		$this->load->model('Produk_model');
		$this->model2 = $this->Produk_model;

		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index (){
		if (isset($_POST['btn_log'])) {
			$this->model1->username = $_POST['txt_user'];
			$this->model1->password = $_POST['txt_pass'];
			if ($this->model1->cek_log()==TRUE) {
				$this->session->set_userdata('username', $this->model1->username);
				$data['produk'] = $this->Produk_model->data();
				$title=array(
			        'title'=>'Dashboard'
			    );
				$this->load->view('element/header', $title);
				$this->load->view('Home_view', $data);
				$this->load->view('element/footer');
				//$this->load->view('Home_view', ['model'=>$this->model1]);
			}else{
				redirect('Welcome');
			}
		}else{
			$this->load->view('Login_view', ['model'=>$this->model1]);
		}
	}
	
}