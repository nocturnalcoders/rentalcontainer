<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depo extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('depo_m'); 
		$this->load->model('master_m');    //meload model depo_m
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->depo_m->get();   //panggil model dan functionnya
		$Port = $this->master_m->getPort();
		$data['PortRow'] = $Port->result();
		$this->template->load('template','depo/depo_data', $data);  //loading template, depo_data dan variable data
	}
	
	

/* 

    
    public function add()
	{
		//print_r($_POST['deponame']);  //untuk ngetest
		
		//form validation
		// $this->load->library('form_validation');  //sudah diload di function __construct
		$this->form_validation->set_rules('fullname', 'Nama', 'required');  //check rule reference
		$this->form_validation->set_rules('deponame', 'deponame', 'required|min_length[5]|is_unique[depo.deponame]'); //is_unique [namatable,namafield]
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]'); 
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai dengan password') );  //check di depo guide rule reference matches

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
			$this->template->load('template','depo/depo_form');  //loading template, depo_data dan variable data
		}	
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->depo_m->add($post);

			if($this->db->affected_rows() >0)
			{
				echo "<script>";
				echo "alert('Data Berhasil Disimpan ";
				echo "</script>";
			}
			echo "<script>window.location='".site_url('depo')."';</script>";  //kembali ke list data

			//$this->load->view('formsuccess');
		}
	}
 */

	public function create()
	{
		$post = $this->input->post(null, TRUE);
		$this->depo_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('depo'); 
	}

	public function cekdepo()
	{
		$count = $this->depo_m->cekdepo();
		echo $count;
	}

	public function add()
	{
			$depo = new stdClass();
			$depo->depocode = null;
			$depo->name = null ; 
			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();
			$data = array (
				'page' => 'add',
				'row' => $depo,
				'PortRow' => $PortRow
			);
		$this->template->load('template','depo/depo_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}






	
	public function edit($id)
	{
		$id = str_replace("%20", " ", $id);
		$query = $this->depo_m->get($id);

		if($query->num_rows() >0) {
			$depo = $query->row();
			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();
			$data = array (
				'page' => 'edit',
				'row' => $depo,
				'PortRow' => $PortRow
			);
			$this->template->load('template','depo/depo_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('depo')."';</script>";
		}
	}




	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->depo_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('depo')."';</script>";
        redirect('depo');
    }

	public function del($id)
	{
		$id = str_replace("%20", " ", $id);
		$this->depo_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('depo')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->depo_m->cari($post);
		$data['search'] = $post;
		$Port = $this->master_m->getPort();
		$data['PortRow'] = $Port->result();
		$this->template->load('template','depo/depo_data', $data);
	}
	
}
