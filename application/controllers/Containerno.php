<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Containerno extends CI_Controller {
	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('containerno_m');    //meload model user_m
		$this->load->model('master_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->containerno_m->get();
		$this->template->load('template','containerno/containerno_data', $data);
	}

	public function add()
	{
			$user = new stdClass();
			$user->user_id = null;
			$user->name = null ; 
			$type = $this->containerno_m->getType();
			$typeRow = $type->result();
			$Boxowner = $this->containerno_m->getBoxowner();
			$BoxownerRow = $Boxowner->result();

			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();
			$Depo = $this->master_m->getDepo();
			$DepoRow = $Depo->result();
			$data = array (
				'page' => 'add',
				'row' => $user,
				'typeRow' => $typeRow,
				'BoxownerRow' => $BoxownerRow,
				'PortRow' => $PortRow,
				'DepoRow' => $DepoRow
			);
		$this->template->load('template','containerno/containerno_form' , $data);
	}

	public function create()
	{
		$post = $this->input->post(null, TRUE);
		$this->containerno_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('containerno'); 
	}

	public function cekcontainerno()
	{
		$count = $this->containerno_m->cekcontainer();
		echo $count;
	}

	public function edit($id)
	{
		$query = $this->containerno_m->get($id);

		if($query->num_rows() >0) {

			$containerno = $query->row();

			$type = $this->containerno_m->getType();
			$typeRow = $type->result();		
			$Boxowner = $this->containerno_m->getBoxowner();
			$BoxownerRow = $Boxowner->result();

			$Port = $this->master_m->getPort();
			$PortRow = $Port->result();
			$Depo = $this->master_m->getDepo();
			$DepoRow = $Depo->result();


			$data = array (
				'page' => 'edit',
				'row' => $containerno,
				'typeRow' => $typeRow,
				'BoxownerRow' => $BoxownerRow,
				'PortRow' => $PortRow,
				'DepoRow' => $DepoRow
			);
			$this->template->load('template','containerno/containerno_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->containerno_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('user')."';</script>";
        redirect('containerno');
    }

    public function del($id)
	{
		$this->containerno_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('containerno')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->containerno_m->cari($post);
		$data['search'] = $post;
		
		$this->template->load('template','containerno/containerno_data', $data);
	}


	public function caridaridashboard($dofeeder)
	{
	
		$data['row'] = $this->containerno_m->caridaridashboard($dofeeder);
		$data['search'] = $dofeeder;
		
		$this->template->load('template','containerno/containerno_datadashboard', $data);
	}
}