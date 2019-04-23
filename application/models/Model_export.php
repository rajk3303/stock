<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Model_export extends CI_Model
{
    // get mobiles list
    public function orderlist()
    {
        $this->db->select(array
        (
            `o.id`,
            `o.bill_no`,
            `o.customer_name`,
            `o.customer_address`,
            `o.customer_phone`,
            `o.gross_amount` ,
            `o.service_charge_rate` ,
            `o.service_charge` ,
            `o.vat_charge_rate` ,
            `o.vat_charge` ,
            `o.net_amount` ,
            `o.discount` ,
            `o.paid_status`,
            `o.user_id`
         )
        );
        $this->db->from('orders as o');
        $query = $this->db->get();
        return $query->result_array();
    }
}
