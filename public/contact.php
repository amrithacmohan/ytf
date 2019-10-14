<?php include_once( 'header.php' ); 

$db = new Database();
$message = array( NULL, NULL);
?>
<?php

$userid = null;
if ($userlogin) {
    $userid = $userlogin[0]['user_id'];
}


 


if ($_POST) { 
    
    $_SESSION['POST'] =  $_POST; 
    echo "<script type='text/javascript'>location.href='".$_SERVER['REQUEST_URI']."'</script>";
    exit();
}
if (isset($_SESSION ['POST'])) {
  $_POST = $_SESSION['POST'];
  unset($_SESSION['POST']);
}





    if (isset($_POST)) 
        if($_POST){

 


        $array = array(  "name"      => $_POST['name']  ,
                         "email"      => $_POST['email']  ,
                         "admin_id"          => 1,
                         "feedback" => $_POST['message']  );

        $result  = insertInToTable ('feedback', $array, $db );
        if( $result == 1) {
            $message [0] = 1;
            $message [1] = 'message successfully Added'; 


            
        }else  {
            $message [0] = 3;
            $message [1] = 'Something is wrong, ensure values are correct ! '; 

        }



    }

?>

<div style="margin-top: 2em;" class="place-form-area"></div>
        
        <!-- Main content -->
        <section class="container">
            <h2 class="page-heading heading--outcontainer">Contact</h2>
            <div class="contact">
                <p class="contact__title">You have any questions or need help, <br><span class="contact__describe">don’t be shy and contact us</span></p>
                <span class="contact__mail">support@amovie.com</span>
                <span class="contact__tel">support@amovie.com</span>
            </div>
        </section>

        <div class="contact-form-wrapper">
            <div class="container">


            <?php echo show_theme_error ($message); ?>



                <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <form id='contact-formd' class="form row" method='post' novalidate="" action="">
                        <p class="form__title">Drop us a line</p>
                        <div class="col-sm-6">
                            <input type='text' placeholder='Your name' name='name' class="form__name">
                        </div>
                        <div class="col-sm-6">
                            <input type='email' placeholder='Your email' name='email' class="form__mail">
                        </div>
                        <div class="col-sm-12">
                            <textarea placeholder="Your message" name="message" class="form__message"></textarea>
                        </div>
                        <button type="submit" class='btn btn-md btn--danger'>send message</button>
                    </form>
                </div>
            </div>


        </div>

        <section class="container">
            <div class="contact">
                <p class="contact__title">Trying to find our location? <br> <span class="contact__describe">we are here</span></p>
            </div>
        </section>

        <div id='location-map' class="map"></div>
        
        <div class="clearfix"></div>

<?php

$here = 2;

?>

		
		<script type="text/javascript">
            $(document).ready(function() {
                init_Contact (); 
            });
		</script>
        <?php include_once( 'footer.php' ); ?>

