<?php
/**
 * Description of Export Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Exports extends CI_Controller {
	// construct
    public function __construct() {
        parent::__construct();
		// load model
        $this->load->model('Export', 'export');
    }    
	 // export xlsx|xls file
    public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['mobiledata'] = $this->export->mobileList();
		// load view file for output
        // $this->load->view('header');
        // $this->load->view('footer');
        $this->load->view('exports_view', $data);
    }
	// create xlsx
    public function createXLS() {
		// create file name
        $fileName = 'mobile-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $mobiledata = $this->export->mobileList();
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