<?php
class Login_model extends CI_Model{
	public $username;
	public $password;

	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

	public function cek_log(){
		$sql = sprintf("SELECT COUNT(*) AS hitung FROM tabel_pegawai WHERE username='%s' AND password='%s'",
			$this->username,
			$this->password);
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['hitung'] == 1;
	}

	private function _attributeLabels(){
		return [
			'username'=>'User :',
			'password'=>'Password :'];
	}
	
  public function input($data){
    try{
      $this->db->insert('tabel_roti', $data);
      return true;
    }catch(Exception $e){
    }
  }
}
?>