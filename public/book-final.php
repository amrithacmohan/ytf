<?php include_once( 'header.php' ); 

auth_login_public();


$db = new Database();
$message = array( NULL, NULL);
?> 



<?php

if(!isset($_POST))
     echo "<script type='text/javascript'>location.href='book1.php'</script>";

 $userid = null;
 if ($userlogin) {
     $userid = $userlogin[0]['user_id'];
 }
 
 $amount =  $_POST['amount'];
 $_pay_type = 'TEST';
 $card_no = $_POST['card'];
 $cuv_no = $_POST['cvv'];
 $card_expiry =  null;
 $date = date("Y-m-d H:i:s");
 $hkey =   random_num(9);

$payment_id = 0;

    if (isset($_POST)) {


 $where =  ' user_id = ' . $userid . 
                                                ' AND amount = '. $amount.
                                                ' AND pay_type = \''. $_pay_type
                                                .'\' AND card_no = '.$card_no
                                                .' AND cuv_no = '.$cuv_no  ;
 
      $payment_idz = selectFromTable (' * ', ' payment ',$where , $db );
 

    if(!$payment_idz){


        $array = array(  "user_id"      => $userid  ,
                         "amount"      => $amount ,
                         "pay_type"          => $_pay_type ,
                         "card_no" => $card_no,
                         "cuv_no"  => $cuv_no ,
                         "card_expiry"  => $card_expiry ,
                         "date"        => $date );

        $result  = insertInToTable ('payment', $array, $db );
        if( $result == 1) {
            // $message [0] = 1;
            // $message [1] = 'Cast successfully Added'; 


            $payment_id = selectFromTable ('payment_id', 'payment', ' date = "' . $date . '" AND user_id = '. $userid .' AND amount = '.$amount , $db );
        }else  {
            $message [0] = 3;
            $message [1] = 'Something is wrong, ensure values are correct ! '; 

        }


} else {

    echo "<script type='text/javascript'>location.href='book1.php'</script>";

}


    // $payment_id


        if($payment_id) {



            foreach ($_POST['seats'] as  $seatsValue) {

$ticket_id = selectFromTable ('ticket_id', 'ticket',
                                        ' user_id = ' . $userid . 
                                        ' AND schedule_id = '. $_POST['schedule']
                                        .' AND seat_id = '.$seatsValue
                                        .' AND payment_id = '.$payment_id

                                         , $db );
                if(!$ticket_id){

                        $array = array(  "user_id"      => $userid  ,
                                         "schedule_id"      => $_POST['schedule'] ,
                                         "seat_id"          => $seatsValue ,
                                         "tkey" => $hkey.'A'.$payment_id ,
                                         "payment_id" => $payment_id );

                        $result  = insertInToTable ('ticket', $array, $db );
                        if( $result == 1) {
                           

                        }else  {

                            $message [0] = 3;
                            $message [1] = 'Something is wrong, ensure values are correct ! '; 

                        }
            }


            }





                        foreach ($_POST['foods'] as  $seatsValue) {

            $ticket_id = selectFromTable ('id', 'buy_food',
                                                    ' user_id = ' . $userid . 
                                                    ' AND quantity = '. '1'
                                                    .' AND food_id = '.$seatsValue
                                                    .' AND payment_id = '.$payment_id

                                                     , $db );
                            if(!$ticket_id){

                                    $array = array(  "user_id"      => $userid  ,
                                                     "quantity"      => '1',
                                                     "food_id"          => $seatsValue , 
                                                     "payment_id" => $payment_id );

                                    $result  = insertInToTable ('buy_food', $array, $db );
                                    if( $result == 1) {
                                       

                                    }else  {

                                        $message [0] = 3;
                                        $message [1] = 'Something is wrong, ensure values are correct ! '; 

                                    }
                        }


                        }



 


            $tickets = selectFromTable ('*', 'ticket', '   payment_id = '. $payment_id .' AND delete_status =  0' , $db );

$ticketKey = 0;
$scheduleid = 0;

 $ticketKey = $tickets[0]['tkey'];
 $scheduleid = $tickets[0]['schedule_id'];



$scheduleids = selectFromTable ('*', 'schedule', '   schedule_id = '. $scheduleid .' AND delete_status =  0' , $db );

$showDate = $scheduleids[0]['show_date'];




$start_times = selectFromTable ('*', 'show_time', '   show_id = '. $scheduleids[0]['show_time_id'] .' AND delete_status =  0' , $db );

$showTime = $start_times[0]['start_time'];



$start_timess = selectFromTable ('*', 'screen', '   screen_id = '. $scheduleids[0]['screen_id'] .' AND delete_status =  0' , $db );
 
  $screenname = $start_timess[0]['name'];


$showPrice = $amount;



$movieJHee = selectFromTable ('*', 'movie', '   movie_id = '. $scheduleids[0]['movie_id'] .' AND delete_status =  0' , $db );

$movieName = $movieJHee[0]['name'];



$seatrszz = '  (';
            $ftx = true;            
            foreach ($_POST['seats'] as  $seatsValue) {
                if(!$ftx)
                    $seatrszz = $seatrszz . ' , ';

                    $seatrszz = $seatrszz . ' ' .$seatsValue ;

                    $ftx = false;
            }

            $seatrszz = $seatrszz . ' ) ';
 


$movieJHeeyrrr55 = selectFromTable ('*', 'seat',  ' seat_id IN '.$seatrszz , $db );




$wherRttY = ' seat_id IN (SELECT DISTINCT(st.seat_id) AS seat_id FROM `seat_type`st LEFT JOIN seat s ON s.seat_type_id = st.seat_id WHERE s.seat_id IN ' . $seatrszz . ') ';

$movieJHeefsdf = selectFromTable ('*', ' `seat_type` ',  $wherRttY  , $db );







$seatrszz = '  (';
            $ftx = true;            
            foreach ($_POST['foods'] as  $seatsValue) {
                if(!$ftx)
                    $seatrszz = $seatrszz . ' , ';

                    $seatrszz = $seatrszz . ' ' .$seatsValue ;

                    $ftx = false;
            }

            $seatrszz = $seatrszz . ' ) ';
 


$movieJHee45345 = selectFromTable ('*', 'food',  ' food_id IN '.$seatrszz , $db );



        }







        


           
    }








