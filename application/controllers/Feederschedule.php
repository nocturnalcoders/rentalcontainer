<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feederschedule extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('feederschedule_m'); 
		$this->load->model('feeder_m');    //meload model feeder_m
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->feederschedule_m->get();   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$this->template->load('template','feederschedule/feederschedule_data', $data);  //loading template, feeder_data dan variable data
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
		$post = $this->input->post(null, TRUE);
		$this->feederschedule_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Succesfully');
		redirect('feederschedule'); 
	}

	public function cekfeeder()
	{
		$count = $this->feederschedule_m->cekfeeder();
		echo $count;
	}

	public function add()
	{
			$feeder = new stdClass();
			$feeder->feedercode = null;
			$feeder->name = null ; 
			$feedQuery = $this->feeder_m->get();
			$feedRow = $feedQuery->result();
			$data = array (
				'page' => 'add',
				'row' => $feeder,
				'feedRow' => $feedRow
			);
		$this->template->load('template','feederschedule/feederschedule_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}






	
	public function edit($id)
	{
		$query = $this->feederschedule_m->get($id);

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$feedQuery = $this->feeder_m->get();
			$feedRow = $feedQuery->result();
			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'feedRow' => $feedRow
			);
			$this->template->load('template','feederschedule/feederschedule_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('feederschedule')."';</script>";
		}
	}




	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->feederschedule_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('feederschedule');
    }

	public function del($id)
	{
		$this->feederschedule_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('feederschedule')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->feederschedule_m->cari($post);
		$data['search'] = $post;
		$feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$this->template->load('template','feederschedule/feederschedule_data', $data);
	}
	
}
