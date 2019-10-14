<?php include_once( 'header.php' ); 

$db = new Database();
$message = array( NULL, NULL);
?>


<?php
    // connection
    include_once( '../includes/connection.php' );

    $db = new Database();
    $message = "";
    if( isset( $_POST['login'] ) ) {
        $username = $_POST['username'];
        $Password = $_POST['password'];
  
        $stmnt = 'select * from user where email = :username and password = :password';
        $params = array(
            ':username' =>  $_POST['username'],
            ':password' =>  md5($_POST['password'])
        ); 

        if( $db->display( $stmnt, $params ) ) {

            session_start();
            $_SESSION['userid'] =$_POST['username'];
            $_SESSION['username'] = $username;
            $_SESSION['type'] = 'user';



            if ( isset($_GET['dest']) ) { 

                echo "<script type='text/javascript'>location.href='".$_GET['dest'] . "'</script>";
            } else {
                
             echo "<script type='text/javascript'>location.href='index.php'</script>";
            }




            exit();
        } else {
            $message = 'Invalid username or password!';
        }
    }
?>

        
        <!-- Search bar -->
        <div  style="margin-top: 2em;"  class="search-">
          
        </div>
            
        <form id="login-formz" class="logins" method='post' novalidate=''>
        <!-- Main content -->
                    <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

                    <div class="social social--colored">
                        
                            <a href='../user/registration.php' class="btn btn-md btn--ready">register</a>
                    </div>

                    <p class="login__tracker">or</p>
                    
                    <div class="field-wrap">
                    <input type='email' placeholder='Email' name='username' class="login__input">
                    <input type='password' placeholder='Password' name='password' class="login__input">

                    <input type='checkbox' id='#informed' class='login__check styled'>
                    <label for='#informed' class='login__check-info'>remember me</label>
                     </div>

                     <div class="text-center">
                                    
                                    <p class="text-center">
                         <?php if($message)echo $message; ?></p>
                     </div>
                    
                    <div class="login__control">
                       
                        <input  id="foLogkKgjrts4534"  type="submit" name="login" value="sign in"  class="btn btn-md btn--warning btn--wider">
                        <!-- <a href="login.html#" class="login__tracker form__tracker">Forgot password?</a> -->
                    </div>
                  
                </form>
        <div class="clearfix"></div>
    </div>

        <?php include_once( 'footer.php' ); ?>