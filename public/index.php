<?php include_once( 'header.php' ); 

$db = new Database();
$message = array( NULL, NULL);
?>


<style type="text/css">
  #loading-container img {
      width: 100%;
      height: 100%;
      margin-top: 30px;
  }

  .movie .movie__rate .scorea {
    display: inline-block;
    padding-left: 15px;
  }


  .movie--preview .movie__rate .scorea {
    padding-left: 0;
    margin-bottom: 1px;
  }


  .movie--test .movie__rate .scorea {
    position: absolute;
    top: 2px;
    left: 0;
  }
  .movie--test .movie__rate .scorea img {
  width: 15px;
}

</style>

        <!-- Slider -->
            <div class="bannercontainer">
                    <div class="banner">
                        <ul>

                            <li data-transition="fade" data-slotamount="7" class="slide" data-slide='Rush.'>
                                <img alt='' src="../assets/theme/images/slides/first-slide.jpg">
                                <div class="caption slide__name margin-slider" 
                                     data-x="right" 
                                     data-y="80" 

                                     data-splitin="chars"
                                     data-elementdelay="0.1"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"

                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"

                                    data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "


                                    data-splitout="lines"
                                    data-endelementdelay="0.1"
                                    data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"

                                    data-endspeed="500"
                                    data-end="8400"
                                    data-endeasing="Back.easeIn"
                                     >
                                    RUSH
                                </div>

                                <div class="caption slide__time margin-slider sfr str" 
                                     data-x="right" 
                                     data-hoffset='-243' 
                                     data-y="186" 
                                     data-speed="300" 
                                     data-start="2100" 
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     data-end="8700"
                                     data-endeasing="Back.easeIn"
                                     >
                                     
                                 </div>
                                <div class="caption slide__date margin-slider lfb ltb" 
                                     data-x="right" 
                                     data-hoffset='-149' 
                                     data-y="186" 
                                     data-speed="500" 
                                     data-start="2400" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     data-end="8200"
                                     data-endeasing="Back.easeIn"
                                     >
                                     
                                 </div>
                                <div class="caption slide__time margin-slider sfr str" 
                                     data-x="right" 
                                     data-hoffset='-113' 
                                     data-y="186" 
                                     data-speed="300" 
                                     data-start="2100" 
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     data-end="8700"
                                     data-endeasing="Back.easeIn"
                                     >
                                     
                                 </div>
                                <div class="caption slide__date margin-slider lfb ltb" 
                                     data-x="right" 
                                     data-y="186" 
                                     data-speed="500" 
                                     data-start="2800" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     data-end="8200"
                                     data-endeasing="Back.easeIn"
                                     >
                                    
                                 </div>
                                <div class="caption slide__text margin-slider customin customout" 
                                     data-x="right" 
                                     data-y="250"
                                     data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                     data-speed="400" 
                                     data-start="3000"
                                     data-endspeed="400"
                                     data-end="8000"
                                     data-endeasing="Back.easeIn">
                                     Two-time Academy Award winner Ron Howard, teams once again with fellow two-time Academy<br> Award nominee, writer Peter Morgan , on Rush, a spectacular big-screen re-creation of the merciless<br> 1970s rivalry between James Hunt and Niki Lauda.
                                 </div>
                                <div class="caption margin-slider skewfromright customout " 
                                     data-x="right" 
                                     data-y="324"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="400" 
                                     data-start="3300"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-end="7700"
                                     data-endeasing="Power4.easeOut">
                                     <a href="index.html#" class="slide__link">check out cinemas &amp; time</a>
                                 </div>
                            </li>

                            <li data-transition="fade" data-slotamount="7" class="slide fading-slide" data-slide='Travel worldwide.
