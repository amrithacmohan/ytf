<?php
include_once('header.php');

                        $db=new Database();
                        $sql='update program set Stage= 0,start= 0,end= 0,ststate= 0,total_no= 0,total_time= 0 where 1 = 1';
                        $ff= $db->execute_query($sql);
                        $sql='update stage set state= 0,work= 0 where 1 = 1';
                        $ff= $db->execute_query($sql);
                        $sql='delete from pgrmdetail where id= 1 ';
                        $ff= $db->execute_query($sql);
                        $sql='alter table pgrmdetail auto_increment= 1 ';
                        $ff= $db->execute_query($sql);
                        
  $a=3;
  $b=2;
  $c=$b-$a;
  $d=$a-$b;
  echo $c;                      
  echo $d;                      
   if(1>$c)
   {
    echo "hello world";
   } 
    if(1<$c)
   {
    echo "hello dead world";
   }                    
 ?>