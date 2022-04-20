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
class Auth extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		
        $this->load->model('Login_model');
        $this->load->model('Employees_model');
        $this->load->model('Users_model');
        $this->load->library('email');
        $this->load->model("Xin_model");
        $this->load->model("Designation_model");
        $this->load->model("Department_model");
        $this->load->model("Location_model");

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

     
    public function login_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('iusername', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ipassword', 'Password', 'trim|required|xss_clean');
        //$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
        
        /*if ($this->form_validation->run() == FALSE)
        {
                //$this->load->view('myform');
        }*/
        $username = $this->post('username');
        $password = $this->post('password');
        /* Define return | here result is used to return user data and error for error message */
        // var_dump($username);die;
        /* Server side PHP input validation */
        if($username==='') {
            $Return['error'] = $this->lang->line('xin_employee_error_username');
        } elseif($password===''){
            $Return['error'] = $this->lang->line('xin_employee_error_password');
        }
        if($Return['error']!=''){
            $this->output($Return);
        }
        
        $data = array(
            'username' => $username,
            'password' => $password
            );
        $result = $this->Login_model->login($data); 
        
        if ($result == TRUE) {
            
                $result = $this->Login_model->read_user_auth_information($username);

                // update last login info
                $ipaddress = $this->input->ip_address();
                  
                 $last_data = array(
                    'last_login_date' => date('d-m-Y H:i:s'),
                    'last_login_ip' => $ipaddress,
                    'is_logged_in' => '1'
                ); 
                
                $id = $result[0]->user_id; // user id
                  
                $this->Xin_model->login_update_record($last_data, $id);
                
                //check PIC Or NOT
                $check_pic = $this->Employees_model->get_my_team_employees($id);

                // $base_user_info = $this->Login_model->read_user_information($username);
                // var_dump($base_user_info[0]->user_role_id);die;
                if(!empty($check_pic->num_rows())){
                    $result[0]->is_pic = '1';
                }else{
                    $result[0]->is_pic = '0';
                }

                if($result[0]->user_role_id == '3'){
                    $result[0]->is_pic = '1';
                }

                $this->response([
                    'status' => TRUE,
                    'data' => $result,
                    'message' => 'login success'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
    }

}
