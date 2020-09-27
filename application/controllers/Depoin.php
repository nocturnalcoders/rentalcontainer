<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depoin extends CI_Controller {

	private $filename = "import_data";

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('depoin_m'); 
		$this->load->model('feeder_m');    //meload model feeder_m
		$this->load->library('form_validation');
	}

	public function index($page = null)
	{
        $data['row'] = $this->depoin_m->get();   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = $page;
		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data
	
	}
	
	



	public function depoin()
	{
        $data['row'] = $this->depoin_m->get('IN');   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = 'depoin';

		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data
	}
	

	
	public function depoout()
	{
        $data['row'] = $this->depoin_m->get('OUT');   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = 'depoout';

		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data




	}
	
	public function sailing()
	{
        $data['row'] = $this->depoin_m->get('SAILING');   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = 'sailing';

		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data
	}
	

	public function export()
	{
        $data['row'] = $this->depoin_m->get('EXPORT');   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = 'export';

		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data
	}

	public function arrival()
	{
        $data['row'] = $this->depoin_m->get('ARRIVAL');   //panggil model dan functionnya
        $feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = 'arrival';

		$this->template->load('template','depoin/depoin_data', $data);  //loading template, feeder_data dan variable data
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
		$this->depoin_m->add($post);
		$this->session->set_flashdata('success', 'Data Added Succesfully');
		redirect('depoin'); 
	}

	public function createupload($page)
	{
		$post = $this->input->post(null, TRUE);
		$this->depoin_m->addUpload($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
			$this->session->set_flashdata('success', 'Data Updated');
			$data['row'] = $this->depoin_m->get();   //panggil model dan functionnya
			$feedQuery = $this->feeder_m->get();
			$data['feedRow'] = $feedQuery->result();
			$data['page'] = $page;
			$this->template->load('template','depoin/depoin_data', $data);
		}
		 else {
			echo "<script>alert('Uploade Error..');</script>";
			echo "<script>window.location='".site_url('depoin')."';</script>";
		}


	

	}

	public function cekfeeder()
	{
		$count = $this->depoin_m->cekfeeder();
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
		$this->template->load('template','depoin/depoin_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
	}






	
	public function edit($id)
	{
		$query = $this->depoin_m->get($id);

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$feedQuery = $this->feeder_m->get();
			$feedRow = $feedQuery->result();
			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'feedRow' => $feedRow
			);
			$this->template->load('template','depoin/depoin_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('Data Not Found');</script>";
			echo "<script>window.location='".site_url('depoin')."';</script>";
		}
	}




	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->depoin_m->edit($post);

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data Updated');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('depoin');
    }

	public function del($id)
	{
		$this->depoin_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data Deleted');

        }
		echo "<script>window.location='".site_url('depoin')."';</script>";

	}

	public function cari($page)
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->depoin_m->cari($post, $page);
		$data['search'] = $post;
		$feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$data['page'] = $page;
		$this->template->load('template','depoin/depoin_data', $data);
	}

	public function upload($page)
	{	
		
		$data['page'] = $page;

		$this->template->load('template','depoin/depoin_upload', $data);
	}


	
	public function preview($page){
    $data = array(); // Buat variabel $data sebagai array
    $post=$this->input->post(null, TRUE);
    // die(print_r($post));
    
    if(isset($post['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di depoin_m.php
      $upload = $this->depoin_m->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
		$data['result'] = "sukses";
		$data['resulttombol'] = "sukses";
        $data['sheet'] = $sheet;
        $containerno = array();
        $movestatus = array();
		$movedate = array();
		$doexcel = array();

        $containerno_query = array();
        $movestatus_query = array();
		$movedate_query = array();
		$doexcel_query = array();
	
		
		$containernoDB = array();
		$doexcelDB= array();

        for ($i=2; $i <= count($sheet); $i++) { 
        	$containerno[] = "containerno -> ".$sheet[$i]['A'];
			$movestatus[] = "movestatus -> ".$sheet[$i]['G'];
			$movedate[] = "movedate -> ".$sheet[$i]['H'];
			$doexcel[] = "movedate -> ".$sheet[$i]['D'];

			$containerno_query[] = str_replace(' ', '', str_replace("'", '',$sheet[$i]['A']));
	        $movestatus_query[] = str_replace(' ', '',$sheet[$i]['H']);
			$movedate_query[] = str_replace(' ', '',date("Y-m-d", strtotime($sheet[$i]['I'])));
			$doexcel_query[] = str_replace(' ', '', str_replace("'", '',$sheet[$i]['D']));


			$containernoS = str_replace(' ', '', str_replace("'", '',$sheet[$i]['A']));
	        $movestatusS = str_replace(' ', '',$sheet[$i]['H']);
			$movedateS = str_replace(' ', '',date("Y-m-d", strtotime($sheet[$i]['I'])));
			$doexcelS =  str_replace(' ', '', str_replace("'", '',$sheet[$i]['D']));
			

			$cekdo = $this->depoin_m->cekDO($doexcelS);
			if($cekdo->num_rows() > 0) {
			
			}else
			{
				$doexcelDB[] = $doexcelS . " Tidak Ada" ;
				$data['resulttombol'] = "error";
			}


	/* 		foreach ($cekdo['dofeederxls'] as $key => $value) {
				$containernoDB[] = "containerno -> ".$value['containerno']." movestatus -> ".$movestatusS." movedate -> ".$movedateS." sudah ada didatabase";
			} */

		/* 	//$row=$query->result_array();
			if($cekdo->num_rows() > 0) {
			
			}else
			{
				$data['DOFeeder'] = $donumberfeeder . " Tidak Ada" ;
			} */


				
			$cekdata = $this->depoin_m->cekData($containernoS,$movestatusS,$movedateS);	
	
			foreach ($cekdata['containerno'] as $key => $value) {
				$containernoDB[] = "containerno -> ".$value['containerno']." movestatus -> ".$movestatusS." movedate -> ".$movedateS." sudah ada didatabase";
				$data['resulttombol'] = "error";
			}
        }

		//$cekdata = $this->depoin_m->cekDO($containerno_query,$movestatus_query,$movedate_query);



     /*    $cekdata = $this->depoin_m->cekData($containerno_query,$movestatus_query,$movedate_query);

        $containernoDB = array();
        $movestatusDB = array();
        $movedateDB = array();

        foreach ($cekdata['containerno'] as $key => $value) {
        	$containernoDB[] = "containerno -> ".$value['containerno']." sudah ada didatabase";
        } */

 /*        foreach ($cekdata['movestatus'] as $key => $value) {
        	$movestatusDB[] = "movestatus -> ".$value['movestatus']." sudah ada didatabase";
        }

        foreach ($cekdata['movedate'] as $key => $value) {
        	$movedateDB[] = "movedate -> ".$value['movedate']." sudah ada didatabase";
        } */

        // print_r($containerno);
        // die();

        // $data['containerno'] = array_count_values($containerno);
        // $data['movestatus'] = array_count_values($movestatus);
        // $data['movedate'] = array_count_values($movedate);
		$data['doexcelDB'] = $doexcelDB;
		 $data['containernoDB'] = $containernoDB;
		 //print_r($data['containernoDB']);
			 

        // $data['movestatusDB'] = $movestatusDB;
        // $data['movedateDB'] = $movedateDB;
	
		
		
		// die(print_r($data['containernoDB']));
        // print_r($containerno);
      }else{ // Jika proses upload gagal
      	$data['result'] = "error";
        $data['upload_error'] = $upload['error']; 
        // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
	$data['page'] = $page;
    $this->template->load('template','depoin/depoin_upload', $data);
  }
  
  // public function import(){
  //   // Load plugin PHPExcel nya
  //   include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
  //   $excelreader = new PHPExcel_Reader_Excel2007();
  //   $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
  //   $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
  //   // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
  //   $data = array();
    
  //   $numrow = 1;
  //   foreach($sheet as $row){
  //     // Cek $numrow apakah lebih dari 1
  //     // Artinya karena baris pertama adalah nama-nama kolom
  //     // Jadi dilewat saja, tidak usah diimport
  //     if($numrow > 1){
  //       // Kita push (add) array data ke variabel data
  //       array_push($data, array(
  //         'nis'=>$row['A'], // Insert data nis dari kolom A di excel
  //         'nama'=>$row['B'], // Insert data nama dari kolom B di excel
  //         'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
  //         'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
  //       ));
  //     }
      
  //     $numrow++; // Tambah 1 setiap kali looping
  //   }
  //   // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
  //   $this->depoin_m->insert_multiple($data);
    
  //   redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  // }

  public function download()
  {
      $data['file'] = file_get_contents("/depoin/sampel/sampel_excel.xlsx");
  }
	
}
