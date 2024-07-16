<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    // Method to check user login status and redirect if logged in
    private function check_login_redirect()
    {
        if ($this->session->userdata('teacher_id')) {
            $role = $this->session->userdata('role');
            if ($role == 1) {
                redirect(site_url('deanDashboard'));
            } elseif ($role == 2) {
                redirect(site_url('teacherDashboard'));
            }
        }
    }

    public function index()
    {
        $this->check_login_redirect();  // Redirect if teacher is already logged in
        $data['title'] = 'Login';
        $this->load->view('atLogin', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('staff_id', 'Staff ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $result = $this->auth->can_login($this->input->post('staff_id'), $this->input->post('password'));

            if ($result === true) {
                // Retrieve the role after login success
                $role = $this->session->userdata('role');
                if ($role == 1) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Login Successfully',
                        'redirect' => site_url('deanDashboard'),
                    ];
                } elseif ($role == 2) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Login Successfully',
                        'redirect' => site_url('teacherDashboard'),
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'errors' => 'Failed to Log In', // Use the actual error message from can_login
                    ];
                }
            } else {
                $response = [
                    'status' => 'error',
                    'errors' => 'Failed to Log In', // Use the actual error message from can_login
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'errors' => validation_errors(),
            ];
        }

        echo json_encode($response);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
?>
