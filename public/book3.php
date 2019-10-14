<?php include_once( 'header.php' ); 

auth_login_public();
$db = new Database();
$message = array( NULL, NULL);
?>
<?php


if ($_POST) { 
    
    $_SESSION['POST'] =  $_POST; 
    echo "<script type='text/javascript'>location.href='".$_SERVER['REQUEST_URI']."'</script>";
    exit();
}
if (isset($_SESSION ['POST'])) {
  $_POST = $_SESSION['POST'];
  unset($_SESSION['POST']);
}













$foodTot = 0;
$foodCount = 0;

if(!isset($_POST))
     echo "<script type='text/javascript'>location.href='book1.php'</script>";



    $seats = $_POST['seats'];
    $foods = $_POST['foods'];
    $schedule = $_POST['schedule'];
    $movie = $_POST['movie'];
    $date = $_POST['date'];
    $price = $_POST['price'];

 $fris = 0;


    if (isset($_POST)) {

            $schedule = selectFromTable ('*', ' schedule ', ' movie_id = '. $_POST['movie'] . '  AND show_date = "'. $_POST['date'] . '"  AND schedule_id = '. $_POST['schedule'] . '  AND delete_status = 0 LIMIT 1' , $db );


        if($schedule) {


            $schedule = $schedule[0];

            $screen = selectFromTable ('*', ' screen ', ' screen_id = '. $schedule['screen_id'] . '  AND delete_status = 0 ' , $db );
            if(!$screen)
                echo "<script type='text/javascript'>location.href='book1.php'</script>";
            else {

         
                   $seat_type = selectFromTable (' * ', 'seat_type  ', ' seat_id IN ( SELECT DISTINCT(seat_type_id ) AS seat_id FROM `seat` WHERE delete_status = 0 AND screen_id = '.$screen[0]['screen_id'].' ) AND delete_status = 0 ' , $db );

         
                    $seatsa = selectFromTable ('  s.*, st.type, st.amount, st.color ', '  `seat` s LEFT JOIN seat_type st ON s.seat_type_id = st.seat_id ', '  s.screen_id ='.$screen[0]['screen_id'].' AND s.delete_status = 0 ' , $db );

                     

         


            }

        } else {
            echo "<script type='text/javascript'>location.href='book1.php'</script>";

        }







        $seatsaXXX = $seatsa;

        if($seatsaXXX)
            foreach ($seatsaXXX as $elementKey => $seatsValue) {
                $izRemv = true;
                foreach ($seats as $vaxsdlue) {

                        if($seatsValue['seat_id'] == $vaxsdlue )
                             $izRemv = false; 

                }


                if ($izRemv) { 
                    unset($seatsaXXX[$elementKey]);
                }

            }

            $t23 =  array();

            if($seatsaXXX)
                foreach ($seatsaXXX as  $vXoralue) {
                    $izin45 = true;
                    foreach ($t23 as $vt23alue) { 

                         if($vt23alue['type'] == $vXoralue['seat_type_id']){

                             $izin45 = false;
                         }
 
                    }
                    if($izin45)
                        array_push($t23 ,array( 'type' => $vXoralue['seat_type_id'],
                                                'value' => 0 ,
                                                'amount' => $vXoralue['amount']));
                }
 

              foreach ($seatsaXXX as  $vXoralue) {

                for ($yuio =0; $yuio  < sizeof($t23); $yuio ++) { 
                      if($vXoralue['seat_type_id'] ==  $t23[$yuio]['type']  ){
                        $t23[$yuio]['value'] = $t23[$yuio]['value'] + 1;
                      }
                }
              

              }











              $foodTot = 0;
              $foodCount = sizeof($foods);
 
              if ($foods) {
  
                $ftsts4 = true;
                $whre33 = ' (';
                foreach ($foods as  $foodsvalue) {
                    if(!$ftsts4)
                        $whre33 = $whre33 . ', ';
                   
                        $whre33 = $whre33 . $foodsvalue;
                         $ftsts4 = false;
                   
                }

                        $whre33 = $whre33 . ')  ';
 
               
               $fooDtot = selectFromTable (' sum(price) AS sum ', ' food ', '  food_id IN '.$whre33 , $db );

               $foodTot = $fooDtot[0]['sum'];



              }


           
    }




 



