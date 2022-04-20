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

class Jadwals extends MY_Controller
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
          $this->load->model('Company_model');
		  $this->load->model('Xin_model');
		  $this->load->model('Events_model');
		  $this->load->model('Jadwals_model');
		  $this->load->model('Meetings_model');
		  $this->load->model('Department_model');
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
		$data['title'] = ' Jadwal | '.$this->Xin_model->site_title();
		$data['breadcrumbs'] = 'Jadwal';
		$data['path_url'] = 'jadwals';
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('98',$role_resources_ids)) {
			$data['subview'] = $this->load->view("admin/jadwals/jadwals_list", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		} else {
			redirect('admin/dashboard');
		}
	}
	
	//events calendar
	public function calendar() {
	
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$system = $this->Xin_model->read_setting_info(1);
		if($system[0]->module_jadwals!='true'){
			redirect('admin/dashboard');
		}
		$data['title'] = $this->lang->line('xin_hr_jadwals_calendar');
		$data['breadcrumbs'] = $this->lang->line('xin_hr_jadwals_calendar');
		$data['all_jadwals'] = $this->jadwals_model->get_jadwals();
		$data['all_meetings'] = $this->Meetings_model->get_meetings();
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$data['path_url'] = 'jadwal_calendar';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		//if(in_array('100',$role_resources_ids)) {
			$data['subview'] = $this->load->view("admin/jadwals/calendar_jadwals", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		//} else {
		//	redirect('admin/dashboard');
		//}
	}
	
	// get company > employees
	 public function get_employees() {

		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(4);
		
		$data = array(
			'company_id' => $id
			);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/jadwals/get_employees", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }
	
	// jadwals_list > jadwals
	 public function jadwals_list() {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/jadwals/jadwals_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
				
		
		$role_resources_ids = $this->Xin_model->user_role_resource();
		$user_info = $this->Xin_model->read_user_info($session['user_id']);
		if($user_info[0]->user_role_id==1){
			$jadwals = $this->Jadwals_model->get_jadwals();
		} else {
			if(in_array('272',$role_resources_ids)) {
				$jadwals = $this->Jadwals_model->get_company_jadwals($user_info[0]->company_id);
			} else {
				$jadwals = $this->Jadwals_model->get_employee_jadwals($session['user_id']);
			}
		}
		$data = array();

        foreach($jadwals->result() as $r) {
			  
			 // get start date and end date
			 $sdate = $this->Xin_model->set_date_format($r->jadwal_date);
			 // get time am/pm
			 $jadwal_time = new DateTime($r->jadwal_time);
			 // get company
			$company = $this->Xin_model->read_company_info($r->company_id);
			if(!is_null($company)){
				$comp_name = $company[0]->name;
			} else {
				$comp_name = '--';	
			}
			
			// get user > added by
			if($r->employee_id == '') {
				$ol = $this->lang->line('xin_not_assigned');
			} else {
				$ol = '';
				foreach(explode(',',$r->employee_id) as $desig_id) {
					$assigned_to = $this->Xin_model->read_user_info($desig_id);
					if(!is_null($assigned_to)){
						
					  $assigned_name = $assigned_to[0]->first_name.' '.$assigned_to[0]->last_name;
					 if($assigned_to[0]->profile_picture!='' && $assigned_to[0]->profile_picture!='no file') {
						$ol .= '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="'.$assigned_name.'"><span class="avatar box-32"><img src="'.base_url().'uploads/profile/'.$assigned_to[0]->profile_picture.'" class="user-image-hr" alt=""></span></a>';
						} else {
						if($assigned_to[0]->gender=='Male') { 
							$de_file = base_url().'uploads/profile/default_male.jpg';
						 } else {
							$de_file = base_url().'uploads/profile/default_female.jpg';
						 }
						$ol .= '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="'.$assigned_name.'"><span class="avatar box-32"><img src="'.$de_file.'" class="user-image-hr" alt=""></span></a>';
						}
					} ////
					else {
						$ol .= '';
					}
				 }
				 $ol .= '';
			}
			$full_name = $ol;
			if(in_array('270',$role_resources_ids)) { //edit
				$edit = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light edit-data" data-toggle="modal" data-target=".edit-modal-data" data-jadwal_id="'. $r->jadwal_id.'"><span class="fa fa-pencil"></span></button></span>';
			} else {
				$edit = '';
			}
			if(in_array('271',$role_resources_ids)) { // delete
				$delete = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->jadwal_id . '"><span class="fa fa-trash"></span></button></span>';
			} else {
				$delete = '';
			}
			if(in_array('272',$role_resources_ids)) { //view
				$view = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-jadwal_id="'. $r->jadwal_id . '"><span class="fa fa-eye"></span></button></span>';
			} else {
				$view = '';
			}
		   $combhr = $edit.$view.$delete;
		   $data[] = array(
				$combhr,
				$comp_name,
				$full_name,
				$r->jadwal_title,
				$sdate,
				$jadwal_time->format('h:i a')
		   );
	  }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $jadwals->num_rows(),
			 "recordsFiltered" => $jadwals->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 // Validate and add info in database
	public function add_jadwal() {
	
		if($this->input->post('add_type')=='jadwal') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		
		$jadwal_date = $this->input->post('jadwal_date');
		$current_date = date('Y-m-d');
		$jadwal_note = $this->input->post('jadwal_note');
		$ev_date = strtotime($jadwal_date);
		$ct_date = strtotime($current_date);
		$qt_jadwal_note = htmlspecialchars(addslashes($jadwal_note), ENT_QUOTES);
		$assigned_to = $this->input->post('employee_id');
			
		/* Server side PHP input validation */		
		if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if(empty($assigned_to)) {
			$Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('jadwal_title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_jadwal_title_field');
		} else if($this->input->post('jadwal_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_jadwal_date_field');
		} 
		// else if($ev_date < $ct_date) {
		// 	$Return['error'] = $this->lang->line('xin_error_jadwal_date_current_date');
		// } 
		else if($this->input->post('jadwal_time')==='') {
			$Return['error'] = $this->lang->line('xin_error_jadwal_time_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		$assigned_ids = implode(',',$this->input->post('employee_id'));
		$employee_ids = $assigned_ids;
		$data = array(
		'company_id' => $this->input->post('company_id'),
		'employee_id' => $employee_ids,
		'jadwal_title' => $this->input->post('jadwal_title'),
		'jadwal_date' => $this->input->post('jadwal_date'),
		'jadwal_time' => $this->input->post('jadwal_time'),
		'jadwal_note' => $qt_jadwal_note,
		'created_at' => date('Y-m-d')
		);
		$result = $this->Jadwals_model->add($data);
		
		if ($result == TRUE) {
			$row = $this->db->select("*")->limit(1)->order_by('jadwal_id',"DESC")->get("xin_jadwals")->row();
			$Return['result'] = $this->lang->line('xin_hr_success_jadwal_added');
			$Return['re_jadwal_id'] = $row->jadwal_id;
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
			$Return['error_possition line'] = 274;
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and add info in database
	public function edit_jadwal() {
	
		if($this->input->post('edit_type')=='jadwal') {
			
		$id = $this->uri->segment(4);		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		
		$jadwal_date = $this->input->post('jadwal_date');
		$current_date = date('Y-m-d');
		$jadwal_note = $this->input->post('jadwal_note');
		$ev_date = strtotime($jadwal_date);
		$ct_date = strtotime($current_date);
		$qt_jadwal_note = htmlspecialchars(addslashes($jadwal_note), ENT_QUOTES);
			
		/* Server side PHP input validation */		
		if($this->input->post('jadwal_title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_jadwal_title_field');
		} else if($this->input->post('jadwal_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_jadwal_date_field');
		} 
		// else if($ev_date < $ct_date) {
		// 	$Return['error'] = $this->lang->line('xin_error_jadwal_date_current_date');
		// } 
		else if($this->input->post('jadwal_time')==='') {
			$Return['error'] = $this->lang->line('xin_error_jadwal_time_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'jadwal_title' => $this->input->post('jadwal_title'),
		'jadwal_date' => $this->input->post('jadwal_date'),
		'jadwal_time' => $this->input->post('jadwal_time'),
		'jadwal_note' => $qt_jadwal_note
		);
		$result = $this->Jadwals_model->update_record($data,$id);
				
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_hr_success_jadwal_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// get record of jadwal
	public function read_jadwal_record()
	{
		$data['title'] = $this->Xin_model->site_title();
		$jadwal_id = $this->input->get('jadwal_id');
		$result = $this->Jadwals_model->read_jadwal_information($jadwal_id);
		
		$data = array(
				'jadwal_id' => $result[0]->jadwal_id,
				'employee_id' => $result[0]->employee_id,
				'company_id' => $result[0]->company_id,
				'jadwal_title' => $result[0]->jadwal_title,
				'jadwal_date' => $result[0]->jadwal_date,
				'jadwal_time' => $result[0]->jadwal_time,
				'jadwal_note' => $result[0]->jadwal_note,
				'all_employees' => $this->Xin_model->all_employees(),
				'get_all_companies' => $this->Xin_model->get_companies()
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('admin/jadwals/dialog_jadwals', $data);
		} else {
			redirect('admin/');
		}
	}
		
	public function delete_jadwal() {
		if($this->input->post('type')=='delete') {
			// Define return | here result is used to return user data and error for error message 
			$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Jadwals_model->delete_jadwal_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_hr_success_jadwal_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	 
	 
	 
} 
?>