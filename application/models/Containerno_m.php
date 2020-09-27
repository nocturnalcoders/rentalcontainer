<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Containerno_m extends CI_Model {

	public function get($id = null)
    {
 /*        $this->db->from('t_mascntent'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('containerno', $id);
        }
      
        $this->db->limit(150); */


        $STRQueryx = ' SELECT * ,
       datediff(t_mascntent.statusexportdate, t_mascntent.statusoutdate) as selisih
        FROM
        t_mascntent ';
        $query = $this->db->query($STRQueryx);
       // print_r($this->db->last_query()); 
        return $query;
        
    }

    public function add($post)
    {
        $params['containerno'] = $post['containerno'];
        $params['size'] = $post['size'];
        $params['type'] = $post['type'];
        $params['boxowner'] = $post['boxowner'];
        $params['location'] = $post['location'];
        $params['depocode'] = $post['depo'];
        $params['statusactive'] = $post['status'];
        $this->db->insert('t_mascntent',$params);
    }

    public function cekcontainer()
    {
        $containerno = $this->input->post('containerno');
        $this->db->from('t_mascntent');
        $this->db->where('containerno', $containerno);
        $query = $this->db->get();
         // print_r($query);
        return $query->num_rows();
    }


    public function edit($post)
    {

         // die(print_r($params));
         $params['containerno'] = $post['containerno'];
         $params['size'] = $post['size'];
         $params['type'] = $post['type'];
         $params['boxowner'] = $post['boxowner'];
         $params['location'] = $post['location'];
         $params['depo'] = $post['depo'];
         $params['statusactive'] = $post['status'];

         $this->db->where('containerno',$post['containerno']);
         $this->db->update('t_mascntent',$params);
    }

    public function del($id)
    {
        $this->db->where('containerno', $id);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('t_mascntent');
    }

    public function cari($post)
     {
        $containerno = $post['containerno'];
        $donumber = $post['donumber'];
      

        $STRQuery = ' SELECT *,
                datediff(t_mascntent.statusexportdate, t_mascntent.statusoutdate) as selisih
                FROM
                t_mascntent ';

            if($containerno != null) {
                $STRQuery .= ' WHERE t_mascntent.containerno = "'.$containerno.'"  ';
            }
            if($donumber != null) {
                $STRQuery .= ' WHERE t_mascntent.donumber = "'.$donumber.'"  ';
            }
            $query = $this->db->query($STRQuery);
           // print_r($this->db->last_query()); 
            return $query;
      
     }

     public function caridaridashboard($dofeeder)
     {
  
        $donumber = $dofeeder;
        if($donumber != null) {    
            $STRQuery = ' SELECT *,
            datediff(t_mascntent.statusexportdate, t_mascntent.statusoutdate) as selisih
            FROM
            t_mascntent 
             WHERE t_mascntent.donumber = "'.$donumber.'"  ';
             $query = $this->db->query($STRQuery);



            return $query;
        } 
        else
        {
            return $false;
        }

     
     }

     public function getType()
     {
         $this->db->from('t_conttype');
         $query = $this->db->get();
         // print_r($this->db->last_query()); 
         // die();
         return $query;
     }
 
     
     public function getBoxowner()
     {
         $this->db->from('t_boxowner');
         $query = $this->db->get();
         // print_r($this->db->last_query()); 
         // die();
         return $query;
     }

}