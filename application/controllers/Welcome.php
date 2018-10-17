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
				$this->load->view('Home_view', $data);
				//$this->load->view('Home_view', ['model'=>$this->model1]);
			}else{
				redirect('Welcome');
			}
		}else{
			$this->load->view('Login_view', ['model'=>$this->model1]);
		}
	}
	function Home(){
		$data['produk'] = $this->Produk_model->data();
		$this->load->view('Home_view', $data);
	}

	public function Logout(){
		if ($this->session->has_userdata('username')) {
			$this->session->sess_destroy();
		redirect('Welcome');
		}
	}


	public function ubah($id){
	    $data['produk'] = $this->Produk_model->getid($id);
	    $this->load->view('update', $data);
	  }

	public function proses_ubah($id){
		$gambar = $this->Produk_model->gambar($id);
		if(isset($_FILES["userfile"]["name"]))
		  {
		//membuat konfigurasi
		$config = [
		  'upload_path' => './assets/images/',
		  'allowed_types' => 'gif|jpg|png',
		  'max_size' => 1000, 'max_width' => 1000,
		  'max_height' => 1000
		];
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) //jika gagal upload
		{
		    $error = array('error' => $this->upload->display_errors()); //tampilkan error
		    $this->load->view('update', $error);
		} else
		//jika berhasil upload
		{
		    $file = $this->upload->data();
		    //mengambil data di form
		    $data = ['gambar' => $file['file_name']];
		    unlink('assets/images/'.$gambar->gambar); //menghapus gambar yang lama
		}
		}
		$data['nama_roti']      = set_value('nama_roti');
		$data['harga']   = set_value('harga');
		$this->Produk_model->ubah($id, $data); //memasukan data ke database
		redirect('Welcome/Home'); //mengalihkan halaman
	  }

  	public function hapus($id){
	  $gambar = $this->Produk_model>gambar($id);
	  unlink('assets/images/'.$gambar->gambar);
	  $this->Produk_model>hapus($id);
	  redirect('Welcome/Home'); //mengalihkan halaman
	}
	
}