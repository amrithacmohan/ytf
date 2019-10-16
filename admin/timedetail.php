<?php 
include_once( 'header.php' );
$db = new Database();
$message = '';

///////////////////////////STAGE ALLOWCATION/////////////////////

function stagw() {
$db=new Database();
$sql='select * from stage';
$result=$db->display($sql);
$stgcount=count($result);
$sql='select * from program';
$result=$db->display($sql);
$pgmcount=count($result);
     for ($i=1; $i <= $pgmcount; $i++)
       { 
                        $as='select * from program Where program_id='.$i.' ';
                        $result1=$db->display($as);
                        $pgmtype= $result1[0]['Program_type'];
                        $pgmtime= $result1[0]['time_limit'];
                        if ($pgmtype=="s") 
                        {
                             $sql='select * from student_program where program_id='.$i.' ';
                             $result=$db->display($sql);
                             $pgmcount2=count($result);
                             $sql='update program set total_no='.$pgmcount2.' where program_id='.$i.' ';
                             $ff= $db->execute_query($sql);
                             $pgmtime= $pgmcount2*$pgmtime;
                             $sql='update program set total_time='.$pgmtime.' where program_id='.$i.' ';
                             $ff= $db->execute_query($sql);

                        }

                        if ($pgmtype=="g") 
                        {
                             $sql='select school_id,level, count(*) from student_program where program_id='.$i.'  group by school_id,level ';
                             $result=$db->display($sql);
                             $pgmcount2=count($result);
                             $sql='update program set total_no='.$pgmcount2.' where program_id='.$i.' ';
                             $ff= $db->execute_query($sql);
                             $pgmtime= $pgmcount2*$pgmtime;
                             $sql='update program set total_time='.$pgmtime.' where program_id='.$i.' ';
                             $ff= $db->execute_query($sql);

                        }

        }


$alltime=0;
$invtime=0;
    for ($i=1; $i <= $pgmcount; $i++)
      {
        $as='select * from program Where program_id='.$i.' ';
                        $result1=$db->display($as);
                        $pgtime= $result1[0]['total_time'];
                        $time_li= $result1[0]['time_limit'];
                        $alltime=$alltime+$pgtime;
                        $invtime=$invtime+$time_li;


     }





$alltime=ceil($alltime/$stgcount);
$invtime=ceil($invtime/$pgmcount);
//echo $alltime ;
//echo $invtime ;

    
                         $as='select * from stage order by size ';
                         $result1=$db->display($as);
                         for ($i=0; $i < $stgcount ; $i++)
                         {
                         $stgno= $result1[$i]['Stage_Number'];
                         $stgsz= $result1[$i]['size']; 
                         $stgst= $result1[$i]['state'];
                         $stgwrk= $result1[$i]['work'];
                            
                                   $ap='select * from program order by st_size ';
                                   $result2=$db->display($ap);
                                   for ($j=0; $j < $pgmcount ; $j++)
                                       {
                                          $pgnno= $result2[$j]['Program_id'];
                                          $stgsz2= $result2[$j]['st_size']; 
                                          $st= $result2[$j]['ststate'];
                                          $tt= $result2[$j]['total_time'];
                                          if($st==0)
                                          {    
                                              $chk=0;
                                              $chk=$stgwrk+$tt;
                                              //$chk2=$stgwrk+$tt;
                                             // $chk=$alltime-$chk;
                                              if ($stgsz == $stgsz2 && $chk <= $alltime)
                                               {
                                              $sql='update program set Stage='.$stgno.',ststate= 1 where program_id='.$pgnno.' ';
                                              $ff= $db->execute_query($sql);
                                              $stgwrk=$stgwrk+$tt;
                                              $sql='update stage set work='.$stgwrk.' where Stage_Number='.$stgno.' ';
                                              $ff= $db->execute_query($sql);

                                               }
                                            
                                                 if ($stgwrk > $alltime)
                                                  {
                                                   $sql='update stage set state= 1 where Stage_Number='.$stgno.' ';
                                                   $fd= $db->execute_query($sql);
                                                  }
                                                
                                          }


                                       }




                          }

$as='select * from program Where ststate= 0 order by total_time desc ';
$result1=$db->display($as);
$b=count($result1);
     for ($i=0; $i < $b; $i++) 
     { 
         $c= $result1[$i]['st_size'];
         $h= $result1[$i]['Program_id'];
         $q= $result1[$i]['total_time'];
         if ($c==1) 
         {
           $ak='select * from stage order by work asc ';
           $result2=$db->display($ak);
           $k= $result2[0]['Stage_Number'];
           $p= $result2[0]['work'];
           $p=$p+$q;

         }
         elseif ($c==2) 
         {
           $ak='select * from stage where size= 2 order by work asc ';
           $result2=$db->display($ak);
           $k= $result2[0]['Stage_Number'];
           $p= $result2[0]['work'];
           $p=$p+$q;

         }

             $sql2='update program set Stage='.$k.',ststate= 1  where Program_id='.$h.' ';
             $ff2= $db->execute_query($sql2);
             $sql3='update stage set work='.$p.',state= 1  where Stage_Number='.$k.' ';
             $ff3= $db->execute_query($sql3);

     }    


}

