<?php 
    session_start();
    include_once( '../includes/connection.php' );
    include_once( '../includes/functions.php' );
    
    // print_r( $_SESSION );
    auth_login();
?>

<link rel="stylesheet/less" type="text/css" href="<?php echo PATH; ?>/assets/timepicker/css/timepicker.less" />

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Intercollege festival</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/styles.css">
    <!-- JS Core -->
    <script type="text/javascript" src="<?php echo PATH; ?>/assets/js-core.js"></script>
</head>

<body class="fixed-sidebar">
    <div id="sb-site">
        <div class="page-wrapper">
            <!-- Header -->
            <div id="page-header" class="bg-black font-inverse">
                <div id="header-logo" class="logo-bg bg-black font-inverse">
                    
                </div>  
            </div>
            <!-- Sidebar -->
            <div id="page-sidebar" class="bg-black font-inverse">
                <div class="scroll-sidebar">

                    <ul id="sidebar-menu">
                        <?php if( user_type() == 'admin' ) : ?>

                            <li class="header"><span></span></li>
                            
                            </li>
                             <li>
                                <a href="<?php echo PATH_ADMIN.'/home.php'; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Home</span>
                                </a>
                            </li> 
                            <li class="header"><span>Account</span></li>
                             <li>
                                <a href="index.html#" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Account Settings</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/changepass.php' ?>" title="Buttons"><span>Change Password</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH. '/Drishya.php' ?>" title="Buttons"><span>Logout</span></a></li>
                                    </ul>
                                </div>

                        <?php endif;?>
                        <?php if( user_type() == 'customer' ) : ?>

                            <li class="header"><span>Profile</span></li>
                            <li>
                                <a href="" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>View profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>

                        <?php endif;?>
                            <!-- <li>
                                <a href="<?php echo PATH.'/Drishya.php'; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo PATH_ADMIN.'/changepass.php'; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-linecons-tv"></i>
                                    <span>Change password</span>
                                </a>
                            </li> -->
                             <li class="header"><span>Add</span></li>
                            <li>
                                <a href="" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Add to DataBase</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/addschool.php' ?>" title="Buttons"><span>Add a New school</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/stage.php' ?>" title="Buttons"><span>Add Stage</span></a></li>
                                    </ul>
                                </div>
                                 <!-- <div class="sidebar-submenu"> 
                                    <ul>
                                        <li><a href="<?php //echo PATH_ADMIN . '/programtype.php' ?>" title="Buttons"><span>Add Program Type</span></a></li>
                                    </ul>
                                </div>-->
                                
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/addjudge.php' ?>" title="Buttons"><span>Add judge</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header"><span>Programs</span></li>
                            <li>
                                <a href="" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Program</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/program.php' ?>" title="Buttons"><span>Add Programs</span></a></li>
                                    </ul>
                                </div>
                                 <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/viewprograms.php' ?>" title="Buttons"><span>View & Edit Programs</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/timedetail.php' ?>" title="Buttons"><span>Automate</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/viewallow.php' ?>" title="Buttons"><span>Automated View</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header"><span>Result</span></li>
                            <li>
                                <a href="" title="Elements">
                                    <i class="glyph-icon icon-linecons-diamond"></i>
                                    <span>Result</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="<?php echo PATH_ADMIN . '/result.php?message=publish marks' ?>" title="Buttons"><span>Add REsult</span></a></li>
                                    </ul>
                                </div>
                                
                            </li>
                             <!-- <li> -->
                                <!-- <a href="<?php //echo PATH_SCHOOL.'/changepass.php'; ?>" title="Admin Dashboard"> -->
                                    <!-- <i class="glyph-icon icon-car"></i> 
                                     <span>Change password</span> 
                                </a>
                            </li>
                           
                             <li>
                                <a href="<?php //echo PATH_SCHOOL.'/AddParti.php'; ?>" title="Admin Dashboard">
                                    <i class="glyph-icon icon-plus"></i>
                                    <span>Add a Participant</span>
                                </a>
                            </li>-->
                            
                    </ul>
                </div>
            </div>

            <!-- main page -->
            <div class="page-content-wrapper">
                <div id="page-content">
                    <div class="container">

