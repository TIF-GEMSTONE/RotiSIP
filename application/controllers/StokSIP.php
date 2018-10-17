<?php
class StokSIP extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('StokSIP_Model');
	}
	
	function index(){
		$data = array (
				'data' =>$this->StokSIP_Model->get_data());
		$this->load->view('StokSIP_view', $data);
	}
	
	function input(){
		if (isset($_POST['btnTambah'])){
			$data = $this->StokSIP_Model->input(array (
			'id_roti' => $this->input->post('nama_roti'),
			'tgl_produksi' => $this->input->post('tgl_produksi'),
			'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
			'stok' => $this->input->post('stok')
			));
			redirect('StokSIP');
		}//else{
			//$x =$this->StokSIP_Model->get_roti();
			//$data = array(
			//	'roti'=>$this->StokSIP_Model->get_roti()
			//	);
			$this->load->view('CreateStok_view', $data);
		}
	}
	function delete($id){
		$this->StokSIP_Model->delete($id);
		redirect('StokSIP');
	}
	
?>
