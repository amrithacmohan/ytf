<?php include_once('user_header.php'); ?>
<?php 

include_once('includes/connection.php');
$db = new Database();

  $sql='SELECT p.*, s.Name as pstage_name FROM program p left join stage s on p.stage=s.Stage_Number';

$result=$db->display($sql);


$search = null;
if(isset($_POST['search']) && isset($_POST['searchz'])){
    $search = $_POST['search'];

        $stmnt="SELECT p.*, s.Name as pstage_name FROM program p left join stage s on p.stage=s.Stage_Number where p.Program like '" . trim($_POST['search']," ") . "%' ";
       

        if($db->display($stmnt))
        $result = $db->display($stmnt);

        }

//print_r($result);
?>




<form align="center"   method="POST">

 
         	

    <div class="panel">
<div class="panel-body">
<h3 class="title-hero">
    Programs
</h3>
<div class="example-box-wrapper">

<table id="datatable-row-highligh" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    
    <th>Program</th>
    <th>Number of Participants</th>
    <th>Stage name</th>
    <th>Date</th>
    <th>Time</th>
  
    
</tr>
</thead>
<tbody>
 <?php  
     foreach($result as $value) {?>
    
<tr>
    
     <td><?php echo $value['Program']; ?></td>
     <td><?php echo $value['Number_of_participants']; ?></td>
    <td><?php echo $value['pstage_name']; ?></td>
    <td><?php echo $value['Date']; ?></td>
    <td><?php echo $value['Time']; ?></td>
    <td></td>
    
</tr>
<?php 
     }
    ?> 
</tbody>
</table>
</div>
</div>
</div>
</form>
<?php include_once('home_footer.php'); ?>