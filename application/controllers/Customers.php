<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function index()
    {
        $this->load->view('customers/index.php');
    }
}