////////////////////TIME ALLOWCATION//////////////////////////////

function timew() {

$db=new Database();

                     function checkTime($time1,$time2)
                       {
                          $start = strtotime($time1);
                          $end = strtotime($time2);
                          if ($start-$end > 0)
                          return 1;
                          else
                          return 0;
                        }

 $as='select * from pgrmdetail Where id= 1 ';
 $result1=$db->display($as);
 $a= $result1[0]['startdate'];
 $b= $result1[0]['lunch'];
 $c= $result1[0]['startime'];
 $d= $result1[0]['endtime'];
 $breaktime= 60;
 $c= date('Y-m-d H:i:s', strtotime("$a $c"));
 $b= date('Y-m-d H:i:s', strtotime("$a $b"));
 $d= date('Y-m-d H:i:s', strtotime("$a $d"));
 $tempo= date('Y-m-d H:i:s',strtotime('+1 days',strtotime($c)));


$ed = strtotime($tempo);
$ef = strtotime($d);
$dif = ($ed-$ef) / 60;

  
 

$sql='select * from stage';
$result2=$db->display($sql);
$stgcount=count($result2);

  for ($i=0; $i < $stgcount ; $i++)
  { 
    $stg= $result2[$i]['Stage_Number'];
    $tempstart=$c;
    $templunch=$b;
    $tempend=$d;
                $ap='select * from program Where Stage='.$stg.' ';
                $result3=$db->display($ap);
                $pgcount=count($result3);
                 for ($j=0; $j < $pgcount ; $j++)
                 {
                  $e= $result3[$j]['Program_id'];
                  $f= $result3[$j]['total_time'];
                  $g= $result3[$j]['total_no'];
                  $g=$g*3;
                  $f=$f+$g;
                  $l=$tempstart;
                  //$T=$tempstart+$f;
                 $T= date('Y-m-d H:i:s',strtotime('+ '.$f.' minutes',strtotime($tempstart)));
                            if(checkTime($T,$templunch))
                            {
                              $T= date('Y-m-d H:i:s',strtotime('+ '.$breaktime.' minutes',strtotime($T)));
                              $templunch= date('Y-m-d H:i:s',strtotime('+24 hours',strtotime($templunch)));
                            }
                             
                            if(checkTime($T,$tempend)) 
                            {
                              $T= date('Y-m-d H:i:s',strtotime('+ '.$dif.' minutes',strtotime($T)));
                              $tempend= date('Y-m-d H:i:s',strtotime('+24 hours',strtotime($tempend)));
                            }

                             $sql='update program set start= " '.$l.' ",end= " '.$T.' " Where Program_id= '.$e.' ';
                             $ff2= $db->execute_query($sql);
                            
                             $tempstart= $T;

                 }




  }

}

