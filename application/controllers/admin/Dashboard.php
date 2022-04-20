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

class Dashboard extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          //load the models
          $this->load->model('Login_model');
		  $this->load->model('Designation_model');
		  $this->load->model('Department_model');
		  $this->load->model('Employees_model');
		  $this->load->model('Xin_model');
		  $this->load->model('Exin_model');
		  $this->load->model('Expense_model');
		  $this->load->model('Timesheet_model');
		  $this->load->model('Travel_model');
		  $this->load->model('Training_model');
		  $this->load->model('Project_model');
		  $this->load->model('Job_post_model');
		  $this->load->model('Goal_tracking_model');
		  $this->load->model('Events_model');
		  $this->load->model('Jadwals_model');
		  $this->load->model('Meetings_model');
		  $this->load->model('Announcement_model');
		   $this->load->model('Clients_model');
		   $this->load->model("Recruitment_model");
     }
	
	/*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	} 
	
	public function index()
	{
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$system = $this->Xin_model->read_setting_info(1);
		if($system[0]->module_projects_tasks=='true'){
			// get user > added by
			$user = $this->Xin_model->read_user_info($session['user_id']);
			// get designation
			$designation = $this->Designation_model->read_designation_information($user[0]->designation_id);
			if(!is_null($designation)){
				$des_emp = $designation[0]->designation_name;
			} else {
				$des_emp = '--';
			}
			// get designation
			$department = $this->Department_model->read_department_information($user[0]->department_id);
			if(!is_null($department)){
				$dep_emp = $department[0]->department_name;
			} else {
				$dep_emp = '--';
			}
			$data = array(
			'title' => $this->lang->line('dashboard_title').' | '.$this->Xin_model->site_title(),
			'path_url' => 'dashboard',
			'first_name' => $user[0]->first_name,
			'last_name' => $user[0]->last_name,
			'employee_id' => $user[0]->employee_id,
			'username' => $user[0]->username,
			'email' => $user[0]->email,
			'designation_name' => $des_emp,
			'department_name' => $dep_emp,
			'date_of_birth' => $user[0]->date_of_birth,
			'date_of_joining' => $user[0]->date_of_joining,
			'contact_no' => $user[0]->contact_no,
			'last_four_employees' => $this->Xin_model->last_four_employees(),
			'get_last_payment_history' => $this->Xin_model->get_last_payment_history(),
			'all_holidays' => $this->Timesheet_model->get_holidays_calendar(),
			'all_leaves_request_calendar' => $this->Timesheet_model->get_leaves_request_calendar(),
			'all_upcoming_birthday' => $this->Xin_model->employees_upcoming_birthday(),
			'all_travel_request' => $this->Travel_model->get_travel(),
			'all_training' => $this->Training_model->get_training(),
			'all_projects' => $this->Project_model->get_projects(),
			'all_tasks' => $this->Timesheet_model->get_tasks(),
			'all_goals' => $this->Goal_tracking_model->get_goal_tracking(),
			'all_events' => $this->Events_model->get_events(),
			'all_jadwals' => $this->Jadwals_model->get_jadwals(),
			'all_meetings' => $this->Meetings_model->get_meetings(),
			'all_jobsx' => $this->Job_post_model->five_latest_jobs(),
			'all_jobs' => $this->Recruitment_model->get_all_jobs_last_desc()
			);
			$data['subview'] = $this->load->view('admin/dashboard/index', $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		} else {
		// get user > added by
		$user = $this->Xin_model->read_user_info($session['user_id']);
		// get designation
		$designation = $this->Designation_model->read_designation_information($user[0]->designation_id);
		// get designation
		$department = $this->Department_model->read_department_information($user[0]->department_id);
		$data = array(
			'title' => $this->Xin_model->site_title(),
			'path_url' => 'dashboard',
			'first_name' => $user[0]->first_name,
			'last_name' => $user[0]->last_name,
			'employee_id' => $user[0]->employee_id,
			'username' => $user[0]->username,
			'email' => $user[0]->email,
			'designation_name' => $designation[0]->designation_name,
			'department_name' => $department[0]->department_name,
			'date_of_birth' => $user[0]->date_of_birth,
			'date_of_joining' => $user[0]->date_of_joining,
			'contact_no' => $user[0]->contact_no,
			'last_four_employees' => $this->Xin_model->last_four_employees(),
			'get_last_payment_history' => $this->Xin_model->get_last_payment_history(),
			'all_holidays' => $this->Timesheet_model->get_holidays_calendar(),
			'all_leaves_request_calendar' => $this->Timesheet_model->get_leaves_request_calendar(),
			'all_upcoming_birthday' => $this->Xin_model->employees_upcoming_birthday(),
			'all_travel_request' => $this->Travel_model->get_travel(),
			'all_training' => $this->Training_model->get_training(),
			'all_projects' => $this->Project_model->get_projects(),
			'all_tasks' => $this->Timesheet_model->get_tasks(),
			'all_goals' => $this->Goal_tracking_model->get_goal_tracking(),
			'all_events' => $this->Events_model->get_events(),
			'all_jadwals' => $this->Jadwals_model->get_jadwals(),
			'all_meetings' => $this->Meetings_model->get_meetings(),
			'all_jobsx' => $this->Job_post_model->all_jobs(),
			'all_jobs' => $this->Recruitment_model->get_all_jobs_last_desc()
			);
			$data['subview'] = $this->load->view('admin/dashboard/index', $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
			
		}
	}
	
	// working status > employee > chart
	public function employee_working_status()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('absent'=>'', 'working'=>'','absent_label'=>'', 'working_label'=>'');
		
		$current_month = date('Y-m-d');
		
		$query = $this->Xin_model->all_employees_status();
		$total = $query->num_rows();
		
		$working = $this->Xin_model->current_month_day_attendance($current_month);
		
		// get actual data
		$employee_w = $working / $total * 100;
		// absent
		$abs = $total - $working;
		//$employee_ab = $abs / $total * 100;
		$Return['absent'] = $abs;
		$Return['absent_label'] = $this->lang->line('xin_absent');
		// working
		$Return['working_label'] = $this->lang->line('xin_emp_working');
		$Return['working'] = $working;
		$this->output($Return);
		exit;
	}
	// leave status > employee > chart
	public function employee_leave_status()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('accepted'=>'', 'accepted_count'=>'','pending'=>'', 'pending_count'=>'','rejected'=>'', 'rejected_count'=>'');
		
		//accepted
		$Return['accepted'] = $this->lang->line('xin_approved');
		$Return['accepted_count'] = accepted_leave_request();
		// pending
		$Return['pending'] = $this->lang->line('xin_pending');
		$Return['pending_count'] = pending_leave_request();
		// rejected
		$Return['rejected'] = $this->lang->line('xin_rejected');
		$Return['rejected_count'] = rejected_leave_request();
		$this->output($Return);
		exit;
	}
	
	// get department > employee > chart
	public function employee_department()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		foreach($this->Department_model->all_departments() as $department) {
		
			$condition = "department_id =" . "'" . $department->department_id . "'";
			$this->db->select('*');
			$this->db->from('xin_employees');
			$this->db->where($condition);
			//$this->db->group_by('location_id');
			$query = $this->db->get();
			$checke  = $query->result();
			// check if department available
			if ($query->num_rows() > 0) {
				$row = $query->num_rows();
				$d_rows [] = $row;	
				$c_name[] = htmlspecialchars_decode($department->department_name);
		
				$someArray[] = array(
				  'label'   => htmlspecialchars_decode($department->department_name),
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get designation > employee > chart
	public function employee_designation()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		foreach($this->Designation_model->all_designations() as $designation) {
		
			$condition = "designation_id =" . "'" . $designation->designation_id . "'";
			$this->db->select('*');
			$this->db->from('xin_employees');
			$this->db->where($condition);
			//$this->db->group_by('location_id');
			$query = $this->db->get();
			$checke  = $query->result();
			// check if department available
			if ($query->num_rows() > 0) {
				$row = $query->num_rows();
				$d_rows [] = $row;	
				$c_name[] = htmlspecialchars_decode($designation->designation_name);
				$someArray[] = array(
				  'label'   => htmlspecialchars_decode($designation->designation_name),
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $row;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get location > employee > chart
	public function employee_location()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_locations() as $location) {
		
			$condition = "location_id =" . "'" . $location->location_id . "'";
			$this->db->select('*');
			$this->db->from('xin_employees');
			$this->db->where($condition);
			$query = $this->db->get();
			$checke  = $query->result();
			// check if department available
			if ($query->num_rows() > 0) {
				$row = $query->num_rows();
				$d_rows [] = $row;	
				$c_name[] = htmlspecialchars_decode($location->location_name);
		
				$someArray[] = array(
				  'label'   => htmlspecialchars_decode($location->location_name),
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get company > employee > chart
	public function employee_company()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#975df3','#001f3f','#39cccc','#3c8dbc','#006400','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_companies_dash() as $ecompany) {
		
			$condition = "company_id =" . "'" . $ecompany->company_id . "'";
			$this->db->select('*');
			$this->db->from('xin_employees');
			$this->db->where($condition);
			$query = $this->db->get();
			$checke  = $query->result();
			// check if department available
			if ($query->num_rows() > 0) {
				$row = $query->num_rows();
				$d_rows [] = $row;	
				$c_name[] = htmlspecialchars_decode($ecompany->name);
		
				$someArray[] = array(
				  'label'   => htmlspecialchars_decode($ecompany->name),
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get project status
	public function projects_status()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#666EE8','#9793d7','#c6619e','#d3733b','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		$projects = get_projects_status();
		foreach($projects->result() as $eproject) {
				//$d_rows = array();	
				$row = total_projects_status($eproject->status);
				$d_rows [] = $row;
				if($eproject->status==0){
					$csname = htmlspecialchars_decode($this->lang->line('xin_not_started'));
				} else if($eproject->status==1){
					$csname = htmlspecialchars_decode($this->lang->line('xin_in_progress'));
				} else if($eproject->status==2){
					$csname = htmlspecialchars_decode($this->lang->line('xin_completed'));
				} else if($eproject->status==3){
					$csname = htmlspecialchars_decode($this->lang->line('xin_project_cancelled'));
				} else if($eproject->status==4){
					$csname = htmlspecialchars_decode($this->lang->line('xin_project_hold'));
				}				
				$c_name [] = $csname;
				$someArray[] = array(
				  'label'   => $csname,
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			//}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	// get project status
	public function tasks_status()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#3c8dbc','#006400','#dd4b39','#a98852','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');
		$someArray = array();
		$j=0;
		$tasks = get_tasks_status();
		foreach($tasks->result() as $etask) {
				//$d_rows = array();	
				$row = total_tasks_status($etask->task_status);
				$d_rows [] = $row;
				if($etask->task_status==0){
					$csname = htmlspecialchars_decode($this->lang->line('xin_not_started'));
				} else if($etask->task_status==1){
					$csname = htmlspecialchars_decode($this->lang->line('xin_in_progress'));
				} else if($etask->task_status==2){
					$csname = htmlspecialchars_decode($this->lang->line('xin_completed'));
				} else if($etask->task_status==3){
					$csname = htmlspecialchars_decode($this->lang->line('xin_project_cancelled'));
				} else if($etask->task_status==4){
					$csname = htmlspecialchars_decode($this->lang->line('xin_project_hold'));
				}				
				$c_name [] = $csname;
				$someArray[] = array(
				  'label'   => $csname,
				  'value' => $row,
				  'bgcolor' => $c_color[$j]
				  );
				  $j++;
			//}
		}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	// get attendance_status
	public function attendance_status()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'd_rows'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();
		$current_month = date('Y-m-d');
		$working = $this->Xin_model->current_month_day_attendance($current_month);
		$query = $this->Xin_model->all_employees_status();
		$total = $query->num_rows();
		// absent
		$abs = $total - $working;	
		
		$c_color = array('#666EE8','#9793d7');
		$someArray = array();
		$j=0;
		//$att_data = array('working_label'=>$this->lang->line('xin_emp_working'), 'att_total'=>$working,'absent_label'=>$this->lang->line('xin_emp_working'),'att_total'=>$abs);
	//	$projects = get_projects_status();
		//foreach($att_data as $attendance) {
				//$d_rows = array();	
				///$row[] = $working;
				$row = 345;
				
				
				//$csname[] = $this->lang->line('xin_emp_working');
				//$csname[] = $this->lang->line('xin_absent');
				$csname = 'asdasd';	
				$d_rows [] = 123;			
				//$c_name [] = 'test';
				$someArray[] = array(
				  'label'   => $csname,
				  'value' => $row,
				  'bgcolor' => $c_color
				  );
				  $j++;
			//}
		//}
		$Return['c_name'] = $c_name;
		$Return['d_rows'] = $d_rows;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	// get total employees head count
	public function employees_head_count()
	{
		/* Define return | here result is used to return user data and error for error message */
		$date = date('Y');
  	     $query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-01%'");
		$row1 = $query->num_rows();
		$Return['january'] = $row1;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-02%'");
		$row2 = $query->num_rows();
		$Return['february'] = $row2;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-03%'");
		$row3 = $query->num_rows();
		$Return['march'] = $row3;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-04%'");
		$row4 = $query->num_rows();
		$Return['april'] = $row4;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-05%'");
		$row5 = $query->num_rows();
		$Return['may'] = $row5;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-06%'");
		$row6 = $query->num_rows();
		$Return['june'] = $row6;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-07%'");
		$row7 = $query->num_rows();
		$Return['july'] = $row7;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-08%'");
		$row8 = $query->num_rows();
		$Return['august'] = $row8;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-09%'");
		$row9 = $query->num_rows();
		$Return['september'] = $row9;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-10%'");
		$row10 = $query->num_rows();
		$Return['october'] = $row10;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-11%'");
		$row11 = $query->num_rows();
		$Return['november'] = $row11;
		
		$query = $this->db->query("SELECT * from xin_employees WHERE created_at like '%".$date."-12%'");
		$row12 = $query->num_rows();
		$Return['december'] = $row12;
		
		$Return['current_year'] = date('Y');
		$this->output($Return);
		exit;
	}
	// get department wise salary
	public function payroll_department_wise()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#3e70c9','#f59345','#f44236','#8A2BE2','#D2691E','#6495ED','#DC143C','#006400','#556B2F','#9932CC');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_departments_chart() as $department) {
		$department_pay = $this->Xin_model->get_department_make_payment($department->department_id);
		$c_name[] = htmlspecialchars_decode($department->department_name);
		$c_am[] = $department_pay[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($department->department_name),
		  'value' => $department_pay[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// get designation wise salary
	public function payroll_designation_wise()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('chart_data'=>'', 'c_name'=>'', 'c_am'=>'','c_color'=>'');
		$c_name = array();
		$c_am = array();	
		$c_color = array('#1AAF5D','#F2C500','#F45B00','#8E0000','#0E948C','#6495ED','#DC143C','#006400','#556B2F','#9932CC');
		$someArray = array();
		$j=0;
		foreach($this->Xin_model->all_designations_chart() as $designation) {
		$result = $this->Xin_model->get_designation_make_payment($designation->designation_id);
		$c_name[] = htmlspecialchars_decode($designation->designation_name);
		$c_am[] = $result[0]->paidAmount;
		$someArray[] = array(
		  'label'   => htmlspecialchars_decode($designation->designation_name),
		  'value' => $result[0]->paidAmount,
		  'bgcolor' => $c_color[$j]
		  );
		  $j++;
		}
		$Return['c_name'] = $c_name;
		$Return['c_am'] = $c_am;
		$Return['chart_data'] = $someArray;
		$this->output($Return);
		exit;
	}
	
	// set new language
	public function set_language($language = "") {
        
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
        
    }
}
