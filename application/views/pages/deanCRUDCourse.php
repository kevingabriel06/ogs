
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?> | Dean - OGS</title>
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
    <?php $this->load->view('includes/sidebar');?>

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
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Main Menu</a></li>
                                    <li class="active">Courses</li>
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
                                <strong class="card-title"><h2 align="center">Course</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div id="messages"></div>
                                        <form id="courseForm">
                                            <div class="row">
                                                <input type="hidden" id="" name="id"  class="form-control cc-exp">
                                                <div class="col-6">
                                                    <div class="form-group">
													<!-- Log on to codeastro.com for more projects! -->
                                                        <label for="cc-exp" class="control-label mb-1">Course Name</label>
                                                        <input id="" name="courseName" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Course Title">
                                                    </div>
                                                </div>
                                                <div class="col-6">
												<!-- Log on to codeastro.com for more projects! -->
                                                    <label for="x_card_code" class="control-label mb-1">Course Code</label>
                                                        <input id="" name="courseCode" type="text" class="form-control cc-exp" value="" placeholder="Course Code">
                                                        <!-- <input id="" maxlength="4" onkeypress="return isNumber(event)" name="courseId" type="text" class="form-control cc-cvc" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Course ID should start from 0001"> -->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
													<!-- Log on to codeastro.com for more projects! -->
                                                        <label for="cc-exp" class="control-label mb-1">Course Unit</label>
                                                        <input id="" name="courseUnit" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Course Unit">
                                                    </div>
                                                </div>
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
                                            </div>

                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Section</label>
                                                        <input id="" name="section" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Section">
                                                    </div>
                                                </div><!-- Log on to codeastro.com for more projects! -->
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
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="x_card_code" class="control-label mb-1">Teacher</label>
                                                        <select class="form-control" id="" name="teacher_id">
                                                            <option value="">Select Teacher</option>
                                                            <?php foreach ($teachers as $teacher): ?>
                                                                <option value="<?php echo $teacher->teacher_id;?>">
                                                                    <?php echo $teacher->teacher_name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>     
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Schedule Days</label>
                                                        <select id="days" name="days" class="form-control">
                                                            <option value="">Select Schedule Days</option>
                                                            <option value="M/W/F">M/W/F</option>
                                                            <option value="T/TH">T/TH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="startTime" class="control-label mb-1">Start Time</label>
                                                        <input type="time" id="startTime" name="startTime" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="endTime" class="control-label mb-1">End Time</label>
                                                        <input type="time" id="endTime" name="endTime" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                                <button type="submit" name="submit" class="btn btn-success">Save Course</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- Log on to codeastro.com for more projects! -->
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
                
                <script>
                    $(document).ready(function(){
                        $('#courseForm').on('submit', function(e){
                        e.preventDefault();

                        var formData = new FormData(this);
                        $.ajax({
                            url: '<?php echo site_url("dean/addCourse"); ?>',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response){
                                if (response.status == 'error'){
                                $('#messages').html('<div class="alert alert-danger">' + response.errors + '</div>');
                                }
                                else if (response.status == 'success'){
                                    $('#messages').html('<div class="alert alert-success">' + response.message+ '</div>');
                                    setTimeout(function(){
                                        window.location.href = response.redirect;
                                        },1000);
                                }
                            }, 
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText); // Log the full error response
                                // Display a generic error message to the user
                                $('#messages').html('<div class="alert alert-danger">An unexpected error occurred. Please try again later.</div>');
                            }
                        });
                    });
                });

                $('body').on('click', '.edit_course', function() {
                    var course = $('#courseForm');
                    course.get(0).reset();
                    course.find("[name='id']").val($(this).data('id'));
                    course.find("[name='courseName']").val($(this).data('name'));
                    course.find("[name='courseCode']").val($(this).data('code'));
                    course.find("[name='courseUnit']").val($(this).data('unit'));
                    course.find("[name='yearLevel']").val($(this).data('yearlevel'));
                    course.find("[name='section']").val($(this).data('section'));
                    course.find("[name='semester']").val($(this).data('semester'));
                    course.find("[name='teacher_id']").val($(this).data('teacher'));
                    course.find("[name='startTime']").val($(this).data('start'));
                    course.find("[name='endTime']").val($(this).data('end'));
                    course.find("[name='days']").val($(this).data('days'));
                });

                function confirmDelete(url) {
                    if (confirm("Are you sure you want to remove?")) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            dataType: 'json', // Ensure the response is treated as JSON
                            success: function(response) {
                                if (response.status === 'error') {
                                    $('#messages').html('<div class="alert alert-danger">' + response.errors + '</div>');
                                } else if (response.status === 'success') {
                                    $('#messages').html('<div class="alert alert-success">' + response.message + '</div>');
                                    setTimeout(function() {
                                        window.location.href = response.redirect;
                                    }, 1000);
                                }
                            },
                            error: function(xhr, status, error) {
                                $('#messages').html('<div class="alert alert-danger">An error occurred: ' + error + '</div>');
                            }
                        });
                    }
                }
                </script>

                <br><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">All Courses</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr><!-- Log on to codeastro.com for more projects! -->
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                            <th>Semester</th>
                                            <th>Faculty</th>
                                            <th>Schedule Time</th>
                                            <th>Schedule Day</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($courses as $course): ?>
                                        <tr>
                                        <td><?php echo $course->id;?></td>
                                        <td><?php echo $course->course_name; ?></td>
                                        <td><?php echo $course->course_code; ?></td>
                                        <td><?php echo $course->course_unit;?></td>
                                        <td><?php echo $course->year_level;?></td>
                                        <td><?php echo $course->section;?></td>
                                        <td><?php echo $course->semester;?></td>
                                        <td><?php echo $course->teacher_name ;?></td>
                                        <td><?php echo $course->start_time. ' - '. $course->end_time;?></td>
                                        <td><?php echo $course->days;?></td>
                                        <td><a class="edit_course" data-id="<?php echo $course->id; ?>" data-name="<?php echo $course->course_name; ?>" data-code="<?php echo $course->course_code; ?>" data-unit="<?php echo $course->course_unit; ?>" data-yearlevel="<?php echo $course->year_level; ?>"  data-section="<?php echo $course->section; ?>" data-semester="<?php echo $course->semester; ?>" data-start="<?php echo $course->start_time; ?>" data-end="<?php echo $course->end_time; ?>" data-days="<?php echo $course->days; ?>" data-teacher="<?php echo $course->teacher_id; ?>" title="Edit Details"><i class="fa fa-edit fa-1x"></i></a>
                                        <a onclick="confirmDelete('<?php echo site_url('deanCourse/remove/'.$course->id) ?>')" title="Delete Course"><i class="fa fa-trash fa-1x"></i></a></td>
                                        </tr>
                                        <?php endforeach; ?>                                 
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

<!-- Log on to codeastro.com for more projects! -->
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