///////////////////REG ALLOW///////////////////////
function regw() {
$db=new Database();
$sql='select * from program';
$result2=$db->display($sql);
$gcount=count($result2);
for($i=0 ; $i < $gcount ; $i++)
{
   $pgid= $result2[$i]['Program_id'];
   $a=$pgid*100;
   $edf='select * from student_program where program_id='.$pgid.'  group by school_id,level ';
   $result3=$db->display($edf);
   $jcount=count($result3);
               for($j=0 ; $j < $jcount ; $j++)
               {
                 $gid= $result3[$j]['id'];
                 $a=$a+1;
                 $sql2='update student_program set regno='.$a.'  where id='. $gid.' ';
                 $ff2= $db->execute_query($sql2);




               }


 }

}


////////////////////////FUNCTIONS END//////////////////////////////////////////////////////////////









if( isset( $_POST['submit'])) {
  $startdate = $_POST['date'];
  $starttime = $_POST['Time1'];
  $lunchtime = $_POST['Time2'];
  $endtime   = $_POST['Time3'];
 
$sql='select * from pgrmdetail';
$result=$db->display($sql);
$countz=count($result);

if($countz >= 1)
{
?>
<script type="text/javascript">
alert("please reset the existing details"); 
window.location.href = 'viewallow.php';
</script>
<?php
}
  else{

     $stmnt='INSERT INTO pgrmdetail(`startdate`,`lunch`, `startime`,`endtime`) 
     VALUES (:strdate,:_lunch, :strtime, :_endtime )';
     $params = array(
      ':strdate' => $startdate,
      ':_lunch' => $lunchtime,
      ':strtime' => $starttime,
      ':_endtime' => $endtime,
      
      );     
     if( $db->execute_query($stmnt, $params))
     {
      $message="Programs Have Been Scheduled";
      stagw();
      timew();
      regw();
     }
     else
     {
      $message = 'UnsucessFull';
     }         
      }

   }
  /* <?php echo PATH; ?> For further use */
?>













  <div id="page-title">
      <h2>Enter Details For Automation</h2>
    
  </div>

  <div class="panel">
      <div class="panel-body">
          

          <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
          
            <div class="row">
            
            


           
            <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Start Date</label>
                      <div class="col-sm-6">
                          <input type="text" required class="form-control" name="date" id="datepicker-d" placeholder="Date">
                      </div>
                  </div>
            </div>


                     

              <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Start Time</label>
                      <div class="col-sm-6">
                      <div class="input-group bootstrap-timepicker timepicker">
                          <input id="timepickeFKr1" type="text" class="form-control input-small"    name="Time1"   placeholder="Time">
                         <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                         </div></div></div></div>

                      
                      <div class="col-md-10">
                      <div class="form-group">
                      <label class="col-sm-3 control-label">Lunch Time</label>
                      <div class="col-sm-6">
                      <div class="input-group bootstrap-timepicker timepicker">
                          <input id="timepickeFKr2" type="text" class="form-control input-small"    name="Time2"   placeholder="Time">
                         <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                         </div></div></div></div>





              <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">End Time</label>
                      <div class="col-sm-6">
                      <div class="input-group bootstrap-timepicker timepicker">
                          <input id="timepickeFKr3" type="text" class="form-control input-small"    name="Time3"   placeholder="Time">
                         <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div></div></div></div></div>


                   <div class="">
                          <div class="col-md-10">
                              <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit">
                          </div>
                   </div>
          </div>
        </form>
</div></div>

 <script type="text/javascript" src="<?php echo PATH; ?>/assets/timepicker/js/bootstrap-timepicker.js"></script>



<script type="text/javascript" src="../assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function(){

              $('#timepickeFKr1').timepicker({
               use24hours: true,
               format: 'HH:mm:ss',
               showMeridian: false
              });
              $('#timepickeFKr2').timepicker({
                use24hours: true,
                format: 'HH:mm:ss',
                showMeridian: false
              });
              $('#timepickeFKr3').timepicker({
                use24hours: true,
                format: 'HH:mm:ss',
                showMeridian: false
              });


              $('#datepicker-d').datepicker({
                format: 'yyyy-mm-dd'
              });

            });


        </script>
<?php 
  echo( $message);
?>


  
<?php include_once( '../footer.php' ); ?>