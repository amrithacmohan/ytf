<?php include_once( 'header.php' ); 

auth_login_public();

$db = new Database();
$message = array( NULL, NULL);
?>

 <div  style="margin-top: 2em;" >
     
 </div>
        
        <!-- Main content -->

        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="../assets/theme/images/tickets.png">
                    <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                    <div class="order__control"><!-- 
                        <a href="book1.html#" class="order__control-btn active">Purchase</a>
                        <a href="book1.html#" class="order__control-btn">Reserve</a> -->
                    </div>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step">1. What &amp; Where &amp; When</div>
                </div>

            <h2 class="page-heading heading--outcontainer">Choose a movie</h2>
        </section>
        
        <div class="choose-film">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                  <!--First Slide-->



                                   <?php 





                                   $stmnt=" SELECT m.*, mc.type  ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0   ORDER BY m.date DESC ";







                                   $movie = $db->display( $stmnt);

                                   if( $movie ) {


                                    $image =  PATH . '/assets/images/default-1.jpg';
                  
                                     foreach ($movie as $value) {

                                          $value['image'] = selectFromTable ('image', 'poster', 'movie_id = '. $value['movie_id'] . ' AND type=1 AND delete_status = 0 LIMIT 1' , $db );
                                    
                                       if (file_exists(  '../movies/images_/' .$value['image'] ) && !empty($value['image'])) 
                                         $image =  PATH . '/movies/images_/' .$value['image'];
                                       else 
                                         $image =  PATH . '/assets/images/default-1.jpg"  style="width:174px; height:174px;';



                                     echo '

                                     <div class="swiper-slide" data-film="'.$value['name'].'"  data-id="'.$value['movie_id'].'"> 
                                           <div class="film-images  ">
                                               <img alt="" src="'.$image .'">
                                           </div>
                                           <p class="choose-film__title" >'.$value['name'].'</p>
                                     </div>


                                     ';


                                 }





                             }




?>




 
              </div>
            </div>
        </div>
<?php

