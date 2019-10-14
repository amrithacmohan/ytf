<?php include_once( 'header.php' ); 

auth_login_public();
$db = new Database();
$message = array( NULL, NULL);
?>







<?php
if( isset($_POST['choosen-schedule']) && isset($_POST['choosen-movie'])  && isset($_POST['choosen-date']) ) {

    $schedule = selectFromTable ('*', ' schedule ', ' movie_id = '. $_POST['choosen-movie'] . '  AND show_date = "'. $_POST['choosen-date'] . '"  AND schedule_id = '. $_POST['choosen-schedule'] . '  AND delete_status = 0 LIMIT 1' , $db );


if($schedule) {


    $schedule = $schedule[0];

    $screen = selectFromTable ('*', ' screen ', ' screen_id = '. $schedule['screen_id'] . '  AND delete_status = 0 ' , $db );
    if(!$screen)
        echo "<script type='text/javascript'>location.href='book1.php'</script>";
    else {

 
           $seat_type = selectFromTable (' * ', 'seat_type  ', ' seat_id IN ( SELECT DISTINCT(seat_type_id ) AS seat_id FROM `seat` WHERE delete_status = 0 AND screen_id = '.$screen[0]['screen_id'].' ) AND delete_status = 0 ' , $db );

 
            $seats = selectFromTable (' * ', ' seat ', '  screen_id ='.$screen[0]['screen_id'].' AND delete_status = 0 ' , $db );

             

 


    }

} else {
    echo "<script type='text/javascript'>location.href='book1.php'</script>";

}

} else {
    echo "<script type='text/javascript'>location.href='book1.php'</script>";
}


?>
 

 <style type="text/css">
 .sits-state--bkd:before {
  background-color: #64A354 !important;
}

 <?php 

 if(  $seat_type  ) {

    foreach ( $seat_type  as  $colors) {
        echo '

        .sits-price--'.$colors['seat_id'].'::before {
            background-color: '.$colors['color'].';
        }



        ';
    }

 }

 ?>


 </style>
        
        <!-- Main content -->
        <div style="margin-top: 2em;" class="place-form-area">
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="../assets/theme/images/tickets.png">
                    <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                    <div class="order__control">
                        <!-- <a href="book2.html#" class="order__control-btn active">Purchase</a>
                        <a href="book2.html#" class="order__control-btn">Reserve</a> -->
                    </div>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                    <div class="order-step second--step">2. Choose a sit</div>
                </div>
            
            <div class="choose-sits">
                <div class="choose-sits__info choose-sits__info--first">
                    <ul>


                    <li class="sits-price marker--none"><strong>Price</strong></li>

    <?php 

    if(  $seat_type  ) {

       foreach ( $seat_type  as  $colors) {
           echo '

           <li class="sits-price sits-price--'.$colors['seat_id'].'"> <i class="fa fa-inr" aria-hidden="true"></i>
 '.$colors['amount'].'</li>


           ';
       }

    }

    ?> 
                    </ul>
                </div>

                <div class="choose-sits__info">
                    <ul>
                        <li class="sits-state sits-state--not">Not available</li>
                        <li class="sits-state sits-state--your">Your choice</li>
                        <li class="sits-state sits-state--bkd">Others choice</li>
                    </ul>
                </div>
                
                <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                <div class="sits-area hidden-xs">
                    <div class="sits-anchor">screen</div>

                    <div class="sits">
                        <aside class="sits__line">

   <?php 

   if(  $seat_type  ) {
    $firstfirst = false;

      foreach ( $seat_type  as  $colors) {

        if($screen) { 



            $nowx = 0;        
            $nowy = 0;

    $seatsa = selectFromTable ('  MAX(position_x) AS x , MAX(position_y) AS y  ', ' seat ', '  screen_id ='.$screen[0]['screen_id'].' AND delete_status = 0  AND seat_type_id ='.$colors['seat_id']  , $db );

    if($seatsa) {    
        $nowx = max($nowx, $seatsa[0]['x']);
        $nowy = max($nowy, $seatsa[0]['y']); 
    }



    $fvlet = 'A';

            for ($ou=1; $ou <= $nowx ; $ou++) { 
                
                if( 1 == $ou && $firstfirst)
                    echo '<span class="sits__indecator additional-margin">'.$fvlet.'</span>';
                else
                    echo '<span class="sits__indecator">'.$fvlet.'</span>'; 


                $firstfirst =  true;
                $fvlet++;
            }
        }

 
 
      }

   }

   ?> 



                        </aside>






