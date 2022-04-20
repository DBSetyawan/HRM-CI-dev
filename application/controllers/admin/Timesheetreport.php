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
defined('BASEPATH') OR exit('No direct script access allowed');

class Timesheetreport extends MY_Controller {
	
	 public function __construct() {
        parent::__construct();
		//load the model
		$this->load->model("Timesheet_model");
		$this->load->model("Employees_model");
		$this->load->model("Xin_model");
		$this->load->library('email');
		$this->load->model("Department_model");
		$this->load->model("Designation_model");
		$this->load->model("Roles_model");
		$this->load->model("Project_model");
		$this->load->model("Location_model");
		$this->load->model("Timesheetlog_model");
		$this->load->model("Timesheetreport_model");
	}
	
	public function index(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['hadir'] = $this->Timesheetreport_model->get_hadir();
				$data['absen'] = $this->Timesheetreport_model->get_absen();
				$data['luarkota'] = $this->Timesheetreport_model->get_luarkota();
				$data['dalamkota'] = $this->Timesheetreport_model->get_dalamkota();
				$data['dangerarea'] = $this->Timesheetreport_model->get_dangerarea();
				$data['subview'] = $this->load->view("admin/timesheet/attendance_log_dashboard", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function history_pegawai(){
		$attendance_date = $this->input->get('date');
		$employee_id = $this->input->get('employee_id');
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['history'] = $this->Timesheetreport_model->get_history($attendance_date,$employee_id);
				$data['subview'] = $this->load->view("admin/timesheet/report/history", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function all(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['hadir'] = $this->Timesheetreport_model->get_hadir();
				$data['absen'] = $this->Timesheetreport_model->get_absen();
				$data['luarkota'] = $this->Timesheetreport_model->get_luarkota();
				$data['dalamkota'] = $this->Timesheetreport_model->get_dalamkota();
				$data['dangerarea'] = $this->Timesheetreport_model->get_dangerarea();
				$data['subview'] = $this->load->view("admin/timesheet/report/all", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function notlogin(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['absen'] = $this->Timesheetreport_model->get_absen();
				$data['subview'] = $this->load->view("admin/timesheet/report/notlogin", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}
	public function notloginkoor(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['absen'] = $this->Timesheetreport_model->get_absenkoor();
				$data['subview'] = $this->load->view("admin/timesheet/report/notloginkoor", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

//LAPORAN ABSEN PAYROLL
	public function notloginsim(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['absen'] = $this->Timesheetreport_model->get_absensim();
				$data['subview'] = $this->load->view("admin/timesheet/report/notloginsim", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function haslogin(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('hr_timesheet_dashboard_title').' | '.$this->Xin_model->site_title();
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['absen'] = $this->Timesheetreport_model->get_hadir_rpt();
				$data['subview'] = $this->load->view("admin/timesheet/report/haslogin", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}


    public function get_login_rpt(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_hadir_rpt($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$man_name = $value->man_first_name.(!empty($value->man_last_name)? " ".$value->man_last_name : "");
			$image_log = str_replace("[removed]","",$value->image_log);
			
			$img = '<img height="80" width="80" src="'."data:image/jpeg||image/gif||image/png;base64,".$image_log.'">';
			$data[] = [$nama,$img, $attendance_date, $value->first_log,$value->last_log,$value->address_log,$man_name,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }


	public function luarkota(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = "Report Pegawai Luar Kota";
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['hadir'] = $this->Timesheetreport_model->get_hadir();
				$data['absen'] = $this->Timesheetreport_model->get_absen();
				$data['luarkota'] = $this->Timesheetreport_model->get_luarkota();
				$data['dalamkota'] = $this->Timesheetreport_model->get_dalamkota();
				$data['dangerarea'] = $this->Timesheetreport_model->get_dangerarea();
				$data['subview'] = $this->load->view("admin/timesheet/report/luarkota", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function dangerarea(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = "Report Danger Area";
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['subview'] = $this->load->view("admin/timesheet/report/dangerarea", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}


	public function dalamkota(){
     	$this->load->model('Timesheetreport_model');
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = "Report Dalam Kota";
		
		$data['breadcrumbs'] = $this->lang->line('hr_timesheet_dashboard_title');
		$data['path_url'] = 'attendance_log_dashboard';
		//$data['get_invoice_payments'] = $this->Finance_model->get_invoice_payments();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('423',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['subview'] = $this->load->view("admin/timesheet/report/dalamkota", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}



 	public function all_list(){
     	// header('Content-Type: application/json');
 		$status = $this->input->get("status");
     	$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		$user_info = $this->Xin_model->read_user_info($session['user_id']);

		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$role_resources_ids = $this->Xin_model->user_role_resource();
		$attendance_date = $this->input->get("attendance_date");
		$ref_location_id = $this->input->get("location_id");
		if($user_info[0]->user_role_id==1){
			if($ref_location_id == 0) {
				$employee = $this->Employees_model->get_attendance_employees();
			} else {
				$employee = $this->Employees_model->get_attendance_location_employees($ref_location_id);
			}
		} else {
			if(in_array('9911',$role_resources_ids) || $user_info[0]->user_role_id==1 ) {
				$employee = $this->Xin_model->get_company_employees($user_info[0]->company_id);
			} else {
				$employee = $this->Xin_model->read_employee_info_att($session['user_id']);
			}
		}
		
		$system = $this->Xin_model->read_setting_info(1);
		$data = array();

        foreach($employee->result() as $r) {
			if($r->user_role_id!=1){ 			  		
				// user full name
				$full_name = $r->first_name.' '.$r->last_name;	
				// get office shift for employee
				$get_day = strtotime($attendance_date);
				$day = date('l', $get_day);
				
				
				// check if clock-in for date
				$attendance_status = '';
				$check = $this->Timesheetlog_model->attendance_first_in_check($r->user_id,$attendance_date);		
				if($check->num_rows() > 0){
					$status = 'Present';
					$first = $this->Timesheetlog_model->get_where(['is_first' => 1,'employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row_array();	
					$last = $this->Timesheetlog_model->get_where(['is_last' => 1,'employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row_array();	
					$history_data = $this->Timesheetlog_model->get_where(['employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->result();
					$history = [];
					foreach ($history_data as $key_h => $value_h) {
						$danger = [];
						if(empty($value_h->clock_in_latitude_log)){
							$value_h->clock_in_latitude_log = 0.0;
						}
						if(empty($value_h->clock_in_longitude_log)){
							$value_h->clock_in_longitude_log = 0.0;
						}
						$danger = $this->Timesheetlog_model->check_danger_area($value_h->clock_in_latitude_log,$value_h->clock_in_longitude_log);
						$value_h->danger_area = $danger;
						$history[] = $value_h;
					}
				} else {
					$status = "Tidak Login";
					$first = [];
					$last = [];
					$history = [];
				}
				
				// get company
				$company = $this->Xin_model->read_company_info($r->company_id);
				if(!is_null($company)){
					$comp_name = $company[0]->name;
				} else {
					$comp_name = '--';	
				}	
				// attendance date
				$d_date = $this->Xin_model->set_date_format($attendance_date);
				//
				
				// if(!empty($attendance[0])){
				$view_opt = ' <span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view_details').'"><a href="javascript:void(0)" class="btn_detail_attendance" ><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light"><span class="fa fa-arrow-circle-right"></span></button></a></span>';		

				if(!empty($attendance->time_attendance_id)){
					$att_id = $attendance->time_attendance_id;
				}else{
					$att_id = "";
				}
				$full_data_att = $attendance;
				$data[] = array(
					$full_name,
					$r->employee_id,
					$r->contact_no,
					$comp_name,
					$d_date,
					$status,
					$first['clock_in_log'],
					$last['clock_in_log'],
					$history,
					$first,
					$last
				);
			}
      }
      ob_clean();
	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $employee->num_rows(),
			 "recordsFiltered" => $employee->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }

    public function get_notlogin(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_absen($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$man_name = $value->man_first_name.(!empty($value->man_last_name)? " ".$value->man_last_name : "");
			$data[] = ["karyawan" => $nama,"employee_id" => $value->employee_id,"contact_no" => $value->contact_no,"date" => $attendance_date,"status" => "Tidak Login","man_name" => $man_name,"reports_to" => $value->reports_to];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }
    public function get_notloginkoor(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_absenkoor($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$man_name = $value->man_first_name.(!empty($value->man_last_name)? " ".$value->man_last_name : "");
			$data[] = ["pic" =>  $man_name,"jum_notlog" => $value->jum];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }

    public function get_notloginsim(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_begda = $this->input->get("attendance_begda");
		$attendance_endda = $this->input->get("attendance_endda");

		$data_result = $this->Timesheetreport_model->get_absensim($attendance_begda, $attendance_endda);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$man_name = $value->man_first_name.(!empty($value->man_last_name)? " ".$value->man_last_name : "");
			$data[] = ["FingerPrintID" =>  $value->FingerPrintID, "DateLog" => $value->DateLog,
					   "TimeLog" => $value->TimeLog, "FunctionKey" => $value->FunctionKey, "Edited" => $value->Edited, "UserName" => $value->UserName, "FlagAbsence" => $value->FlagAbsence, "DateTime" => $value->DateTime, "EmployeeStatus" => $value->EmployeeStatus, "FunctionKeyEdited" => $value->FunctionKeyEdited];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }

    public function get_dangerarea_list(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_dangerarea($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$data[] = [$nama,$value->contact_no,$attendance_date,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }

    public function get_dalamkota_list(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_dalamkota($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$data[] = [$nama,$value->contact_no,$attendance_date,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }

    public function get_luarkota_list(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_luarkota($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$data[] = [$nama,$value->contact_no,$attendance_date,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }    

    public function get_luarkota_list2(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("attendance_date");

		$data_result = $this->Timesheetreport_model->get_luarkota($attendance_date);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$data[] = [$nama,$value->contact_no,$attendance_date,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }    

    public function get_history_list(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$attendance_date = $this->input->get("date");
		$employee_id = $this->input->get("employee_id");

		$data_result = $this->Timesheetreport_model->get_history($attendance_date,$employee_id);
		$data = [];
		foreach ($data_result as $key => $value) {
			$nama = $value->first_name.(!empty($value->last_name)? " ".$value->last_name : "");
			$detail = "<a href='".base_url()."admin/timesheetreport/history_pegawai?date=".$attendance_date."&employee_id=".$value->user_id."' target='_blank'>Detail</a>";
			$data[] = [$nama,$value->contact_no,$attendance_date,$detail];
		}
		$output = array(
		   "draw" => $draw,
			 "recordsTotal" => count($data),
			 "recordsFiltered" => count($data),
			 "data" => $data
		);
		echo json_encode($output);
    }
}