<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');    //meload model user_m
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->user_m->get();   //panggil model dan functionnya
		$this->template->load('template','user/user_data', $data);  //loading template, user_data dan variable data
	}
	
	

/* 

    
    public function add()
	{
		//print_r($_POST['username']);  //untuk ngetest
		
		//form validation
		// $this->load->library('form_validation');  //sudah diload di function __construct
		$this->form_validation->set_rules('fullname', 'Nama', 'required');  //check rule reference
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]'); //is_unique [namatable,namafield]
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]'); 
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai dengan password') );  //check di user guide rule reference matches

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
			$this->template->load('template','user/user_form');  //loading template, user_data dan variable data
		}	
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);

			if($this->db->affected_rows() >0)
			{
				echo "<script>";
				echo "alert('Data Berhasil Disimpan ";
				echo "</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";  //kembali ke list data

			//$this->load->view('formsuccess');
		}
	}
 */

	public function create()
	{
		$post = $this->input->post(null, TRUE);
		$this->user_m->add($post);
		$this->session->set_flashdata('success', 'Data berhasil ditambah');
		redirect('user'); 
	}

	public function cekuser()
	{
		$count = $this->user_m->cekuser();
		echo $count;
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
		$this->template->load('template','user/user_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}






	
	public function edit($id)
	{
		$query = $this->user_m->get($id);

		if($query->num_rows() >0) {
			$user = $query->row();
			$data = array (
				'page' => 'edit',
				'row' => $user
			);
			$this->template->load('template','user/user_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}




	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->user_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
		//echo "<script>window.location='".site_url('user')."';</script>";
        redirect('user');
    }

	public function del($id)
	{
		$this->user_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');

        }
		echo "<script>window.location='".site_url('user')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->user_m->cari($post);
		$data['search'] = $post;
		$this->template->load('template','user/user_data', $data);
	}
	
}
