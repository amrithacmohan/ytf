<?php
include_once('header.php');

$db=new Database();
$sql='select * from program';
$result=$db->display($sql);
if(isset($_POST['level'])) {

?>

<?php

//var_dump($_POST);

$as='select * from Program Where Program_id='.$_POST['Program_id'].' ';
 $result1=$db->display($as);
 $no_of_par = $result1[0]['Number_of_participants'];

 if ($no_of_par>1) {


 	  $sql='SELECT  program_id, school_id FROM `student_program` WHERE  Level="'.$_POST['level'].'" AND program_id = '.$_POST['Program_id'].'  GROUP BY program_id, school_id HAVING count(*) > 1 '; 
 $result=$db->display($sql);

 	# code...
 }
else{

	  $sql='SELECT  program_id, school_id FROM `student_program` WHERE  Level="'.$_POST['level'].'" AND program_id = '.$_POST['Program_id'].'  GROUP BY program_id, school_id'; 
 $result=$db->display($sql);

}

$valuewewe53453 = $result;

//var_dump($result);
?>

<?php
} else { 
	echo '<script type="text/javascript">location.href="result.php"</script>';
}


if (isset($_POST['asd'])) {



	  $tota = $_POST['Mark1'] +$_POST['Mark2'] +$_POST['Mark3'];
	  $ms=1;

	  $sql='update student_program set Mark1='.$_POST['Mark1'].',Mark2='.$_POST['Mark2'].',Mark3='.$_POST['Mark3'].' ,Total='. $tota.' ,mark_status='. $ms.' where program_id='.$_POST['Program_id'].' and level = "'.$_POST['Level'].'" AND school_id = '.$_POST['School_id'].'';
    // $params=array(
    //      ':Mark1'      =>  $_POST['Mark1'],
    //      ':Mark2'      =>  $_POST['Mark2'],
    //      ':Mark3'   =>  $_POST['Mark3'], 
    //      ':Program_id'   =>  $_POST['Program_id']   ,
    //      ':Level'   =>  $_POST['Level']    ,
    //      ':School_id'   =>  $_POST['School_id']         
    //   );
      $ff= $db->execute_query($sql);

}

?>
 <form align="center"   method="POST">
    <div class="panel">
<div class="panel-body">
<h3 class="title-hero">
   Update Result
</h3>
<div class="example-box-wrapper">




<div class="row" style="padding: 2em; border-bottom: 1px solid #ccc">
	<div class="col-md-2">
	<strong>Participant Id</strong>
	</div>
	<div class="col-md-1">
		<strong>Program ID</strong>
	</div>
	<div class="col-md-1">
	<strong >School Id</strong>
	</div>
	<div class="col-md-1">
		<strong>PArticipant Name</strong>
	</div>

	
	<div class="col-md-2">
	<strong>Mark 1</strong>
	</div>-
	<div class="col-md-2">
		<strong>Mark 2</strong>
	</div>
	<div class="col-md-2">
		<strong>Mark 3</strong>
	</div>
	<div class="col-md-1">
		<strong>Update</strong>
	</div>
	 

</div>



 <?php  
     foreach($result as $valuewewe53453) {

     	$sql=' SELECT  participant_id FROM `student_program` WHERE program_id ='.$valuewewe53453['program_id'].' AND school_id ='.$valuewewe53453['school_id'].' and level = "'.$_POST['level'].'"'.' ORDER BY Participant_id DESC  '; 
        $result4347853=$db->display($sql);

 $sql='SELECT  * FROM `student_program` WHERE participant_id = '.$result4347853[0][0]; 
     	$result47853=$db->display($sql);
//var_dump($result47853);


     foreach($result47853 as $value) {
     	$sid  = $result47853[0]['school_id'];
     	$pid  = $result47853[0]['program_id'];
     	//echo $sid;
     	$stmnt_prgm ="select program from program where program_id = ".$pid;
     	$exe_prgm = $db->display($stmnt_prgm);
     	$stmnt_school = "select name from school where school_id in (select school_id from participants WHERE school_id = ".$sid.")";
     	$exe_school = $db->display( $stmnt_school );
     	foreach($exe_school as $val1) {
     		foreach($exe_prgm as $val12) {





     	?>

<div class="row th77798455" style="padding: 1em; border-bottom: 1px solid #ccc">
	<div class="col-md-2">
		<?php echo $value['participant_id']; ?>
	</div>
	<div class="col-md-1 th45643564"><?php echo $val12['program']; ?></div>
	<div class="col-md-1 th45643563"><?php echo $val1['name']; ?></div>
	<div class="col-md-1">
		<?php echo $value['name']; ?>
	</div>



	<form method="post">
	<input type="hidden" name="School_id" value="<?php  echo $value['school_id'];?>">
	<input type="hidden" name="Level" value="<?php  echo $_POST['level'];?>">



	<input type="hidden" name="Participant_id" value="<?php  echo $value['participant_id'];?>">
	<input type="hidden" name="Program_id" value="<?php  echo $value['program_id'];?>">
	<input type="hidden" name="level" value="<?php  echo $_POST['level'];?>">
		<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['mark1']){ echo ' disabled="disabled"';}?>  name="Mark1" placeholder="0" max="10"  value= <?php echo $value['mark1'];?> >
	</div>
	<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['mark2']){ echo ' disabled="disabled"';}?>  name="Mark2" placeholder="0" max="10"  value= <?php echo $value['mark2'];?>>
	</div>
	<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['mark3']){ echo ' disabled="disabled"';}?>  name="Mark3" placeholder="0" max="10"   value= <?php echo $value['mark3'];?>>
	</div>
	<?php if($value['mark_status'] == 0) { ?>
	<div class="col-md-1">
		<input type="submit" name="asd" value="go" class="btn btn-info btn-">
	</div>
	<?php } else{ 

			echo'<div class="col-md-1">
		<input type="hidden" name="asd" value="go" class="btn btn-info btn-">
	</div>';
		} ?>
	 </form>


</div>
<?php }
     

     }
 }
}






    ?>


</div>
</div>
</div>
</form>

<script type="text/javascript">
	$(document).ready(function(){

	

	});
</script>
<?php include_once('../footer.php');  ?>