Create trip film.'>
                                <img alt='' src="../assets/theme/images/bg-video.jpg">
                                 <div class="caption slide__video" data-x="0" data-y="0" data-autoplay='true'>
                                   <video class="media-element"  autoplay="autoplay" preload='none' loop="loop" muted="" src="../assets/theme/video/Travells.mp4" >
                                        <source type="../assets/theme/video/webm" src="../assets/theme/video/Travells.webm">
                                        <source type="../assets/theme/video/mp4" src="../assets/theme/video/Travells.mp4">
                                        <source type="../assets/theme/video/ogg" src="../assets/theme/video/Travells.ogv">
                                    </video>
                                  </div>

                                  <div class="caption slide__name slide__name--smaller" 
                                     data-x="left" 
                                     data-y="160" 

                                     data-splitin="chars"
                                     data-elementdelay="0.1"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"

                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"

                                    data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "


                                    data-splitout="lines"
                                    data-endelementdelay="0.1"
                                    data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"
                                    data-endspeed="500"
                                   
                                    data-endeasing="Back.easeIn"
                                     >
                                    View, Book,Watch.
                                </div>

                                <div class="caption slide__time position-center postion-place--one sfr stl" 
                                     data-x="left" 
                                      
                                     data-y="242" 
                                     data-speed="300" 
                                     data-start="2100" 
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     
                                     data-endeasing="Back.easeIn">
                                     
                                 </div>
                                <div class="caption slide__date position-center postion-place--two lfb ltb" 
                                     data-x="left"                                       
                                     data-y="242" 
                                     data-speed="500" 
                                     data-start="2400" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     
                                     data-endeasing="Back.easeIn">
                                     PICKMYTICKETS
                                 </div>
                                <div class="caption slide__time position-center postion-place--three sfr stl" 
                                     data-x="left" 
                                     data-y="242" 
                                     data-speed="300" 
                                     data-start="2100" 
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     
                                     data-endeasing="Back.easeIn">
                                     
                                 </div>
                                <div class="caption slide__date position-center postion-place--four lfb ltb" 
                                     data-x="left"
                                     data-y="242" 
                                     data-speed="500" 
                                     data-start="2800" 
                                     data-easing="Power4.easeOut" 
                                     data-endspeed="400"
                                     
                                     data-endeasing="Back.easeIn">
                                     
                                 </div>

                                 <div class="caption lfb slider-wrap-btn ltb" 
                                     data-x="left"
                                     data-y="310" 
                                     data-speed="400" 
                                     data-start="3300" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="500"
                                     
                                     data-endeasing="Power4.easeOut" >
                                     <!-- <a href="index.html#" class="btn btn-md btn--danger btn--wide slider--btn">learn more</a> -->
                                 </div>
                            </li>

                            <li data-transition="fade" data-slotamount="7" class="slide" data-slide='Stop wishing. 
Start doing.'>
                                <img alt='' src="../assets/theme/images/slides/next-slide.jpg">
                                 <div class="caption slide__name slide__name--smaller slide__name--specific customin customout" 
                                     data-x="left" 
                                     data-y="160" 

                                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"
                                     data-endspeed="500"
                                     data-end="8600"
                                     data-endeasing="Back.easeIn"

                                     >
                                    Stop <span class="highlight">wishing.</span> Start <span class="highlight">doing.</span> 
                                </div>

                                  <div class="caption slide__descript customin customout" 
                                     data-x="left" 
                                     data-y="240"
                                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                     data-speed="700" 
                                     data-start="2000"
                                     data-endspeed="500"
                                     data-end="8400"
                                     data-endeasing="Back.easeIn">
                                     find your best match movie with PICMYTICKETS.COM
                                 </div>

                                 <div class="caption lfb customout slider-wrap-btn" 
                                     data-x="left" 
                                     data-y="310" 
                                     data-speed="500" 
                                     data-start="2800" 
                                     data-easing="Power4.easeOut"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                     data-endspeed="400"
                                     data-end="8000"
                                     data-endeasing="Power4.easeOut" >
                                     <!-- <a href="index.html#" class="btn btn-md btn--danger slider--btn">check out movies</a> -->
                                 </div>
                            </li>

                        </ul>
                    </div>
                </div>

        <!--end slider -->
        







        
        <!-- Main content -->
        <section class="container">
            <div class="movie-best">
                 <div class="col-sm-10 col-sm-offset-1 movie-best__rating">Today Best choice</div>





                 <div class="col-sm-12 change--col">



