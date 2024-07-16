<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="menu-title">Student: &nbsp;&nbsp;&nbsp;<?php //echo $staffFullName; ?></li>
                    <li class="<?php //if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="<?php echo site_url('studentDashboard')?>"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  
                        <!-- <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admin</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-plus"></i><a href="createAdmin.php">Add Administrator</a></li>
                                <li><i class="fa fa-eye"></i><a href="viewAdmin.php">View Administrator</a></li>
                            </ul>
                        </li> -->

                    <li class="menu-title">Main Menu</li>
                      <li class="menu-item-has-children dropdown <?php //if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Grades</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="<?php echo site_url('studentViewGradeList')?>">List of Grades</a></li>

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