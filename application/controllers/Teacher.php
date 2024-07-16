<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Teacher_model
        $this->load->model('Dean_model', 'dean');
        $this->load->model('Teacher_model', 'teacher');

        if(!$this->session->userdata('teacher_id'))
        {
            redirect(site_url('login'));
        }
    }

    public function index()
	{
        $teacher_id = $this->session->userdata('teacher_id');

		$data['title'] = 'Dashboard';
        $data['teachers'] = $this->dean->get_teacher();
        $data['id'] = $teacher_id;
        $data['countAllStudent'] = $this->teacher->count_students_by_teacher($teacher_id);
        $data['course_count'] = $this->teacher->count_courses_by_teacher($teacher_id);
        $data['passed_count'] = $this->teacher->count_passed_students($teacher_id);
        $data['countFailedStudents'] = $this->teacher->count_failed_students($teacher_id);

		$this->load->view('pages/teacherDashboard', $data);

	}

	public function list()
	{
        $data['title'] = 'List of Students';
        $data['teachers'] = $this->dean->get_teacher();
        $data['courses'] = $this->dean->get_course();
        $data['students'] = $this->dean->get_student();

        $data['teacher_id'] = $this->session->userdata('teacher_id');

		$this->load->view('pages/teacherViewStudentList', $data);
	}

    public function viewStudents() {
        // Retrieve form data
        $yearLevel = $this->input->post('yearLevel');
        $section = $this->input->post('section');
        $semester = $this->input->post('semester');
        
        // Retrieve the teacher_id from the session
        $teacher_id = $this->session->userdata('teacher_id');
    
        // Validate and sanitize input if necessary
    
        // Query students based on the selected filters and the teacher_id
        $filtered_students = $this->teacher->filterStudents($yearLevel, $section, $semester, $teacher_id);
    
        // Prepare response data
        if ($filtered_students !== false && !empty($filtered_students)) {
            $data = array();
    
            foreach ($filtered_students as $student) {
                $row = array();
                $row['id'] = isset($student->id) ? $student->id : 'None';
                $row['student_id'] = isset($student->student_id) ? $student->student_id : 'None';
                $row['student_name'] = isset($student->student_fname) && isset($student->student_lname) ? $student->student_fname . ' ' . $student->student_lname : 'None';
                $row['year_level'] = isset($student->year_level) ? $student->year_level : 'None';
                $row['section'] = isset($student->section) ? $student->section : 'None';
                $row['semester'] = isset($student->semester) ? $student->semester : 'None';
                $row['first_semester'] = '<a href="#" class="add-grade" data-toggle="modal" data-target="#gradeModal" data-id="' . $row['student_id'] . '" data-name="' . $row['student_name'] . '" title="Add Grade"><i class="fa fa-plus fa-1x"></i> Add Grade</a>';
                $row['second_semester'] = '<a href="#" class="add-grade" data-toggle="modal" data-target="#gradeModal" data-id="' . $row['id'] . '" data-name="' . $row['student_name'] . '" title="Add Grade"><i class="fa fa-plus fa-1x"></i> Add Grade</a>';
    
                $data[] = $row;
            }
    
            $response = array(
                "draw" => intval($this->input->post("draw")),
                "recordsTotal" => count($filtered_students),
                "recordsFiltered" => count($filtered_students),
                "data" => $data
            );
        } else {
            $response = array(
                "draw" => intval($this->input->post("draw")),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => array()
            );
        }
    
        echo json_encode($response);
    }
    

    public function grade()
	{
        $data['title'] = 'List of Grades';

		$this->load->view('pages/teacherCompute', $data);
	}

    public function add_grade() {
        // Set validation rules
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('studentName', 'Student Name', 'required');
        $this->form_validation->set_rules('courseCode', 'Course Code', 'required');
        $this->form_validation->set_rules('cs', 'Class Standing', 'required|numeric');
        $this->form_validation->set_rules('prelim', 'Prelim', 'required|numeric');
        $this->form_validation->set_rules('midterm', 'Midterm', 'required|numeric');
        $this->form_validation->set_rules('finals', 'Finals', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $response = [
				'status' => 'error',
				'errors'=> validation_errors()
			];
        } else {
            $cs = $this->input->post('cs');
            $prelim = $this->input->post('prelim');
            $midterm = $this->input->post('midterm');
            $finals = $this->input->post('finals');

            // Calculate the final grade
            $final_grade = ($cs * 0.40) + ($prelim * 0.20) + ($midterm * 0.20) + ($finals * 0.20);
            // Validation passed, prepare data for insertion
            $data = array(
                'student_id' => $this->input->post('id'),
                'course_code' => $this->input->post('courseCode'),
                'cs' => $this->input->post('cs'),
                'prelim' => $this->input->post('prelim'),
                'midterm' => $this->input->post('midterm'),
                'finals' => $this->input->post('finals'),
                'final_grade' => $final_grade 
            );

            // Insert the teacher data
            if ($this->teacher->insert_grade($data)) {
                $response = [
                        'status' => 'success',
                        'message' => 'Grade added successfully',
                        'redirect' => site_url('teacherViewStudentList')
                ];
                } else {
                $response = [
                        'status' => 'error',
                        'errors' => 'Failed to add Course',
                ];
                }
        }

        echo json_encode($response);
    }

    public function listgrade()
	{
        $data['title'] = 'List of Grades';
        $data['courses'] = $this->dean->get_course();
        $data['students'] = $this->dean->get_student();

		$this->load->view('pages/teacherViewGradeList', $data);
	}
	
    public function viewGrades() {
        // Handle AJAX request from form submission
    
        // Retrieve form data
        $yearLevel = $this->input->post('yearLevel');
        $section = $this->input->post('section');
        $semester = $this->input->post('semester');
    
        // Validate and sanitize input if necessary
    
        // Query students based on the selected filters
        $filtered_students = $this->teacher->get_grades($yearLevel, $section, $semester);
    
        // Prepare response data
        if ($filtered_students !== false && !empty($filtered_students)) {
            $data = array();
    
            foreach ($filtered_students as $student) {
                $row = array();
                $row['id'] = isset($student->id) ? $student->id : 'None';
                $row['student_id'] = isset($student->student_id) ? $student->student_id : 'None';
                $row['student_name'] = isset($student->student_fname) && isset($student->student_lname) ? $student->student_fname . ' ' . $student->student_lname : 'None';
                $row['course_code'] = isset($student->course_code) ? $student->course_code : 'None';
                $row['cs'] = isset($student->cs) ? $student->cs : 'None';
                $row['prelim'] = isset($student->prelim) ? $student->prelim : 'None';
                $row['midterm'] = isset($student->midterm) ? $student->midterm : 'None';
                $row['finals'] = isset($student->finals) ? $student->finals : 'None';
                $row['final_grade'] = isset($student->final_grade) ? $student->final_grade : 'None';
            
                $data[] = $row;
            }
    
            
            $response = array(
                "draw" => intval($this->input->post("draw")),
                "recordsTotal" => count($filtered_students),
                "recordsFiltered" => count($filtered_students),
                "data" => $data
            );
        } else {
            $response = array(
                "draw" => intval($this->input->post("draw")),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => array()
            );
        }
    
        echo json_encode($response);
    }

    //report
    public function report(){
        $data['title'] = 'Report';
        $data['teachers'] = $this->dean->get_teacher();
        $data['courses'] = $this->dean->get_course();
        $data['students'] = $this->dean->get_student();


        $this->load->view('pages/deanReport', $data);
    }
   
}
