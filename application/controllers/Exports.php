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
        
        $data['mobiledata'] = $this->model_export->mobileList();
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
        $mobiledata = $this->model_export->mobileList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Model No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Mobile Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Company');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Category');       
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Category'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Category'); 
        // set Row
        $rowCount = 2;
        foreach ($mobiledata as $val) 
        {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $val['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['username']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['password']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val['firstname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val['lastname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $val['phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $val['gender']);
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