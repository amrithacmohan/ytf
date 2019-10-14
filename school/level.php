
<?php include_once( 'header.php' ); 


   $db = new Database();
$message = '';

$PgmId=$_GET['program_id'];
$_SESSION['pgmId']=$PgmId;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Type</title>
    <link rel='stylesheet' type='text/css' href='../assets/styles.css'>
    <script type='text/javascript' src='../assets/js-core.js'></script>
</head>
<body>
    <div class='container'>
        <div class='row'>
            <div class='col-md-4 col-md-offset-4'>
                <form method='post'  data-parsley-validate=''>
                    <div class='content-box'>
                        <h3 class='content-box-header content-box-header-alt bg-default'>
                            <span class='icon-separator'>
                                <i class='glyph-icon icon-cog'></i>
                            </span>
                            <span class='header-wrapper'>
                               
                                <small>Select Type of the Program</small>
                            </span>
                        </h3>

                        <input type='hidden' name='Program_id' value='<?php if(isset($_GET['id']))echo $_GET['id']; ?>'>
                        <div class='col-md-10'>
                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Level</label>
                            <div class='col-sm-6'>
                                 <select  name='level' required class='form-control'>
                                 <option selected='selected' disabled='disabled'>select</option>
                                     <option value='sj'>Sub Junior</option>
                                    <option value='j'>Junior</option>   
                                    <option value='s'>Senior</option>  
                                </select>
                            </div>
                        </div>
                    </div>
                            <div class='form-group'>
                                <div class='input-group'>
                                    <input type='submit' class='btn btn-success' name='newsubmit' value='Submit' />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>      
        </div>
            
    </div>
    

    <!-- JS Demo -->
    <script type='text/javascript' src='../assets/widgets/parsley/parsley.js'></script>
    <script type='text/javascript' src='../assets/admin-all-demo.js'></script>
</body>

 <!--  <form align='center'   method='POST'>
      <div class='panel'>
<div class='panel-body'>
<h3 class='title-hero'>
  
</h3>
<div class='example-box-wrapper'>

<table id='datatable-row-highligh' class='table table-striped table-bordered' cellspacing='0' width='100%'>
<thead>
<tr>
    
    <th>Participant id</th>
     <th>Name</th> -->
   

    
<?php

if(isset($_POST['newsubmit']))
{

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


 $level = $_POST['level'];
 $_SESSION['level']=$level;

   
    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$PgmId AND level='$level' AND school_id=$s";

  $cx=$db->display($cc);

    $sql="SELECT * FROM participants WHERE level='$level' AND school_id=$s";
 

 $result=$db->display($sql);

}

?>
  
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
       echo "<Button type='submit' name='addtopgm' value='$PidTo' > ADD To Programs  </Button>";
      // echo "<a href ='something.php?participantId=$PidTo&level=$level&prgmId=$PgmId' class='btn btn-danger'>ADD To Programs</a>" ;
      ?> 
    </td>
   </tr>


  <?php }

 echo " </table>
</form>"; } ?>
    


<?php

if(isset($_POST['addtopgm']))
{

 $partiId=$_POST['addtopgm'];

  $level=$_SESSION['level'];

 $prgmId=$_SESSION['pgmId'];




   
    $sql="SELECT * FROM participants WHERE id=$partiId AND level='$level'";
 

     $result=$db->display($sql);



$schoolId =$result[0][5];
   
     $n="SELECT Number_of_participants FROM program WHERE Program_id=$prgmId";
$number=$db->display($n);
 
 

    $cc="SELECT count(program_id) as c from student_program WHERE program_id=$prgmId AND level='$level' AND school_id=$schoolId";

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
    
    
    $stmnt = "INSERT INTO `student_program`( `participant_id`, `name`, `level`, `program_id`, `school_id` ,`mobno`) VALUES( :partid , :name, :level, :prgmId,:school_id , :mob)";
      $params = array(

      ':partid' =>  $partiId,
      ':name' => $result[0][1],
      ':level' => $level,
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
