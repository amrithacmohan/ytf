 <?php include_once( 'header.php' ); 
  
$db = new Database();
$message = array( NULL, NULL);
?>

        <div  style="margin-top: 2em;" >
     
 </div>


 <style type="text/css">
     .atcusdjk45345 {
        width: 50px !important;
        height: 50px !important;
     }
     .score>img {
         width: 20px;
         height: 20px;
     }
     .scorea>img {
         width: 20px;
         height: 20px;
     }
 </style>



<?php
    if(!isset($_GET['id']))
         echo "<script type='text/javascript'>location.href='movies.php'</script>";




    
     if ($_POST) { 
        
        $_SESSION['POST'] =  $_POST; 
        echo "<script type='text/javascript'>location.href='".$_SERVER['REQUEST_URI']."'</script>";
        exit();
     }
     if (isset($_SESSION ['POST'])) {
       $_POST = $_SESSION['POST'];
       unset($_SESSION['POST']);
     }







    
?>


<?php


 

    if (isset($_POST['rate']))
    if (strlen($_POST['rate']) > 0) {


        $userid = null;
        if ($userlogin) {
            $userid = $userlogin[0]['user_id'];
        } else {             

             //   $_SESSION['POST'] =  $_POST; 
              auth_login_public();
        }

        

          $commentid = selectFromTable (' comment_id ', 'comment', ' movie_id ='. $_POST['post-movie'].' AND rate >0 AND user_id='.$userid, $db );


        if($commentid> 0) {

            $array = array(  "rate"  => $_POST['post-rate']  );

            $result  = updateTable ('comment', $array, ' comment_id = '.$commentid , $db );
            if( $result == 1) {
                $message [0] = 1;
                $message [1] = 'rate successfully Updated'; 


                
            }else  {
                $message [0] = 3;
                $message [1] = 'Something is wrong, ensure values are correct ! '; 

            }

        } else {

            $array = array(  "rate"      => $_POST['post-rate']  ,
                             "user_id"      => $userid  ,
                             "movie_id"          => $_POST['post-movie'] );

            $result  = insertInToTable ('comment', $array, $db );
            if( $result == 1) {
                $message [0] = 1;
                $message [1] = 'rate successfully Added'; 


                
            }else  {
                $message [0] = 3;
                $message [1] = 'Something is wrong, ensure values are correct ! '; 

            }

        }





    }


    if (isset($_POST['comment']))
    if (strlen($_POST['comment']) > 0) {



        $userid = null;
        if ($userlogin) {
            $userid = $userlogin[0]['user_id'];
        }

  

                $array = array(  "comment"      => $_POST['comments-msg']  ,
                                 "user_id"      => $userid  ,
                                 "movie_id"          => $_POST['movie'] );

                $result  = insertInToTable ('comment', $array, $db );
                if( $result == 1) {
                    $message [0] = 1;
                    $message [1] = 'comment successfully Added'; 


                    
                }else  {
                    $message [0] = 3;
                    $message [1] = 'Something is wrong, ensure values are correct ! '; 

                }

 





    }

?>




   
  <!-- Main content -->
