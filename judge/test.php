<?PHP
include_once('connectionj.php');
$db = new Database();
$reg='201';
$sql5='select * from student_program where regno='.$reg.' ';
                 echo $sql5;
                 $result5= $db->display($sql5);
                 $pgmid= $result5[0]['program_id'];
                 $schlid= $result5[0]['school_id'];
                 $level= $result5[0]['level'];
                 echo $pgmid;
                 echo $schlid;
                 echo $level;
?>                 