<?php 




// $stmnt=" SELECT  m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date  , p.image    FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id LEFT JOIN poster p ON p.movie_id = m.movie_id  WHERE  m.delete_status = 0 AND p.type = 1 ORDER BY m.date DESC LIMIT 6";

$stmnt=" SELECT m.movie_category_id,  sh.schedule_id,  m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date   , p.image    FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id  LEFT JOIN schedule sh ON sh.movie_id = m.movie_id LEFT JOIN poster p ON p.movie_id = m.movie_id  WHERE sh.schedule_id IS NOT NULL AND sh.show_date >= CURDATE() AND  m.delete_status = 0 AND p.type = 1  ORDER BY m.date DESC LIMIT 6";


$movie = $db->display( $stmnt);

if( $movie ) {
  $getmovie = null;
  foreach ($movie as $value) {}


    $userdupe=array();

    foreach ($movie as $index=>$t) {
        if (isset($userdupe[$t["movie_id"]])) {
            unset($movie[$index]);
            continue;
        }
        $userdupe[$t["movie_id"]]=true;
    }





 $image =  PATH . '/assets/images/default-1.jpg';
  foreach ($movie as $value) {
 
    if (file_exists(  '../movies/images_/' .$value['image'] ) && !empty($value['image'])) 
      $image =  PATH . '/movies/images_/' .$value['image'];
    else 
      $image =  PATH . '/assets/images/default-1.jpg';



     echo  $avg = selectFromTable ('*', 'comment', 'movie_id = '. $value['movie_id'] . ' AND delete_status = 0' , $db );

     
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
 $per =0.0;
 if($acrt>0)
      $per = $tot/$acrt;
      $f = sprintf ("%.1f",$per);
      $rounded = round($f, 1);
       



    echo '<div class="movie-beta__item "> 
    <img    src="'.$image.'">
        <span class="best-rate">'. $rounded .'</span>

        <ul class="movie-beta__info" style="width:100%">
            <li><span class="best-voted">'. $value['name'] .'</span></li>
            <li>
               <!-- <p class="movie__time">169 min</p> -->
               <p>'.$value['type'].'</p>';

                  if($countcmm >0)
               echo '<p>'.$countcmm.' comments</p>';

               echo '
            </li>
            <li class="last-block">
                <a href="movie.php?id='.$value['movie_id'].'" class="slide__link">more</a>
            </li>
        </ul>
    </div>

    ';



  }


 

}


 ?>










 




                 </div>











                <div class="col-sm-10 col-sm-offset-1 movie-best__check">check all movies now playing</div>
            </div>

            <div class="col-sm-12">
                <div class="mega-select-present mega-select-top mega-select--full">
                   



                    <div class="mega-select-marker">
                        <div class="marker-indecator location">
                            <p class="select-marker"><span>movie to watch now</span> <br>in language</p>
                        </div>
 

                        <div class="marker-indecator film-category">
                            <p class="select-marker"><span>find movie due to </span> <br> your mood</p>
                        </div>

                        <div class="marker-indecator actors">
                            <p class="select-marker"><span> like particular stars</span> <br>find them</p>
                        </div>

                        <div class="marker-indecator director">
                            <p class="select-marker"><span>admire personalities - find </span> <br>by director</p>
                        </div>

                        <div class="marker-indecator country">
                            <p class="select-marker"><span>search for movie from certain </span> <br>writer</p>
                        </div>
                    </div>



                      <div class="mega-select pull-right">
                          <span class="mega-select__point">Search by</span>
                          <ul class="mega-select__sort">


 

                              <li class="filter-wrap"><a href="index.html#" class="mega-select__filter <?php  if(isset($_GET['type'])){ if($_GET['type'] == "language") echo"filter--active"; 


