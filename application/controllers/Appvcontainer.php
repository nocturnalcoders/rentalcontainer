<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appvcontainer extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('appvcontainer_m'); 
		$this->load->model('feeder_m');    //meload model feeder_m
		$this->load->model('divbran_m');    //meload model feeder_m
		$this->load->library('form_validation');
		$this->load->model('user_m');
		$this->load->model('master_m');
		$this->load->model('assignfeeder_m'); 
	}

	public function index()
	{
        $data['row'] = $this->appvcontainer_m->get();   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();

		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();
		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','appvcontainer/appvcontainer_data', $data);
	}

	public function ceklogin()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->user_m->login($post);

		if($query->num_rows() > 0) {
				
	     	$row = $query->row();

			$params = array(
                'user_id'=> $row->user_id,
                'username'=> $row->username,
				'level' => $row->level,
			);

			// if ($row->level == 1) {
			// 	# do something
			// }

			echo "ada++";
			echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> ';
			echo "<button type='button' class='btn btn-primary' onclick='formSubmit()'>Save</button>";
			echo "++";
			echo $row->username;

		}else{
			echo "tidak++";
			echo "Wrong Username Or Password!!!";
		}
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
		$this->appvcontainer_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect('appvcontainer/edit/'.$requestid); 
	}

	public function cekrequest()
	{
		$count = $this->appvcontainer_m->cekrequest();
		echo $count;
	}

	public function add()
	{
			$feeder = new stdClass();
			$feeder->feedercode = null;
			$feeder->name = null ; 
			$type = $this->appvcontainer_m->getType();
			$typeRow = $type->result_array();
			$data = array (
				'page' => 'add',
				'row' => $feeder,
				'typeRow' => $typeRow
			);
		$this->template->load('template','appvcontainer/appvcontainer_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}
	
	public function edit($id)
	{
		$query = $this->appvcontainer_m->get(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$detailQuery = $this->appvcontainer_m->getDetail(str_replace("@","/",$id));
		//	$detailQuery2 = $this->appvcontainer_m->getDetail2(str_replace("@","/",$id));
			$detailRow = $detailQuery->result_array();
		//	$detailRow2 = $detailQuery2->result_array();
			$type = $this->appvcontainer_m->getType();
			$typeRow = $type->result_array();
			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'detailRow' => $detailRow,
				//'detailRow2' => $detailRow2,
				'typeRow' => $typeRow
			);
			$this->template->load('template','appvcontainer/appvcontainer_formedit' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		//	$this->template->load('template','appvcontainer/appvcontainer_formedit_yang_numplek' , $data); 
			
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('appvcontainer')."';</script>";
		}
	}

	public function process($id)
	{
		$post=$this->input->post(null, TRUE);
		$this->appvcontainer_m->edit($id, $post);
		$requestid = str_replace("@","/",$post['requestno']);
		

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Update');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('appvcontainer/edit/'.$id);
    }

    public function adddetail()
	{
		$post = $this->input->post(null, TRUE);
		$this->appvcontainer_m->adddetail($post);
		echo "sukses++Record Added Successfully";
	}

    public function updatedetail()
	{
		$post=$this->input->post(null, TRUE);
		// die(print_r($post));
		$this->appvcontainer_m->editDetail($post);

		if($this->db->affected_rows() > 0) 
		{
            // $this->session->set_flashdata('success', 'Data berhasil disimpan');
            echo "sukses++Data Updated";
        }else{
        	echo "non++No Changes";
        }
    }

    public function hapusdetail()
	{
		$post=$this->input->post(null, TRUE);
		$this->appvcontainer_m->hapusDetail($post);
        echo "sukses++Record Deleted";
    }

	public function del($id)
	{
		$this->appvcontainer_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('appvcontainer')."';</script>";

	}

	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->appvcontainer_m->cari($post);
		$data['search'] = $post;
		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();
		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','appvcontainer/appvcontainer_data', $data);
	}

	public function cekasg()
	{
		$post=$this->input->post(null, TRUE);
		$requestno_auto = $this->appvcontainer_m->getReleasenumber();
		if (empty($post['releasenumber'])) {
			$feeder = new stdClass();
			$feeder->feedercode = null;
			$feeder->name = null ; 
			$type = $this->assignfeeder_m->getType();
			$typeRow = $type->result_array();
	        $approvedQuery = $this->assignfeeder_m->getApprove();
			$feedSearch = $this->assignfeeder_m->feedSearch();
			$feedQuery = $this->feeder_m->get();
			//$data['feedRow'] = $feedQuery->result();

			$data = array (
				'page' => 'add',
				'row' => $feeder,
				'approvedQueryRow' => $approvedQuery->result(),
				'feedSearch' => $feedSearch->result(),
				'feedRow' => $feedQuery->result(),
				'requestno_auto' => $requestno_auto,
				'post' => $post
			);
			$this->load->view('appvcontainer/appvcontainer_formasg', $data);
		}else{
			$query = $this->assignfeeder_m->get(str_replace("@","/",$post['releasenumber']));

			// if($query->num_rows() >0) {
				$asg = $query->row();
				$detailQuery = $this->assignfeeder_m->getDetail(str_replace("@","/",$post['releasenumber']));
				$detailRow = $detailQuery->result_array();
				$type = $this->assignfeeder_m->getType();
				$typeRow = $type->result_array();
				$approvedQuery = $this->assignfeeder_m->getApprove();
				$feedSearch = $this->assignfeeder_m->feedSearch();
				$feedQuery = $this->feeder_m->get();
				//$data['feedRow'] = $feedQuery->result();

				// print_r($detailRow);
				$data = array (
					'page' => 'edit',
					'row' => $asg,
					'detailRow' => $detailRow,
					'approvedQueryRow' => $approvedQuery->result(),
					'feedSearch' => $feedSearch->result(),
					'typeRow' => $typeRow,
					'feedRow' => $feedQuery->result(),
					'requestno_auto' => $requestno_auto,
					'post' => $post
				);
				$this->load->view('appvcontainer/appvcontainer_formasg', $data);
			// } else {
			// 	echo "<script>alert('data tidak ditemukan');</script>";
			// 	// echo "<script>window.location='".site_url('assignfeeder')."';</script>";
			// }
		}
	}
	
}
