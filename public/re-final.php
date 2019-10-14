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
  
            $payment_id = selectFromTable ('*', 'payment', 'payment_id='.$_POST['payment'] , $db );
 
 
        if($payment_id) {

 $amount = $payment_id[0]['amount'];

 $payment_id = $payment_id[0]['payment_id'];
 


            $tickets = selectFromTable ('*', 'ticket', '   payment_id = '. $payment_id .' AND delete_status =  0' , $db );

$ticketKey = 0;
$scheduleid = 0;

 $ticketKey = $tickets[0]['tkey'];
 $scheduleid = $tickets[0]['schedule_id'];




 if ($tickets) {




$scheduleids = selectFromTable ('*', 'schedule', '   schedule_id = '. $scheduleid .' AND delete_status =  0' , $db );

$showDate = $scheduleids[0]['show_date'];




$start_times = selectFromTable ('*', 'show_time', '   show_id = '. $scheduleids[0]['show_time_id'] .' AND delete_status =  0' , $db );

$showTime = $start_times[0]['start_time'];



$start_timess = selectFromTable ('*', 'screen', '   screen_id = '. $scheduleids[0]['screen_id'] .' AND delete_status =  0' , $db );
 
  $screenname = $start_timess[0]['name'];


$showPrice = $amount;



$movieJHee = selectFromTable ('*', 'movie', '   movie_id = '. $scheduleids[0]['movie_id'] .' AND delete_status =  0' , $db );

$movieName = $movieJHee[0]['name'];




        $seatrszz = ' (SELECT seat_id FROM `ticket` WHERE payment_id ='.$payment_id. ' ) '; 


 


$movieJHeeyrrr55 = selectFromTable ('*', 'seat',  ' seat_id IN '.$seatrszz , $db );




$wherRttY = ' seat_id IN (SELECT DISTINCT(st.seat_id) AS seat_id FROM `seat_type`st LEFT JOIN seat s ON s.seat_type_id = st.seat_id WHERE s.seat_id IN ' . $seatrszz . ') ';

$movieJHeefsdf = selectFromTable ('*', ' `seat_type` ',  $wherRttY  , $db );


 


$movieJHee45345 = selectFromTable ('*', ' `food` ',  ' food_id IN (SELECT food_id FROM `buy_food` WHERE payment_id ='.$payment_id. ' ) ' , $db );




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

        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="../assets/theme/images/tickets.png">
                    <p class="order__title">Thank you <br><span class="order__descript">you have successfully purchased tickets</span></p>
                </div>



 
                <div id="divID"   class="ticket">
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
                thizAxtualTz();
            });
        </script>


 <?php include_once( 'footer.php' ); ?>
 
 