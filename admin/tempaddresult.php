<?php
include_once('header.php');
$db=new Database();
$sql='select * from program';
$result=$db->display($sql);
if(isset($_POST['level'])) {

?>

<?php


$as='select * from Program Where Program_id='.$_POST['Program_id'];
 $result1=$db->display($as);
 $no_of_par = $result1[0]['Number_of_participants'];

 if ($no_of_par>1) {


 	  $sql='SELECT  Program_id, School_id FROM `participants` WHERE  Level="'.$_POST['level'].'" AND Program_id = '.$_POST['Program_id'].'  GROUP BY Program_id, School_id
  HAVING count(*) > 1 '; 
 $result=$db->display($sql);

 	# code...
 }
else{

	  $sql='SELECT  Program_id, School_id FROM `participants` WHERE  Level="'.$_POST['level'].'" AND Program_id = '.$_POST['Program_id'].'  GROUP BY Program_id, School_id'; 
 $result=$db->display($sql);

}



//var_dump($result);
?>

<?php
} else { 
	echo '<script type="text/javascript">location.href="level.php"</script>';
}


if (isset($_POST['asd'])) {
	  $sql='update participants set Mark1='.$_POST['Mark1'].',Mark2='.$_POST['Mark2'].',Mark3='.$_POST['Mark3'].' where Program_id='.$_POST['Program_id'].' and Level = "'.$_POST['Level'].'" AND School_id = '.$_POST['School_id'].'';
    $params=array(
         ':Mark1'      =>  $_POST['Mark1'],
         ':Mark2'      =>  $_POST['Mark2'],
         ':Mark3'   =>  $_POST['Mark3'], 
         ':Program_id'   =>  $_POST['Program_id']   ,
         ':Level'   =>  $_POST['Level']    ,
         ':School_id'   =>  $_POST['School_id']         
      );
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

     	 $sql='
     	 SELECT  Participant_id FROM `participants` WHERE Program_id ='.$valuewewe53453['Program_id'].' AND School_id ='.$valuewewe53453['School_id'].' ORDER BY Participant_id DESC  '; 
     	$result4347853=$db->display($sql);

 $sql='SELECT  * FROM `participants` WHERE Participant_id = '.$result4347853[0][0]; 
     	$result47853=$db->display($sql);
//var_dump($result47853);


     foreach($result47853 as $value) {
     	$sid  = $result47853[0]['School_id'];
     	$pid  = $result47853[0]['Program_id'];
     	//echo $sid;
     	$stmnt_prgm ="select program from program where Program_id = ".$pid;
     	$exe_prgm = $db->display($stmnt_prgm);
     	$stmnt_school = "select name from school where School_id in (select School_id from participants WHERE school_id = ".$sid.")";
     	$exe_school = $db->display( $stmnt_school );
     	foreach($exe_school as $val1) {
     		foreach($exe_prgm as $val12) {





     	?>

<div class="row th77798455" style="padding: 1em; border-bottom: 1px solid #ccc">
	<div class="col-md-2">
		<?php echo $value['Participant_id']; ?>
	</div>
	<div class="col-md-1 th45643564"><?php echo $val12['program']; ?></div>
	<div class="col-md-1 th45643563"><?php echo $val1['name']; ?></div>
	<div class="col-md-1">
		<?php echo $value['Name']; ?>
	</div>



	<form method="post">
	<input type="hidden" name="School_id" value="<?php  echo $value['School_id'];?>">
	<input type="hidden" name="Level" value="<?php  echo $_POST['level'];?>">



	<input type="hidden" name="Participant_id" value="<?php  echo $value['Participant_id'];?>">
	<input type="hidden" name="Program_id" value="<?php  echo $value['Program_id'];?>">
	<input type="hidden" name="level" value="<?php  echo $_POST['level'];?>">
		<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['Mark1']){ echo ' disabled="disabled"';}?>  name="Mark1" placeholder="0" max="10"  value= <?php echo $value['Mark1'];?> >
	</div>
	<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['Mark2']){ echo ' disabled="disabled"';}?>  name="Mark2" placeholder="0" max="10"  value= <?php echo $value['Mark2'];?>>
	</div>
	<div class="col-md-2">
		<input type="number" required class="form-control"  <?php if($value['Mark3']){ echo ' disabled="disabled"';}?>  name="Mark3" placeholder="0" max="10"   value= <?php echo $value['Mark3'];?>>
	</div>
	<div class="col-md-1">
		<input type="submit" name="asd" value="go" class="btn btn-info btn-">
	</div>
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