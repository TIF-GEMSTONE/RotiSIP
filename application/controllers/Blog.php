<?php
class Blog extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
    }
 
    function index(){
        $this->load->view('blog_view');
    }
 
    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->blog_model->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_roti;
                echo json_encode($arr_result);
            }
        }
    }
 
}