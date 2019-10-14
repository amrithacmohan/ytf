<?php
include_once('header.php');
$db=new Database();
$sql='select * from program';
$result=$db->display($sql);

 $sql='SELECT p.*, s.Name as pstage_name FROM program p left join stage s on p.stage=s.Stage_Number';

$result=$db->display($sql);

function reset1(){

                        $db=new Database();
                        $sql='update program set Stage= 0,start= 0,end= 0,ststate= 0,total_no= 0,total_time= 0 where 1 = 1';
                        $ff= $db->execute_query($sql);
                        $sql='update stage set state= 0,work= 0 where 1 = 1';
                        $ff= $db->execute_query($sql);
                        $sql='truncate table pgrmdetail';
                        $ff= $db->execute_query($sql);
                        $sql='alter table pgrmdetail auto_increment= 1 ';
                        $ff= $db->execute_query($sql);
}

if( isset( $_POST['submit'])) 
{
reset1();
?>
<script type="text/javascript">
window.location.href = 'viewallow.php';
</script>
<?php
}

?>
 <form align="center"   method="POST" action="">

  
         	

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
    <td><?php echo $value['start']; ?></td>
    <td><?php echo $value['end']; ?></td>
   
    
</tr>
<?php 
     }
    ?> 
</tbody>
</table>
</div>
</div>
</div>
<input type="submit" class="btn btn-success" name="submit" value="Reset">
</form>
<?php include_once('../footer.php');  ?>