
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
            <?php $this->load->view('includes/topbar')?>
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
                                    <li class="active">Student</li>
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
                                <strong class="card-title"><h2 align="center">Student</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div id="messages"></div>
                                        <form id="studentForm" action="">
                                            <div class="row">
                                                <input type="hidden" id="" name="id"  class="form-control cc-exp">
                                                <div class="col-6">
                                                    <div class="form-group">
													<!-- Log on to codeastro.com for more projects! -->
                                                        <label for="cc-exp" class="control-label mb-1">Firstname</label>
                                                        <input id="" name="firstname" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Firstname">
                                                    </div>
                                                </div>
                                                <div class="col-6">
												<!-- Log on to codeastro.com for more projects! -->
                                                    <label for="x_card_code" class="control-label mb-1">Lastname</label>
                                                        <input id="" name="lastname" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Lastname">
                                                        </div>
                                                    </div>
                                                    <div>

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
                                                            <option value="<?php echo $course->section; ?>">
                                                                <?php echo $course->section; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Student No</label>
                                                    <input id="" name="studentId" type="text" class="form-control cc-exp" value=""  placeholder="Student Number">
                                                </div>
                                            </div>
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
                                         
											 <!-- Log on to codeastro.com for more projects! -->
                                             <p><small><i>Note: By default student's password is set to "<b>12345</b>"</i></small></p>
                                                <button type="submit" name="submit" class="btn btn-success">Save Student</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
                    <script>
                    $(document).ready(function(){
                        $('#studentForm').on('submit', function(e){
                        e.preventDefault();

                        var formData = new FormData(this);
                        $.ajax({
                            url: '<?php echo site_url("dean/addStudent"); ?>',
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

                $('body').on('click', '.edit_student', function() {
                    var student = $('#studentForm');
                    student.get(0).reset();
                    student.find("[name='id']").val($(this).data('id'));
                    student.find("[name='studentId']").val($(this).data('student_id'));
                    student.find("[name='firstname']").val($(this).data('fname'));
                    student.find("[name='lastname']").val($(this).data('lname'));
                    student.find("[name='yearLevel']").val($(this).data('yearlevel'));
                    student.find("[name='section']").val($(this).data('section'));
                    student.find("[name='semester']").val($(this).data('semester'));
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
                                <strong class="card-title"><h2 align="center">All Student</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<!-- Log on to codeastro.com for more projects! -->
                                            <th>FullName</th>
                                            <th>Student No.</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                            <th>Semester</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($students as $student): ?>
                                        <tr>
                                        <td><?php echo $student->id ;?></td>
                                        <td><?php echo $student->student_id ;?></td>
                                        <td><?php echo $student->student_fname.' '.$student->student_lname ;?></td>
                                        <td><?php echo $student->year_level ;?></td>
                                        <td><?php echo $student->section ;?></td>
                                        <td><?php echo $student->semester ;?></td>
                                        <!-- Log on to codeastro.com for more projects! -->
                                        <td>
                                            <a class="edit_student" data-id="<?php echo $student->id; ?>" data-student_id="<?php echo $student->student_id; ?>" data-fname="<?php echo $student->student_fname; ?>" data-lname="<?php echo $student->student_lname; ?>" data-yearlevel="<?php echo $student->year_level; ?>"  data-section="<?php echo $student->section; ?>" data-semester="<?php echo $student->semester; ?>"><i class="fa fa-edit fa-1x"></i></a>
                                            <a onclick="confirmDelete('<?php echo site_url('deanStudent/remove/'.$student->id) ?>')" title="Delete Student Details"><i class="fa fa-trash fa-1x"></i></a></td>
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
