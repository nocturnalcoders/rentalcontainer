<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Depoin_m extends CI_Model {

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
        $this->db->from('tx_mov_container'); // atau $this->db->select('*'); //
        if($id != null) {
          //  $this->db->where('containerno', $id);
         
          $this->db->where('movestatus', $id); 
        }
        $this->db->limit(50);
        $query = $this->db->get();
        return $query;
    }

        
    public function add($post)
    {
        $params['feedercode'] = $post['feedercode'];
        $params['deptport'] = $post['deptport'];
        $params['destport'] = $post['destport'];
        $params['vesselcode'] = $post['vesselcode'];
        $params['vesselname'] = $post['vesselname'];
        $params['voyage'] = $post['voyage'];
        $params['etd'] = date("Y-m-d", strtotime($post['etd']));
        $params['eta'] = date("Y-m-d", strtotime($post['eta']));
        $params['berthdate'] = date("Y-m-d", strtotime($post['berthdate']));
        $params['servicecode'] = $post['servicecode'];
        
        // die(print_r($params));
        $this->db->insert('tx_mov_container',$params);
    }

    public function addUpload($post)
    {
         //print_r($post);
        $count = count($post['containerno']);
        for ($i=0; $i < $count; $i++) { 
            $data[] = array(
                "containerno" => str_replace(' ', '', $post['containerno'][$i]),
                "contsize" => str_replace(' ', '', str_replace("'", '',$post['contsize'][$i])),
                "conttype" => str_replace(' ', '', $post['conttype'][$i]),
                "donumber" => str_replace(' ', '', $post['donumber'][$i]),
                "feedercode" => str_replace(' ', '', $post['feedercode'][$i]),
                "vesselname" => $post['vesselname'][$i],
                "voyage" => str_replace(' ', '', $post['voyage'][$i]),
                "movestatus" => str_replace(' ', '', $post['movestatus'][$i]),
                "movedate" => date("Y-m-d", strtotime(str_replace(' ', '', $post['movedate'][$i]))),
                "movetime" => str_replace(' ', '', $post['movetime'][$i]),
                "location" => str_replace(' ', '', $post['location'][$i]),
                "depo" => str_replace(' ', '', $post['depo'][$i]),
                "destination" => str_replace(' ', '', $post['destination'][$i]),
                "remarks" => $post['remarks'][$i]
              );

              //Insert atau Update ke table t_mascent
              $query = $this->db->query('SELECT * FROM t_mascntent where containerno =  "'.str_replace(' ', '', $post['containerno'][$i]).'"   ');
              $row=$query->result_array();
              if($query->num_rows() > 0) {
                $row = $query->row_array(); 


                $params['status'] = trim($post['movestatus'][$i]);
                $params['statusdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                $params['donumber'] =  str_replace(' ', '', $post['donumber'][$i]); ///trim($post['donumber'][$i]);
                $params['location'] = trim($post['location'][$i]);
                $params['depocode'] = trim($post['depo'][$i]);
                $params['destination'] = trim($post['destination'][$i]);
                $params['feedercode'] = trim($post['feedercode'][$i]);
                $params['vesselname'] = trim($post['vesselname'][$i]);
                $params['voyage'] = trim($post['voyage'][$i]);




                if (TRIM($post['movestatus'][$i]) == 'IN') {
                  $params['statusindate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'OUT') {
                  $params['statusoutdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'SAILING') {
                  $params['statussailingdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'ARRIVAL') {
                  $params['statusarrivaldate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                
                } else if  (TRIM($post['movestatus'][$i]) == 'EXPORT') {
                  $params['statusexportdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                }
                 $this->db->where('containerno',str_replace(' ', '', $post['containerno'][$i]));
                 $this->db->update('t_mascntent',$params);
                //echo $this->db->last_query();
               // str_replace(' ', '', $post['containerno'][$i]),
              } else {

                $params['containerno'] = str_replace(' ', '', $post['containerno'][$i]);
                $params['size'] = trim($post['contsize'][$i]);
                $params['type'] = trim($post['conttype'][$i]);
                $params['boxowner'] = 'COSCO';
                $params['location'] = trim($post['location'][$i]);
                $params['depocode'] = trim($post['depo'][$i]);


                $params['status'] = trim($post['movestatus'][$i]);
                $params['statusdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                $params['donumber'] = str_replace(' ', '', $post['donumber'][$i]); //trim($post['donumber'][$i]);

                $params['destination'] = trim($post['destination'][$i]);
                $params['feedercode'] = trim($post['feedercode'][$i]);
                $params['vesselname'] = trim($post['vesselname'][$i]);
                $params['voyage'] = trim($post['voyage'][$i]);


                if (TRIM($post['movestatus'][$i]) == 'IN') {
                  $params['statusindate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'OUT') {
                  $params['statusoutdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'SAILING') {
                  $params['statussailingdate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                } else if  (TRIM($post['movestatus'][$i]) == 'ARRIVAL') {
                  $params['statusarrivaldate'] = date("Y-m-d", strtotime($post['movedate'][$i]));
                }
                $this->db->insert('t_mascntent',$params);

              }
            //END OF Insert atau Update ke table t_mascent

        }

        // die(print_r($data));
        $this->db->insert_batch('tx_mov_container',$data);
    }

    public function cekfeeder()
    {
        $feedercode = $this->input->post('feederid');
        $this->db->from('t_feeder');
        $this->db->where('feedercode', $feedercode);
        $query = $this->db->get();
        // print_r($query);
        return $query->num_rows();
    }

    public function edit($post)
    {
       // $params['lingrid'] = $post['lingrid'];
        $params['feedercode'] = $post['feedercode'];
        $params['deptport'] = $post['deptport'];
        $params['destport'] = $post['destport'];
        $params['vesselcode'] = $post['vesselcode'];
        $params['vesselname'] = $post['vesselname'];
      //  donumber
        $params['voyage'] = $post['voyage'];
        $params['etd'] = date("Y-m-d", strtotime($post['etd']));
        $params['eta'] = date("Y-m-d", strtotime($post['eta']));
        $params['berthdate'] = date("Y-m-d", strtotime($post['berthdate']));
        $params['servicecode'] = $post['servicecode'];
         $this->db->where('lingrid',$post['lingrid']);
         $this->db->update('tx_mov_container',$params);
    }   

    public function del($id)
	{
		$this->db->where('lingrid', $id);   //$this->db->where(nama_tabel, isi datanya); 
		$this->db->delete('tx_mov_container');
     }

     public function cari($post, $page)
     {

        $feedercode= $post['feedercode'];
        $containerno= $post['containerno'];
     
       if($page=="depoout")
       {
         $movestatus = "OUT";
       }
       else if($page=="depoin")
       {
         $movestatus = "IN";
       }
       else if($page=="arrival")
       {
         $movestatus = "ARRIVAL";
       }
       else if($page=="export")
       {
         $movestatus = "EXPORT";
       }
       else
       {
        $movestatus = "SAILING";
       }
       
        $this->db->from('tx_mov_container');
        $this->db->where('movestatus', $movestatus); 

        if($feedercode != null) {
            $this->db->like('feedercode', $feedercode, 'both'); 
        }
        if ($containerno != null) {
            $this->db->like('containerno', $containerno, 'both');
        }
        
        $query = $this->db->get();
       //  print_r($this->db->last_query()); 
        // die();
        return $query;
     }

     public function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
      
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function cekData($containerno_query,$movestatus_query,$movedate_query)
      {
        $data = array();
        $this->db->from('tx_mov_container');
        $this->db->where('containerno', $containerno_query);
        $this->db->where('movestatus', $movestatus_query);
        $this->db->where('movedate', $movedate_query);
        $containernodata = $this->db->get();
        $data['containerno'] = $containernodata->result_array();
       // print_r($this->db->last_query()); 
       /*  $this->db->from('tx_mov_container');
        $this->db->where_in('movestatus', $movestatus_query);
        $movestatus = $this->db->get();
        $data['movestatus'] = $containernodata->result_array();

        $this->db->from('tx_mov_container');
        $this->db->where_in('movedate', $movedate_query);
        $movedate = $this->db->get();
        $data['movedate'] = $containernodata->result_array(); */
        return $data;
      }

      public function cekDO($donumberfeeder)
      {
        $data = array();
        $this->db->from('tx_req_container_feeder');
        $this->db->where('donumberfeeder', $donumberfeeder);
        $query = $this->db->get();
         //print_r($this->db->last_query()); 
         // die();
         return $query;
      }

}