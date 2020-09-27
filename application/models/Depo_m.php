<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Depo_m extends CI_Model {

    public function login($post)
    {
            // $post['deponane']) --> diambil dari  view login.php pada nama kolom input deponame
            // $post['password']) --> diambil dari  view login.php pada nama kolom input password

        $this->db->select('');
        $this->db->from('t_depo');
        $this->db->where('deponame', $post['deponame']);
        $this->db->where('contgroup', $post['contgroup']);  // kalo pake sha1 jadi gini  $this->db->where('password', sha1($post['password'])); 
        $query = $this->db->get();
        return $query;
    }
    
    public function get($id = null)
    {
        $this->db->from('t_depo'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('depocode', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        // print_r($this->db->last_query()); 
        // die();
        return $query;
    }

        
    public function add($post)
    {
        $params['depocode'] = $post['depocode'];
        $params['deponame'] = $post['deponame'];  //bisa juga pake ini -->  $params = array('deponame' => $post['deponame']);
         //$params['deponame']  //$post ini didapat dari controler add
         //-->deponame harus sesuai dengan name di table                     
         // $params['password'] = md5($post['password']);                   
         $params['location'] = $post['location']; 
         $params['lifton20'] = $post['lifton20'];
         $params['lifton40'] = $post['lifton40']; 
         $params['liftoff20'] = $post['liftoff20'];
         $params['liftoff40'] = $post['liftoff40']; 
         $this->db->insert('t_depo',$params);
    }

    public function cekdepo()
    {
        $depocode = $this->input->post('depoid');
        $this->db->from('t_depo');
        $this->db->where('depocode', $depocode);
        $query = $this->db->get();
        // print_r($query);
        return $query->num_rows();
    }

    public function edit($post)
    {
        // die(print_r($post));
        $params['deponame'] = $post['deponame'];   // //$post fullname ini didapat dari depo_form_edit dari inputbox                 
        $params['location'] = $post['location']; 
        $params['lifton20'] = $post['lifton20'];
        $params['lifton40'] = $post['lifton40']; 
        $params['liftoff20'] = $post['liftoff20'];
        $params['liftoff40'] = $post['liftoff40']; 
         // die(print_r($params));
         $this->db->where('depocode',$post['depocode']);
         $this->db->update('t_depo',$params);
    }   

    public function del($id)
	{
		$this->db->where('depocode', $id);   //$this->db->where(nama_tabel, isi datanya); 
		$this->db->delete('t_depo');
     }

     public function cari($post)
     {
        $depocode = $post['depocode'];
        $deponame = $post['deponame']; 
        $location = $post['location'];

        $this->db->from('t_depo'); // atau $this->db->select('*'); //
       if($depocode != null) {
            // $this->db->where('depocode', $depocode);
            $this->db->like('depocode', $depocode, 'both'); 
        }
        if ($deponame != null) {
            // $this->db->where('deponame', $deponame);
            $this->db->like('deponame', $deponame, 'both');
        }
        if ($location != null) {
            // $this->db->where('divbran', $divbran);
            $this->db->like('location', $location, 'both');
        } 
        $query = $this->db->get();
        return $query;
     }



}