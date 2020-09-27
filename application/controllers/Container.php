<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Container extends CI_Controller {
	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('container_m');    //meload model user_m
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->container_m->get();
		$this->template->load('template','container/container_data', $data);
	}

	public function add()
	{
			$user = new stdClass();
			$user->user_id = null;
			$user->name = null ; 
			$data = array (
				'page' => 'add',
				'row' => $user
			);
		$this->template->load('template','container/container_form' , $data);
	}

	public function create()
	{
		$post = $this->input->post(null, TRUE);
		$this->container_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('container'); 
	}

	public function cekuser()
	{
		$count = $this->container_m->cekuser();
		echo $count;
	}

	public function edit($id)
	{
		$query = $this->container_m->get($id);

		if($query->num_rows() >0) {
			$container = $query->row();
			$data = array (
				'page' => 'edit',
				'row' => $container
			);
			$this->template->load('template','container/container_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->container_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('user')."';</script>";
        redirect('container');
    }

    public function del($id)
	{
		$this->container_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('container')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->container_m->cari($post);
		$data['search'] = $post;
		$this->template->load('template','container/container_data', $data);
	}
}