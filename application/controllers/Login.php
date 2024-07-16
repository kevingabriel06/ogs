<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if($this->session->userdata('id'))
  {
   redirect('loginst');
  }
  $this->load->model('Login_model', 'login');
 }

 function index()
 {
    $data['title'] = 'Login';

    $this->load->view('sLogin', $data);
 }

 function validation()
 {
  $this->form_validation->set_rules('student_id', 'Student ID', 'required');
  $this->form_validation->set_rules('password', 'Password', 'required');
  if($this->form_validation->run())
  {
   $result = $this->login->can_login($this->input->post('student_id'), $this->input->post('password'));
   if($result == '')
   {
    $response = [
        'status' => 'success',
        'message' => 'Login Successfully',
        'redirect' => site_url('studentDashboard'),
    ];
   }
   else
   {
    //$this->session->set_flashdata('message',$result);
    
    $response = [
        'status' => 'error',
        'errors' => 'Login Unsuccessful'
    ];
   }
  }
  else
  {
   $response = [
    'status' => 'error',
    'errors' => validation_errors(),
   ];
  }

  echo json_encode($response);
 }

 public function logouts()
 {
  $data = $this->session->all_userdata();
  foreach($data as $row => $rows_value)
  {
   $this->session->unset_userdata($row);
  }
  redirect(site_url('loginst'));
 }
}
