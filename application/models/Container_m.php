<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Container_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->from('t_container'); // atau $this->db->select('*'); //
        if($id != null) {
            $this->db->where('contgroup', $id);
        }
        $this->db->order_by('effectivedate', 'desc');
        $this->db->limit(50);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['contgroup'] = $post['contgroup'];
        $params['rent20'] = $post['rent20'];
        $params['rent40'] = $post['rent40'];
        $params['freetime20'] = $post['freetime20'];
        $params['freetime40'] = $post['freetime40'];
        $params['tare20'] = $post['tare20'];
        $params['tare40'] = $post['tare40'];
        $params['payload20'] = $post['payload20'];
        $params['payload40'] = $post['payload40'];
        $params['remarks'] = $post['remarks'];
        $params['effectivedate'] = date("Y-m-d", strtotime($post['effectivedate']));
        $params['expiredate'] = date("Y-m-d", strtotime($post['expiredate']));
        $this->db->insert('t_container',$params);
    }

    public function cekuser()
    {
        $contgroup = $this->input->post('contgroup');
        $this->db->from('t_container');
        $this->db->where('contgroup', $contgroup);
        $query = $this->db->get();
        // print_r($query);
        return $query->num_rows();
    }

    public function edit($post)
    {
        $params['contgroup'] = $post['contgroup'];
        $params['rent20'] = $post['rent20'];
        $params['rent40'] = $post['rent40'];
        $params['freetime20'] = $post['freetime20'];
        $params['freetime40'] = $post['freetime40'];
        $params['tare20'] = $post['tare20'];
        $params['tare40'] = $post['tare40'];
        $params['payload20'] = $post['payload20'];
        $params['payload40'] = $post['payload40'];
        $params['remarks'] = $post['remarks'];
        $params['effectivedate'] = date("Y-m-d", strtotime($post['effectivedate']));
        $params['expiredate'] = date("Y-m-d", strtotime($post['expiredate']));
         // die(print_r($params));
         $this->db->where('contgroup',$post['contgroup']);
         $this->db->update('t_container',$params);
    }

    public function del($id)
    {
        $this->db->where('contgroup', $id);   //$this->db->where(nama_tabel, isi datanya); 
        $this->db->delete('t_container');
    }

    public function cari($post)
     {
        $contgroup = $post['contgroup'];

        $this->db->from('t_container'); // atau $this->db->select('*'); //
        if($contgroup != null) {
            $where['contgroup'] = $contgroup;
            $this->db->like('contgroup', $contgroup, 'both'); 
        }
        if ($post['effectivedatefrom'] != null AND $post['effectivedateto'] != null) {

            $effectivedatefrom = date("Y-m-d", strtotime($post['effectivedatefrom']));
            $effectivedateto = date("Y-m-d", strtotime($post['effectivedateto']));

            $this->db->where('effectivedate >=', $effectivedatefrom);
            $this->db->where('effectivedate <=', $effectivedateto);
        }
        if ($post['expiredatefrom'] != null AND $post['expiredateto'] != null) {

            $expiredatefrom = date("Y-m-d", strtotime($post['expiredatefrom']));
            $expiredateto = date("Y-m-d", strtotime($post['expiredateto']));

            $this->db->where('expiredate >=', $expiredatefrom);
            $this->db->where('expiredate <=', $expiredateto);
        }

        $query = $this->db->get();
        return $query;
     }

}