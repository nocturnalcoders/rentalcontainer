<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reportrequest_m extends CI_Model {

    public function login($post)
    {
            // $post['feedernane']) --> diambil dari  view login.php pada nama kolom input feedername
            // $post['password']) --> diambil dari  view login.php pada nama kolom input password

        $this->db->select('');
        $this->db->from('t_feeder');
        $this->db->where('feedername', $post['feedername']);
        $this->db->where('contgroup', $post['contgroup']);  // kalo pake sha1 jadi gini  $this->db->where('password', sha1($post['password'])); 
        $query = $this->db->get();
        return $query;
    }
    public function getawal($id = null)
    {   
       /*  $this->db->select('');
        $this->db->from('tx_req_container');
        // die($id);
        if($id != null) {
            $this->db->where('divbran', $id);
        }
      

        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die(); */

        $STRQueryawal = ' SELECT
                        v_jumlah_container_dashboard.divbran,
                        v_jumlah_container_dashboard.requestno,
                        tx_req_container.donumber,
                        tx_req_container.portdest,
                        v_jumlah_container_dashboard.reqstatus,
                        v_jumlah_container_dashboard.requestdate,
                        v_jumlah_container_dashboard.tahun,
                        v_jumlah_container_dashboard.bulan,
                        v_jumlah_container_dashboard.jmlcont20,
                        v_jumlah_container_dashboard.jmlcont40,
                        v_jumlah_container_dashboard.jmlconttotal,
                        v_jumlah_container_dashboard.jmlcont20aprv,
                        v_jumlah_container_dashboard.jmlcont40aprv,
                        v_jumlah_container_dashboard.jmlconttotalaprv
                        
                        FROM
                        v_jumlah_container_dashboard
                        JOIN tx_req_container
                        ON v_jumlah_container_dashboard.requestno = tx_req_container.requestno
                        WHERE  v_jumlah_container_dashboard.divbran   = "'.$id.'"  ';

                        if($this->fungsi->user_login()->level == 2) {
                            $STRQueryawal .= ' ORDER BY
                            v_jumlah_container_dashboard.divbran ASC,  tx_req_container.portdest ASC, v_jumlah_container_dashboard.requestno ASC LIMIT 0,50
                            ';
                        } else {
                            $STRQueryawal .= ' ORDER BY
                            v_jumlah_container_dashboard.divbran ASC, v_jumlah_container_dashboard.requestno ASC LIMIT 0,50
                            ';
                        }

        $query = $this->db->query($STRQueryawal);



        return $query;
    }


    public function get($id = null)
    {   
/*         $this->db->select('');
        $this->db->from('tx_req_container');
        // die($id);
        if($id != null) {
            $this->db->where('requestno', $id);
        }

        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
 */

        $STRQueryawal = " SELECT
        v_jumlah_container_dashboard.divbran,
        v_jumlah_container_dashboard.requestno,
        tx_req_container.donumber,
        tx_req_container.portdest,
        v_jumlah_container_dashboard.reqstatus,
        v_jumlah_container_dashboard.requestdate,
        v_jumlah_container_dashboard.tahun,
        v_jumlah_container_dashboard.bulan,
        v_jumlah_container_dashboard.jmlcont20,
        v_jumlah_container_dashboard.jmlcont40,
        v_jumlah_container_dashboard.jmlconttotal,
        v_jumlah_container_dashboard.jmlcont20aprv,
        v_jumlah_container_dashboard.jmlcont40aprv,
        v_jumlah_container_dashboard.jmlconttotalaprv
        
        FROM
        v_jumlah_container_dashboard
        JOIN tx_req_container
        ON v_jumlah_container_dashboard.requestno = tx_req_container.requestno
        ORDER BY
        v_jumlah_container_dashboard.divbran ASC, v_jumlah_container_dashboard.requestno ASC LIMIT 0,50
    ";

        $query = $this->db->query($STRQueryawal);
        return $query;
    }

    public function getType()
    {
        $this->db->from('t_conttype');
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }

    public function getDetail($id = null)
    {
        $this->db->from('tx_req_container_detail');
        // die($id);
        if($id != null) {
            $this->db->where('requestno', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }

    public function getDetailDO($id = null)
    {
        $this->db->from('tx_req_container_detail');
        // die($id);
        if($id != null) {
            $this->db->where('requestno', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }
        
    public function add($post)
    {

        //CHECKING AUTO GENERATE NUMBER UNTUK REQ NUMBER
        $sgcode='RO';
				$yr = date('Y') ;
				$query = $this->db->query("SELECT * FROM t_cntmnt where sgcode = '$sgcode' and cntyear ='$yr'");
				$row=$query->result_array();
				if($query->num_rows() > 0) {
					$row = $query->row_array(); 
					$newcounter = $row['counter'] + 1;
					$this->db->query("update  t_cntmnt set  counter=$newcounter where sgcode = '$sgcode' and cntyear =$yr");
					//echo $this->db->last_query();
				} else {
					$newcounter = 1;
					$this->db->query("insert into t_cntmnt(sgcode,cntyear,counter) values ('$sgcode',$yr,$newcounter)");
		
				}
                // RO01000001
                $yr2digit = $yr."000000";    // returns "ef"
                $yr2digit =(int)$yr2digit ;
                $yr2digit =$yr2digit + $newcounter ; 
		 	    $requestno_auto = "RO" . $yr2digit; // you have to replace 001 with your id's from db
      




        $count = count($post['contqty']);
        $params['requestno'] = $requestno_auto ; // $post['requestno'];
        $params['divbran'] = $post['divbran'];
        $params['portdest'] = $post['portdest'];
       // die(print_r($post['divbran']));
        $params['requestdate'] = date("Y-m-d", strtotime($post['requestdate']));
        $params['picrequest'] = $post['picrequest'];
        $params['boxowner'] = $post['boxowner'];
        $params['remarks'] = $post['remarks'];
        for ($i=0; $i < $count; $i++) { 
            $data[] = array(
                "requestno" => $params['requestno'],
                "contqty" => $post['contqty'][$i],
                "contsize" => $post['contsize'][$i],
                "conttype" => $post['conttype'][$i],
                "contgrade" => $post['contgrade'][$i],
                "contheavy" => $post['contheavyReal'][$i],
                "notes" => $post['notes'][$i]
              );
        }
        // die(print_r($data));
        $this->db->insert('tx_req_container',$params);
        $this->db->insert_batch('tx_req_container_detail', $data);

        return $requestno_auto;
    }

    public function cekrequest()
    {
        $requestno = $this->input->post('requestid');
        $this->db->from('tx_req_container');
        $this->db->where('requestno', $requestno);
        $query = $this->db->get();
        // print_r($query);
        return $query->num_rows();
    }

    public function edit($post)
    {
        $params['divbran'] = $post['divbran'];
        $params['portdest'] = $post['portdest'];
        $params['requestdate'] = date("Y-m-d", strtotime($post['requestdate']));
        $params['picrequest'] = $post['picrequest'];
        $params['remarks'] = $post['remarks'];
        $params['boxowner'] = $post['boxowner'];
         $this->db->where('requestno',$post['requestno']);
         $this->db->update('tx_req_container',$params);
    } 

    public function editDetail($post)
    {
        $params['contqty'] = $post['contqty'];
        $params['contsize'] = $post['contsize'];
        $params['conttype'] = $post['conttype'];
        $params['contgrade'] = $post['contgrade'];
        $params['contheavy'] = $post['contheavy'];
        $params['notes'] = $post['notes'];
        // die(print_r($params));
        $this->db->where('lingrid',$post['lingrid']);
        $this->db->update('tx_req_container_detail',$params);
    } 

    public function adddetail($post)
    {
        $params['requestno'] = $post['requestno'];
        $params['contqty'] = $post['contqty'];
        $params['contsize'] = $post['contsize'];
        $params['conttype'] = $post['conttype'];
        $params['contgrade'] = $post['contgrade'];
        $params['contheavy'] = $post['contheavy'];
        $params['notes'] = $post['notes'];
        $this->db->insert('tx_req_container_detail',$params);
    } 

    public function hapusDetail($post)
    {
        $this->db->where('lingrid',$post['lingrid']);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('tx_req_container_detail');
    }

    public function del($id)
    {
        $this->db->where('requestno', $id);
        $this->db->delete('tx_req_container');

        $this->db->where('requestno', $id);
        $this->db->delete('tx_req_container_detail');
    }

    public function cari($post)
    {

        $requestno= $post['requestno'];
        $divbran= $post['divbran'];
        $portdest= $post['portdest'];
        $status= $post['statusF'];
        $donumber= $post['donumber'];
        
        
        if ($status == '2') {
            $status = '0' ;
        }


        $STRQuerycari = ' SELECT
                    v_jumlah_container_dashboard.divbran,
                    v_jumlah_container_dashboard.requestno,
                    tx_req_container.donumber,
                    tx_req_container.portdest,
                    v_jumlah_container_dashboard.reqstatus,
                    v_jumlah_container_dashboard.requestdate,
                    v_jumlah_container_dashboard.tahun,
                    v_jumlah_container_dashboard.bulan,
                    v_jumlah_container_dashboard.jmlcont20,
                    v_jumlah_container_dashboard.jmlcont40,
                    v_jumlah_container_dashboard.jmlconttotal,
                    v_jumlah_container_dashboard.jmlcont20aprv,
                    v_jumlah_container_dashboard.jmlcont40aprv,
                    v_jumlah_container_dashboard.jmlconttotalaprv
                    
                    FROM
                    v_jumlah_container_dashboard
                    JOIN tx_req_container
                    ON v_jumlah_container_dashboard.requestno = tx_req_container.requestno
                    WHERE 1 ' ;
                 






       // $this->db->from('tx_req_container');
        if($requestno != null) {
           // $this->db->like('requestno', $requestno, 'both'); 
            $STRQuerycari .= ' AND v_jumlah_container_dashboard.requestno  = "'.$requestno.'"  ';
        }
        if ($divbran != null) {
           // $this->db->like('divbran', $divbran, 'both');
            $STRQuerycari .= ' AND v_jumlah_container_dashboard.divbran  = "'.$divbran.'"  ';
        }
        if ($portdest != null) {
            //$this->db->like('portdest', $portdest, 'both');
            $STRQuerycari .= ' AND tx_req_container.portdest  = "'.$portdest.'"  ';
          
        }
        if ($donumber != null) {
           // $this->db->like('donumber', $donumber, 'both');
            $STRQuerycari .= ' AND tx_req_container.donumber  = "'.$donumber.'"  ';
        }
        if ($status != null) {
            //$this->db->where('reqstatus', $status, 'both');
            
            $STRQuerycari .= ' AND v_jumlah_container_dashboard.reqstatus  = "'.$status.'"  ';
        }

        if ($post['requestdatefrom'] != null AND $post['requestdateto'] != null) {

            $requestdatefrom= date("Y-m-d", strtotime($post['requestdatefrom']));
            $requestdateto= date("Y-m-d", strtotime($post['requestdateto']));

            // $this->db->where('requestdate >=', $requestdatefrom);
            // $this->db->where('requestdate <=', $requestdateto);
            $STRQuerycari .= ' AND v_jumlah_container_dashboard.requestdate  >= "'.$requestdatefrom.'"';
            $STRQuerycari .= ' AND v_jumlah_container_dashboard.requestdate  <= "'.$requestdateto.'"';
            
        }

        $STRQuerycari .= '  ORDER BY
                    v_jumlah_container_dashboard.divbran ASC, v_jumlah_container_dashboard.requestno ASC LIMIT 0,50
                    ';

      //  $query = $this->db->get();
      $query = $this->db->query($STRQuerycari);
     
       //print_r($this->db->last_query()); 
       //die(); 
        return $query;
    }



}