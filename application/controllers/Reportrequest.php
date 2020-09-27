<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportrequest extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('reportrequest_m'); 
		$this->load->model('feeder_m');    //meload model feeder_m
		$this->load->model('divbran_m');    //meload model feeder_m
		$this->load->model('master_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2) { 

			$divbran =  $this->fungsi->user_login()->divbran;
			$data['row'] = $this->reportrequest_m->getawal($divbran);   //panggil model dan functionnya
		  
		  } else
		  {
			$data['row'] = $this->reportrequest_m->get();   //panggil model dan functionnya
		  }
      
		$feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();

		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();

		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','reportrequest/reportrequest_data', $data);  //loading template, feeder_data dan variable data
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
		$requestid = str_replace("/","@",$post['requestno']);
		// print_r($post);
		// die();
		$url = $this->reportrequest_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('reportrequest/edit/'.$url); 
	}

	public function cekrequest()
	{
		$count = $this->reportrequest_m->cekrequest();
		echo $count;
	}

	public function add()
	{
			$feeder = new stdClass();
			$feeder->feedercode = null;
			$feeder->name = null ; 
			$type = $this->reportrequest_m->getType();
			$typeRow = $type->result_array();
			$Boxowner = $this->master_m->getBoxowner();
			$BoxownerRow = $Boxowner->result();


			$data = array (
				'page' => 'add',
				'row' => $feeder,
				'typeRow' => $typeRow,
				'BoxownerRow' => $BoxownerRow
			);
			$divbranQuery = $this->divbran_m->get();
			$data['divbranRow'] = $divbranQuery->result();
			$portdestQuery = $this->master_m->getPort();
			$data['portdestRow'] = $portdestQuery->result();

		$this->template->load('template','reportrequest/reportrequest_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}
	
	public function edit($id)
	{
		$query = $this->reportrequest_m->get(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$detailQuery = $this->reportrequest_m->getDetail(str_replace("@","/",$id));
			$detailRow = $detailQuery->result_array();
			$type = $this->reportrequest_m->getType();
			$typeRow = $type->result_array();
			$Boxowner = $this->master_m->getBoxowner();
			$BoxownerRow = $Boxowner->result();


			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'detailRow' => $detailRow,
				'typeRow' => $typeRow,
				'BoxownerRow' => $BoxownerRow
			);
			$divbranQuery = $this->divbran_m->get();
			$data['divbranRow'] = $divbranQuery->result();
			$portdestQuery = $this->master_m->getPort();
			$data['portdestRow'] = $portdestQuery->result();
			$this->template->load('template','reportrequest/reportrequest_formedit' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('reportrequest')."';</script>";
		}
	}

	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->reportrequest_m->edit($post);
		$requestid = str_replace("/","@",$post['requestno']);
		

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('reportrequest/edit/'.$requestid);
    }

    public function adddetail()
	{
		$post = $this->input->post(null, TRUE);
		$this->reportrequest_m->adddetail($post);
		echo "sukses++Data berhasil disimpan";
	}

    public function updatedetail()
	{
		$post=$this->input->post(null, TRUE);
		// die(print_r($post));
		$this->reportrequest_m->editDetail($post);

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
		$this->reportrequest_m->hapusDetail($post);
        echo "sukses++Record Deleted";
    }

	public function del($id)
	{
		$this->reportrequest_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('reportrequest')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->reportrequest_m->cari($post);
		$data['search'] = $post;
		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();
		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','reportrequest/reportrequest_data', $data);
	}
	
}
