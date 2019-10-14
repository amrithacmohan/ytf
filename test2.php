<?php
  include_once( 'includes/connection.php' );
  ////////////////////////////////////////////////////////////////////////////////////////////////////
function finalscore($a)
{
$db=new Database(); 
$result1=$db->display($a);
$count1=count($result1);
         
         for($j=0 ; $j < $count1 ; $j++)
            {
            if($j==0)
              {   $rnk=1;
                  $tm= $result1[$j]['team'];
                  $stdid= $result1[$j]['participant_id'];
                  $sql='update student_program set result= '.$rnk.' where participant_id='.$stdid.' ';
                  $ff= $db->execute_query($sql);
                  if($tm != null)
                      {
                        $y=40-$rnk*10;
                         $sql5='select * from student_program where team='.$tm.' ';
                         $result5= $db->display($sql5);
                         $count2=count($result5);
                            for($i=0 ; $i < $count2 ; $i++)
                            {
                              $id2= $result5[$i]['participant_id'];

                              $sql6='select * from participants where where id='.$id2.' ';
                              $result6= $db->display($sql6);
                              $res= $result6[0]['result'];
                              $y=$y+$res;
                              $sql='update participants set result='.$y.' where id='.$id2.' ';
                              $ff= $db->execute_query($sql);
                            }  

                        }

                }
              else
              {
               $t1= $result1[$j-1]['total'];
               $r1= $result1[$j-1]['result'];
               $t2= $result1[$j]['total'];
               if($t2 == $t1)
                 {
                                   $rnk=$r1;
                                   $tm= $result1[$j]['team'];
                           $stdid= $result1[$j]['participant_id'];
                           $sql='update student_program set result= '.$rnk.' where participant_id='.$stdid.' ';
                           $ff= $db->execute_query($sql);
                           if($tm != null)
                             {
                                 $y=40-$rnk*10;
                                 $sql5='select * from student_program where team='.$tm.' ';
                                 $result5= $db->display($sql5);
                                 $count2=count($result5);
                                   for($i=0 ; $i < $count2 ; $i++)
                                     {
                                     $id2= $result5[$i]['participant_id'];

                                     $sql6='select * from participants where where id='.$id2.' ';
                                     $result6= $db->display($sql6);
                                     $res= $result6[0]['result'];
                                     $y=$y+$res;
                                     $sql='update participants set result='.$y.' where id='.$id2.' ';
                                     $ff= $db->execute_query($sql);
                                     }  

                              }

                  }

                if($t2 < $t1)
                  {
                  $rnk=$r1+1;
                  $tm= $result1[$j]['team'];
                           $stdid= $result1[$j]['participant_id'];
                           $sql='update student_program set result= '.$rnk.' where participant_id='.$stdid.' ';
                           $ff= $db->execute_query($sql);
                           if($tm != null)
                             {
                                 $y=40-$rnk*10;
                                 $sql5='select * from student_program where team='.$tm.' ';
                                 $result5= $db->display($sql5);
                                 $count2=count($result5);
                                   for($i=0 ; $i < $count2 ; $i++)
                                     {
                                     $id2= $result5[$i]['participant_id'];

                                     $sql6='select * from participants where where id='.$id2.' ';
                                     $result6= $db->display($sql6);
                                     $res= $result6[0]['result'];
                                     $y=$y+$res;
                                     $sql='update participants set result='.$y.' where id='.$id2.' ';
                                     $ff= $db->execute_query($sql);
                                     }  

                              }

                  }
              }    
            }

}






  ///////////////////////////////////////////////////////////////////////////////////////////////////


   $db=new Database();
   $pgid='1';
   $a1='sj';
   $a2='j';
   $a3='s';
   $rssj='select * from student_program where program_id='.$pgid.' and level="'.$a1.'"  group by school_id order by total desc ';
   $rsj='select * from student_program where program_id='.$pgid.' and level="'.$a2.'" group by school_id order by total desc';
   $rss='select * from student_program where program_id='.$pgid.' and level="'.$a3.'"  group by school_id order by total desc ';
   
    finalscore($rssj);
    finalscore($rsj);
    finalscore($rss);



   






