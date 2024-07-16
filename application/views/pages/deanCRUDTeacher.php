
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
    <?php $this->load->view('includes/sidebar')?>

   <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php $this->load->view('includes/topbar') ?>
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
                                    <li class="active">Teacher</li>
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
                                <strong class="card-title"><h2 align="center">Teacher</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div id="messages"></div>
                                        <form id="teacherForm">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" id="" name="id"  class="form-control cc-exp">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Teacher Name</label>
                                                        <input id="" name="Name"  class="form-control cc-exp" value="" placeholder="Teacher Name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Email Address</label>
                                                        <input id="" name="teacherEmail"  class="form-control cc-exp" value="" placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Phone Number</label>
                                                        <input id="" name="teacherPhone"  class="form-control cc-exp" value="" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Staff ID</label>
                                                        <input id="" name="staffId"  class="form-control cc-exp" value="" placeholder="Staff ID">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p><small><i>Note: By default teacher's password is set to "<b>12345</b>"</i></small></p>
												<!-- Log on to codeastro.com for more projects! -->
                                                <button type="submit" class="btn btn-success">Save Teacher</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->

                    <script>
                    $(document).ready(function(){
                        $('#teacherForm').on('submit', function(e){
                        e.preventDefault();

                        var formData = new FormData(this);
                        $.ajax({
                            url: '<?php echo site_url("dean/addTeacher"); ?>',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response){
                                if (response.status == 'error'){
                                $('#messages').html('<div class="alert alert-danger">' + response.errors+ '</div>');
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

                $('body').on('click', '.edit_teacher', function() {
                    var room = $('#teacherForm');
                    room.get(0).reset();
                    room.find("[name='id']").val($(this).data('id'));
                    room.find("[name='Name']").val($(this).data('name'));
                    room.find("[name='teacherEmail']").val($(this).data('email'));
                    room.find("[name='teacherPhone']").val($(this).data('phone'));
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
                                <strong class="card-title"><h2 align="center">All Teacher</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
											<!-- Log on to codeastro.com for more projects! -->
                                            <th>#</th>
                                            <th>Staff ID</th>
                                            <th>Teacher</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>                                          
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($teachers as $teacher): ?>
                                        <tr>
                                        <td><?php echo $teacher->teacher_id;?></td>
                                        <td><?php echo $teacher->staff_id;?></td>
                                        <td><?php  echo $teacher->teacher_name;?></td>
                                        <td><?php  echo $teacher->teacher_email;?></td>
                                        <td><?php  echo $teacher->teacher_phone;?></td>
                                        <td>
                                            <a class="edit_teacher" data-id="<?php echo $teacher->teacher_id; ?>" data-name="<?php echo $teacher->teacher_name; ?>" data-email="<?php echo $teacher->teacher_email; ?>"  data-phone="<?php echo $teacher->teacher_phone; ?>" ><i class="fa fa-edit fa-1x"></i></a>
                                            <a onclick="confirmDelete('<?php echo site_url('deanTeacher/remove/'.$teacher->teacher_id) ?>')" title="Delete Faculty Details"><i class="fa fa-trash fa-1x"></i></a>
                                        </td>
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
