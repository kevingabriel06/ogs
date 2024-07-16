<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //grade
    public function getDistinctSections() {
        // Example function to fetch distinct sections from the database
        $this->db->select('DISTINCT section');
        $query = $this->db->get('courses');
        return $query->result();
    }

    public function filterStudents($yearLevel, $section, $semester, $teacher_id) {
        $this->db->select('student.*, course.course_code, teacher.teacher_id');
        $this->db->from('student');
        $this->db->join('course', 'student.section = course.section');
        $this->db->join('teacher', 'course.teacher_id = teacher.teacher_id');
        $this->db->where('student.year_level', $yearLevel);
        $this->db->where('student.section', $section);
        $this->db->where('student.semester', $semester);
        $this->db->where('teacher.teacher_id', $teacher_id);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    

    public function get_grades($yearLevel, $section, $semester) {
        // Build the query
        $this->db->select('
            student.id, 
            student.student_id, 
            student.student_fname, 
            student.student_lname, 
            course.course_code, 
            grade.cs, 
            grade.prelim, 
            grade.midterm, 
            grade.finals, 
            grade.final_grade
        ');
        $this->db->from('student');
        $this->db->join('course', 'student.section = course.section');
        $this->db->join('grade', 'student.student_id = grade.student_id');

        // Apply filters if provided
        if ($yearLevel !== " ") {
            $this->db->where('student.year_level', $yearLevel);
        }
        if ($section !== " ") {
            $this->db->where('student.section', $section);
        }
        if ($semester !== " ") {
            $this->db->where('student.semester', $semester);
        }

        // Execute the query and get the result
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_grade($data) {
        return $this->db->insert('grade', $data);
    }

     //dashboard
     public function count_students_by_teacher($teacher_id) {
        // Query to count students under a specific teacher
        $this->db->select('COUNT(DISTINCT student.student_id) as student_count');
        $this->db->from('student');
        $this->db->join('course', 'student.section = course.section');
        $this->db->join('teacher', 'course.teacher_id = teacher.teacher_id');
        $this->db->where('teacher.teacher_id', $teacher_id);
        $query = $this->db->get();
        return $query->row()->student_count;
    }

    public function count_courses_by_teacher($teacher_id)
    {
        $this->db->select('COUNT(*) as course_count');
        $this->db->from('course');
        $this->db->where('teacher_id', $teacher_id);
        $query = $this->db->get();
        return $query->row()->course_count;
    }

    public function count_passed_students($teacher_id)
    {
        $this->db->select('COUNT(*) as passed_count');
        $this->db->from('grade g');
        $this->db->join('course c', 'g.course_code = c.course_code');
        $this->db->where('c.teacher_id', $teacher_id);
        $this->db->where('g.final_grade >=', 75);
        $query = $this->db->get();
        return $query->row()->passed_count;
    }

    public function count_failed_students($teacher_id)
    {
        $this->db->select('COUNT(*) as failed_count');
        $this->db->from('grade g');
        $this->db->join('course c', 'g.course_code = c.course_code');
        $this->db->where('c.teacher_id', $teacher_id);
        $this->db->where('g.final_grade <', 75);
        $query = $this->db->get();
        return $query->row()->failed_count;
    }
}
