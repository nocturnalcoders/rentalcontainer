<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Divbran_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->from('t_divbran'); // atau $this->db->select('*'); //
        $this->db->order_by('divbran', 'asc');
        $query = $this->db->get();
        return $query;
    }


}