<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// dean
$route['deanDashboard'] = 'dean/index';

$route['deanTeacher'] = 'dean/teacher';
$route['dean/addTeacher']['POST'] = 'dean/add_teacher';
$route['deanTeacher/remove/(:num)'] = 'dean/delete_teacher/$1';

$route['deanStudent'] ='dean/student';
$route['dean/addStudent']['POST'] = 'dean/add_student';
$route['deanStudent/remove/(:num)'] = 'dean/delete_student/$1';

$route['deanCourse'] = 'dean/course';
$route['dean/addCourse']['POST'] = 'dean/add_course';
$route['deanCourse/remove/(:num)'] = 'dean/delete_course/$1';


//teacher
$route['teacherDashboard'] = 'teacher/index';

$route['teacherViewStudentList'] = 'teacher/list';
$route['teacher/viewStudent'] = 'teacher/viewStudents';
$route['teacher/addGrade']['POST'] = 'teacher/add_grade';

$route['teacherViewGradeList'] = 'teacher/listgrade';
$route['teacher/viewGrades'] = 'teacher/viewGrades';
$route['teacherGrade'] = 'teacher/grade';

//student
$route['studentDashboard'] = 'student/index';
$route['student/viewGrades'] = 'student/grades';
$route['studentViewGradeList'] = 'student/viewgrades';

//report
$route['report'] = 'teacher/report';

//auth
$route['login'] = 'auth/index';
$route['login/validation'] = 'auth/validation';
$route['logout'] = 'auth/logout';

$route['loginst'] = 'login/index';
$route['loginstudent/validation'] = 'login/validation';
