<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Appvcontainer_m extends CI_Model {

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
    
    public function get($id = null)
    {
        $this->db->from('tx_req_container');
        // die($id);
        if($id != null) {
            $this->db->where('requestno', $id);
        }
        $this->db->order_by('requestdate', 'DESC');
        $this->db->order_by('requestno', 'ASC');
       // $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
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

/*     public function getDetail2($id = null)
    {
        $this->db->from('tx_req_container_detail2');
        // die($id);
        if($id != null) {
            $this->db->where('requestnumber', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    } */

        
    public function add($post)
    {
        $count = count($post['contqty']);
        $params['requestno'] = $post['requestno'];
        $params['divbran'] = $post['divbran'];
        $params['requestdate'] = date("Y-m-d", strtotime($post['requestdate']));
        $params['picrequest'] = $post['picrequest'];
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

    public function edit($id, $post)
    {
        // print_r($post);
        // die();
       // $count = count($post['releasenumber']);
        $count = count($post['contqtyaprv']);
        $params['donumber'] = $post['donumber'];
        $params['dodate'] = date("Y-m-d", strtotime($post['dodate']));
        $dodate1 = str_replace('-', '/', $params['dodate']);
        $params['doexpiredate'] = date('Y-m-d',strtotime($dodate1 . "+21 days"));

        $params['approvaldate'] = date("Y-m-d h:i:s");
        $params['userapprove'] = $post['userid'];
        $params['reqstatus'] = '1';
        // $params['remarks'] = $post['remarks'];
        $this->db->where('requestno',$post['requestno']);
        $this->db->update('tx_req_container',$params);


       // print_r($this->db->last_query()); 
        // die();


        for ($i=0; $i < $count; $i++) {
             $data['contqtyaprv'] = $post['contqtyaprv'][$i];
             $this->db->where('lingrid',$post['lingrid'][$i]);
            $this->db->update('tx_req_container_detail',$data);
         }
/* 
        for ($i=0; $i < $count; $i++) { 
            $data[] = array(
                'requestnumber' => $post['requestnumber'][$i],
              //  'releasenumber' => $post['releasenumber'][$i],
              //  'releasedate' => date("Y-m-d", strtotime($post['releasedate'][$i])),
                'contqtyasg' => $post['contqtyasg'][$i],
                'expiredate' => date("Y-m-d", strtotime($post['expiredate'][$i])),
                'donumber' => $post['donumber'][$i],
                'dodate' => date("Y-m-d", strtotime($post['dodate'][$i])),
                // $params['divbran'] = $post['divbran'][$i],
                // $params['picrequest'] = $post['picrequest'][$i],

                // $params['feedercode'] = $post['feedercode'][$i],
                // $params['origin'] = $post['origin'][$i],
                // $params['destination'] = $post['destination'][$i],
                // $params['vesselcode'] = $post['vesselcode'];
                // $params['vesselname'] = $post['vesselname'][$i],
                // $params['voyage'] = $post['voyage'][$i],
                'etd' => date("Y-m-d", strtotime($post['etd'][$i])),
                'eta' => date("Y-m-d", strtotime($post['eta'][$i])),
                // $params['berthdate'] = date("Y-m-d", strtotime($post['berthdate'][$i])),
                'remarks' => $post['remarks'][$i]
              );
        }
        print_r($data);
        $this->db->insert_batch('tx_req_container_detail2', $data); */

        // die(print_r($params));
        
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
        $reqstatus = $post['reqstatus']; 
        $donumber= $post['donumber'];
        
        
        if ($reqstatus == '2') {
            $reqstatus = '0' ;
        }


        $this->db->from('tx_req_container');
        if($requestno != null) {
            $this->db->like('requestno', $requestno, 'both'); 
        }
        if ($divbran != null) {
            $this->db->like('divbran', $divbran, 'both');
        }
        if ($portdest != null) {
            $this->db->where('portdest', $portdest, 'both');
        }
        if ($reqstatus != null) {
            $this->db->where('reqstatus', $reqstatus, 'both');
        }
        if ($donumber != null) {
            $this->db->like('donumber', $donumber, 'both');
        }
        if ($post['requestdatefrom'] != null AND $post['requestdateto'] != null) {

            $requestdatefrom= date("Y-m-d", strtotime($post['requestdatefrom']));
            $requestdateto= date("Y-m-d", strtotime($post['requestdateto']));

            $this->db->where('requestdate >=', $requestdatefrom);
            $this->db->where('requestdate <=', $requestdateto);
        }
        $this->db->order_by('requestdate', 'DESC');
        $this->db->order_by('requestno', 'ASC');
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }

    public function getReleasenumber()
    {
        $sgcode='DO';
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
        $requestno_auto = "DO" . $yr2digit; // you have to replace 001 with your id's from db
        return $requestno_auto;
    }



}