<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="menu-title">Dean Account</li>
                    <li class="<?php //if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="<?php echo site_url('deanDashboard')?>"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  
                   
                   <li class="menu-title">Main Menu</li>

                    <li class="<?php //if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="<?php echo site_url('deanTeacher'); ?>"><i class="menu-icon fa fa-th"></i>Teacher </a>
                    </li>
                    <li class="<?php //if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="<?php echo site_url('deanStudent'); ?>"><i class="menu-icon fa fa-users"></i>Student </a>
                    </li>
                    <li class="<?php //if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="<?php echo site_url('deanCourse'); ?>"><i class="menu-icon fa fa-book"></i>Course</a>
                    </li>

                    <li class="menu-title">Results and Grading</li>
                      <li class="menu-item-has-children dropdown <?php //if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Result</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="<?php echo site_url('report')?>">Report</a></li>

                        </ul>
                    </li>

                    <li class="menu-title">Account</li>
                    <li class="menu-item-has-children dropdown <?php //if($page=='profile'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-key"></i> <a href="changePassword.php">Change Password</a></li> -->
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            </li>
                        </ul>
                         <li>
                        <a href=<?php echo site_url('logout')?>> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->