<?php 
    session_start();
    include_once( '../includes/connection.php' );
    include_once( '../includes/functions.php' ); 

    $db = new Database(); 
?>




<!doctype html>
<html>
<head>
  <!-- Basic Page Needs --> 
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title><?php echo SYSTEM_NAME ; ?></title> 



        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">




        <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/select2/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/css/cropper.min.css">
        

        <!-- <link rel="stylesheet/less" type="text/css" href="<?php echo PATH; ?>/assets/datepicker/css/datepicker.css" />  -->
        
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        
        <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/font-awesome/css/font-awesome.min.css">



        <link href="../assets/theme/css/bootstrap.min.css" rel="stylesheet" />


        <!-- Roboto -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
        <!-- Open Sans -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="../assets/theme/css/jquery-ui.min.css" rel="stylesheet" />


        <!-- Mobile menu -->
        <link href="../assets/theme/css/gozha-nav.css" rel="stylesheet" />
        <!-- Select -->
        <link href="../assets/theme/css/external/jquery.selectbox.css" rel="stylesheet" />

        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="../assets/theme/rs-plugin/css/settings.css" media="screen" />
    

   
        <link href="../assets/theme/css/external/magnific-popup.css" rel="stylesheet" />

        
    <link href="../assets/theme/css/external/idangerous.swiper.css" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="../assets/theme/css/style-v=1.css" rel="stylesheet" />


        <!-- Modernizr --> 
        <script src="../assets/theme/js/external/modernizr.custom.js"></script>




  
        <style type="text/css">
            
        </style>






        <!-- JS Core -->
        <script type="text/javascript" src="<?php echo PATH; ?>/assets/js/jquery-1.11.3.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>   
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        <!-- Banner -->
        <div class="banner-top">
            <img alt='top banner' src="../assets/theme/images/banners/bra.jpg">
        </div>

        <!-- Header section -->
        <header class="header-wrapper header-wrapper--home">
            <div class="container">
                <!-- Logo link-->
                <a href='index.html' class="logo">
                    <img alt='logo' src="../assets/theme/images/logo.png">
                </a>
                
                <!-- Main website navigation-->
                <nav id="navigation-box">
                    <!-- Toggle for mobile menu mode -->
                    <a href="index.html#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                            </span>
                        </span>
                    </a>
                    
                    <!-- Link navigation -->
                    <ul id="navigation">
                        <li>
                            <span class="sub-nav-toggle plus"></span>
                            <a href="index.php">Home</a>
                           
                        </li>



                        <li>
                            <span class="sub-nav-toggle plus"></span>
                            <a href="##">Movies</a>
                            <ul>
                                <li class="menu__nav-item"><a href="movies.php">Movies</a></li>
                               <!--  <li class="menu__nav-item"><a href="##">Trailers</a></li>
                                <li class="menu__nav-item"><a href="##">Rates</a></li> -->

                            </ul>
                            
                        </li>


                        <li>
                            <span class="sub-nav-toggle plus"></span>
                            <a href="book1.php">Booking</a>
                            
                        </li>


                        <li>
                            <span class="sub-nav-toggle plus"></span>
                            <a href="gallery-four.php">Gallery</a>
                            
                        </li>

                        <li>
                            <span class="sub-nav-toggle plus"></span>
                            <a href="contact.php">Contact us</a>
                            
                        </li>






                    </ul>
                </nav>
                
                <!-- Additional header buttons / Auth and direct link to booking-->

<?php
  
  $userlogin = array();
  if(isset($_SESSION['userid'])) {

    if(user_type() == "user") {

      $stmnt="select * from user where email = :name AND delete_status = 0 ";
          $params = array(
              ':name' => $_SESSION['userid']

            );
      $food = $db->display( $stmnt, $params);
 
      if( $food ) {

        foreach ($food as $value) {



            $image =  PATH . '/assets/images/default-1.jpg';

          if (file_exists(  '../user/images_/' .$value['image'] ) && !empty($value['image'])) 
            $image =  PATH . '/user/images_/' .$value['image'];
          else 
            $image =  PATH . '/assets/images/default-1.jpg';




            
            array_push($userlogin ,array( 'user_id' => $value['user_id'],
                                           'name' => $value['name'],
                                           'email' => $value['email'],
                                           'mobile' => $value['mobile'],
                                           //'id_proof' => $value['id_proof'],
                                           'image' => $image 

            ));


        }

                      } else {
 
                      }





    }



  }




?>



<?php
if($userlogin){
   
?>




                <div class="control-panel">
                    <div class="auth auth--home">
                      <div class="auth__show">
                        <span class="auth__image">
                          <img alt="" class="img-responsive" style="border-radius: 50%;"  src="<?php echo $userlogin[0]['image']; ?>">
                        </span>
                      </div>
                      <a href="##" class="btn btn--sign btn--singin">
                         me
                      </a>
                        <ul class="auth__function">
                            <!-- <li><a href="index.html#" class="auth__function-item">Watchlist</a></li> -->
                            <li><a href="../user/profile.php" class="auth__function-item"><?php echo $userlogin[0]['name']; ?></a></li>
                            <li><a href="../user/ticket.php" class="auth__function-item">New Ticket</a></li>
                            <li><a href="../logout.php" class="auth__function-item">Logout</a></li>
                        </ul>

                    </div>
                    <a href="book1.php" class="btn btn-md btn--warning btn--book btn-control--home  ">Book a ticket</a>
                </div>

<?php

} else {
?>

                <!-- Additional header buttons / Auth and direct link to booking-->
                <div class="control-panel">
                    <a href="login.php" class="btn btn--sign login-window">Sign in</a>
                    <a href="book1.php" class="btn btn-md btn--warning btn--book login-window">Book a ticket</a>
                </div>


        <?php

        }

        ?>        

            </div>
        </header>


        <?php
         $here  = 0;
        ?>



