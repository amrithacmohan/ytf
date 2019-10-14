
<?php


		$objcon=new mysqli('localhost','root','','ytf');




$r=array();






$stmnt="SELECT * FROM program";

	
$re=$objcon->query($stmnt);

	while ($row=$re->fetch_assoc()) {

	$r[]=$row;
		


		
	}


 echo json_encode($r);

?>

