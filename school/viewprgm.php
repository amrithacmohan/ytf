<?php
include_once('header.php');
$db=new Database();
$s=$_SESSION['userid'];
$sql='select * from program';
$result=$db->display($sql);
?>

<?php 



  $sql='SELECT program_id,name,id FROM student_program where school_id= ' .$s. ' ';

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
<div class="row">
        <div class="col-md-8">
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" style="width: 100%;" name="search" class="form-control" id="" value="<?php  echo $search; ?>" placeholder="Search Program">
                    </div>
                    <div class="col-md-3" style="text-align: left;">   
                        <button class="btn btn-info" name="searchz">search</button>
                    </div>  
                </div>
            </div>
            </div>
  </div>
 
         	

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
   
  
    
</tr>
</thead>
<tbody>
    <?php  
     foreach($result as $value) {?>
<tr>
    
    <td><?php echo $value['program_id']; ?></td>
     <td><?php echo $value['name']; ?></td>
    
    <td><a href ="editstud.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">EDIT</a> </td>
    
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
<?php include_once('../footer.php');  ?>