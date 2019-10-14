
<?php include_once( 'header.php' ); 


   $db = new Database();
   $prgmId=$_GET['prgmId'];
   $partiId=$_GET['participantId'];
   $level=$_GET['level'];

   
    $sql="SELECT * FROM participants WHERE id=$partiId AND level='$level'";
 

     $result=$db->display($sql);


$schoolId =$result[0][5];
   
     $n="SELECT Number_of_participants FROM program WHERE Program_id=$prgmId";
$number=$db->display($n);
 
 

    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$prgmId AND level='$level' AND school_id=$schoolId";

   $cx=$db->display($cc);
   
   //var_dump($cx);
   if($number[0][0]>$cx[0][0])
   {
   	
    
    $stmnt = "INSERT INTO `student_program`( `participant_id`, `name`, `level`, `program_id`, `school_id`) VALUES( :partid , :name, :level, :prgmId,:school_id)";
			$params = array(

			':partid' =>  $partiId,
			':name' => $result[0][1],
			':level' => $level,
			':prgmId' => $prgmId,
			':school_id' => $schoolId
			

			);

			if ($db->execute_query($stmnt, $params) ) {
			$message = ' Added';
			echo $message;
				}
			else
			{
					$message = 'Error';
					echo $message;
			}




   }
   else
   {
   	$message='Too many people';
   	echo $message;
   }
   
   
?>


























   <?php
include_once('../footer.php'); ?>