<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignfeeder extends CI_Controller {

	function __construct()    //digunakan untuk meload model pertama kali
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('assignfeeder_m'); 
		$this->load->model('feeder_m');    //meload model feeder_m
		$this->load->model('divbran_m');    //meload model divbran_m
		$this->load->model('master_m');    
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->assignfeeder_m->get();
		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();
		$feedQuery = $this->feeder_m->get();
		$data['feedRow'] = $feedQuery->result();
		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','assignfeeder/assignfeeder_data', $data);  //loading template, feeder_data dan variable data
	
	
	
	
	}

	public function pilihdo()
	{
		$post=$this->input->post(null, TRUE);
		$hasil = $this->assignfeeder_m->pilihdo($post);
		foreach ($hasil['doHeader'] as $key => $value) {
			echo $value['requestno']."+==+";
			echo $value['donumber']."+==+";
			echo $value['dodate']."+==+";
			echo $value['divbran']."+==+";
			echo $value['picrequest']."+==+";
		}
		$table = "";
		foreach ($hasil['doDetail'] as $key => $value) {
			$table .= "<tr>";
			$table .= "<td>";
			$table .= "<span>".$value['contqtyaprv']."</span>";
			$table .= "<input name='contqtyaprv[]' type='hidden' value='".$value['contqtyaprv']."'>";
			$table .= "</td>";
			$table .= "<td>";
			$table .= "<input type='number' name='contqtyasg[]' class='contqtyasg form-control form-control-sm' value='' onchange='cekMax(".$value['contqtyaprv'].", this)'>";
			$table .= "</td>";
			$table .= "<td>";
			$table .= "<span>".$value['contsize']."</span>";
			$table .= "<input name='contsize[]' type='hidden' value='".$value['contsize']."'>";
			$table .= "<span>".$value['conttype']."</span>";
			$table .= "<input name='conttype[]' type='hidden' value='".$value['conttype']."'>";
			$table .= "</td>";
			$table .= "<td>";
	//		$table .= "<span>".$value['conttype']."</span>";
	//		$table .= "<input name='conttype[]' type='hidden' value='".$value['conttype']."'>";
	//		$table .= "</td>";

			$table .= "</tr>";
		}

		echo $table;
	}

	public function pilihfeed()
	{
		$post=$this->input->post(null, TRUE);
		$hasil = $this->assignfeeder_m->pilihfeed($post);
		// die(print_r($hasil));
		foreach ($hasil as $key => $value) {
			echo $value['feedercode']."+==+";
	        echo $value['vesselcode']."+==+";
	        echo $value['vesselname']."+==+";
	        echo $value['voyage']."+==+";
	        echo date("Y-m-d", strtotime($value['etd']))."+==+";
	        echo date("Y-m-d", strtotime($value['eta']))."+==+";
	        echo date("Y-m-d", strtotime($value['berthdate']))."+==+";
	        echo $value['servicecode']."+==+";
	        echo $value['deptport']."+==+";
	        echo $value['destport'];
		}
	}

	public function create()
	{
		$post = $this->input->post(null, TRUE);
		$requestid = str_replace("/","@",$post['releasenumber']);
		// print_r($post);
		// die();
		$url = $this->assignfeeder_m->add($post);
		$this->session->set_flashdata('success', 'Data berhasil ditambah');
		// redirect('assignfeeder'); 
		redirect('assignfeeder/edit/'.$requestid); 
	}

	public function cekrequest()
	{
		$count = $this->assignfeeder_m->cekrequest();
		echo $count;
	}

	public function add()
	{
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
			);
		$this->template->load('template','assignfeeder/assignfeeder_form' , $data);
	}

	public function searchfeed()
	{
		$post=$this->input->post(null, TRUE);
		$data = $this->assignfeeder_m->cariFeed($post);
		$no = 1;
		foreach ($data as $key => $value) {
			echo "<tr>";
			echo "<td>";
			echo $no;
			echo "</td>";
			echo "<td>";
			echo "<span onclick='pilihFeed(".$value['lingrid'].")' class='text-primary' style='cursor:pointer'>".$value['feedercode']."</span>";
			echo "</td>";
			echo "<td>";
			echo $value['deptport'];
			echo "</td>";
			echo "<td>";
			echo $value['destport'];
			echo "</td>";
			echo "<td>";
			echo $value['etd'];
			echo "</td>";
			echo "</tr>";
			$no++;
		}
		// print_r($data);
	}

	public function asgnfeeder($id)
	{
		$query = $this->assignfeeder_m->carido(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$feeder = $query->row();
			 $detailQuery = $this->assignfeeder_m->getDetailDO(str_replace("@","/",$id));
			 $detailRow = $detailQuery->result_array();
			 $feedSearch = $this->assignfeeder_m->feedSearch();
			 $feedQuery = $this->feeder_m->get();
			 $Port = $this->master_m->getPort();
			 $PortRow = $Port->result();
 


			// $type = $this->assignfeeder_m->getType();
			// $typeRow = $type->result_array();
			// $approvedQuery = $this->assignfeeder_m->getApprove();
			// $feedSearch = $this->assignfeeder_m->feedSearch();
			// $feedQuery = $this->feeder_m->get();
			//$data['feedRow'] = $feedQuery->result();

			// print_r($detailRow);
			$data = array (
				'page' => 'edit',
				'row' => $feeder,
				'detailRow' => $detailRow,
				'feedRow' => $feedQuery->result(),
				'PortRow' => $PortRow,
				'feedSearch' => $feedSearch->result(),
			/*	'approvedQueryRow' => $approvedQuery->result(),
				
				'typeRow' => $typeRow,
				 */
			);
			
			$this->template->load('template','assignfeeder/assignfeeder_formdariasg' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('assignfeeder')."';</script>";
		}
	}
	
	public function edit($id = null)
	{
		$query = $this->assignfeeder_m->get(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$feeder = $query->row();
			$detailQuery = $this->assignfeeder_m->getDetail(str_replace("@","/",$id));
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
				'row' => $feeder,
				'detailRow' => $detailRow,
				'approvedQueryRow' => $approvedQuery->result(),
				'feedSearch' => $feedSearch->result(),
				'typeRow' => $typeRow,
				'feedRow' => $feedQuery->result()
			);
			$this->template->load('template','assignfeeder/assignfeeder_form' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "<script>alert('data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('assignfeeder')."';</script>";
		}
	}

	public function process()
	{
		$post=$this->input->post(null, TRUE);
		$this->assignfeeder_m->edit($post);
		$releasenumber = str_replace("/","@",$post['releasenumber']);
		

		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil disimpan');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
		//echo "<script>window.location='".site_url('feeder')."';</script>";
        redirect('assignfeeder/edit/'.$releasenumber);
    }

    public function adddetail()
	{
		$post = $this->input->post(null, TRUE);
		$this->assignfeeder_m->adddetail($post);
		echo "sukses++Data berhasil disimpan";
	}

    public function updatedetail()
	{
		$post=$this->input->post(null, TRUE);
		// die(print_r($post));
		$this->assignfeeder_m->editDetail($post);

		if($this->db->affected_rows() > 0) 
		{
            // $this->session->set_flashdata('success', 'Data berhasil disimpan');
            echo "sukses+==+Data berhasil disimpan";
        }else{
        	echo "non+==+Tidak ada perubahan";
        }
    }

    public function hapusdetail()
	{
		$post=$this->input->post(null, TRUE);
		$this->assignfeeder_m->hapusDetail($post);
        echo "sukses++Data berhasil dihapus";
	}
	public function hapusdetailasgnfeeder()
	{
		$post=$this->input->post(null, TRUE);
		$this->assignfeeder_m->hapusdetailasgnfeeder($post);
		echo "sukses++Data berhasil dihapus";
	/* 	if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');

        } */
		//echo "<script>window.location='".site_url('assignfeeder')."';</script>";


    }

	public function del($id)
	{
		$this->assignfeeder_m->del($id);
		if($this->db->affected_rows() > 0) 
		{
			//echo "<script>alert('data berhasil dihapus');</script>";  //atau bisa juga seperti diatatas (function add)
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');

        }
		echo "<script>window.location='".site_url('assignfeeder')."';</script>";

	}



	public function cari()
	{
		$post=$this->input->post(null, TRUE);
		$data['row'] = $this->assignfeeder_m->cari($post);
		$data['search'] = $post;
		$divbranQuery = $this->divbran_m->get();
		$data['divbranRow'] = $divbranQuery->result();
		$portdestQuery = $this->master_m->getPort();
		$data['portdestRow'] = $portdestQuery->result();
		$this->template->load('template','assignfeeder/assignfeeder_data', $data);
	}



	public function printdo($id)
	{
		$query = $this->assignfeeder_m->get(str_replace("@","/",$id));

		if($query->num_rows() >0) {
			$row = $query->row();
			$detailQuery = $this->assignfeeder_m->getDetail(str_replace("@","/",$id));
			$detailRow = $detailQuery->result_array();
			$data = array (
				'page' => 'print',
				'row' => $row,
				'detailRow' => $detailRow
			);
			return
			$this->load->view('assignfeeder/assignfeeder_print' , $data);  //mau sebagai tambah sekaligus edit, perlu lempar data
		} else {
			echo "data tidak ditemukan";
		}
	}



	function simpan_barang(){
        $kode_barang=$this->input->post('kode_barang');
        $nama_barang=$this->input->post('nama_barang');
        $satuan=$this->input->post('satuan');
        $harga=$this->input->post('harga');
        $this->m_barang->simpan_barang($kode_barang,$nama_barang,$satuan,$harga);
        redirect('barang');
    }
	


	function asgnfeederdetail($donumber){
		$lingridcondetailm=$this->input->post('lingridcondetailm');

		$donumberfeederbaru=$this->input->post('donumberfeederbaru');
		$requestnom=$this->input->post('requestnom');
		$donumberm=$this->input->post('donumberm');
		$dodate=$this->input->post('dodatem');
		$contqtymodal=$this->input->post('contqtymodal');
		$feedercode=$this->input->post('feedercode');
		$origin=$this->input->post('origin');
		$dest=$this->input->post('dest');
		$vesselname=$this->input->post('vesselname');
		$voyage=$this->input->post('voyage');
		$etd=$this->input->post('etd');
		$eta=$this->input->post('eta');
		$berthdate=$this->input->post('berthdate');
		$remarks=$this->input->post('remarks');
		$qtyasal=$this->input->post('qtyasal');
		$contqtyasgm=$this->input->post('contqtyasgm');
		$contqtymodal=$this->input->post('contqtymodal');
		$contsize=$this->input->post('contsizem');
		$conttype=$this->input->post('conttypem');

		$contqtyisian = $contqtymodal +  $contqtyasgm ;
	
        //alert('contqtyisian :'+contqtyisian);
		//echo "<script>alert('$contqtymodal');</script>"; 
	//	echo "<script>alert('$donumberfeederbaru');</script>"; 
	  if ($contqtyisian > $qtyasal) 
	  	{
			echo "<script>alert('QTY Assign cannot be more than TOTAL QTY !');</script>"; 
			sleep(1);
		}
	  else
	  {
		//echo "<script>alert('lebih kecil');</script>"; 
	//	sleep(1);
		$this->assignfeeder_m->simpandetailfeeder($lingridcondetailm,$requestnom,$donumberm,$dodate ,$contqtymodal,$feedercode,$origin,$dest,$vesselname,$voyage, $etd, $eta, $berthdate,$remarks,$contsize,$conttype, $donumberfeederbaru);
	  }
		redirect('assignfeeder/asgnfeeder/'.$donumber);
	}
	
}
