<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_courses_with_grades_by_semester($semester, $user_id)
    {
        $this->db->select('course.semester, course.course_code, grade.cs, grade.prelim, grade.midterm, grade.finals, grade.final_grade');
        $this->db->from('course');
        $this->db->join('grade', 'course.course_code = grade.course_code');
        $this->db->join('student', 'student.student_id = grade.student_id');
        $this->db->where('course.semester', $semester);
        $this->db->where('student.id', $user_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_student() {
        $student = $this->db->get_where('student')->result();
        return $student;
    }

    public function countAllCourses()
    {
        $user_id = $this->session->userdata('id');

        $this->db->select('COUNT(*) as course_count');
        $this->db->from('course c');
        $this->db->join('student s', 'c.section = s.section');
        $this->db->where('s.id', $user_id); // Match student's ID with userdata ID
        $query = $this->db->get();
        return $query->row()->course_count;
    }

    public function countPassedStudents()
    {
        $user_id = $this->session->userdata('id');

        $this->db->select('COUNT(*) as passed_count');
        $this->db->from('student s');
        $this->db->join('grade g', 's.student_id = g.student_id');
        $this->db->where('g.final_grade >=', 75); // Assuming 75 is the passing grade
        $this->db->where('s.id', $user_id); // Add condition to match session user ID
        $query = $this->db->get();
        return $query->row()->passed_count;
    }

    public function countFailedStudents()
    {
        // Assuming 'id' refers to the user ID in session userdata
        $user_id = $this->session->userdata('id');

        $this->db->select('COUNT(*) as failed_count');
        $this->db->from('student s');
        $this->db->join('grade g', 's.student_id = g.student_id');
        $this->db->where('g.final_grade <', 75); // Assuming 75 is the passing grade
        $this->db->where('s.id', $user_id); // Add condition to match session user ID
        $query = $this->db->get();
        return $query->row()->failed_count;
    }
}
