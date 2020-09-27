<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_m extends CI_Model {

	public function getPort($id = null)
    {
        $this->db->from('t_port'); // atau $this->db->select('*'); //
        $this->db->order_by('portcode', 'asc');
        $query = $this->db->get();
        return $query;
    }


    public function getDepo($id = null)
    {
        $this->db->from('t_depo'); // atau $this->db->select('*'); //
        $this->db->order_by('depocode', 'asc');
        $query = $this->db->get();
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