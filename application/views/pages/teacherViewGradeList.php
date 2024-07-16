
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?> | Teacher - OGS</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Left Panel -->
    <?php $this->load->view('includes/sidebar2');?>


   <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php $this->load->view('includes/topbar');?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
							<!-- Log on to codeastro.com for more projects! -->
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Grades</a></li>
                                    <li class="active">List of Grades</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
							<!-- Log on to codeastro.com for more projects! -->
                                <strong class="card-title"><h3 align="center">Select Student to View Grade</h3></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div id="messages"></div>
                                        <form id="selectForm" action="">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="yearLevel" class="control-label mb-1">Year Level</label>
                                                    <select id="yearLevel" name="yearLevel" class="form-control">
                                                        <option value="">Select Year Level</option>
                                                        <option value="1">First Year</option>
                                                        <option value="2">Second Year</option>
                                                        <option value="3">Third Year</option>
                                                        <option value="4">Fourth Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">
                                                <!-- Log on to codeastro.com for more projects! -->
                                                <label for="section" class="control-label mb-1">Section</label>
                                                <select id="section" name="section" class="form-control">
                                                    <option value="">Select Section</option>
                                                    <?php foreach ($courses as $course): ?>
                                                        <?php if ($course->teacher_id == $this->session->userdata('teacher_id')): ?>
                                                            <option value="<?php echo $course->section; ?>"><?php echo $course->section; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="semester" class="control-label mb-1">Semester</label>
                                                    <select id="semester" name="semester" class="form-control">
                                                        <option value="">Select Semester</option>
                                                        <option value="1">First Semester</option>
                                                        <option value="2">Second Semeter</option>
                                                        <option value="3">Trimester</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div>
                                                <!-- Log on to codeastro.com for more projects! -->
                                                <!-- <button type="submit" name="submit" class="btn btn-success">View Student</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->

                    <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gradeModalLabel">Grade</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="messages2"></div>
                                    <form id="gradeForm">
                                        <div class="row">
                                            <input type="" id="id" name="id" class="form-control cc-exp">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="courseName" class="control-label mb-1">Name</label>
                                                    <input id="courseName" name="studentName" type="text" class="form-control cc-exp" placeholder="Course Title">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="courseCode" class="control-label mb-1">Course Code</label>
                                                <select id="courseCode" name="courseCode" class="form-control cc-exp">
                                                    <option value="">Select Course</option>
                                                    <?php foreach ($courses as $course): ?>
                                                        <?php if ($course->teacher_id == $this->session->userdata('teacher_id')): ?>
                                                            <option value="<?php echo $course->course_code; ?>"><?php echo $course->course_code; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="cs" class="control-label mb-1">Class Standing</label>
                                                    <input id="cs" name="cs" type="text" class="form-control cc-exp" placeholder="Class Standing">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="prelim" class="control-label mb-1">Prelim</label>
                                                    <input id="prelim" name="prelim" type="text" class="form-control cc-exp" placeholder="Prelim">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="midterm" class="control-label mb-1">Midterm</label>
                                                    <input id="midterm" name="midterm" type="text" class="form-control cc-exp" placeholder="Midterm">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="finals" class="control-label mb-1">Finals</label>
                                                    <input id="finals" name="finals" type="text" class="form-control cc-exp" placeholder="Finals">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" name="submit" class="btn btn-success">Save Grade</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <script>
                        $(document).ready(function() {
                            // Initialize DataTable
                            var dataTable;

                            function initializeDataTable() {
                                if ($.fn.DataTable.isDataTable('#bootstrap-data-table')) {
                                    $('#bootstrap-data-table').DataTable().destroy();
                                }

                                dataTable = $('#bootstrap-data-table').DataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax": {
                                        "url": "<?php echo site_url('teacher/viewGrades'); ?>",
                                        "type": "POST",
                                        "data": function(data) {
                                            data.yearLevel = $('#yearLevel').val();
                                            data.section = $('#section').val();
                                            data.semester = $('#semester').val();
                                        },
                                        "error": function(xhr, error, code) {
                                            console.log(xhr.responseText); // Log the full error response
                                            alert('An error occurred while fetching data. Please try again later.');
                                        }
                                    },
                                    "columns": [
                                        { "data": "id" },
                                        { "data": "student_id" },
                                        { "data": "student_name" },
                                        { "data": "course_code" },
                                        { "data": "cs" },
                                        { "data": "prelim" },
                                        { "data": "midterm" },
                                        { "data": "finals" },
                                        { "data": "final_grade" }
                                    ]
                                });
                            }

                            // Initialize DataTable on document ready
                            initializeDataTable();

                            // Reload DataTable on form input change
                            $('#selectForm').on('change', 'select', function() {
                                dataTable.ajax.reload();
                            });

                            // Prevent form submission on Enter key press
                            $('#selectForm').on('keypress', function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    return false;
                                }
                            });
                        });
                </script>

                <br><br>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3 align="center">List of Grade</h3></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                     <thead>
                                        <tr><!-- Log on to codeastro.com for more projects! -->
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Course Code</th>
                                            <th>Class Standing</th>
                                            <th>Prelim</th>
                                            <th>Midterm</th>
                                            <th>Finals</th>
                                            <th>Final Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- end of datatable -->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

        <?php $this->load->view('includes/footbar');?>


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
                $('#left-panel').slideToggle(); 
                } else {
                $('#left-panel').toggleClass('open-menu');  
                } 
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');  
            } 
                
            }); 

      
  </script>

</body>
</html>
