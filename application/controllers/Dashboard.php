<?php
class Dashboard extends CI_Controller{
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
		if($this->session->userdata('username')=='admin'){
			$data['produk'] = $this->Produk_model->data();
				$title=array(
		            'title'=>'Dashboard'
		        );
				$this->load->view('element/header', $title);
				$this->load->view('Home_view', $data);
				$this->load->view('element/footer');
			}else{
				redirect('welcome');
			}
	}
	function Home(){
		$data['produk'] = $this->Produk_model->data();
		$title=array(
		            'title'=>'Dashboard'
		        );
		$kode['kode'] = $this->Produk_model->get_id();
		$this->load->view('element/header', $title);
		$this->load->view('Home_view', $data+$kode);
		$this->load->view('element/footer');
	}


	public function input(){
	$title=array(
        'title'=>'Dashboard'
    );
	$this->load->view('element/header', $title);
  	$this->load->view('InputBarang');
  	$this->load->view('element/footer');
    }


	public function tampil(){
		$title=array(
	        'title'=>'Dashboard'
	    );
		$kode['kode'] = $this->Produk_model->get_id();
		$this->load->view('element/header');
		$this->load->view('Home_view', $data+$kode);
		$this->load->view('element/footer');
    }


    public function proses_input(){
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
          // $this->load->view('input', $error);
          echo "gagal input";
      } else
      //jika berhasil upload
      {
          $file = $this->upload->data();
          //mengambil data di form
          $data = ['gambar' => $file['file_name'],
           'nama_roti' => set_value('nama_roti'),
           'harga' => set_value('harga')
         ];
          $this->Produk_model->input($data); //memasukan data ke database
          redirect('Dashboard/Home'); //mengalihkan halaman

      }
  	}

  	public function tambah(){
	    $data = array(
	        'nama_roti'		=> $this->input->post('nama_roti'),
	        'harga'	=> $this->input->post('harga')
	    );
	    $this->Produk_model->tambah($data);
	    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	    redirect('Dashboard/Home');
  	}

  	public function ubah(){
	  	$id_roti = $this->input->post('id_roti');
	    $data = array(
	        'nama_roti'		=> $this->input->post('nama_roti'),
	        'harga'	=> $this->input->post('harga')
	    );
	    $this->Produk_model->ubah($data,$id_roti);
	    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	    redirect('Dashboard/Home');
  	}

  	public function hapus(){
  		$id_roti = $this->uri->segment(3);
		$this->db->query("DELETE FROM `tabel_roti` WHERE id_roti='$id_roti'");
		redirect('Dashboard/Home');
	}
	
}
?>