<?php 

if(  $seat_type  ) {

$firstfirst =  false;

$xmaxy = 0;

  foreach ( $seat_type  as  $colors) {

    if($screen) { 


        $nowx = 0;        
        $nowy = 0;

$seatsa = selectFromTable ('  MAX(position_x) AS x , MAX(position_y) AS y  ', ' seat ', '  screen_id ='.$screen[0]['screen_id'].' AND delete_status = 0 AND seat_type_id ='.$colors['seat_id'] , $db );

if($seatsa) {    
    $nowx = max($nowx, $seatsa[0]['x']);
    $nowy = max($nowy, $seatsa[0]['y']); 
    $xmaxy = max($xmaxy ,$nowy );
}


$fvlet = 'A';

        for ($ou=1; $ou <= $nowx ; $ou++) { 
            
            if(1 == $ou && $firstfirst)
                echo '<div class="sits__row additional-margin">';
            else
                echo '<div class="sits__row">'; 


            for ($pu=1; $pu <= $nowy ; $pu++) {  
                $isvalush =  false;
                $isBbuk =  false;
                $thspz = 0;
                foreach ($seats as $seatDGvalue) {

                     if( ($seatDGvalue['position_x'] == $ou) && ($seatDGvalue['position_y'] == $pu )  && ($colors['seat_id'] ==  $seatDGvalue['seat_type_id'] )  ){
                        $isvalush = true;
                        $thspz  = $seatDGvalue['seat_id'];



                        $isHere = selectFromTable ('  * ', ' ticket  ', '  seat_id ='.$seatDGvalue['seat_id'].' AND delete_status = 0 AND schedule_id ='.$schedule['schedule_id'] , $db );                

                        if($isHere){ $isBbuk = true;}

                    }



                 }             
                 if($isvalush ) {
 

                    if($isBbuk){
                        echo '<span data-name="'.$thspz.'" class="sits__place sits-price--'.$colors['seat_id'].' sits-state--not sits-state--bkd" data-place="'.$fvlet.$pu.'" data-price="'.$colors['amount'].'">'.$fvlet.$pu.'</span>';

                    } else{
                        echo '<span data-name="'.$thspz.'" class="sits__place sits-price--'.$colors['seat_id'].'" data-place="'.$fvlet.$pu.'" data-price="'.$colors['amount'].'">'.$fvlet.$pu.'</span>';

                    }
                 



                }
                else
                    echo '<span data-name="'.$thspz.'" class="sits__place sits-price--'.$colors['seat_id'].' sits-state--not" data-place="'.$fvlet.$pu.'" data-price="'.$colors['amount'].'">'.$fvlet.$pu.'</span>';
            }

            $firstfirst =  true;


            $fvlet++;
 
        }












    }
 
  }



}

?> 

 
  







                        <aside class="sits__checked">
                            <div class="checked-place">
                                
                            </div>

                            <div class="checked-result">
                                <i class="fa fa-inr" aria-hidden="true"></i>0
                            </div>
                        </aside>
                        <footer class="sits__number">

<?php

if( isset ($xmaxy) )
    for ($iou=1; $iou <= $xmaxy ; $iou++) { 
        echo '<span class="sits__indecator">'.$iou.'</span>';
    }

?>
 
                        </footer>
                    </div>
                </div>
            </div>
                
            <div class="col-sm-12 visible-xs"> 
                <div class="sits-area--mobile">
                    <div class="sits-area--mobile-wrap">
                        <div class="sits-select">
                            <select name="sorting_item" class="sits__sort sit-row" tabindex="0">
                                    <option value="1" selected='selected'>A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                    <option value="6">F</option>
                                    <option value="7">G</option>
                                    <option value="8">I</option>
                                    <option value="9">J</option>
                                    <option value="10">K</option>
                                    <option value="11">L</option>
                            </select>
 
                            <select name="sorting_item" class="sits__sort sit-number" tabindex="1">
                                    <option value="1" selected='selected'>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                            </select>

                            <a href="book2.html#" class="btn btn-md btn--warning toogle-sits">Choose sit</a>
                        </div>
                    </div>

                    <a href="book2.html#" class="watchlist add-sits-line">Add new sit</a>

                    <aside class="sits__checked">
                            <div class="checked-place">
                                <span class="choosen-place"></span>
                            </div>
                            <div class="checked-result">
                                $0
                            </div>
                    </aside>

                    <img alt="" src="../assets/theme/images/components/sits_mobile.png">
                </div>
            </div>   
                














            <div class="col-sm-12">
                 <h2 class="page-heading text-left">Snacks</h2>
                
                <div class="offers-block">
                     <p class="offer-place">select snacks </p>


