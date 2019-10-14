<?php
   include_once('../includes/connection.php');
   $db = new Database();
   $pid=$_GET['id']; 
   $sql='select * from student_program where program_id='.$pid.' ';
   $result2=$db->display($sql);
   $gcount=count($result2);
   for($k=0 ; $k < $gcount ; $k++)
  {
   $parid=$result2[$k]['id'];
   $m1=$result2[$k]['mark1']; 
   $m2=$result2[$k]['mark2'];
   $m3=$result2[$k]['mark3'];
   $m1=$m1+0;
   $m2=$m2+0;
   $m3=$m3+0;
   $mtotal=$m1+$m2+$m3+0;
   echo $mtotal;
   $sql='update student_program set total='.$mtotal.',mark_status=1 where id='.$parid.' ';
   $ff= $db->execute_query($sql);
   $sql2='update program set mstatus=1 where program_id='.$pid.' ';
   $ff2= $db->execute_query($sql2);
  }


  /*
   $rssj='select * from student_program where program_id='.$pid.' and level="'.$a1.'"  group by school_id order by total desc ';
   $rsj='select * from student_program where program_id='.$pid.' and level="'.$a2.'" group by school_id order by total desc';
   $rss='select * from student_program where program_id='.$pid.' and level="'.$a3.'"  group by school_id order by total desc ';
   */
   header('Location: result.php?message=published');
   exit();
   
    echo 'program published';

?>