<section class="container">
      <div class="col-sm-12">
          <div class="movie">

          <div style="margin-top: 2em;">
              
                  <?php echo show_theme_error ($message); ?>
          </div>



                     <?php 





                     $stmnt=" SELECT m.*, mc.type  ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0  ";
 
                             $stmnt=   $stmnt . " AND m.movie_id='" . $_GET['id'] . "' ";
 
                 
  
    $stmnt=   $stmnt . " ORDER BY m.date DESC ";







                     $movie = $db->display( $stmnt);

                     if( $movie ) {


                      $image =  PATH . '/assets/images/default-1.jpg';
  
                       foreach ($movie as $value) {

                            $value['image'] = selectFromTable ('image', 'poster', 'movie_id = '. $value['movie_id'] . ' AND type=1 AND delete_status = 0 LIMIT 1' , $db );
                      
                         if (file_exists(  '../movies/images_/' .$value['image'] ) && !empty($value['image'])) 
                           $image =  PATH . '/movies/images_/' .$value['image'];
                         else 
                           $image =  PATH . '/assets/images/default-1.jpg"  style="width:174px; height:174px;';



                           $avg = selectFromTable ('*', 'comment', 'movie_id = '. $value['movie_id'] . ' AND delete_status = 0' , $db );

      $acrt =0;
      $tot = 0;
      $countcmm = 0;
if($avg)
      foreach ($avg as $avgvalue) {
        $tot+= $avgvalue['rate'];
        if($avgvalue['rate'] > 0)
            $acrt++;

        if( strlen($avgvalue['comment'])>0)
          $countcmm++;
      }

    $per=0.0;
    if($acrt>0)
                           $per = $tot/$acrt;
                           $f = sprintf ("%.1f",$per);
                           $rounded = round($f, 1);
                            

  




 $dfg = selectFromTable ('*', '`schedule` s LEFT JOIN movie m ON m.movie_id = s.movie_id LEFT JOIN show_time st ON s.show_time_id = st.show_id ', 'm.movie_id = '. $value['movie_id'] . ' AND s.delete_status = 0 AND  s.show_date >= CURDATE()' , $db );
 $rtTo = null;
 $showSatea = 0;

 $firsts = true;

 foreach ($dfg as  $valuea) {
   $time_in_24_hour_format  = date("H:i", strtotime($valuea['start_time']));

   $showSate = $valuea['show_date']. ' ' . $time_in_24_hour_format.':00';


  
  $datestr=$showSate;//Your date
  $date=strtotime($datestr); 
  
  $seconds=$date-time(); 

  $valuea['ttime'] = $seconds;


  $days = floor($seconds / 86400);
  $seconds %= 86400;

  $hours = floor($seconds / 3600);
  $seconds %= 3600;

  $minutes = floor($seconds / 60);
  $seconds %= 60;

 $dstime = "";
 if($days>0)
   $dstime = "$days days ";

 if($hours>0)
   $dstime = $dstime  . "$hours hours ";


 if($minutes>0)
   $dstime = $dstime  . "$minutes minutes remains";


  


 if($dstime == "")
   $dstime = " now ";

 $valuea['time_left'] =  $dstime;
    
  
 if ($firsts) {
   $rtTo = $valuea; 
 }


   if ($valuea['ttime'] >=0 && $valuea['ttime'] <= $rtTo['ttime'] ) {
       $rtTo = $valuea; 
   }



   $firsts = false;
 }




 $castin = selectFromTable ('DISTINCT(name) ', ' cast ', 'movie_id = '. $value['movie_id'] . ' AND delete_status = 0 ' , $db );
  

 echo '




 <h2 class="page-heading">'. $value['name'] .'</h2>

 <div class="movie__info">
     <div class="col-sm-4 col-md-3 movie-mobile">
         <div class="movie__images">
             <span class="movie__rating">'.$rounded.'</span>
             <img alt="" src="'.$image.'">
         </div>
         <div class="movie__rate"> vote: 
 

         <div class="scorea scorea-'.$value['movie_id'].'"></div>


         <form id="submitTreree" method="post" action="movie.php?id='.$value['movie_id'].'">
             <input type="hidden" name="post-rate" value="0">
             <input type="hidden" name="post-movie" value="'.$value['movie_id'].'">
             <input type="hidden" name="rate" value="true">
         </form>

         <script type="text/javascript">
             
             $(document).ready(function() {


                 $(".scorea-'.$value['movie_id'].'").raty({
                     width:130, 
                     score: '. $rounded .',
                     path: "../assets/theme/images/rate/",
                     starOff : "star-off.svg",
                     starOn  : "star-on.svg" 
                 });


                 
             });
         </script>


         </div>
     </div>

     <div class="col-sm-8 col-md-9">
         <p class="movie__time">169 min</p>

         <p class="movie__option"><strong>Country: </strong><a  >'. $value['name'] .'</a></p>
         <p class="movie__option"><strong>Year: </strong><a  >'. $value['name'] .'</a></p>
         <p class="movie__option"><strong>Category: </strong><a  >'. $value['name'] .'</a>  </p>
         <p class="movie__option"><strong>Release date: </strong>'. $value['name'] .'</p>
         <p class="movie__option"><strong>Director: </strong><a  >'. $value['name'] .'</a></p>

             <p class="movie__option"><strong class="text-capitalize">Actors: </strong>';

             foreach ($castin as  $castvalue) {
                 echo ' <a >'.$castvalue['name'].'</a>,';
             }
            

             echo '
             </p>

         <p class="movie__option"><strong>Age restriction: </strong><a  >13</a></p>
         <p class="movie__option"><strong>Box office: </strong><a  ><i class="fa fa-inr" aria-hidden="true"></i>'. $value['name'] .'</a></p>

         <a href="movie-page-full.html#" class="comment-link">Comments:  '.$countcmm.'</a>

         <div class="movie__btns movie__btns--full">
             <a href="book1.php?movie='. $value['movie_id'] .'" class="btn btn-md btn--warning">book a ticket for this movie</a>
            <!-- <a href="movie-page-full.html#" class="watchlist">Add to watchlist</a> -->
         </div>

         <div class="share">
           <!--  <span class="share__marker">Share: </span>
             <div class="addthis_toolbox addthis_default_style ">
                 <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                 <a class="addthis_button_tweet"></a>
                 <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
             </div>
             -->
         </div>
     </div>
 </div>
 



     <div class="clearfix"></div>
     
     <h2 class="page-heading">The plot</h2>

     <p class="movie__describe">'. $value['other'] .' </p>

     <h2 class="page-heading">photos <!-- &amp; videos --></h2>
     
     <div class="movie__media">
         <div class="movie__media-switch"><!--
             <a href="movie-page-full.html#" class="watchlist list--photo" data-filter="media-photo">234 photos</a>
             <a href="movie-page-full.html#" class="watchlist list--video" data-filter="media-video">10 videos</a>-->
         </div>

         <div class="swiper-container">
           <div class="swiper-wrapper"> 
               <!-- 
               <div class="swiper-slide media-video">
                 <a href="https://www.youtube.com/watch?v=Kb3ykVYvT4U" class="movie__media-item">
                     <img    src="../assets/theme/images/movie/movie-video2.jpg">
                 </a>
               </div>
                
               <div class="swiper-slide media-photo"> 
                     <a href="../assets/theme/images/movie/movie-img1-lg.jpg" class="movie__media-item">
                         <img     src="../assets/theme/images/movie/movie-img1.jpg">
                      </a>
               </div>
               -->

';





$casts = selectFromTable ('*', 'cast', ' delete_status = 0 AND movie_id ='. $value['movie_id'], $db );

foreach ($casts as  $valuesss) {

    if (file_exists(  '../movies/images_/' .$valuesss['image'] ) && !empty($valuesss['image'])) {


      $image =  PATH . '/movies/images_/' .$value['image'];



      echo '
      <div class="swiper-slide media-photo"> 
            <a href="'.$image.'" class="movie__media-item">
                <img   src="'.$image.'">
             </a>
      </div>

  

      ';

    }
 


}






     echo '    
           </div>
         </div>

     </div>

 </div>








 ';
  



 echo '





 <h2 class="page-heading">showtime &amp; tickets</h2>
 <form id="submintHwere2" method="get" >
 <input type="hidden" name="id" value="'. $value['movie_id'].'">
 <input type="hidden" name="date" value="';
       if(isset($_GET['date']))
         if(strlen($_GET['date']))
             echo $_GET['date'];

       echo '" >
     <div class="datepicker">
       <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
       <input type="text" id="datepicker2" name="date1" value="';
       if(isset($_GET['date']))
         if(strlen($_GET['date']))
             echo $_GET['date'];

       echo '" class="datepicker__input">
     </div>

     </form>

 <!--
     <a href="movie-page-full.html#" id="map-switch" class="watchlist watchlist--map watchlist--map-full"><span class="show-map">Show cinemas on map</span><span  class="show-time">Show cinema time table</span></a>
     -->
     
     <div class="clearfix"></div>


     <div class="time-select">


     ';




     $arrayz = array();

     if(isset($_GET['date']) && (strlen($_GET['date']) > 0) ){

     $dfdg = selectFromTable ('s.*, sr.screen_id, sr.name AS srname, sr.type AS srtype ,st.* ', ' `schedule` s LEFT JOIN screen sr ON s.screen_id = sr.screen_id LEFT JOIN show_time st ON st.show_id = s.show_time_id  ', ' s.movie_id = '. $value['movie_id'] . '  AND s.delete_status = 0 AND  s.show_date = "'. $_GET['date'].'"' , $db );

     foreach ($dfdg as $valuea) { 
        array_push($arrayz,$valuea['screen_id']);

     }
  $arrayz = array_unique($arrayz);
  }


 if($arrayz ){


  

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

                                           //  $nfggg = $valuue1['show_date'].' - '.$valuue1['show_name'];
                                             $nfggg = $valuue1['start_time'];
                                             

                                              $fgjo = strlen($valuue1['show_name']."");
                                             $fgjo =   strlen(  $nfggg )* 9;
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

         <li data-toggle="tooltip" data-placement="top" title="'.$valuue1['show_name'].'" class="time-select__item '.$valuue1['show_name'].$valuue.'" data-time="'.$valuue1['start_time'].'">'.  $nfggg .' </li>
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
    

 
  
echo '
  

    </div>

 
';










                       }


                      

                     }


                      ?>











<?php
 
$comments = selectFromTable (' *, DATE_FORMAT(c.date,"%d-%m-%Y %r") AS ddate ', ' `comment` c LEFT JOIN user u ON u.user_id = c.user_id  ', '   c.delete_status = 0 AND u.delete_status = 0  AND c.movie_id='.$_GET['id'] , $db );
?>



                    
                    <!-- hiden maps with multiple locator-->
                    <div  class="map">
                        <div id='cimenas-map'></div> 
                    </div>

                    <h2 class="page-heading">comments (<?php echo sizeof($comments); ?>)</h2>

                    <div class="comment-wrapper">

<?php
if($userlogin){
?>


                        <form id="comment-form" class="comment-form" method='post'>

                        <input type="hidden" name="movie" value="<?php
                        echo $_GET['id'];

                        ?>">


                            <textarea name="comments-msg" class="comment-form__text" placeholder='Add you comment here' required="required"></textarea>
                            <!-- <label class="comment-form__info">250 characters left</label> -->
                            <button type='submit' name="comment" value="comments" class="btn btn-md btn--danger comment-form__btn">add comment</button>
                        </form>


    <?php
}
    ?>

                        <div class="comment-sets">

<?php 
    
    foreach ($comments as $commentsValue) {

        if (file_exists(  '../user/images_/' .$commentsValue['image'] ) && !empty($commentsValue['image'])) 
          $image =  PATH . '/user/images_/' .$commentsValue['image'];
        else 
          $image =  PATH . '/assets/images/default-1.jpg"  style="width:174px; height:174px;';


      echo '



      <div class="comment">
          <div class="comment__images">
              <img alt="" class="img-responsive atcusdjk45345" src="'.$image .'" style="width:50px; height:50px;">
          </div>

          <a href="###" class="comment__author"> </span>'.$commentsValue['name'].'</a>
          <p class="comment__date">'.$commentsValue['ddate'].'</p>
          <p class="comment__message">'.$commentsValue['comment'].'</p>
         <!-- <a href="movie-page-full.html#" class="comment__reply">Reply</a> -->
      </div>

      ';







    }

 ?>

  
                        </div>

                        <div class="comment-more">
                            <!-- <a href="movie-page-full.html#" class="watchlist">Show more comments</a> -->
                        </div>

                    </div>
                    </div>




                </div>
            </div>

        </section>
        
        <div class="clearfix"></div>



        <?php
         $here  = 5;
        ?>

        <script type="text/javascript">
        
            $(document).ready(function() {
                

                thizAxtualTz();
                init_MoviePage();
                 init_MoviePageFull();

            });
        </script>
        <?php include_once( 'footer.php' ); ?>

 