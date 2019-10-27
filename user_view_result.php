<?php include_once('user_header.php'); ?>
<?php 

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

<div class="example-box-wrapper">

<table id="datatable-row-highligh" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    
    

    <th>Program</th>
   
  
    
</tr>
</thead>
<tbody>
 <?php  
     foreach($result as $value) {?>
    
<tr>
    
     <td><?php echo $value['Program'] ?> </td>
     <td><form method="post"><a href="view2.php?id=<?php echo $value['Program_id']; ?>">Click Here</a></form></td>
    
    
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