<?php

$stmnt="select * from food WHERE delete_status=0 ORDER BY date DESC";
$food  = $db->display( $stmnt);
if( $food ) {

    foreach ($food as   $foodValue) {



          $image =  PATH . '/assets/images/default-1.jpg';

        if (file_exists(  '../uploads'.'/' .$foodValue['image'] ) && !empty($foodValue['image'])) 
          $image =  PATH . '/uploads'.'/' .$foodValue['image'];
        else 
          $image =  PATH . '/assets/images/default-1.jpg';


 

        echo '




        <div data-selected="0" class="col-xs-6 col-sm-4 col-md-3 offers-wrap thisSEleteDfforr"  data-id="'.$foodValue['food_id'].'" >
            <a class="offer offer--winter"  style="background-image: url('.$image.');     background-size: 182px auto; background-repeat: no-repeat;">
               <div class="offer__head">
                    <p class="offer__name">'.$foodValue['name'].'<br></p> 
                </div>
                <p class="offer__name">'.$foodValue['name'].'<br></p>
                <span class="offer__datail"> <i class="fa fa-inr" aria-hidden="true"></i>  '.$foodValue['price'].' </span>
                <p class="offer__full">'.$foodValue['description'].'</p>
            </a>
        </div>






        ';




    }
}

?>


 
 

                 </div>
 
 


            </div>


            </div>
                

            </div>
        </section>
        </div>
        
        

        <div class="clearfix"></div>
        <form id='film-and-time' class="booking-form" method='get' action='book3-buy.html'>

            <input type='text' name='choosen-number' class="choosen-number">
            <input type='text' name='choosen-number--cheap' class="choosen-number--cheap">
            <input type='text' name='choosen-number--middle' class="choosen-number--middle">
            <input type='text' name='choosen-number--expansive' class="choosen-number--expansive">
            <input type='text' name='choosen-cost' class="choosen-cost">
            <input type='text' name='choosen-sits' class="choosen-sits">


            <div class="booking-pagination booking-pagination--margin">
                    <a href="book1.php?movie=<?php if(isset($_POST['choosen-movie'])) echo $_POST['choosen-movie'];?>" class="booking-pagination__prev">
                        <span class="arrow__text arrow--prev">prev step</span>
                        <span class="arrow__info">what&amp;where&amp;when</span>
                    </a>
                    <a  id="toGoToNxtTdg" class="booking-pagination__next">
                        <span class="arrow__text arrow--next">next step</span>
                        <span class="arrow__info">checkout</span>
                    </a>
            </div>
        </form>
        
        <div class="clearfix"></div>


        <form method="post" id="nextPageTobooka" action="book3.php">

            <input type="hidden" name="schedule" value="<?php if( isset($_POST['choosen-schedule']) ){
                    if(strlen($_POST['choosen-schedule']) >0 )
                        echo $_POST['choosen-schedule'];
                } ?>">

            <input type="hidden" name="movie" value="<?php if( isset($_POST['choosen-movie']) ){
                    if(strlen($_POST['choosen-movie']) >0 )
                        echo $_POST['choosen-movie'];
                } ?>">
            <input type="hidden" name="date" value="<?php if( isset($_POST['choosen-date']) ){
                    if(strlen($_POST['choosen-date']) >0 )
                        echo $_POST['choosen-date'];
                } ?>">

                <input id="sendPRrei" type="hidden" name="price" value="0">
        </form>



        
        <script type="text/javascript">
            $(document).ready(function() {
                 init_BookingTwo();

            });
        </script>
        <?php include_once( 'footer.php' ); ?>
 