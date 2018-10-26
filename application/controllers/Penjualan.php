<?php
class Penjualan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('roti_model');
		$this->load->model('Penjualan_model');
	}

	function index(){

		$data['data']=$this->roti_model->tampil_roti();
		$title=array(
	        'title'=>'Penjualan'
	    );	    	    
	    $kode['kode'] = $this->Penjualan_model->get_notrans();
	    $tabel_detail_sip['tabel_detail_sip'] = $this->Penjualan_model->get_penjualan($kode['kode']);
	    $data['total'] = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_sip` WHERE no_transaksi='".$kode['kode']."'")->result();
		$this->load->view('element/header', $title);
		$this->load->view('v_penjualan',$data+$kode+$tabel_detail_sip);
		
		// $this->load->view('element/footer');
		 // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
       
	}

	public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
            $result = $this->Penjualan_model->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                	'label'=> $row->nama_roti,
                	'id_roti' => $row->id_roti,                	
                	'harga' => $row->harga
                );
                echo json_encode($arr_result);
            }
        }
    }

   function search(){ //sub keyword searching
        $title=$this->input->get('title');
        $data['data']=$this->Penjualan_model->search($title);
 		$tit=array(
	        'title'=>'Penjualan'
	    );
		$this->load->view('element/header', $tit);
        $this->load->view('search_view',$data);
    }

	function get_roti(){
		$id_roti=$this->input->post('id_roti');
		$x['roti']=$this->roti_model->get_roti($id_roti);
		$this->load->view('v_detail_jual',$x);

	}

	function add_to_cart(){
		$id_roti=$this->input->post('id_roti');
		$produk=$this->roti_model->get_roti($id_roti);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['id_roti'],
               'name'     => $i['nama_roti'],
              // 'stok'     => $i['stok'],
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harga'))
            );

		if(!empty($this->cart->total_items())){
			foreach ($this->cart->contents() as $items){
				$id=$items['id'];
				$qtylama=$items['qty'];
				$rowid=$items['rowid'];
				$id_roti=$this->input->post('id_roti');
				$qty=$this->input->post('qty');
				if($id==$id_roti){
					$up=array(
						'rowid'=> $rowid,
						'qty'=>$qtylama+$qty
						);
					$this->cart->update($up);
				}else{
					$this->cart->insert($data);
				}
			}
		}else{
			$this->cart->insert($data);
		}

			redirect('Penjualan');

		}

	function remove(){
		$id_roti = $this->uri->segment(3);
		$no_transaksi =	$this->Penjualan_model->get_notrans();
		$this->db->query("DELETE FROM `tabel_detail_sip` WHERE no_transaksi='$no_transaksi' AND id_roti='$id_roti'");
		redirect('Penjualan');

	}

	function simpan_penjualan(){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('Penjualan');
			}else{
				$notrans=$this->Penjualan_model->get_notrans();
				$this->session->set_userdata('notrans',$notrans);
				$session = $this->session->userdata('username');
				$order_proses=$this->Penjualan_model->simpan_penjualan($notrans,$session,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
				}else{
					redirect('Penjualan');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('Penjualan');
		}

	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}

	function inputdetail(){
		$no_transaksi = $this->input->post('no_transaksi');
		$id_roti = $this->input->post('id_roti');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$total = $harga*$jumlah;
		$cek = $this->db->query("SELECT * FROM `tabel_detail_sip` WHERE no_transaksi='".$no_transaksi."' AND id_roti='".$id_roti."'")->num_rows();
		if($cek >= 1){
			$this->db->query("UPDATE `tabel_detail_sip` SET `jumlah`=jumlah+'$jumlah',`total`=total+'$total' WHERE no_transaksi='$no_transaksi' AND id_roti='$id_roti'");
			redirect('Penjualan');
		}
		elseif ($cek == 0){
			$data = array(
			'no_transaksi' => $no_transaksi,
			'id_roti' => $id_roti,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'total' => $total
			);

		$this->Penjualan_model->input_pesan($data,'tabel_detail_sip');
		redirect('Penjualan');
		}

	}

	
}
?>