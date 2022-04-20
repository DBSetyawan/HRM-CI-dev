<?php
 /**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the HRSALE License
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.hrsale.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to hrsalesoft@gmail.com so we can send you a copy immediately.
 *
 * @author   HRSALE
 * @author-email  hrsalesoft@gmail.com
 * @copyright  Copyright © hrsale.com. All Rights Reserved
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slips extends MY_Controller
{

   /*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	public function __construct()
     {
          parent::__construct();
          //load the login model
		  $this->load->model('Xin_model');
		  $this->load->model('Slips_model');
     }
	 
	public function index() {
	
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$system = $this->Xin_model->read_setting_info(1);
		if($system[0]->module_jadwals!='true'){
			redirect('admin/dashboard');
		}
		$data['title'] = 'Daftar Slip Gaji | '.$this->Xin_model->site_title();
		$data['breadcrumbs'] = 'Daftar Slip Gaji';
		$data['path_url'] = 'slips';
			$data['subview'] = $this->load->view("admin/slips/slip_list", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		
	}
	
} 
?>