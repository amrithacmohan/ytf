<?php

include_once('header.php');
///////////////////////////////////////////////////////////////////////////
function fullcheck($f)
{
   $db=new Database();
   $k=0;
   $sql='select * from student_program where program_id='.$f.' ';
   $result2=$db->display($sql);
   $gcount=count($result2);
   for($i=0 ; $i < $gcount ; $i++)
  {
   $m1= $result2[$i]['mark1'];
   $m2= $result2[$i]['mark2'];
   $m3= $result2[$i]['mark3'];
   if($m1==null || $m2==null || $m3==null )
   $k= $k+1; 
  }  
        if($k==1)
          {
            return 1;
          } 
        else
          {
            return 0;
          }

}
///////////////////////////////////////////////////////////////////////////////////////
$db=new Database();
$message =$_GET['message'];
echo $message;
$sql='select * from program';
$result=$db->display($sql);
?>

<?php 



/* $sql='SELECT p.*, s.Name as pstage_name FROM program p left join stage s on p.stage=s.Stage_Number';

$result=$db->display($sql); */


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
    <th>Stage name</th>
    <th>Starts</th>
    <th>Ends</th>
    <th>Publish status</th>
    
</tr>
</thead>
<tbody>
    <?php  
     foreach($result as $value) {
      echo $value['Program_id']; 
        $d=fullcheck($value['Program_id']); 
        if($d==1)
        {
         $visi='visible'; 

        } 
        else{
          $visi='invisible';  
        }
        ?>
<tr>
    
    <td><?php echo $value['Program']; ?></td>
     <td><?php echo $value['Number_of_participants']; ?></td>
    <td><?php echo $value['Stage']; ?></td>
    <td><?php echo $value['start']; ?></td>
    <td><?php echo $value['end']; ?></td>
    <?php if($visi=='visible')
    {  ?>
    <td><a href ="level.php?id=<?php echo $value['Program_id']; ?>" class="btn btn-danger ?> ">Publish </a></td>
    <?php 
    }  ?>
    
</tr>
<?php 
     }
    ?> <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
           
           $(document).ready(function(){
           Materialize.toast("<?php echo $message ?>", 3000);

            });
       </script>

</tbody>
</table>
</div>
</div>
</div>
</form>
<?php include_once('../footer.php');  ?>