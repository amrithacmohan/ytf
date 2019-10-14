
<?php include_once( 'header.php' ); 


$db = new Database();
$message = '';
$PgmId=$_GET['program_id'];
$_SESSION['pgmId']=$PgmId;

$sql='select * from program where program_id='.$PgmId.'';
$result=$db->display($sql);
$ststate2= $result[0]['ststate'];

if($ststate2 >= 1)
{
?>
<script type="text/javascript">
alert("Database Locked"); 
window.location.href = 'home.php';
</script>
<?php
}

else {




 $PgmId=$_SESSION['pgmId'];
   $s=$_SESSION['userid'];
    $n="SELECT Number_of_participants FROM program WHERE Program_id=$PgmId";
$xx=$db->display($n); 


 

   
    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$PgmId  AND school_id=$s";

  $cx=$db->display($cc);

    $sql="SELECT * FROM participants WHERE  school_id=$s";
 

 $result=$db->display($sql);

} ?>


 <!DOCTYPE html>
<html>
<head>
    
</head>
<body> 
 <form align='center'   method='POST'>
      <div class='panel'>
<div class='panel-body'>
<h3 class='title-hero'>
  
</h3>
<div class='example-box-wrapper'>

<table id='datatable-row-highligh' class='table table-striped table-bordered' cellspacing='0' width='100%'>
<thead>
<tr>
    
    <th>Participant id</th>
     <th>Name</th>    
</tr>
</thead>
<tbody>
    <?php  
     foreach($result as $value) { ?>
<tr>
    
    <td><?php echo $value['id']; ?></td>
     <td><?php echo  $value['name']; ?></td>
     <td> 
     <?php
       $PidTo= $value['id'];
       echo "<Button type='submit' name='addtopgm' value='$PidTo' > ADD TO PROGRAM  </Button>";
      // echo "<a href ='something.php?participantId=$PidTo&level=$level&prgmId=$PgmId' class='btn btn-danger'>ADD To Programs</a>" ;
      ?> 
    </td>
   </tr>
</tbody>

  <?php }

 echo " </table>
</form>";  ?>
    


<?php

if(isset($_POST['addtopgm']))
{

 $partiId=$_POST['addtopgm'];

  

 $prgmId=$_SESSION['pgmId'];




   
    $sql="SELECT * FROM participants WHERE id=$partiId ";
 

     $result=$db->display($sql);



$schoolId =$result[0][5];
   
     $n="SELECT Number_of_participants FROM program WHERE Program_id=$prgmId";
$number=$db->display($n);
 
 

    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$prgmId  AND school_id=$schoolId";

   $cx=$db->display($cc);
   $mm = array();
   $us="SELECT participant_id FROM student_program WHERE program_id=$prgmId  and participant_id=$partiId";
   $mm=$db->display($us);

   if($mm==null){
   //echo $partiId;
   

  // if($mm[0][0]!=$partiId)
   //{
   
   //var_dump($cx);
   if($number[0][0]>$cx[0][0])
   {
    
    
    $stmnt = "INSERT INTO `student_program`( `participant_id`, `name`,`program_id`, `school_id` ,`mobno`) VALUES( :partid , :name, :prgmId,:school_id , :mob)";
      $params = array(

      ':partid' =>  $partiId,
      ':name' => $result[0][1],
      ':prgmId' => $prgmId,
      ':school_id' => $schoolId,
      ':mob' => $result[0][3]

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

 }
 else
 {
   $message='Already in the program';
   echo $message;
 }
//}

}
?>
 






















<?php
include_once('../footer.php'); ?>
</body>
</html>