if(isset($_GET['movie']))
   if(strlen($_GET['movie']."") > 0)
            echo ' <script type="text/javascript">
                    $(document).ready( function() { 

                        setTimeout( function() {
 
                           $(".swiper-slide").each(function() {
                               if($(this).attr(\'data-id\') == '.$_GET['movie'].') {     

                                            $(\'.film-images\').removeClass(\'film--choosed\');
                                            $(this).children(\'.film-images\').addClass(\'film--choosed\'); 


                                            var chooseFilm = $(this).attr(\'data-film\');
                                            $(\'.choose-indector--film\').find(\'.choosen-area\').text(chooseFilm);


                               }


                           });

                           }, 1000 );

                    });
                </script>
               ';

?>


<form id="submintHwere1">
    <input type="hidden" name="movie" value="<?php  

    if(isset($_GET['movie']))
       if(strlen($_GET['movie']."") > 0)
            echo $_GET['movie'];
     ?>">
    <input type="hidden" name="date">
</form>

 
        <section class="container">
            <div class="col-sm-12">
                <div class="choose-indector choose-indector--film">
                <form method="get" id="slectthemovie">
                    <input type="hidden" name="movie">
                </form>
                    <strong>Choosen: </strong><span class="choosen-area"></span>
                </div>

                <h2 class="page-heading">  Date</h2>

                <div class="choose-container choose-container--short">
                   
                    <div class="datepicker">
                      <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                      <input type="text" id="datepicker1" value="<?php 



                          if(isset($_GET['date']))
                             if(strlen($_GET['date']."") > 0)
                                  echo $_GET['date'];
                        



                      ?>" class="datepicker__input">
                    </div>
                </div>



<?php

    if(isset($_GET['date']) && isset($_GET['movie']))
        if(strlen($_GET['movie']."") > 0 && strlen($_GET['date']."") > 0) {

?>







                <h2 class="page-heading">Pick time</h2>

                <div class="time-select time-select--wide">




<?php


    $arrayz = array();
    $dfdg = selectFromTable ('s.*, sr.screen_id, sr.name AS srname, sr.type AS srtype ,st.* ', ' `schedule` s LEFT JOIN screen sr ON s.screen_id = sr.screen_id LEFT JOIN show_time st ON st.show_id = s.show_time_id  ', ' s.movie_id = '. $_GET['movie'] . '  AND s.delete_status = 0 AND  s.show_date >= CURDATE() AND s.show_date="'.$_GET['date'].'"' , $db );


if($dfdg)
    foreach ($dfdg as $valuea) { 
       array_push($arrayz,$valuea['screen_id']);

    }
 $arrayz = array_unique($arrayz);
 


if($arrayz){


 

        foreach ($arrayz as $valuue) {

$vgffg = null;
            foreach ($dfdg as $valuea) {
               if($valuue == $valuea['screen_id'])
                $vgffg = $valuea;
            }
        

        if($vgffg){ 

                        echo '
                                <div class="time-select__group group--first">
                                    <div class="col-sm-4">
                                        <p class="time-select__place">'.$vgffg['srname'].'-<small>'.$vgffg['srtype'].'</small></p>
                                    </div>
                                    <ul class="col-sm-8 items-wrap">';


                                    foreach ($dfdg as $valuue1) { 

                                        if ($valuue1['screen_id'] == $valuue) {

                                            $nfggg = $valuue1['show_date'].' - '.$valuue1['show_name'];
                                            

                                             $fgjo = strlen($valuue1['show_name']."");
                                            $fgjo =   strlen(  $nfggg )* 7;
                                            $fgjos = $fgjo / 5;
                                            echo '
<style type="text/css">
    .time-select .'.$valuue1['show_name'].$valuue.'.time-select__item:before { 
        width: '; 
        echo $fgjo ;
        echo 'px; 
    }


    .time-select .'.$valuue1['show_name'].$valuue.'.time-select__item { 
        

        padding: 9px '.$fgjos.'px 8px 14px;
    }
 
</style>
';
 
        echo '

        <li data-toggle="tooltip" data-placement="top" title="'.$valuue1['start_time'].'" class="time-select__item '.$valuue1['show_name'].$valuue.'" data-time="'.$valuue1['start_time'].'"  data-id="'.$valuue1['schedule_id'].'">'.  $nfggg .' </li>
        ';
                                        }



                                    }






            echo '

                                    </ul>
                                </div>

                        ';




}









        }







}
   






?>

  
 
 
                    </div>


<?php

} else {

    echo ' <div style="margin:2em;" ></div>';
}
else echo ' <div style="margin:2em;" ></div>';

?>



                <div class="choose-indector choose-indector--time">
                    <strong>Choosen: </strong><span class="choosen-area"></span>
                </div>
            </div>

        </section>

        <div class="clearfix"></div>


<?php
    if(isset($_GET['date']) && isset($_GET['movie']))
        if(strlen($_GET['movie']."") > 0 && strlen($_GET['date']."") > 0) {


?>


        <form id='film-and-timeds' class="booking-form" method='post' action='book2.php'>
            <input type='text' name='choosen-schedule' class="choosen-movie">

            <input type='text' name='choosen-movie' class="choosen-movie"  value="<?php echo $_GET['movie'] ?>">
            <input type='text' name='choosen-date' class="choosen-date"  value="<?php echo $_GET['date'] ?>">
             

            <div class="booking-pagination">
                    <a href="book1.html#" class="booking-pagination__prev hide--arrow">
                        <span class="arrow__text arrow--prev"></span>
                        <span class="arrow__info"></span>
                    </a>
                    <a id="actionActzActual" class="booking-pagination__next">
                        <span class="arrow__text arrow--next">next step</span>
                        <span class="arrow__info">choose a sit</span>
                    </a>
            </div>

        </form>
        

<?php
}
?>






        <div class="clearfix"></div>



<?php
 $here  = 1;
?>


<style type="text/css">
    


</style>



     
        <script type="text/javascript">
            $(document).ready(function() {
                init_BookingOne();
            });
        </script>
                
        <?php include_once( 'footer.php' ); ?>
 