<?php
class Pesanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Pesanan_model');
	}
	
	function index(){
		$data = array (
				'data' =>$this->Pesanan_model->get_data());
		$title=array(
	        'title'=>'Pesanan'
	    );
	    $this->load->view('element/header', $title);
		$this->load->view('ReadPesanan_view', $data);
		$this->load->view('element/footer');
	}
	
	public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
            $result = $this->Pesanan_model->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                	'label'=> $row->nama_roti,
                	'id_roti' => $row->id_roti
                );
                echo json_encode($arr_result);
            }
        }
    }

	function input(){
		if (isset($_POST['btnTambah'])){
			$data = $this->Pesanan_model->input(array (
			'id_pesan' => $this->input->post('id_pesan'),
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'no_telp' => $this->input->post('no_telp'),
			'id_roti' => $this->input->post('nama_roti'),
			'jumlah_roti' => $this->input->post('jumlah_roti'),
			'tgl_pesan' => $this->input->post('tgl_pesan'),
			'tgl_ambil' => $this->input->post('tgl_ambil'),
			'jam_ambil' => $this->input->post('jam_ambil')
			));

			$data = $this->Pesanan_model->input1(array (
			'id_pesan' => $this->input->post('id_pesan'),
			'id_roti' => $this->input->post('nama_roti'),
			'jumlah_roti' => $this->input->post('jumlah_roti')
			));
			redirect('Pesanan');
		}else{
			$x =$this->Pesanan_model->get_roti();
			$data = array(
				'roti'=>$this->Pesanan_model->get_roti()
				);
			$title=array(
		        'title'=>'Pesanan'
		    );
		    $kode['kode'] = $this->Pesanan_model->get_notrans();
			$this->load->view('element/header', $title);
			$this->load->view('CreatePesanan_view', $data+$kode);
			// $this->load->view('element/footer');
		}
	}
	function delete($id){
		$this->Pesanan_model->delete($id);
		redirect('Pesanan');
	}
	function edit(){
		$id = $this->uri->segment(3);
		$data = array(
            'user' => $this->Pesanan_model->get_data_edit($id),
		);
		$data['id_roti']= $this->Pesanan_model->get_roti();
     	$data['nama_roti']= $this->Pesanan_model->get_roti();
		$title=array(
	        'title'=>'Pesanan'
	    );
		$this->load->view('element/header', $title);
        $this->load->view("UpdatePesanan_view", $data);
		$this->load->view('element/footer');
	}
	
	function update(){
		$id = $this->input->post('id_pesan');
		$insert = $this->Pesanan_model->update(array(
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'no_telp' => $this->input->post('no_telp'),
			'id_roti' => $this->input->post('nama_roti'),
			'jumlah_roti' => $this->input->post('jumlah_roti'),
			'tgl_pesan' => $this->input->post('tgl_pesan'),
			'tgl_ambil' => $this->input->post('tgl_ambil'),
			'jam_ambil' => $this->input->post('jam_ambil')
            ), $id);

        redirect('Pesanan');
        }

    function detail($id){
    	$data = array (
				'detail' =>$this->Pesanan_model->get_detail($id));
		$title=array(
	        'title'=>'Pesanan'
	    );
		$this->load->view('element/header', $title);
        $this->load->view("DetailPesanan_view", $data);
		$this->load->view('element/footer');
    }

}
?>
