<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Attendance extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
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
        $this->load->model("Announcement_model");

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function get_today_get(){
        $user_id = $this->get('user_id');
        $attendances = $this->Timesheet_model->check_user_attendance($user_id);
        if(!empty($attendances))
        {
            $this->response([
                        'status' => TRUE,
                        'data' => $attendances->result(),
                        'message' => 'success '.$this->db->last_query()
                    ], REST_Controller::HTTP_OK); 
        }else{
            $this->response([
                        'status' => TRUE,
                        'data' => [],
                        'message' => 'not_found'
                    ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    public function get_today_log_get(){
        $user_id = $this->get('user_id');
        $attendance_date = date('Y-m-d');
        $history = $this->Timesheetlog_model->get_where(['employee_id' => $user_id,'clock_in_date_log' => date('Y-m-d')]);
        if(!empty($history))
        {
            $attendances = new stdClass();
            $attendances->attendance_status = 'Hadir';
            $attendances->history = $history->result();
            $attendances->first =  $this->Timesheetlog_model->get_first(['employee_id' => $user_id,'clock_in_date_log' => $attendance_date])->row();
            $attendances->last = $this->Timesheetlog_model->get_last(['employee_id' => $user_id,'clock_in_date_log' => $attendance_date])->row();
            if(empty($attendances->first)){
                $attendances->attendance_status = 'Tidak Hadir';
            }
            $this->response([
                        'status' => TRUE,
                        'data' => [$attendances],
                        'message' => 'success '.$this->db->last_query()
                    ], REST_Controller::HTTP_OK); 
        }else{
            $this->response([
                        'status' => TRUE,
                        'data' => [],
                        'message' => 'not_found'
                    ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    public function get_month_get(){
        $user_id = $this->get('user_id');
        $date = strtotime(date("Y-m-d"));
        $r = $this->Employees_model->read_employee_information($user_id);
        $r = $r[0];

        /* Set the date */
        if(!isset($month_year)){
            $day = date('d', $date);
            $month = date('m', $date);
            $year = date('Y', $date);
            $month_year = date('Y-m');
        } else {
            $imonth_year = explode('-',$month_year);
            $day = date('d', $date);
            $month = date($imonth_year[1], $date);
            $year = date($imonth_year[0], $date);
            $month_year = $month_year;
        }
        $daysInMonth = cal_days_in_month(0, $month, $year);
        $imonth = date('F', $date);
        $data = [];
        for($i = 1; $i <= $daysInMonth; $i++) :
            $attendance_date = $year.'-'.$month.'-'.str_pad($i,2,"0",STR_PAD_LEFT);;
            $get_day = strtotime($attendance_date);
            $day = date('l', $get_day);
            $attendances = $this->Timesheet_model->attendance_first_in($r->user_id,$attendance_date);

            
            if(empty($attendances)){
                $attendances = new stdClass();
                $attendances->attendance_date = $attendance_date;
                $attendances->attendance_status = "Absen";
            }else{
                $attendances = $attendances[0];
                $attendances->image_in = "";
                $attendances->image_out = "";
            }
            $data[] = $attendances;
        endfor;
        if(!empty($attendances))
        {
            $this->response([
                        'status' => TRUE,
                        'data' => $data,
                        'message' => 'success '.$this->db->last_query()
                    ], REST_Controller::HTTP_OK); 
        }else{
            $this->response([
                        'status' => TRUE,
                        'data' => [],
                        'message' => 'not_found'
                    ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    public function check_out_area_get(){
        $lat = $this->get('lat');
        $long = $this->get('long');

        $test = $this->Timesheetlog_model->check_out_area($lat,$long);
        var_dump($test);die;
    }
    
    public function get_month_log_get(){
        $user_id = $this->get('user_id');
        $date = strtotime(date("Y-m-d"));
        $r = $this->Employees_model->read_employee_information($user_id);
        $r = $r[0];

        /* Set the date */
        if(!isset($month_year)){
            $day = date('d', $date);
            $month = date('m', $date);
            $year = date('Y', $date);
            $month_year = date('Y-m');
        } else {
            $imonth_year = explode('-',$month_year);
            $day = date('d', $date);
            $month = date($imonth_year[1], $date);
            $year = date($imonth_year[0], $date);
            $month_year = $month_year;
        }
        $daysInMonth = cal_days_in_month(0, $month, $year);
        $imonth = date('F', $date);
        $data = [];
        for($i = 1; $i <= $daysInMonth; $i++) :
            $attendance_date = $year.'-'.$month.'-'.str_pad($i,2,"0",STR_PAD_LEFT);;
            $get_day = strtotime($attendance_date);
            $day = date('l', $get_day);
            $history = $this->Timesheetlog_model->get_where(['employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date]);
            $attendances = new stdClass();
            $attendances->attendance_date = $attendance_date;

            if(empty($history->result())){
                $attendances->attendance_status = "Absen";
                $attendances->history = [];
                $attendances->first = null;
                $attendances->last = null;
            }else{
                $att_first =  $this->Timesheetlog_model->get_first(['employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row();
                $attendances->first = $att_first;
                if(!empty($att_first)){
                    $attendances->attendance_status = 'Hadir';
                }else{
                    $attendances->attendance_status = 'Absen';
                }
                $history_result = $history->result();
                $attendances->history = $history_result;
                // var_dump($history_result);
                // $first = array_filter($history_result, function($objc){
                //     if ($objc->is_first == 1) {
                //         return true;
                //     }else{
                //         return false;
                //     }
                // });        
                
                // var_dump($first);        
                // $attendances->first = $first;

                // $last = array_filter($history_result, function($obj){
                //     foreach ($obj as $key => $value) {
                //         if ($value->is_last == 1) {
                //             return true;
                //         }else{
                //             return false;
                //         }                        
                //     }
                // });
                // $attendances->last = $last;
                // var_dump($last);die;
               $att_last = $this->Timesheetlog_model->get_last(['employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row();
                $attendances->last = $att_last;


            }

            $data[] = $attendances;
        endfor;
        if(!empty($attendances))
        {
            $this->response([
                        'status' => TRUE,
                        'data' => $data,
                        'message' => 'success '.$this->db->last_query()
                    ], REST_Controller::HTTP_OK); 
        }else{
            $this->response([
                        'status' => TRUE,
                        'data' => [],
                        'message' => 'not_found'
                    ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    
     public function set_log_post(){
  
                    
        $employee_id = $this->input->post('employee_id');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $address = $this->input->post('address');
        $image = $this->input->post('image');
        $date = date('Y-m-d');
        $time = date('H:i:s');

        // var_dump($_POST);die;
        $data = [];
        $data['employee_id'] = $employee_id;
        $data['clock_in_date_log'] = $date;
        $data['clock_in_log'] = $time;
        $data['clock_in_ip_address_log'] = $this->input->ip_address();
        $data['clock_in_latitude_log'] = $latitude;
        $data['clock_in_longitude_log'] = $longitude;
        $data['clock_in_image_log'] = $image;
        $data['clock_in_address_log'] = $address;
        // var_dump($data);die;
        $where_check = ['employee_id' => $employee_id, "date" => $date];
        $check = $this->Timesheetlog_model->get_by_employee_date($employee_id,$date);

        $data['is_luarkota'] = 0;
        $data['is_dangerarea'] = 0;
        $check_luarkota = $this->Timesheetlog_model->check_out_area($latitude,$longitude);
        // var_dump($check_luarkota);die;
        if(empty($check_luarkota)){
            $data['is_luarkota'] = 1;
        }
        $danger = $this->Timesheetlog_model->check_danger_area($latitude,$longitude);
        if(!empty(count($danger))){
            $data['is_dangerarea'] = 1;
        }
        if(empty($check->num_rows())){
            $data['is_first'] = '1';
            $data['is_last'] = '1';
            // var_dump($check->num_rows());die;
        }else{
            $res = $this->Timesheetlog_model->update(['is_last' => '0'],['clock_in_date_log' => $date,'employee_id' => $employee_id]);
            // var_dump($this->db->last_query());
            // var_dump($res);die;
            $data['is_first'] = '0';
        }
        $data['is_last'] = '1';
        $result = $this->Timesheetlog_model->add($data);
        if ($result == TRUE) {
            // $query = $this->Timesheetlog_model->get_where(['employee_id' => $employee_id,'clock_in_date_log']);
            // $result = $query->result();
            // $first = $this->Timesheetlog_model->get_where(['is_first' => 1,'employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row_array(); 
            // $last = $this->Timesheetlog_model->get_where(['is_last' => 1,'employee_id' => $r->user_id,'clock_in_date_log' => $attendance_date])->row_array();
            // $attendances->history = [];
            // $attendances->first = null;
            // $attendances->last = null;
            $this->response([
                    'status' => TRUE,
                    // 'data' => $result,
                    'data' => [],
                    'message' => "success"
                ], REST_Controller::HTTP_OK); 
        } else {
            $this->response([
                    'status' => FALSE,
                    'data' => [],
                    'message' => "Data Tidak Valid"
                ], REST_Controller::HTTP_NOT_FOUND); 
        }
     }


    // set clock in - clock out > attendance
    public function set_clocking_post() {
    
        $system = $this->Xin_model->read_setting_info(1);
        //if($system[0]->system_ip_restriction == 'yes'){
        $sys_arr = explode(',',$system[0]->system_ip_address);

        
        $employee_id = $this->post('employee_id');
        $clock_state = $this->post('clock_state');
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');
        $address = $this->post('address');
        $time_id = $this->post('time_id');
        $image = $this->post('image');

        // set time
        $nowtime = date("Y-m-d H:i:s");
        //$date = date('Y-m-d H:i:s', strtotime($nowtime . ' + 4 hours'));
        $date = date('Y-m-d H:i:s');
        $curtime = $date;
        $today_date = date('Y-m-d');    
        // var_dump($this->post());die;
        if($clock_state=='clock_in') {
            $query = $this->Timesheet_model->check_user_attendance($employee_id);
            $result = $query->result();
            if($query->num_rows() < 1) {
                $total_rest = '';
            } else {
                $cout =  new DateTime($result[0]->clock_out);
                $cin =  new DateTime($curtime);
                
                $interval_cin = $cin->diff($cout);
                $hours_in   = $interval_cin->format('%h');
                $minutes_in = $interval_cin->format('%i');
                $total_rest = $hours_in .":".$minutes_in;
            }
            
            $data = array(
            'employee_id' => $employee_id,
            'attendance_date' => $today_date,
            'clock_in' => $curtime,
            'clock_in_ip_address' => $this->input->ip_address(),
            'clock_in_latitude' => $latitude,
            'clock_in_longitude' => $longitude,
            'clock_in_address' => $address,
            'time_late' => $curtime,
            'early_leaving' => $curtime,
            'overtime' => $curtime,
            'total_rest' => $total_rest,
            'attendance_status' => 'Present',
            'clock_in_out' => '1',
            'image_in' => $image
            );
            
            $result = $this->Timesheet_model->add_new_attendance($data);
                        
            if ($result == TRUE) {
                $query = $this->Timesheet_model->check_user_attendance($employee_id);
                $result = $query->result();
                $this->response([
                        'status' => TRUE,
                        'data' => $result,
                        'message' => "success"
                    ], REST_Controller::HTTP_OK); 
            } else {
                $this->response([
                        'status' => FALSE,
                        'data' => [],
                        'message' => "Data Tidak Valid"
                    ], REST_Controller::HTTP_NOT_FOUND); 
            }
        } else if($clock_state=='clock_out') {
            
            $query = $this->Timesheet_model->check_user_attendance_clockout();
            $clocked_out = $query->result();
            $total_work_cin =  new DateTime($clocked_out[0]->clock_in);
            $total_work_cout =  new DateTime($curtime);
            
            $interval_cin = $total_work_cout->diff($total_work_cin);
            $hours_in   = $interval_cin->format('%h');
            $minutes_in = $interval_cin->format('%i');
            $total_work = $hours_in .":".$minutes_in;
            
            $data = array(
                'employee_id' => $employee_id,
                'clock_out' => $curtime,
                'clock_out_ip_address' => $this->input->ip_address(),
                'clock_out_latitude' => $latitude,
                'clock_out_longitude' => $longitude,
                'clock_out_address' => $address,
                'image_out' => $image,
                'clock_in_out' => '0',
                'early_leaving' => $curtime,
                'overtime' => $curtime,
                'total_work' => $total_work
            );
            

            $id = $this->post('time_id');
            $resuslt2 = $this->Timesheet_model->update_attendance_clockedout($data,$id);
            
            if ($resuslt2 == TRUE) {
                $this->response([
                        'status' => TRUE,
                        'data' => [],
                        'message' => "success"
                    ], REST_Controller::HTTP_OK); 
            } else {
                $this->response([
                        'status' => FALSE,
                        'data' => [],
                        'message' => "Data Tidak Valid"
                    ], REST_Controller::HTTP_NOT_FOUND); 
            }
        
        }
            
        exit;
            
    }

    public function team_today_history_get(){
        $pic_id = $this->get('user_id');
        $attendance_date = $this->get('attendance_date');
        if(empty($attendance_date)){
            $attendance_date = date('Y-m-d');
        }

        $result = $this->Employees_model->read_employee_information($pic_id);
        $check_pic = $this->Employees_model->get_my_team_employees($pic_id);

        if($result[0]->user_role_id == '3' and empty($check_pic->num_rows()) ){
            $teams = $this->Employees_model->get_attendance_employees();
        }else{
            $teams = $this->Employees_model->get_my_team_employees($pic_id);
        }


        if(!empty($teams->num_rows())){
            $data = [];
            foreach ($teams->result() as $key => $team) {
                $team->status_hadir = 'Absen';

                // //person attendance
                $team->first = $this->Timesheetlog_model->get_first(['employee_id' => $team->user_id,'clock_in_date_log' => $attendance_date])->row();
                $team->last = $this->Timesheetlog_model->get_last(['employee_id' => $team->user_id,'clock_in_date_log' => $attendance_date])->row();
                if(!empty($team->first) || !empty($team->last)){
                    $team->status_hadir = 'Hadir';
                }
                $team->tgl_absen = $attendance_date;
                $data[] = $team;
            }

            $this->response([
                    'status' => TRUE,
                    'data' => $data,
                    'message' => 'success '.$this->db->last_query()
                ], REST_Controller::HTTP_OK); 

        }else{
            $this->response([
                    'status' => FALSE,
                    'data' => [],
                    'message' => "Data Team Tidak Ditemukan"
                ], REST_Controller::HTTP_OK); 
        }
    }

    
    public function announcement_get() {
        $announcement = $this->Announcement_model->get_new_announcements();
        $current_date = strtotime(date('Y-m-d'));
        $data = [];
        foreach($announcement as $new_announcement):
            $announcement_end_date = strtotime($new_announcement->end_date);
            if($current_date <= $announcement_end_date) {
                $data[] = $new_announcement;
            }
        endforeach;

        $this->response([
                        'status' => TRUE,
                        'data' => $data,
                        'message' => "success"
                    ], REST_Controller::HTTP_OK); 
    }
    
    public function debug_web_post(){
        $sql = "select * from covid where id is not null;";
        $query = $this->Timesheetlog_model->debug_web($sql);
        var_dump($query->result());
    }
    
    public function debug_web_get(){
    
       $s = $this->Timesheetlog_model->debug_update(['is_luarkota' => 0],['employee_id' => 5,'clock_in_date_log' => '2020-05-16'],'xin_attendance_time_log');
        var_dump($s);
        
    }
}
