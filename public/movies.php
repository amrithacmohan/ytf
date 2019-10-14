<?php include_once( 'header.php' ); 

$db = new Database();
$message = array( NULL, NULL);
?>

<style type="text/css">
    
.select2.select2-container.select2-container--default {
    width: 100% !important;
}

</style>
        
        <!-- Main content -->
        <section class="container">
            <div class="col-sm-12">
                <h2 class="page-heading">Movies</h2>
                
                <div class="select-area">
                    <form class="select" method='get'>
                          <select   onchange="this.form.submit()"  name="language"  id="language" class="select__sort" tabindex="0">
                          <option value="" selected="selected"  >language</option>

  <?php

  $stmnt="SELECT DISTINCT(language) FROM `movie` WHERE delete_status = 0 ORDER BY language";
  $language = $db->display( $stmnt);
  if( $language ) {

  
    foreach ($language as $value) {
   
      echo '<option value="'.$value['language'].'"  ';
if(isset($_GET['language']))
      if($_GET['language'] == $value['language'] ) {
        echo ' selected="selected" ';
      }

      echo '   >'.$value['language'].'</option>';

    }
   




    }  ?>


 
                        </select>
                    </form>




 


                    <div class="datepicker">
                      <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                      <input type="text" name="date" id="datepicker" value='<?php  


                      if(isset($_GET['date'])) 
                              echo $_GET['date']; 


                       ?>' class="datepicker__input">
                    </div>








                    <form class="select select--cinema" method='get'>
                          <select   onchange="this.form.submit()"  id="category"  name="category" class="select__sort" tabindex="0">

                          <option value="" selected='selected'   >category</option>

          <?php

          $stmnt="SELECT DISTINCT(type), category_id FROM `movie_category` WHERE delete_status = 0 ORDER BY type";
          $type = $db->display( $stmnt);
          if( $type ) {

          
            foreach ($type as $value) {
           
              echo ' <option value="'.$value['category_id'].'"  ';
if(isset($_GET['category']))
      if($_GET['category'] == $value['category_id'] ) {
        echo ' selected="selected" ';
      }

      echo ' >'.$value['type'].'</option>';

            }
           




            }  ?>


 
                        </select>
                    </form>

                    <form class="select select--film-category" method='get'>
                          <select name="director"  id="director" class="select__sort" tabindex="0">

                          <option value="" selected='selected'   >director</option>
          <?php

          $stmnt="SELECT DISTINCT(director) FROM `movie` WHERE delete_status = 0 ORDER BY director";
          $director = $db->display( $stmnt);
          if( $director ) {

          
            foreach ($director as $value) {
           
              echo '<option value="'.$value['director'].'"  ';
if(isset($_GET['director']))
      if($_GET['director'] == $value['director'] ) {
        echo ' selected="selected" ';
      }

      echo ' >'.$value['director'].'</option>';

            }
           




            }  ?>



 
                        </select>
                    </form>

                    <a class="btn btn-sx"   style="margin-bottom: 30px;"  href="movies.php">clear</a>
                </div>


<form method="get" id="submintHwere">
    <input type="hidden" name="language">
    <input type="hidden" name="date">
    <input type="hidden" name="category">
    <input type="hidden" name="director">
    
</form>






     <!--             <div class="tags-area">
                    <div class="tags tags--unmarked">
                        <span class="tags__label">Sorted by:</span>
                            <ul>
                                <li class="item-wrap"><a href="movie-list-full.html#" class="tags__item item-active" data-filter='all'>all</a></li>
                                <li class="item-wrap"><a href="movie-list-full.html#" class="tags__item" data-filter='release'>release date</a></li>
                                <li class="item-wrap"><a href="movie-list-full.html#" class="tags__item" data-filter='popularity'>popularity</a></li>
                                <li class="item-wrap"><a href="movie-list-full.html#" class="tags__item" data-filter='comments'>comments</a></li>
                                <li class="item-wrap"><a href="movie-list-full.html#" class="tags__item" data-filter='ending'>ending soon</a></li>
                            </ul>
                    </div>
                </div>
                
 -->




<style type="text/css">
    
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





                    $stmnt=" SELECT m.*, mc.type  ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0  ";

                    if(isset($_GET['language']))
                        if(strlen($_GET['language'])>0)
                            $stmnt=   $stmnt . " AND m.language='" . $_GET['language'] . "' ";

                    if(isset($_GET['category']))
                        if(strlen($_GET['category'])>0)
                            $stmnt=   $stmnt . " AND m.movie_category_id=" . $_GET['category'] . " ";

                    if(isset($_GET['director']))
                        if(strlen($_GET['director'])>0)
                            $stmnt=   $stmnt . " AND m.director='" . $_GET['director'] . "' ";

                    if(isset($_GET['date']))
                        if(strlen($_GET['date'])>0){


                            $stmnt=" SELECT m.*, mc.type  ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() AND show_date='" . $_GET['date'] . "' ) AND  m.delete_status = 0  ";

                        }

                
 
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


     $per = 0;
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











