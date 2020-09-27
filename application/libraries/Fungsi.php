<?php

Class Fungsi {
    
    protected $ci;

     function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci ->load->model('user_m');
        $user_id= $this->ci->session->userdata('user_id_box');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }


	function cari_detail_container_request($donumber) {
        $this->ci ->load->model('reqcontainer_m');
        $detailQueryF = $this->ci->reqcontainer_m->getDetailDO(str_replace("@","/",$donumber));
       //$detailRowF = $detailQueryF;
       //$detailRowF =  $detailQueryF->row();
       // $detailRowF =  $detailQueryF->row_array();
       // $detailRowF =  $detailQueryF->result_array();
       // return $detailRowF->row();
       // return $detailRowF->result_array();

       $dataF['detailRowF'] = $detailQueryF->result_array();
      
       return $dataF;


     
	}
    

	function cari_tx_req_container_feeder($donumber) {
        $this->ci ->load->model('assignfeeder_m');
        $detailQueryFeederF = $this->ci->assignfeeder_m->getDetailFeeder(str_replace("@","/",$donumber));
       //$detailRowF = $detailQueryF;
       //$detailRowF =  $detailQueryF->row();
       // $detailRowF =  $detailQueryF->row_array();
       // $detailRowF =  $detailQueryF->result_array();
       // return $detailRowF->row();
       // return $detailRowF->result_array();

       $dataF1['detailRowFeederF'] = $detailQueryFeederF->result_array();
      
       return $dataF1;
 
	}

    function cari_tx_req_container_gtnjkt($portdest,$size,$type,$lingrid,$requestno,$donumber,$dodate, $qtyawal) {
        $this->ci ->load->model('assignfeeder_m');
        $detailQuerygtnjktF = $this->ci->assignfeeder_m->getDetailGTNJKT(str_replace("@","/",$portdest),$size,$type,$lingrid,$requestno,$donumber,$dodate, $qtyawal);

        $dataF1['detailRowFGTNJKT'] = $detailQuerygtnjktF->result_array();
      
       return $dataF1;
 
	}
    

    function cari_jumlahqty_feeder($lingrid) {
        $this->ci ->load->model('assignfeeder_m');
        $query = $this->ci->assignfeeder_m->getDetailfeederjmlQTY($lingrid);
        return $query->row();
    }

    function cari_donumber_dari_dofeeder($dofeeder) {
        $this->ci ->load->model('assignfeeder_m');
        $query = $this->ci->assignfeeder_m->getdonumberfromdofeeder($dofeeder);
        return $query->row();

    }


    function cari_dofeeder_dari_donumber($donumber) {
        $this->ci ->load->model('assignfeeder_m');
        $query = $this->ci->assignfeeder_m->getdofeederfromdonumber($donumber);
       // return $query->row();
        $dataF1['caridofeederdaridonumber'] = $query->result_array();
      
        return $dataF1;
           
    }


    public function count_item() {
        $this->ci->load->model('item_m');
        return $this->ci->item_m->get()->num_rows();
    }
    public function count_supplier() {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }
    public function count_customer() {
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    }
    public function count_user() {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }




    function PdfGenerator($html, $filename) {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));  //attachment berarti membuka di browser, 
              // tanpa attachmnet berarti langsung download
    }
}