if($_GET['type'] != "language"  &&  $_GET['type'] != "category"  &&  $_GET['type'] != "cast"  && $_GET['type'] != "director"  &&  $_GET['type'] != "writer")
   echo"filter--active";


                              } else echo"filter--active"; ?>" data-filter='location'>Language</a></li> 

                              <li class="filter-wrap"><a href="index.html#" class="mega-select__filter <?php  if(isset($_GET['type'])) if($_GET['type'] == "category") echo"filter--active";  ?>" data-filter='film-category'>Category</a></li>
                              <li class="filter-wrap"><a href="index.html#" class="mega-select__filter <?php  if(isset($_GET['type'])) if($_GET['type'] == "cast") echo"filter--active";  ?>" data-filter='actors'>Actors</a></li>
                              <li class="filter-wrap"><a href="index.html#" class="mega-select__filter <?php  if(isset($_GET['type'])) if($_GET['type'] == "director") echo"filter--active";  ?>" data-filter='director'>Director</a></li>
                              <li class="filter-wrap"><a href="index.html#" class="mega-select__filter <?php  if(isset($_GET['type'])) if($_GET['type'] == "writer") echo"filter--active";  ?>" data-filter='country'>Writer</a></li>
                          </ul>

                          <input id="hreartest5" name="search-input" type='text' class="select__field" value="<?php

                          if(isset($_GET['type']))
                          if($_GET['type'] != "language"  &&  $_GET['type'] != "category"  &&  $_GET['type'] != "cast"  && $_GET['type'] != "director"  &&  $_GET['type'] != "writer")
                            
                            echo "";
                           else
                             if(isset($_GET['value']))
                               echo $_GET['value'];



                          ?>">
                          
                          <div class="select__btn">
                            <a id="findby1"    class="btn btn-md btn--danger location">find <span class="hidden-exrtasm">your Language</span></a> 
                            <a id="findby2"   class="btn btn-md btn--danger film-category">find <span class="hidden-exrtasm">best category</span></a>
                            <a id="findby3"  class="btn btn-md btn--danger actors">find <span class="hidden-exrtasm">talented actors</span></a>
                            <a id="findby4"   class="btn btn-md btn--danger director">find <span class="hidden-exrtasm">favorite director</span></a>
                            <a  id="findby5"   class="btn btn-md btn--danger country">find <span class="hidden-exrtasm">produced writer</span></a>
                          </div>

                          <form>
 
                                                    <input type="hidden" name="search" id="value_here21">   
                                                    <input type="hidden" name="value" id="value_here22">  
                                                    <input type="hidden" name="type" id="value_here23">  
                                                    </form>

                          <div class="select__dropdowns">
                              <ul class="select__group location">
              <?php

              $stmnt="SELECT DISTINCT(language) FROM `movie` WHERE delete_status = 0 ORDER BY language";
              $language = $db->display( $stmnt);
              if( $language ) {

 
                foreach ($language as $value) {
              
                  echo ' <li class="select__variant" data-value="'.$value['language'].'">'.$value['language'].'</li>';

                }
               




                }  ?>


 
                                
                              </ul>

                              <ul class="select__group film-category">

          <?php

          $stmnt="SELECT DISTINCT(type), category_id FROM `movie_category` WHERE delete_status = 0 ORDER BY type";
          $type = $db->display( $stmnt);
          if( $type ) {

          
            foreach ($type as $value) {
          
              echo ' <li class="select__variant" data-value="'.$value['category_id'].'">'.$value['type'].'</li>'; 

            }
           




            }  ?>



                              </ul>

                        
                              <ul class="select__group actors">

          <?php

          $stmnt="SELECT DISTINCT(name) FROM `cast` WHERE position ='leading actor' AND delete_status = 0 ORDER BY name";
          $cast = $db->display( $stmnt);
          if( $cast ) {

          
            foreach ($cast as $value) {
          
              echo ' <li class="select__variant" data-value="'.$value['name'].'">'.$value['name'].'</li>'; 

            }
           




            }  ?>

 


                              </ul>

                              <ul class="select__group director">


              <?php

              $stmnt="SELECT DISTINCT(director) FROM `movie` WHERE delete_status = 0 ORDER BY director";
              $director = $db->display( $stmnt);
              if( $director ) {

              
                foreach ($director as $value) {
              
                  echo ' <li class="select__variant" data-value="'.$value['director'].'">'.$value['director'].'</li>';

                }
               




                }  ?>




                         
                              </ul>

                              <ul class="select__group country">


              <?php

              $stmnt="SELECT DISTINCT(writer) FROM `movie` WHERE delete_status = 0 ORDER BY writer";
              $writer = $db->display( $stmnt);
              if( $writer ) {

              
                foreach ($writer as $value) {
              
                  echo ' <li class="select__variant" data-value="'.$value['writer'].'">'.$value['writer'].'</li>';

                }
               




                }  ?>






                              </ul>
                          </div>
                      </div>



                  </div>
            </div>
            
            <div class="clearfix"></div>


            <?php
            $sty = "Now in the  ";
