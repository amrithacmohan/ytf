<?php 
    session_start();
    include_once( '../includes/connection.php' );
    include_once( '../includes/functions.php' );
    
    // print_r( $_SESSION );
    auth_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Youthfestival</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/styles.css">
    <!-- JS Core -->
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/js-core.js"></script>
</head>
 <script type="text/javascript" src="<?php echo PATH; ?>/assets/clockpicker/bootstrap-clockpicker.min.js"></script>
 <script type="text/javascript" src="<?php echo PATH; ?>/assets/clockpicker/clockpicker.min-v2.2.0.css"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/bootstrap-datepicker/bootstrap-datepicker.min-v2.2.0.css"></script>


<body class="fixed-sidebar">
    <div id="sb-site">
        <div class="page-wrapper">
            <!-- Header -->
            <div id="page-header" class="bg-black font-inverse">
                <div id="header-logo" class="logo-bg bg-black font-inverse">
                    Logo
                </div>  
            </div>
            <!-- Sidebar -->
            <div id="page-sidebar" class="bg-black font-inverse">
                <div class="scroll-sidebar">

                    <ul id="sidebar-menu">
                        <?php if( user_type() == 'admin' ) : ?>

                            <li class="header"><span>aJ</span></li>
                            <li>
                                <a href="<?php echo PATH_ADMIN; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>arJun</span>
                                </a>
                            </li>

                            <li class="header"><span>Vikki</span></li>
                            <li>
                                <a href="index.html#" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Ashwanth</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/add-vechicle.php' ?>" title="Buttons"><span>Add a New member</span></a></li>
                                    </ul>
                                </div>
                            </li>

                        <?php endif;?>
                        <?php if( user_type() == 'customer' ) : ?>

                            <li class="header"><span>Profile</span></li>
                            <li>
                                <a href="index.html" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>View profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>

                        <?php endif;?>
                           </li>
                            <li class="header"><span></span></li>
                            
                            </li>
                             <li>
                                <a href="<?php echo PATH_SCHOOL.'/home.php'; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Home</span>
                                </a>
                            </li> 




                               <li class="header"><span>Add</span></li>
                            <li>
                                <a href="index.html#" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Account Settings</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_SCHOOL . '/changepass.php' ?>" title="Buttons"><span>Change Password</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH. '/Drishya.php' ?>" title="Buttons"><span>Logout</span></a></li>
                                    </ul>
                                </div>
                               <li class="header"><span>Add</span></li>
                            <li>
                                <a href="index.html#" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Add</span>
                                </a>
                                
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_SCHOOL . '/participants.php' ?>" title="Buttons"><span>Add a Student</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_SCHOOL . '/addprogram.php' ?>" title="Buttons"><span>Add to programs</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_SCHOOL . '/viewprgm.php' ?>" title="Buttons"><span>View Entries</span></a></li>
                                    </ul>
                                </div>
                               
                    </ul>
                </div>
            </div>

            <!-- main page -->
            <div class="page-content-wrapper">
                <div id="page-content">
                    <div class="container">

