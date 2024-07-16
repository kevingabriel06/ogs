<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dean_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //teacher
    public function insert_teacher($data) {
        return $this->db->insert('teacher', $data);
    }
    
    public function update_teacher($id, $data) {
        $this->db->where('teacher_id', $id);
        return $this->db->update('teacher', $data);
    }

    public function delete_teacher($id) {
        
        // Check if the ID exists in the database
        $this->db->where('teacher_id', $id);
        $query = $this->db->get('teacher');

        if ($query->num_rows() > 0) {
            // ID exists, proceed with delete
            $this->db->where('teacher_id', $id);
            return $this->db->delete('teacher');
        } else {
            // ID does not exist
            return false;
        }
    }
    
    public function get_teacher() {
        $teacher = $this->db->get_where('teacher')->result();
        return $teacher;
    }

    //student
    public function insert_student($data) {
        return $this->db->insert('student', $data);
    }

    public function update_student($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('student', $data);
    }

    public function delete_student($id) {
        
        // Check if the ID exists in the database
        $this->db->where('id', $id);
        $query = $this->db->get('student');

        if ($query->num_rows() > 0) {
            // ID exists, proceed with delete
            $this->db->where('id', $id);
            return $this->db->delete('student');
        } else {
            // ID does not exist
            return false;
        }
    }

    public function get_student() {
        $student = $this->db->get_where('student')->result();
        return $student;
    }
    
    //course
    public function insert_course($data) {
        return $this->db->insert('course', $data);
    }

    public function update_course($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('course', $data);
    }

    public function get_course() {
        $this->db->select('course.*, teacher.teacher_name');
        $this->db->from('course');
        $this->db->join('teacher', 'course.teacher_id = teacher.teacher_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_course($id) {
        
        // Check if the ID exists in the database
        $this->db->where('id', $id);
        $query = $this->db->get('course');

        if ($query->num_rows() > 0) {
            // ID exists, proceed with delete
            $this->db->where('id', $id);
            return $this->db->delete('course');
        } else {
            // ID does not exist
            return false;
        }
    }

    public function checkScheduleConflict($teacher_id, $days, $startTime, $endTime)
    {
        $this->db->where('teacher_id', $teacher_id);
        $this->db->where('days', $days);
        $this->db->group_start();
        $this->db->where("('$startTime' BETWEEN start_time AND end_time)", null, false);
        $this->db->or_where("('$endTime' BETWEEN start_time AND end_time)", null, false);
        $this->db->or_where("start_time BETWEEN '$startTime' AND '$endTime'", null, false);
        $this->db->or_where("end_time BETWEEN '$startTime' AND '$endTime'", null, false);
        $this->db->group_end();
        $query = $this->db->get('course');
            
        return $query->num_rows() > 0;
    }

    //dashboard
    public function countFaculty()
    {
        // Replace with your query to count faculty members
        $query = $this->db->query('SELECT COUNT(*) AS faculty_count FROM teacher');
        return $query->row()->faculty_count;
    }

    public function countAllStudents()
    {
        // Replace with your query to count all students
        $query = $this->db->query('SELECT COUNT(*) AS student_count FROM student');
        return $query->row()->student_count;
    }

    public function countAllCourses()
    {
        // Replace with your query to count all courses
        $query = $this->db->query('SELECT COUNT(*) AS course_count FROM course');
        return $query->row()->course_count;
    }

    public function countPassedStudents()
    {
        // Replace with your query to count passed students (final grade >= 75)
        $query = $this->db->query('SELECT COUNT(*) AS passed_count FROM grade WHERE final_grade >= 75');
        return $query->row()->passed_count;
    }

    public function countFailedStudents()
    {
        // Replace with your query to count failed students (final grade < 75)
        $query = $this->db->query('SELECT COUNT(*) AS failed_count FROM grade WHERE final_grade < 75');
        return $query->row()->failed_count;
    }
}
