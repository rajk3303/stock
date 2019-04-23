<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Model_export extends CI_Model
{
    // get mobiles list
    public function mobileList()
    {
        $this->db->select(array('m.id', 'm.username', 'm.password', 'm.email', 'm.firstname', 'm.lastname', 'm.phone', 'm.gender'));
        $this->db->from('users as m');
        $query = $this->db->get();
        return $query->result_array();
    }
}
