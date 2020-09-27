<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assignfeeder_m extends CI_Model {

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
    
    public function get()
    {
        $query = $this->db->query("SELECT
                tx_req_container.*
                FROM
                tx_req_container where reqstatus = '1' 
                order by tx_req_container.requestdate desc, tx_req_container.requestno asc,  tx_req_container.donumber asc
              ");
        //print_r($this->db->last_query()); 
       // die();

       return $query;
    }

    public function getApprove(){
        $this->db->from('tx_req_container');
        $this->db->where('reqstatus', 1);
        $query = $this->db->get();
        return $query;
    }

    public function feedSearch()
    {
        $this->db->from('t_schedule');
        $query = $this->db->get();
        return $query;
    }

    public function cariFeed($post)
    {

        $feedercode= $post['feedercode'];
        $deptport= $post['deptport'];
        $destport= $post['destport'];

        $this->db->from('t_schedule');
        if($feedercode != null) {
            $this->db->like('feedercode', $feedercode, 'both'); 
        }

        if($deptport != null) {
            $this->db->like('deptport', $deptport, 'both'); 
        }

        if($destport != null) {
            $this->db->like('destport', $destport, 'both'); 
        }

        if ($post['etdfrom'] != null AND $post['etdto'] != null) {

            $etdfrom= date("Y-m-d", strtotime($post['etdfrom']));
            $etdto= date("Y-m-d", strtotime($post['etdto']));

            $this->db->where('etd >=', $etdfrom);
            $this->db->where('etd <=', $etdto);
        }

        $query = $this->db->get();
        $data = $query->result_array();
        // print_r($this->db->last_query()); 
        // die();
        return $data;
    }

    public function pilihdo($post)
    {
        $this->db->from('tx_req_container');
        $this->db->where('donumber', $post['donumber']);
        $query = $this->db->get();
        $header = $query->result_array();
        $data['doHeader'] = $header;

        $this->db->from('tx_req_container_detail');
        $this->db->where('requestno', $header[0]['requestno']);
        $query2 = $this->db->get();
        $data['doDetail'] = $query2->result_array();
        return $data;
    }

    public function carido($id = null)
    {


        $this->db->from('tx_req_container');
        // die($id);
        if($id != null) {
            $this->db->where('donumber', $id);
        }
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }
    public function getDetailDO($id = null)
    {

        $this->db->from('tx_req_container');
        $this->db->where('donumber', $id);
        $query = $this->db->get();
        $header = $query->result_array();
        $data['doHeader'] = $header;

      //  $this->db->from('tx_req_container_detail');
      // // $this->db->where('requestno', $header[0]['requestno']);
      // $this->db->where('donumber', $id);

  
       // $query2 = $this->db->get();


        $query2 = $this->db->query("SELECT * FROM `tx_req_container_detail`
             WHERE requestno in  
            (SELECT requestno 
            FROM `tx_req_container` WHERE `donumber` = '".$id."' and divbran <> 'GTN-JKT')  ");




      // print_r($this->db->last_query()); 
      //   die();
        return $query2;
    }

    public function getDetailFeeder($id = null)
    {
        $this->db->from('tx_req_container_feeder');
        // die($id);
        if($id != null) {
            $this->db->where('lingridcondetail', $id);
        }
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }


    public function getDetailGTNJKT($portdest,$size,$type,$lingrid,$requestno,$donumber,$dodate, $qtyawal)
    {
        $query = $this->db->query("SELECT
        tx_req_container.requestno,
        tx_req_container.divbran,
        tx_req_container.portdest,
        tx_req_container.reqstatus,
        tx_req_container_detail.contqty,
        tx_req_container_detail.contsize,
        tx_req_container_detail.conttype,
        tx_req_container_detail.lingrid
        FROM tx_req_container LEFT JOIN tx_req_container_detail
        ON tx_req_container.requestno = tx_req_container_detail.requestno 
        where tx_req_container.divbran ='GTN-JKT' and tx_req_container.reqstatus = 0  and 
        tx_req_container.portdest = '".$portdest."'   and      tx_req_container_detail.contsize = '".$size."' and
        tx_req_container_detail.conttype = '".$type."' 
        ");
      //  print_r($this->db->last_query()); 











      //  and
      //  tx_req_container_detail.contsize = '".$size."' and
       // tx_req_container_detail.conttype = '".$type."' 
       // die();

       $rawdata=$query->result_array();
       if($query->num_rows() > 0) 
    {


  
        foreach($rawdata as $row)
        {
          // if this is the first clip of a new sheet, make a new entry for it
        //   if (!isset($data[$row['requestno']]))
        //   {
              /*  echo $row['requestno']; echo "<br>";
               echo $row['contqty']; echo "<br>";
               echo $row['contsize']; echo "<br>";
               echo $row['conttype']; echo "<br>";
               echo $row['lingrid']; echo "<br>"; */

               $requestnoF = $row['requestno'];
                $qtyisian =  $row['contqty'];
                $sizeF = $row['contsize'];
                $typeF = $row['conttype'];
                $lingridcondetail = $row['lingrid'];
   
                $qtygtnjkt = 0 ;
                
                if ($qtyawal <= $qtyisian)
                {
                    $qtygtnjkt = $qtyawal ;
                }
                else
                {
                $qtygtnjkt =$qtyisian;
                }

               // $donumbergtnjkt =$donumber.'GTNJKT';
                $donumbergtnjkt =$donumber;
                
                $this->db->query("INSERT INTO tx_req_container_feeder 
                (
                  lingridcondetail,
                  requestno,
                  donumber,
                  contqty,
                  contsize,
                  conttype,
                  donumberfeeder,
                  feedercode,
                  origin,
                  dest
                    ) 
                    VALUES (
                    '$lingrid',
                    '$requestnoF',
                    '$donumber',
                    '$qtygtnjkt',
                    '$sizeF',
                    '$typeF',
                    '$donumbergtnjkt',
                    'GTNJKT',
                    'IDJKT',
                    '$portdest'
                    )");
           
            //update flagnebeng di   tx_req_containerdetail


            $queryS = $this->db->query(" UPDATE   tx_req_container_detail 
            SET flagnebeng = '1'
           
            where lingrid ='".$row['lingrid']."'" );
           // print_r($this->db->last_query()); 
        }
        

            // update Request Container


            //cek dulu apakah tx_req_containerdetail masih ada yang flagnebeng = 0

            $queryS = $this->db->query(" SELECT
            flagnebeng
            FROM tx_req_container_detail 
            where requestno ='".$row['requestno']."'  and    flagnebeng = 0");

         //   print_r($this->db->last_query()); 

    
           $rowS=$queryS->result_array();
           if($queryS->num_rows() == 0) 
           {



                $count = 1; // count($post['contqtyaprv']);
            

                
                $useraprove = $this->fungsi->user_login()->user_id;
                $params['donumber'] = $donumber;
                $params['dodate'] = date("Y-m-d", strtotime($dodate));

                $dodate1 = str_replace('-', '/', $params['dodate']);
                $params['doexpiredate'] = date('Y-m-d',strtotime($dodate1 . "+21 days"));


                $params['approvaldate'] = date("Y-m-d h:i:s");
                $params['userapprove'] = $useraprove ;
                $params['reqstatus'] = '1';
                // $params['remarks'] = $post['remarks'];
                $this->db->where('requestno',$row['requestno']);
                $this->db->update('tx_req_container',$params);

            // print_r($this->db->last_query()); 
            //  die();

                $data['contqtyaprv'] = $qtygtnjkt;
                $this->db->where('lingrid',$row['lingrid']);
                $this->db->update('tx_req_container_detail',$data);
    
            // print_r($this->db->last_query()); 
            //  die();
           
           }
       } 


       $this->db->from('tx_req_container_feeder');
       // die($id);
       if($lingrid != null) {
           $this->db->where('lingridcondetail', $lingrid);
       }
       $queryF = $this->db->get();
       // print_r($this->db->last_query()); 
       // die();
       return $queryF;
    }


    
    public function getDetailfeederjmlQTY($lingrid)
    {
        $query = $this->db->query("SELECT sum(contqty) as jumlahcontqty FROM tx_req_container_feeder WHERE `lingridcondetail` = '$lingrid' ");
        return $query;

    }

    public function getdonumberfromdofeeder($dofeeder)
    {
        $query = $this->db->query("SELECT
                    tx_req_container.requestno,
                    tx_req_container.divbran,
                    tx_req_container.portdest,
                    tx_req_container.donumber,
                    tx_req_container.dodate,
                    tx_req_container_feeder.donumberfeeder
                    FROM
                    tx_req_container
                    JOIN tx_req_container_feeder
                    ON tx_req_container.requestno = tx_req_container_feeder.requestno  
                    WHERE  tx_req_container_feeder.donumberfeeder  = '".$dofeeder."' 
                    ");
                   // print_r($this->db->last_query()); 
                  //  die();
        return $query;

    }
    public function getdofeederfromdonumber($donumber)
    {
        $query = $this->db->query(" SELECT
                    tx_req_container_feeder.donumber,
                    tx_req_container_feeder.donumberfeeder,
                    tx_req_container_feeder.contqty,
                    tx_req_container_feeder.contsize,
                    tx_req_container_feeder.conttype,
                    tx_req_container_feeder.feedercode,
                    tx_req_container_feeder.origin,
                    tx_req_container_feeder.dest
                    FROM
                    tx_req_container_feeder
                    WHERE  tx_req_container_feeder.donumber  = '".$donumber."' 
                    ");
                   // print_r($this->db->last_query()); 
                  //  die();
        return $query;

    }




    public function pilihfeed($post)
    {
        $this->db->from('t_schedule');
        $this->db->where('lingrid', $post['feednumber']);
        $query = $this->db->get();
        $header = $query->result_array();
        return $header;
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
        /* $this->db->from('tx_ro_container_detail');
        // die($id);
        if($id != null) {
            $this->db->where('releasenumber', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query; */
    }

        
    public function add($post)
    {

        //CHECKING AUTO GENERATE NUMBER UNTUK REQ NUMBER
        // die(print_r($post));
        $sgcode='RA';
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
      




        $count = count($post['contqtyasg']);
        $params['releasenumber'] = $post['releasenumber'] ; // $post['requestno'];
        $params['releasedate'] = date("Y-m-d", strtotime($post['releasedate']));
        $params['expiredate'] = date("Y-m-d", strtotime($post['expiredate']));
        $params['donumber'] = $post['donumber'];
        $params['dodate'] = date("Y-m-d", strtotime($post['dodate']));
        $params['divbran'] = $post['divbran'];
        $params['picrequest'] = $post['picrequest'];

        $params['feedercode'] = $post['feedercode'];
        $params['origin'] = $post['origin'];
        $params['destination'] = $post['destination'];
        // $params['vesselcode'] = $post['vesselcode'];
        $params['vesselname'] = $post['vesselname'];
        $params['voyage'] = $post['voyage'];
        $params['etd'] = date("Y-m-d", strtotime($post['etd']));
        $params['eta'] = date("Y-m-d", strtotime($post['eta']));
        $params['berthdate'] = date("Y-m-d", strtotime($post['berthdate']));
        $params['remarks'] = $post['remarks'];

        for ($i=0; $i < $count; $i++) { 
            $data[] = array(
                "releasenumber" => $params['releasenumber'],
                "contqty" => $post['contqtyaprv'][$i],
                "contqtyasg" => $post['contqtyasg'][$i],
                "contsize" => $post['contsize'][$i],
                "conttype" => $post['conttype'][$i],
                "notes" => "-"
              );
        }
        // die(print_r($data));
        $this->db->insert('tx_ro_container',$params);
        $this->db->insert_batch('tx_ro_container_detail', $data);

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
       /*  $params['feedercode'] = $post['feedercode'];
        $params['origin'] = $post['origin'];
        $params['destination'] = $post['destination'];
        $params['vesselcode'] = $post['vesselcode'];
        $params['vesselname'] = $post['vesselname'];
        $params['voyage'] = $post['voyage'];
        $params['etd'] = date("Y-m-d", strtotime($post['etd']));
        $params['eta'] = date("Y-m-d", strtotime($post['eta']));
        $params['berthdate'] = date("Y-m-d", strtotime($post['berthdate']));
        $params['remarks'] = $post['remarks'];
         $this->db->where('releasenumber',$post['releasenumber']);
         $this->db->update('tx_ro_container',$params); */
    } 

    public function editDetail($post)
    {
        $params['contqtyasg'] = $post['contqtyasg'];
        // die(print_r($params));
        $this->db->where('lingrid',$post['lingrid']);
        $this->db->update('tx_ro_container_detail',$params);
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


    public function hapusdetailasgnfeeder($post)
    {
        $this->db->where('lingrid',$post['lingrid']);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('tx_req_container_feeder');
    }


    public function del($id)
    {
        $this->db->where('releasenumber', $id);
        $this->db->delete('tx_ro_container');

        $this->db->where('releasenumber', $id);
        $this->db->delete('tx_ro_container_detail');
    }

    public function cari($post)
    {

     
        $divbran= $post['divbran'];
        $portdest= $post['portdest'];

        $donumber= $post['donumber'];
      


        $this->db->from('tx_req_container');
        $this->db->where('reqstatus', '1', 'both');
        

        if ($divbran != null) {
            $this->db->like('divbran', $divbran, 'both');
        }
        if ($portdest != null) {
            $this->db->where('portdest', $portdest, 'both');
        }
        if ($donumber != null) {
            $this->db->like('donumber', $donumber, 'both');
        }
        if ($post['requestdatefrom'] != null AND $post['requestdateto'] != null) {

            $requestdatefrom= date("Y-m-d", strtotime($post['requestdatefrom']));
            $requestdateto= date("Y-m-d", strtotime($post['requestdateto']));

            $this->db->where('dodate >=', $requestdatefrom);
            $this->db->where('dodate <=', $requestdateto);
        }
        $this->db->group_by('donumber');
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
         //die();
        return $query;
    }



    function simpandetailfeeder($lingridcondetailm,$requestnom,$donumberm, $dodatem,$contqtymodal,$feedercode,$origin,$dest,$vesselname,$voyage, $etd, $eta, $berthdate, $remarks,$contsize,$conttype, $donumberfeederbaru){
       
            $etd=  date("Y-m-d", strtotime($etd));
            $eta=  date("Y-m-d", strtotime($eta));
            $berthdate=  date("Y-m-d", strtotime($berthdate));
            $hasil=$this->db->query("INSERT INTO tx_req_container_feeder 
            (
                lingridcondetail,
                requestno,
                donumber,
                contqty,
                contsize,
                conttype,
                donumberfeeder,
                feedercode,
                origin,
                dest,
                vesselname,
                voyage,
                etd,
                eta,
                berthdate,
                notes
                ) 
                VALUES (
                '$lingridcondetailm',
                '$requestnom',
                '$donumberm',
                '$contqtymodal',
                '$contsize',
                '$conttype',
                '$donumberfeederbaru',
                '$feedercode',
                '$origin',
                '$dest',
                '$vesselname',
                '$voyage',  
                '$etd',
                '$eta',
                '$berthdate',
                '$remarks'
                )");
             // print_r($this->db->last_query()); 
             // die();
            return $hasil;
       //  }
       // print_r($this->db->last_query()); 
    }
}