?>

<style type="text/css">
    
    @media print {
      bodys * {
        visibility: hidden;
      }
      #section-to-print, #section-to-print * {
        visibility: visible;
      }
      #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
      }
    }

</style>

        <div style="margin-top: 2em;" class="place-form-area"></div>

        <section  class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="../assets/theme/images/tickets.png">
                    <p class="order__title">Thank you <br><span class="order__descript">you have successfully purchased tickets</span></p>
                </div>



 
                <div  id="divID"   class="ticket">
                    <div class="ticket-position">
                        <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">online ticket</div> </div>
                        <div class="ticket__inner">

                            <div class="ticket-secondary">
                                <span class="ticket__item">Ticket number <strong class="ticket__number"><?php echo $ticketKey; ?></strong></span>
                                <span class="ticket__item ticket__date"><?php echo $showDate; ?></span>
                                <span class="ticket__item ticket__time"><?php echo $showTime; ?></span> 
                                <span class="ticket__item">Hall: <span class="ticket__hall"><?php echo $screenname; ?></span></span>
                                <span class="ticket__item ticket__price">price: <strong class="ticket__cost"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $showPrice; ?></strong></span>
                            </div>

                            <div class="ticket-primery">
                                <span class="ticket__item ticket__item--primery ticket__film">Film<br><strong class="ticket__movie"><?php 
                                echo $movieName; ?></strong></span>


<?php 

    foreach ($movieJHeefsdf as  $catValue) {
        $th99 = true;
        $r44 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        echo '  <span class="ticket__item ticket__item--primery">'.$catValue['type'].': <span class="ticket__place">';

        foreach ($movieJHeeyrrr55 as $shoWvalue) {
             if($catValue['seat_id'] == $shoWvalue['seat_type_id'] ){

                if(!$th99 )
                echo ', ';
            if($shoWvalue['position_x']>26)
            echo $shoWvalue['position_x'].'X'.$shoWvalue['position_y'];
        else
            echo $r44{$shoWvalue['position_x']-1}.''.$shoWvalue['position_y'];

            $th99 = false;

             }
        }

        echo '</span></span>';
    }









    echo '  <span class="ticket__item ticket__item--primery" style="font-size: 12px;">snacks: <span class="ticket__place">';

    $th99 = true;
    foreach ($movieJHee45345 as $shoWvalue) {


            if(!$th99 )
            echo ', '; 
        echo $shoWvalue['name'];
    
        $th99 = false;
 
    }

    echo '</span></span>';







 ?>
 


 
                            </div>


                        </div>
                        <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">online ticket</div></div>
                    </div>
                </div>

                <div class="ticket-control">
                    <a id="printDef564564fsd" class="watchlist list--download">Download</a>
                    <a id="printDefr45dfsfsd" class="watchlist list--print">Print</a>
                </div>

            </div>

            <?php echo show_theme_error ($message); ?>
        </section>
        
        <div class="clearfix"></div>




        <?php
         $here  = 4;
        ?>

        <div id="editor"></div>

        

        <script type="text/javascript">
            $(document).ready(function() {
                $('.top-scroll').parent().find('.top-scroll').remove();
            });
        </script>


 <?php include_once( 'footer.php' ); ?>
 


<?php


function random_num($size) {
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++) {
        $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 9);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
}

?>