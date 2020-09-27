<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feeder_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('');
        $this->db->from('t_feeder');
        $this->db->where('feedername', $post['feedername']);
    
        $query = $this->db->get();
        return $query;
    }
    
    public function get($id = null)
    {
        $this->db->from('t_feeder'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('feedercode', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }

        
    public function add($post)
    {
        //INI INSERT HEADER
       // die(print_r($post));
        $params['feedercode'] = $post['feedercode'];
        $params['feedername'] = $post['feedername'];                  
  
        $this->db->insert('t_feeder',$params);


         //3. Inset Multiple  ke table t_feeder_detail
        // die(print_r($post));
         $count = count($post['origin']);
         for ($i=0; $i < $count; $i++) { 
            $data[] = array(
                "feedercode" => $params['feedercode'],
                // "origin" => $post['contqty'][$i],

                "origin" => $post['origin'][$i],
                "dest" => $post['dest'][$i],
                "emptyrepo20" => $post['emptyrepo20'][$i],
                "freeuse20" => $post['freeuse20'][$i],
                "domesticladen20" => $post['domesticladen20'][$i],
                "emptyrepo40" => $post['emptyrepo40'][$i],
                "freeuse40" => $post['freeuse40'][$i],
                "domesticladen40" => $post['domesticladen40'][$i]
               // "notes" => $post['notes'][$i]
              );
        }
         // die(print_r($post));
        $this->db->insert_batch('t_feeder_detail', $data);

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
        // die(print_r($post));
        $params['feedername'] = $post['feedername'];   // //$post fullname ini didapat dari feeder_form_edit dari inputbox                 
        $params['contgroup'] = $post['contgroup']; 
         // die(print_r($params));
         $this->db->where('feedercode',$post['feedercode']);
         $this->db->update('t_feeder',$params);
         
    }   


    public function getDetail($id = null)
    {
        $this->db->from('t_feeder_detail');
      //  die($id);
        if($id != null) {
            $this->db->where('feedercode', $id);
        }
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }



    
    public function editDetail($post)
    {

        $params['origin'] = $post['origin'];
        $params['dest'] = $post['dest'];
        $params['emptyrepo20'] = $post['emptyrepo20'];
        $params['freeuse20'] = $post['freeuse20'];
        $params['domesticladen20'] = $post['domesticladen20'];
        $params['emptyrepo40'] = $post['emptyrepo40'];
        $params['freeuse40'] = $post['freeuse40'];
        $params['domesticladen40'] = $post['domesticladen40'];
        //$params['notes'] = $post['notes'];
        // die(print_r($params));
        $this->db->where('lingrid',$post['lingrid']);
        $this->db->update('t_feeder_detail',$params);
    } 

    public function adddetail($post)
    {
        // $params['lingrid'] = $post['lingrid'];
        // die(print_r($post));
        $params['feedercode'] = $post['feedercode'];
       // $params['origin'] = $post['contqty'];

        $params['origin'] = $post['origin'];
        $params['dest'] = $post['dest'];

        $params['emptyrepo20'] = $post['emptyrepo20'];
        $params['freeuse20'] = $post['freeuse20'];
        $params['domesticladen20'] = $post['domesticladen20'];

        $params['emptyrepo40'] = $post['emptyrepo40'];
        $params['freeuse40'] = $post['freeuse40'];
        $params['domesticladen40'] = $post['domesticladen40'];
        $this->db->insert('t_feeder_detail',$params);
    } 

    public function hapusDetail($post)
    {
      
        $this->db->where('lingrid',$post['lingrid']);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('t_feeder_detail');
    }






    public function del($id)
	{
		$this->db->where('feedercode', $id);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('t_feeder');
        
        $this->db->where('feedercode', $id);
        $this->db->delete('t_feeder_detail');
     }

     public function cari($post)
     {
        $feedercode = $post['feedercode'];
        $feedername = $post['feedername']; 
        $contgroup = $post['contgroup'];

        $this->db->from('t_feeder'); // atau $this->db->select('*'); //
       if($feedercode != null) {
            // $this->db->where('feedercode', $feedercode);
            $this->db->like('feedercode', $feedercode, 'both'); 
        }
        if ($feedername != null) {
            // $this->db->where('feedername', $feedername);
            $this->db->like('feedername', $feedername, 'both');
        }
        if ($contgroup != null) {
            // $this->db->where('divbran', $divbran);
            $this->db->like('contgroup', $contgroup, 'both');
        } 
        $query = $this->db->get();
        return $query;
     }



}