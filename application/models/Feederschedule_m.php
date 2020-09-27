<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feederschedule_m extends CI_Model {

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
        $this->db->from('t_schedule'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('lingrid', $id);
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
        $this->db->insert('t_schedule',$params);
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
        $params['lingrid'] = $post['lingrid'];
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
         $this->db->where('lingrid',$post['lingrid']);
         $this->db->update('t_schedule',$params);
    }   

    public function del($id)
	{
		$this->db->where('lingrid', $id);   //$this->db->where(nama_tabel, isi datanya); 
		$this->db->delete('t_schedule');
     }

     public function cari($post)
     {

        $feedercode= $post['feedercode'];
        $deptport= $post['deptport'];
        $destport= $post['destport'];
        $vesselcode = $post['vesselcode'];
        $vesselname= $post['vesselname'];
        $voyage= $post['voyage'];
     //   $servicecode= $post['servicecode'];

        $this->db->from('t_schedule');
        if($feedercode != null) {
            $this->db->like('feedercode', $feedercode, 'both'); 
        }
        if ($deptport != null) {
            $this->db->like('deptport', $deptport, 'both');
        }
        if ($destport != null) {
            $this->db->like('destport', $destport, 'both');
        }
        if ($vesselcode != null) {
            $this->db->like('vesselcode', $vesselcode, 'both');
        }
        if ($vesselname != null) {
            $this->db->like('vesselname', $vesselname, 'both');
        }
        if ($voyage != null) {
            $this->db->like('voyage', $voyage, 'both');
        }
        if ($post['etdfrom'] != null AND $post['etdto'] != null) {

            $etdfrom= date("Y-m-d", strtotime($post['etdfrom']));
            $etdto= date("Y-m-d", strtotime($post['etdto']));

            $this->db->where('etd >=', $etdfrom);
            $this->db->where('etd <=', $etdto);
        }
        if ($post['etafrom'] != null AND $post['etato'] != null) {

            $etafrom = date("Y-m-d", strtotime($post['etafrom']));
            $etato = date("Y-m-d", strtotime($post['etato']));

            $this->db->where('eta >=', $etafrom);
            $this->db->where('eta <=', $etato);
        } 
        if ($post['berthdatefrom'] != null AND $post['berthdateto'] != null) {

            $berthdatefrom= date("Y-m-d", strtotime($post['berthdatefrom']));
            $berthdateto= date("Y-m-d", strtotime($post['berthdateto']));

            $this->db->where('berthdate >=', $berthdatefrom);
            $this->db->where('berthdate <=', $berthdateto);
        }
        // if ($servicecode != null) {
        //     $this->db->like('servicecode', $servicecode, 'both');
        // }
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
     }



}