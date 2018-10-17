<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function input(){
      $this->load->view('input');
    }

  public function tampil(){
      $this->load->view('Home_view');
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
          $data = ['gambar' =>$file['file_name'],
           'nama_roti' => set_value('nama_roti'),
           'harga' => set_value('harga')
         ];
          $this->Produk_model->input($data); //memasukan data ke database
          redirect('produk/tampil'); //mengalihkan halaman

      }
  	}


}