?>
        
        <div style="margin-top: 2em;" class="place-form-area"></div>
        <!-- Main content -->
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="../assets/theme/images/tickets.png">
                    <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                    <div class="order__control"><!-- 
                        <a href="" class="order__control-btn active">Purchase</a>
                        <a href="book3-reserve.html" class="order__control-btn">Reserve</a> -->
                    </div>
                </div>
            </div>

            <?php
  
            ?>
                <div class="order-step-area">
                    <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                    <div class="order-step second--step order-step--disable">2. Choose a sit</div>
                    <div class="order-step third--step">3. Check out</div>
                </div>

            <div class="col-sm-12">
                <div class="checkout-wrapper">
                    <h2 class="page-heading">price</h2>
                    <ul class="book-result">
                        <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket"><?php  
                        $fris = true;
                       foreach ($t23 as  $value) {
                            if(! $fris) 
                                echo "/";
                            $fris =  false;

                            echo $value['value'];

                       }

                        ?></span></li>

                   <?php
                   if($foodCount>0){
                   ?>     
                         <li class="book-result__item">food: <span class="book-result__count booking-ticket"><?php  echo $foodCount;

                        ?></span></li>

                   <?php
                   }
                   ?>     
                        <li class="book-result__item"> item price: <span class="book-result__count booking-price"><?php
 $fris = true;
foreach ($t23 as  $value) {
     if(! $fris) 
         echo "  /  ";
     $fris =  false;

     echo $value['value']. ' X ' . $value['amount'];

}

if($foodTot>0)
echo ' / '.$foodTot;
                        ?></span></li>
                        <li class="book-result__item">Total: <span class="book-result__count booking-cost"><i class="fa fa-inr" aria-hidden="true"></i><?php



         $fris = 0;
        foreach ($t23 as  $value) {
            $fris = $fris +   ($value['value'] * $value['amount']);

        } 

echo  $fris = ($fris+$foodTot);



                        ?></span></li>
                    </ul>


                

                    <h2 class="page-heading">Choose payment method</h2>
                    <div class="payment">
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay1.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay2.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay3.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay4.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay5.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay6.png">
                        </a>
                        <a href="##" class="payment__item">
                            <img alt='' src="../assets/theme/images/payment/pay7.png">
                        </a>
                    </div>

                    <h2 class="page-heading">More information</h2>
            
                    <form id='contact-info-nextg' method='post' novalidate="" action="book-final.php" class="form contact-info">

<?php



foreach ($seatsaXXX as  $vXoralue) {
 
    echo '<input type="hidden" name="seats[]" value="'.$vXoralue['seat_id'].'">';

}



foreach ($foods as  $vXoralue) {
 
    echo '<input type="hidden" name="foods[]" value="'.$vXoralue.'">';

}


?>

                        <input type="hidden" name="schedule" value="<?php  echo  $_POST['schedule']; ?>">
 

                        <input type="hidden" name="amount" value="<?php  echo  $fris; ?>">
                        <div class="contact-info__field ">
                            <input type='number' name='card' placeholder='Your card number' class="form__mail">
                        </div>
                        <div class="contact-info__field  ">
                            <input type='number' name='cvv' placeholder='card cvv' class="form__mail">
                        </div>
                    </form>

                
                </div>
                
                <div class="order">
                    <a  id="gotTofindLastestaq" class="btn btn-md btn--warning  ">purchase</a>
                </div>

            </div>

        </section>
        

        <div class="clearfix"></div>

        <div class="booking-pagination">
                <a id="actionActzActual" class="booking-pagination__prev">
                    <p class="arrow__text arrow--prev">prev step</p>
                    <span class="arrow__info">choose a sit</span>
                </a>
                <a href="##" class="booking-pagination__next hide--arrow">
                    <p class="arrow__text arrow--next">next step</p>
                    <span class="arrow__info"></span>
                </a>
        </div>
        
        <div class="clearfix"></div>



        <form id='film-and-timeds' class="booking-form" method='post' action='book2.php'>

            <input type='text' name='choosen-schedule' class="choosen-movie"  value="<?php echo $_POST['schedule'] ?>">
            <input type='text' name='choosen-movie' class="choosen-movie"  value="<?php echo $_POST['movie'] ?>">
            <input type='text' name='choosen-date' class="choosen-date"  value="<?php echo $_POST['date'] ?>">
             
 

        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                thizAxtualTz();
            });
        </script>
 
 
 <?php include_once( 'footer.php' ); ?>
 