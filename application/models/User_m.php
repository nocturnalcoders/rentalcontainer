<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post)
    {
            // $post['usernane']) --> diambil dari  view login.php pada nama kolom input username
            // $post['password']) --> diambil dari  view login.php pada nama kolom input password

        $this->db->select('');
        $this->db->from('t_user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);  // kalo pake sha1 jadi gini  $this->db->where('password', sha1($post['password'])); 
        $query = $this->db->get();
        return $query;
    }
    
    public function get($id = null)
    {
        $this->db->from('t_user'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $this->db->limit(50);
        $query = $this->db->get();
        return $query;
    }

        
    public function add($post)
    {
        $params['user_id'] = $post['user_id'];
        $params['name'] = $post['name']; 
        $params['username'] = $post['username'];  //bisa juga pake ini -->  $params = array('username' => $post['username']);
         //$params['username']  //$post ini didapat dari controler add
         //-->username harus sesuai dengan name di table                     
         // $params['password'] = md5($post['password']);                   
         $params['password'] = $post['password']; 
         $params['divbran'] = $post['divbran']; 
         $params['location'] = $post['location']; 
         $params['level'] = $post['level']; 
         $this->db->insert('t_user',$params);
    }

    public function cekuser()
    {
        $user_id = $this->input->post('userid');
        $this->db->from('t_user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        // print_r($query);
        return $query->num_rows();
    }

    public function edit($post)
    {
        // die(print_r($post));
        $params['name'] = $post['name'];  // //$post fullname ini didapat dari user_form_edit dari inputbox
        $params['username'] = $post['username'];  
        if(!empty($post['password'])) {  //jika passwordnya kosong tidak diganti
            $params['password'] = $post['password'] ;   // atau sha1($post['password']);
        }                    
         $params['divbran'] = $post['divbran']; 
         $params['location'] = $post['location']; 
         $params['level'] = $post['level']; 
         // die(print_r($params));
         $this->db->where('user_id',$post['user_id']);
         $this->db->update('t_user',$params);
    }   

    public function del($id)
	{
		$this->db->where('user_id', $id);   //$this->db->where(nama_tabel, isi datanya); 
		$this->db->delete('t_user');
     }

     public function cari($post)
     {
        $user_id = $post['user_id'];
        $name = $post['name']; 
        $username = $post['username']; 
        $divbran = $post['divbran'];
        $location = $post['location']; 

        $this->db->from('t_user'); // atau $this->db->select('*'); //
        if($user_id != null) {
            // $this->db->where('user_id', $user_id);
            $this->db->like('user_id', $user_id, 'both'); 
        }
        if ($name != null) {
            // $this->db->where('name', $name);
            $this->db->like('name', $name, 'both');
        }
        if ($username != null) {
            // $this->db->where('username', $username);
            $this->db->like('username', $username, 'both');
        }
        if ($divbran != null) {
            // $this->db->where('divbran', $divbran);
            $this->db->like('divbran', $divbran, 'both');
        }
        if ($location != null) {
            // $this->db->where('divbran', $divbran);
            $this->db->like('location', $location, 'both');
        }
        $query = $this->db->get();
        return $query;
     }



}