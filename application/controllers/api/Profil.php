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
class Profil extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		
        $this->load->helper('language');
        $this->load->model("Company_model");
        $this->load->model("Employees_model");
        $this->load->model("Xin_model");
        $this->load->model("Department_model");
        $this->load->model("Designation_model");
        $this->load->model("Roles_model");
        $this->load->model("Location_model");
        $this->load->model("Timesheet_model");
        $this->load->model("Awards_model");
        $this->load->model("Travel_model");
        $this->load->model("Tickets_model");
        $this->load->model("Transfers_model");
        $this->load->model("Promotion_model");
        $this->load->model("Complaints_model");
        $this->load->model("Warning_model");
        $this->load->model("Project_model");
        $this->load->model("Payroll_model");
        $this->load->model("Training_model");
        $this->load->model("Trainers_model");

        $this->lang->load('hrsale','indonesian');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

     
    public function update_profil_post() {

        $contact_no = $this->Xin_model->clean_date_post($this->input->post('contact_no'));
        $address = $this->Xin_model->clean_date_post($this->input->post('address'));
        
        $data = array(
        'contact_no' => $contact_no,
        'address' => $address
        );

        $id = $this->input->post('user_id');
        $result = $this->Employees_model->basic_info($data,$id);
        
        if ($result == TRUE) {
            
            $result = $this->Employees_model->read_employee_information($id);
            
            $this->response([
                'status' => TRUE,
                'data' => $result,
                'message' => 'Success Update'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Failed Update'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }

    }

    public function change_password_post() {
        
        $error = false;

        /* Server side PHP input validation */                      
        if(trim($this->input->post('old_password'))==='') {
             $Return['error'] = $this->lang->line('xin_old_password_error_field');
             $error = true;
        } 
        else if($this->Employees_model->check_old_password($this->input->post('old_password'),$this->input->post('user_id'))!= 1) {
             $message = $this->lang->line('xin_old_password_does_not_match');
             $error = true;
        } else if(trim($this->input->post('new_password'))==='') {
             $message = $this->lang->line('xin_employee_error_newpassword');
             $error = true;
        } else if(strlen($this->input->post('new_password')) < 6) {
            $message = $this->lang->line('xin_employee_error_password_least');
            $error = true;
        } else if(trim($this->input->post('new_password_confirm'))==='') {
            $message = $this->lang->line('xin_employee_error_new_cpassword');
            $error = true;
        } else if($this->input->post('new_password')!=$this->input->post('new_password_confirm')) {
            $message = $this->lang->line('xin_employee_error_old_new_cpassword');
            $error = true;
        }
        

        $options = array('cost' => 12);
        $password_hash = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT, $options);
    
        $data = array(
        'password' => $password_hash
        );
        
        if(!$error){
            $id = $this->input->post('user_id');
            $result = $this->Employees_model->change_password($data,$id);
        }
        
        if ($result == TRUE) {            
            $this->response([
                'status' => TRUE,
                'message' => $this->lang->line('xin_employee_password_update')
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

        } else {
            $this->response([
                'status' => FALSE,
                'message' => $message
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

}
