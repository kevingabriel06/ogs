<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dean extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
        //Load the Teacher_model
        $this->load->model('Dean_model', 'dean');

		if(!$this->session->userdata('teacher_id'))
        {
            redirect(site_url('login'));
        }
    }


	public function index()
	{
		// Fetch data from session
		$teacher_id = $this->session->userdata('teacher_id');

		// Fetch data from model
		$teachers = $this->dean->get_teacher(); // Assuming this fetches all teachers
		$countFaculty = $this->dean->countFaculty();
		$countAllStudent = $this->dean->countAllStudents();
		$countAllCourses = $this->dean->countAllCourses();
		$countAllPassedStudents = $this->dean->countPassedStudents();
		$countAllFailedStudents = $this->dean->countFailedStudents();

		// Prepare data to pass to view
		$data = array(
			'title' => 'Dashboard',
			'teachers' => $teachers,
			'id' => $teacher_id,
			'countFaculty' => $countFaculty,
			'countAllStudent' => $countAllStudent,
			'countAllCourses' => $countAllCourses,
			'countAllPassedStudents' => $countAllPassedStudents,
			'countAllFailedStudents' => $countAllFailedStudents,
		);

		// Load the view with data
		$this->load->view('pages/deanDashboard', $data);

	}

	//teacher
	public function teacher(){
		$data['title'] = 'Teacher';
		$data['teachers'] = $this->dean->get_teacher();

		$this->load->view('pages/deanCRUDTeacher', $data);
	}

	public function add_teacher() {
        // Set validation rules
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('teacherEmail', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('teacherPhone', 'Phone Number', 'required');
		$this->form_validation->set_rules('staffId', 'Staff Id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = [
				'status' => 'error',
				'errors'=> validation_errors()
			];
        } else {
            // Validation passed, prepare data for insertion
            $data = array(
                'teacher_name' => $this->input->post('Name'),
                'teacher_email' => $this->input->post('teacherEmail'),
                'teacher_phone' => $this->input->post('teacherPhone'),
				'staff_id' => $this->input->post('staffId'),
				'role' => 2,
				'password' => password_hash('12345', PASSWORD_BCRYPT) // Default password
            );

			 
			$id = $this->input->post('id');

			if ($id) {
				// Update existing category
				if ($this->dean->update_teacher($id, $data)) {
					$response = [
						'status' => 'success',
						'message' => 'Teacher Updated Successfully',
						'redirect' => site_url('deanTeacher')
					];
				} else {
					$response = [
						'status' => 'error',
						'errors' => 'Failed to Update Teacher'
					];
				}
			}else{
				// Insert the teacher data
				if ($this->dean->insert_teacher($data)) {
					$response = [
						 'status' => 'success',
						 'message' => 'Teacher added successfully',
						 'redirect' => site_url('deanTeacher')
					];
				 } else {
					$response = [
						 'status' => 'error',
						 'errors' => 'Failed to add teacher',
					];
				 }
			}
            
			echo json_encode($response);
        }
    }

	public function delete_teacher($id) {
        
        // Attempt to delete the room type from the database
        if ($this->dean->delete_teacher($id)) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted Sucessfully',
                'redirect' => site_url('deanTeacher')
            );
        }else {
            $response = array(
                'status' => 'error',
                'errors' => 'Failed to Delete Teacher',
            );
        }
        
        echo json_encode($response);
    }


	// student
	public function student(){
		$data['title'] = 'Student';
		$data['students'] = $this->dean->get_student();
		$data['courses'] = $this->dean->get_course();


		$this->load->view('pages/deanCRUDStudent', $data);
	}

	public function add_student() {
        // Set validation rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('yearLevel', 'Year Level', 'required');
		$this->form_validation->set_rules('studentId', 'Student Number', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = [
				'status' => 'error',
				'errors'=> validation_errors()
			];
        } else {
            // Validation passed, prepare data for insertion
            $data = array(
                'student_fname' => $this->input->post('firstname'),
				'student_lname' => $this->input->post('lastname'),
				'year_level' => $this->input->post('yearLevel'),
				'section' => $this->input->post('section'),
				'student_id' => $this->input->post('studentId'),
				'semester' => $this->input->post('semester'),
				'password' => password_hash('12345', PASSWORD_BCRYPT) // Default password
            );

			 
			$id = $this->input->post('id');

			if ($id) {
				// Update existing category
				if ($this->dean->update_student($id, $data)) {
					$response = [
						'status' => 'success',
						'message' => 'Student Updated Successfully',
						'redirect' => site_url('deanStudent')
					];
				} else {
					$response = [
						'status' => 'error',
						'errors' => 'Failed to Update Student'
					];
				}
			}else{
				// Insert the teacher data
				if ($this->dean->insert_student($data)) {
					$response = [
						 'status' => 'success',
						 'message' => 'Student added successfully',
						 'redirect' => site_url('deanStudent')
					];
				 } else {
					$response = [
						 'status' => 'error',
						 'errors' => 'Failed to add teacher',
					];
				 }
			}
            
			echo json_encode($response);
        }
    }
	
	public function delete_student($id) {
        
        // Attempt to delete the room type from the database
        if ($this->dean->delete_student($id)) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted Sucessfully',
                'redirect' => site_url('deanStudent')
            );
        }else {
            $response = array(
                'status' => 'error',
                'errors' => 'Failed to Delete Student',
            );
        }
        
        echo json_encode($response);
    }

	public function course(){
		$data['title'] = 'Course';
		$data['teachers'] = $this->dean->get_teacher();
		$data['courses'] = $this->dean->get_course();

		$this->load->view('pages/deanCRUDCourse', $data);
	}

	public function add_course() {
        // Set validation rules
		$this->form_validation->set_rules('courseName', 'Course Name', 'required');
        $this->form_validation->set_rules('courseCode', 'Course Code', 'required');
        $this->form_validation->set_rules('courseUnit', 'Course Unit', 'required|numeric');
        $this->form_validation->set_rules('yearLevel', 'Year Level', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('teacher_id', 'Teacher', 'required');
        $this->form_validation->set_rules('days', 'Schedule Days', 'required');
        $this->form_validation->set_rules('startTime', 'Start Time', 'required');
        $this->form_validation->set_rules('endTime', 'End Time', 'required');

		$teacher_id = $this->input->post('teacher_id');
		$days = $this->input->post('days');
		$startTime = $this->input->post('startTime');
		$endTime = $this->input->post('endTime');

		if ($this->dean->checkScheduleConflict($teacher_id, $days, $startTime, $endTime)) {
			$response = [
				'status' => 'error',
				'errors' => 'The selected schedule conflicts with an existing schedule for this teacher.'
			];
			echo json_encode($response);
			return;
		}

        if ($this->form_validation->run() == FALSE) {
            $response = [
				'status' => 'error',
				'errors'=> validation_errors()
			];
        } else {
            // Validation passed, prepare data for insertion
            $data = array(
				'course_name' => $this->input->post('courseName'),
                'course_code' => $this->input->post('courseCode'),
                'course_unit' => $this->input->post('courseUnit'),
                'year_level' => $this->input->post('yearLevel'),
                'section' => $this->input->post('section'),
                'semester' => $this->input->post('semester'),
                'teacher_id' => $this->input->post('teacher_id'),
                'days' => $this->input->post('days'),
                'start_time' => $this->input->post('startTime'),
                'end_time' => $this->input->post('endTime')
            );

			 
			$id = $this->input->post('id');

			if ($id) {
				// Update existing category
				if ($this->dean->update_course($id, $data)) {
					$response = [
						'status' => 'success',
						'message' => 'Course Updated Successfully',
						'redirect' => site_url('deanCourse')
					];
				} else {
					$response = [
						'status' => 'error',
						'errors' => 'Failed to Update Course'
					];
				}
			}else{
				// Insert the teacher data
				if ($this->dean->insert_course($data)) {
					$response = [
						 'status' => 'success',
						 'message' => 'Course added successfully',
						 'redirect' => site_url('deanCourse')
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
    }
	
	public function delete_course($id) {
        
        // Attempt to delete the room type from the database
        if ($this->dean->delete_course($id)) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted Sucessfully',
                'redirect' => site_url('deanCourse')
            );
        }else {
            $response = array(
                'status' => 'error',
                'errors' => 'Failed to Delete Student',
            );
        }
        
        echo json_encode($response);
    }
}