if (isset($_GET['type'])) {
  $sty  = $sty  . $_GET['type'];

  if(isset($_GET['value']))
        $sty  = $sty  . " by `" . $_GET['value'] ."` ";

} else {
  $sty  = $sty  . "cinema";
}
 
 
 echo " <h2 id='target' class='page-heading heading--outcontainer'>$sty </h2>";
  

            ?>

           

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 col-md-9">












                    <?php 





                    $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0  ORDER BY m.date DESC ";


                    $srearch_ok = null;

                    if(isset($_GET['search']))
                          $srearch_ok = $_GET['search'];
                    else if(isset($_GET['value']))
                          $srearch_ok = $_GET['value'];
 
//search=Basque&=Basque&=language
if(isset($_GET['type']))
  switch ($_GET['type']) {
    case 'language':

            if($srearch_ok) {
              $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0  AND m.language='" . $srearch_ok . "' ORDER BY m.date DESC ";


            }


      break;
    
    case 'category':

     if($srearch_ok) {
                 $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND   m.delete_status = 0  AND m.movie_category_id=" . $srearch_ok . " ORDER BY m.date DESC ";


               }


      break;
    
    case 'cast':
      if($srearch_ok) {

 


                  $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id LEFT JOIN cast cs ON cs.movie_id = m.movie_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND   m.delete_status = 0    AND cs.name='" . $srearch_ok . "' ORDER BY m.date DESC ";


                }
      break;
    
    case 'director':
      if($srearch_ok) {
                  $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND   m.delete_status = 0  AND m.director='" . $srearch_ok . "' ORDER BY m.date DESC ";


                }

      break;
    
    case 'writer':
      if($srearch_ok) {
                  $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND   m.delete_status = 0  AND m.writer='" . $srearch_ok . "' ORDER BY m.date DESC ";


                }

      break; 
    
    default:
       $stmnt=" SELECT m.movie_category_id,    m.movie_id, mc.type , m.name , m.language , m.director , m.producers , m.writer , m.budget ,DATE_FORMAT(m.release_date,'%d-%m-%Y') AS date     FROM movie m LEFT JOIN movie_category mc ON m.movie_category_id = mc.category_id    WHERE m.movie_id IN ( SELECT movie_id FROM schedule WHERE movie_id > 0  AND show_date >= CURDATE() ) AND  m.delete_status = 0  ORDER BY m.date DESC ";
      break;
  }












                    $movie = $db->display( $stmnt);

                    if( $movie ) {


                     $image =  PATH . '/assets/images/default-1.jpg';
                     $rt = 1;
                     $fv = 1;
                      foreach ($movie as $value) {

                           $value['image'] = selectFromTable ('image', 'poster', 'movie_id = '. $value['movie_id'] . ' AND type=2 AND delete_status = 0 LIMIT 1' , $db );
                     
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
 if($acrt>0)                          $per = $tot/$acrt;
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

echo '
<!-- Movie variant with time -->
    <div class="movie movie--test movie--test--dark ';
    if($rt % 2 == 0) 
       echo ' movie--test--left';
     else
       echo ' movie--test--right';

    echo ' ">
        <div class="movie__images">
            <a href="movie.php?id='. $value['movie_id'] .'" class="movie-beta__link">
                <img alt=""   src="'.$image.'">
            </a>
        </div>

        <div class="movie__info">
            <a href="movie.php?id='. $value['movie_id'] .'" class="movie__title">'. $value['name'] .'</a>

            <p class="movie__time">'.$rtTo['time_left'].'</p>

            <p class="movie__option"><a href="index.php?type=category&value='.$value['type'].'&search='.$value['movie_category_id'].'">'.$value['type'].'</a> </p>
            
            <div class="movie__rate">
               
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
                        score:'. $rounded .',
                        path: "../assets/theme/images/rate/",
                        starOff : "star-off.svg",
                        starOn  : "star-on.svg" 
                    });

 
                       
                   });
               </script>





                <span class="movie__rating">'. $rounded .'</span>
            </div>               
        </div>
    </div>
 <!-- Movie variant with time -->




