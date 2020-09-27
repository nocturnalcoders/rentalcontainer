<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feeder extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('feeder_m'); 
		$this->load->model('container_m');    //meload GROUP RATE
		$this->load->model('master_m');    
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->feeder_m->get();   //panggil model dan functionnya
        $contQuery = $this->container_m->get();
		$data['contRow'] = $contQuery->result();

		$Port = $this->master_m->getPort();
		$data['PortRow'] = $Port->result();

		$this->template->load('template','feeder/feeder_data', $data);  //loading template, feeder_data dan variable data
	}
	
	

/* 

    
    public function add()
	{
		//print_r($_POST['feedername']);  //untuk ngetest
		
		//form validation
		// $this->load->library('form_validation');  //sudah diload di function __construct
		$this->form_validation->set_rules('fullname', 'Nama', 'required');  //check rule reference
		$this->form_validation->set_rules('feedername', 'feedername', 'required|min_length[5]|is_unique[feeder.feedername]'); //is_unique [namatable,namafield]
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]'); 
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai dengan password') );  //check di feeder guide rule reference matches

		// $this->form_validation->set_rules('address', 'Alamat', 'required');  //tidak mandatory
		$this->form_validation->set_rules('level', 'Level', 'required'); 

		//mengganti message bawaan dari form validation
		$this->form_validation->set_message('required','%s masih kosong, silahkan isi'); 
		$this->form_validation->set_message('min_length','{field} minimal 5 karakter'); 
		$this->form_validation->set_message('is_unique','{field} sudah dipakai, gunakan id lain'); 
		
		//menambahkan delimter setiap textboc form validation yang berwarna merah
		$this->form_validation->set_error_delimiters('<span class ="help-block">', '</span>');
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','feeder/feeder_form');  //loading template, feeder_data dan variable data
		}	
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->feeder_m->add($post);

			if($this->db->affected_rows() >0)
			{
				echo "<script>";
				echo "alert('Data Berhasil Disimpan ";
				echo "</script>";
			}
			echo "<script>window.location='".site_url('feeder')."';</script>";  //kembali ke list data

			//$this->load->view('formsuccess');
		}
	}
 */

	public function create()
	{
/* 		$post = $this->input->post(null, TRUE);
		$this->feeder_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('feeder'); 

 */

		$post = $this->input->post(null, TRUE);
		$feedercode = str_replace("/","@",$post['feedercode']);
		// print_r($post);
		// die();
		$url = $this->feeder_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('feeder/edit/'.$feedercode); 
		


		
	}

	public function cekfeeder()
	{
		$count = $this->feeder_m->cekfeeder();
		echo $count;
	}

	public function add()
	{
			$feeder = new stdClass();
			$feeder->feedercode = null;
			$feeder->name = null ; 
			$contQuery = $this->container_m->get();
			$contRow = $contQuery->result();



			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();


			$data = array (
				'page' => 'add',
				'row' => $feeder,
				'contRow' => $contRow,
				'PortRow' => $PortRow
			);
		$this->template->load('template','feeder/feeder_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}






	
	public function edit($id)
	{
		$id = str_replace("%20", " ", $id);
		$query = $this->feeder_m->get($id);
		//$query = $this->feeder_m->get(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$contQuery = $this->container_m->get();
			$contRow = $contQuery->result();

			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();

			$detailQuery = $this->feeder_m->getDetail(str_replace("@","/",$id));
			$detailRow = $detailQuery->result_array();

			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'contRow' => $contRow,
				'detailRow' => $detailRow,
				'PortRow' => $PortRow

			);
			$this->template->load('template','feeder/feeder_formedit' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('feeder')."';</script>";
		}





	}




	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->feeder_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('feeder');
    }

	public function del($id)
	{
		$id = str_replace("%20", " ", $id);
		$this->feeder_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('feeder')."';</script>";

	}





    public function adddetail()
	{
		$post = $this->input->post(null, TRUE);
		$this->feeder_m->adddetail($post);
		echo "sukses++Data berhasil disimpan";
	}

    public function updatedetail()
	{
		$post=$this->input->post(null, TRUE);
		// die(print_r($post));
		$this->feeder_m->editDetail($post);

		if($this->db->affected_rows() > 0) 
		{
            // $this->session->set_flashdata('success', 'Data berhasil disimpan');
            echo "sukses++Record Updated";
        }else{
        	echo "non++No Changes";
        }
    }

    public function hapusdetail()
	{
		$post=$this->input->post(null, TRUE);
	//	die(print_r($post));
		$this->feeder_m->hapusDetail($post);
        echo "sukses++Record Deleted";
    }







	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->feeder_m->cari($post);
		$data['search'] = $post;
		$contQuery = $this->container_m->get();
		$data['contRow'] = $contQuery->result();
		$this->template->load('template','feeder/feeder_data', $data);
	}
	
}
