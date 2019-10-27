<?php include_once( 'user_header.php'); ?>














<?php
include_once( 'includes/connection.php');
$db=new Database();
$sql='select * from program';
$result=$db->display($sql);

if(isset($_GET['id']) && $_GET['id']) {

$prg_id = $_GET['id'];


}



?>

<?php


$as='select * from Program Where Program_id='.$prg_id.' ';
 $result1=$db->display($as);
 $no_of_par = $result1[0]['Number_of_participants'];

 if ($no_of_par>1) {


 	  $sql='SELECT  Program_id, School_id FROM `participants` WHERE  Program_id = '.$prg_id.'  GROUP BY Program_id, School_id
  HAVING count(*) > 1 '; 
 $result=$db->display($sql);

 	# code...
 }
else{

	  $sql='SELECT  Program_id, School_id FROM `participants` WHERE Program_id = '.$prg_id.'  GROUP BY Program_id, School_id'; 
 $result=$db->display($sql);

}



//var_dump($result);
?>

 <form align="center"   method="POST">
    <div class="panel">
<div class="panel-body">

<div class="example-box-wrapper">







 <?php  



  $sel1 = "select  * from participants where mark_status = 1 and Program_id = '".$prg_id."'order by total desc";

  // $sel1 = "select  * from participants where mark_status = 1 and Level = '".$lvll."'";
 $rslt = $db->display( $sel1 );
     





     	?>












<div class="example-box-wrapper">


<table id="datatable-row-highligh" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    
    <th>Participant Id</th>
    <th>Program Name</th>
    <th>School Name</th>
    <th>Participant Name</th>
    <th>Mark 1</th>
    <th>Mark 2</th>
    <th>Mark 3</th>
    <th>Total Mark</th>

  
    
</tr>
</thead>
<tbody>
    <?php  

   
// var_dump($rslt);




     foreach($rslt as $value) {
     	 $sel11 = "select * from program where Program_id = '.$prg_id' ";
$rslt11 = $db->display( $sel11 );
 $sel12 = "select * from School where School_id = '.$value['School_id']' ";
$rslt12 = $db->display( $sel12 );


foreach($rslt11 as $value11) {

 foreach($rslt12 as $value12) {
// var_dump($)


     	?>
<tr>
    
    <td><?php echo $value['Participant_id']; ?></td>
    <td><?php echo $value11['Program']; ?></td>
    <td><?php echo $value12['Name']; ?></td>
    <td><?php echo $value['Name']; ?></td>
    <td><?php echo $value['Mark1']; ?></td>
    <td><?php echo $value['Mark2']; ?></td>
    <td><?php echo $value['Mark3']; ?></td>
    <td><?php echo $value['Total'] ?></td>
  
    
</tr>
<?php 
      }
 }
}
    ?> 
</tbody>
</table>
</div>



















<?php 





    ?>


</div>
</div>
</div>
</form>
<!-- <script type="text/javascript" src="/assets/widgets/datatable/datatable.js"></script> -->

<script type="text/javascript">
	$(document).ready(function(){

	

	});


	
</script>


<?php
$xo =true;
include_once( 'home_footer.php'); ?>