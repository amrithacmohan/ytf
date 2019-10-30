
<?php include_once( 'header.php' ); 


$db = new Database();
$message = '';
$PgmId=$_GET['id'];
$_SESSION['Id']=$PgmId;
$s=$_SESSION['userid'];
$sql='select * from program';
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
/*



 $Id=$_SESSION['Id'];
 $s=$_SESSION['userid'];
    $n="SELECT Number_of_participants FROM program WHERE Program_id=$PgmId";
$xx=$db->display($n); 


 

   
    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$PgmId  AND school_id=$s";

  $cx=$db->display($cc);
*/
    $sql="SELECT * FROM participants WHERE  school_id=$s";
 

    $result=$db->display($sql);

/*} */?>


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
       echo "<Button type='submit' name='addtopgm' value='$PidTo' > SELECT  </Button>";
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

  

 




   
    $sql="SELECT * FROM participants WHERE id=$partiId ";
 

     $result=$db->display($sql);



    
    $stmnt ='update student_program set participant_id = :partid , name = :name , mobno = :mobno where id = :id';
      $params = array(
     
      ':partid' => $partiId,
      ':name' => $result[0][1],
      ':mobno' => $result[0][3],
      ':id' => $PgmId
      );

      if ($db->execute_query($stmnt, $params) ) {
      $message = ' Replaced';
      echo $message;
        }
      else
      {
          $message = 'Error';
          echo $message;
      }




   }
  
}

//}
?>
 






















<?php
include_once('../footer.php'); ?>
</body>
</html>