<!-- Movie preview item -->
<div class="movie movie--preview movie--full release">
     <div class="col-sm-3 col-md-2 col-lg-2">
            <div class="movie__images">
                <img alt="" src="'.$image.'">
            </div>
            <div class="movie__feature hidden">
                <a href="movie-list-full.html#" class="movie__feature-item movie__feature--comment">123</a>
                <a href="movie-list-full.html#" class="movie__feature-item movie__feature--video">7</a>
                <a href="movie-list-full.html#" class="movie__feature-item movie__feature--photo">352</a>
            </div>
    </div>

    <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
            <a href="movie.php?id='. $value['movie_id'] .'" class="movie__title link--huge">'. $value['name'] .'</a>

            <p class="movie__time">'.$rtTo['time_left'].'</p>

            <p class="movie__option"><strong class="text-capitalize">language: </strong><a href="movies.php?language='.$value['language'].'">'.$value['language'].'</a></p>



            <p class="movie__option"><strong class="text-capitalize">category: </strong><a href="movies.php?category='.$value['movie_category_id'].'">'.$value['type'].'</a></p>



            <p class="movie__option"><strong class="text-capitalize">director: </strong><a href="movies.php?director='.$value['director'].'">'.$value['director'].'</a></p>

            <p class="movie__option"><strong class="text-capitalize">writer: </strong><a >'.$value['writer'].'</a></p>

            <p class="movie__option"><strong class="text-capitalize">producers: </strong><a >'.$value['producers'].'</a></p>



 
            <p class="movie__option"><strong class="text-capitalize">music director: </strong><a >'.$value['music_director'].'</a></p>

 
            <p class="movie__option"><strong class="text-capitalize">singers: </strong><a >'.$value['singers'].'</a></p>

 
            <p class="movie__option"><strong class="text-capitalize">cinematographer: </strong><a >'.$value['cinematographer'].'</a></p>

 
            <p class="movie__option"><strong class="text-capitalize">production: </strong><a >'.$value['production'].'</a></p>

 





            <p class="movie__option"><strong class="text-capitalize">Actors: </strong>';

            foreach ($castin as  $castvalue) {
                echo ' <a >'.$castvalue['name'].'</a>,';
            }
           

            echo '
            </p>


            <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

            <div class="movie__btns">
                <a href="book1.php?movie='.$value['movie_id'].'" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this movie</span></a>
                <a href="movie-list-full.html#" class="watchlist hidden">Add to watchlist</a>
            </div>

            <div class="preview-footer">
                <div class="movie__rate">




                <div class="scorea scorea-'.$value['movie_id'].'"></div>



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



                <span class="movie__rate-number">'.$countcmm.' votes</span> <span class="movie__rating">'. $rounded .'</span></div>
                

                <a href="movie-list-full.html#" class="movie__show-btn">Showtime</a>
            </div>
    </div>

    <div class="clearfix"></div>
    
    <!-- Time table (choose film start time)-->
    <div class="time-select">';
 
    $arrayz = array();
    $dfdg = selectFromTable ('s.*, sr.screen_id, sr.name AS srname, sr.type AS srtype ,st.* ', ' `schedule` s LEFT JOIN screen sr ON s.screen_id = sr.screen_id LEFT JOIN show_time st ON st.show_id = s.show_time_id  ', ' s.movie_id = '. $value['movie_id'] . '  AND s.delete_status = 0 AND  s.show_date >= CURDATE()' , $db );


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

        <li data-toggle="tooltip" data-placement="top" title="'.$valuue1['start_time'].'" class="time-select__item '.$valuue1['show_name'].$valuue.'" data-time="'.$valuue1['start_time'].'">'.  $nfggg .' </li>
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
   

















foreach ($dfdg as  $oneValue) {


        $dfdg1 = selectFromTable ('*', '`screen`  ', 'screen_id = '. $oneValue['screen_id'] . ' AND delete_status = 0  ' , $db );
        if($dfdg1) {

        }



     $dfdg2 = selectFromTable ('*', '`show_time`  ', 'show_id = '. $oneValue['show_time_id'] . ' AND delete_status = 0  ' , $db );
     
     foreach ($dfdg2 as  $oneValue2) {

       
     }


        foreach ($dfdg1 as  $oneValue1) {



            




        }






}





echo '
    </div>
    <!-- end time table-->

</div>
<!-- end movie preview item -->
















';














                      }


                     

                    }


                     ?>





















 

     








        <script type="text/javascript">
            

            $(document).ready(function() { 
              
                init_MovieList();
            });



        </script>

        
<?php include_once( 'footer.php' ); ?>