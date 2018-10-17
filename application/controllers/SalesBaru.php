<?php
	class SalesBaru extends CI_Controller{
		public $model = NULL;

		public function __construct(){
			parent::__construct();
			$this->load->model('SalesBaru_model');
			$this->model = $this->SalesBaru_model;

			$this->load->database();
			$this->load->helper('url');
		}

		public function index(){
			$this->read();
		}

		public function create(){
			if (isset($_POST['btnSubmit'])) {
				$this->model->id_sales = $_POST['id_sales'];
				$this->model->nama_sales = $_POST['nama_sales'];
				$this->model->alamat = $_POST['alamat'];
				$this->model->no_telp = $_POST['no_telp'];
				$this->model->username = $_POST['username'];
				$this->model->password = $_POST['password'];
				$this->model->insert();
				redirect('SalesBaru');
			}else{
				$this->load->view('CreateSales_view', ['model'=>$this->model]);
			}
		}

		public function read(){
			$rows = $this->model->read();
			$this->load->view('ReadSales_view', ['rows'=>$rows]);
		}

		public function update($id_up){
			if (isset($_POST['btnSubmit'])) {
				$this->model->id_sales = $_POST['id_sales'];
				$this->model->nama_sales = $_POST['nama_sales'];
				$this->model->alamat = $_POST['alamat'];
				$this->model->no_telp = $_POST['no_telp'];
				$this->model->username = $_POST['username'];
				$this->model->password = $_POST['password'];
				$this->model->update();
				redirect('SalesBaru');
			}else{
				$query = $this->db->query("SELECT * FROM tabel_sales WHERE id_sales='$id_up'");
				$row = $query->row();
				$this->model->id_sales = $row->id_sales;
				$this->model->nama_sales = $row->nama_sales;
				$this->model->alamat = $row->alamat;
				$this->model->no_telp = $row->no_telp;
				$this->model->username = $row->username;
				$this->model->password = $row->password;
				$this->load->view('UpdateSales_view', ['model'=>$this->model]);
			}
		}

		public function delete($id_del){
			$this->model->id_sales = $id_del;
			$this->model->delete();
			redirect('SalesBaru');
		}
}
	
?>