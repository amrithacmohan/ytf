<?php
include_once( 'includes/connection.php' );
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

  
  echo $dif;

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
                             echo " '$e' starts at '$l' and end at '$T' ";
                             $tempstart= $T;

                 }




  }
 ?>
 