'; 

 if($fv % 2 ==0) 
 $rt++;

 
  $fv++;

                      }


                     

                    }


                     ?>




 


                        <div class="row">
                            <div class="social-group">
                              <div class="col-sm-6 col-md-4 col-sm-push-6 col-md-push-4">
                                    <div class="social-group__head">Join <br>our social groups</div>
                                    <div class="social-group__content">A lot of fun, discussions, queezes and contests among members. <br class="hidden-xs"><br>Always be first to know about best offers from cinemas and our partners</div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-sm-pull-6 col-md-pull-4">
                                     <div class="facebook-group">

            <!-- https://developers.facebook.com/docs/plugins/page-plugin                          -->

                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBookMyShowIN%2F&tabs=timeline&width=240&height=330&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="240" height="330" style="border:none;overflow:hidden; width: 100%;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    </div>
                                </div>
                                
                                <div class="clearfix visible-sm"></div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="twitter-group">
                                        <div id="twitter-feed"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="col-sm-4 col-md-3">
                        <div class="sitebar first-banner--left">
                            <div class="banner-wrap first-banner--left">
                                <img alt='banner' src="../assets/theme/images/banners/sale.jpg">
                            </div>

                             <div class="banner-wrap">
                                <img alt='banner' src="../assets/theme/images/banners/sport.jpg">
                            </div>

                             <div class="banner-wrap banner-wrap--last">
                                <img alt='banner' src="../assets/theme/images/banners/boots.jpg">
                            </div>

                            <div class="promo marginb-sm">
                              <div class="promo__head">A.Movie app</div>
                              <div class="promo__describe">for all smartphones<br> and tablets</div>
                              <div class="promo__content">
                                  <ul>
                                      <li class="store-variant"><a href="index.html#"><img alt='' src="../assets/theme/images/apple-store.svg"></a></li>
                                      <li class="store-variant"><a href="index.html#"><img alt='' src="../assets/theme/images/google-play.svg"></a></li>
                                      <li class="store-variant"><a href="index.html#"><img alt='' src="../assets/theme/images/windows-store.svg"></a></li>
                                  </ul>
                              </div>
                          </div>
    
                        </div>
                    </aside>
                </div>
            </div>










<!-- 





            <div class="col-sm-12">
                <h2 class="page-heading">Latest news</h2>

                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="../assets/theme/images/client-photo/post-thor.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='index.html#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='index.html#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='index.html#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">"Thor: The Dark World" - World Premiere</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="../assets/theme/images/client-photo/post-annual.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='index.html#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='index.html#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='index.html#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">30th Annual Night Of Stars Presented By The Fashion Group International</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="../assets/theme/images/client-photo/post-awards.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='index.html#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='index.html#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='index.html#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">Hollywood Film Awards 2013</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
            </div> -->
                
        </section>
        
        <div class="clearfix"></div>

        <script type="text/javascript">
          

          $(document).ready(function() { 
        
            init_Home();
          });




        </script>

   
<?php include_once( 'footer.php' ); ?>