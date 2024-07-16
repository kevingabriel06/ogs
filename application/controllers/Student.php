<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
        $this->load->model('Student_model', 'student');


		if(!$this->session->userdata('id'))
        {
            redirect(site_url('loginst'));
        }
    }

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['students'] = $this->student->get_student();
        $data['id'] = $this->session->userdata('id');
        $data['countAllCourses'] = $this->student->countAllCourses();
        $data['countAllPassedStudents'] = $this->student->countPassedStudents();
        $data['countAllFailedStudents'] = $this->student->countFailedStudents();

		$this->load->view('pages/studentDashboard', $data);
	}

    public function viewgrades()
	{
        $data['title'] = 'List of Grades';
        $data['courses'] = [];  // Initialize an empty courses array
        $this->load->view('pages/studentViewGradeList', $data);
	}

    public function grades() {
        $semester = $this->input->post('semester');

        $user_id = $this->session->userdata('id'); 

        if ($semester) {
            $courses = $this->student->get_courses_with_grades_by_semester($semester, $user_id);
        } else {
            $courses = [];
        }

        echo json_encode(['courses' => $courses]);
    }
}
