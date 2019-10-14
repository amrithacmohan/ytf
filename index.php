<?php include_once('home_header.php'); ?>
    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
      <div class="row">
        
        <div class="col-md-6">
          <h1>Welcome to Drishya</h1>
          <p>Kerala,God's own country is also a country of diverse festivals.
          Kerala School Kalolsavam is a festival unique in its structure
          and organisation.The organisational set up from school level to state
          level to state level for the conduct of the Kalolsavam is monitored by Education
          Department.In the last 51 years it is seen that the Kalolsavam
          has refined much in letter and spirit Students get opportunity to express
          their talent in school level,sub district,district and at last state level.
            <?php 


$time1 = '2019-05-21 17:00:00';

 //echo date('Y-m-d H:i',strtotime('+10 hour +60 minutes',strtotime($time1)));


                      function checkTime($time1,$time2)
                       {
                          $start = strtotime($time1);
                          $end = strtotime($time2);
                          if ($start-$end > 0)
                          return 1;
                          else
                          return 0;
                        }

                                   $currentTime = time();
                                   $time2 = date('Y-m-d H:i',$currentTime);
                                   echo $time2;

                                   if(checkTime($time1,$time2))
                                   echo "First parameter is greater";
                                   else
                                   echo "Second parameter is greater";

                                   $start2 = strtotime($time1);
                                   $end2 = strtotime($time2);
                                 
                                 echo  date('Y-m-d H:i',$start2);
                                 echo  date('Y-m-d H:i',$end2);



                                   //$dif = $start2-$end2;
                                     $dif = $end2-$start2;
                                   echo date('H:i',$dif);






  ?>
      </p>
        </div>

        <div class="col-md-6 jumbotron">
        <div class="row text-center">
          <div class="col-md-4">          
              <a href="http://localhost/ytf/school/login.php">
                <i style="font-size: 40px; display: block; margin: 10px 0;" class="fa fa-user-circle" aria-hidden="true"></i>
                School Login            
              </a>
          </div>

          <div class="col-md-4">  
              <a href="http://localhost/ytf/user_view_result.php">
                <i style="font-size: 40px; display: block; margin: 10px 0;" class="fa fa-eye" aria-hidden="true"></i>
                View Result             
              </a>
          </div>

          <div class="col-md-4">
              <a href="http://localhost/ytf/user_view_program.php">
                <i style="font-size: 40px; display: block; margin: 10px 0;" class="fa fa-eye" aria-hidden="true"></i>
               view program             
              </a>
          </div>
</div>
        </div>  
      </div>
      </div>
    </section>

<?php include_once('home_footer.php'); ?>
