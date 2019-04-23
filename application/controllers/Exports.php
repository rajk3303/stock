<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Exports extends Admin_Controller{
	// construct
    public function __construct() {
        parent::__construct();
        $this->not_logged_in();

		$this->data['page_title'] = 'Exports';

        $this->load->model('model_export');
        // $this->load->model('model_users');

    }    

	 // export xlsx|xls file
    public function index() {
        $data['page'] = 'export-excel';
        
        $data['mobiledata'] = $this->model_export->orderlist();
        // load view file for output
        if(in_array('exports', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->load->view('templates/header');
        $this->load->view('templates/header_menu');
        
        // $this->load->view('templates/side_menubar');
        
        $this->load->view('exports/index.php', $data);
        $this->load->view('templates/footer');
        
        // $this->render_template('exports/index.php', $this->data);



    }
	// create xlsx
    public function createXLS() {
		// create file name
        $fileName = 'Simplentory-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $mobiledata = $this->model_export->orderlist();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'id');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'bill_no');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'customer_name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'customer_address');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'customer_phone');        
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'gross_amount'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'SGST %'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'SGST  Charged'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'CGST %'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'CGST  Charged'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'net_amount'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'discount'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'paid_status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'user_id'); 
        // set Row
        $rowCount = 2;
        foreach ($mobiledata as $val) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $val['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['bill_no']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['customer_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val['customer_address']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val['customer_phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $val['gross_amount']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $val['service_charge_rate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $val['service_charge']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $val['vat_charge_rate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $val['vat_charge']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $val['net_amount']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $val['discount']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $val['paid_status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $val['user_id']);
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
         redirect(site_url().$fileName);              
    }
    
}
?>