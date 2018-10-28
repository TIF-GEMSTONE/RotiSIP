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

	public function logged_id(){
		return $this->session->userdata('username');
	}
	
	function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
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