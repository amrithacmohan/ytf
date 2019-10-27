<?php
include_once('connectionj.php');
 $db = new Database();
$regno =$_GET['regno'];

$as='select * from student_program Where regno='.$regno.' ';
$result1=$db->display($as);
$name= $result1[0]['name'];
$mk1= $result1[0]['mark1'];
$mk2= $result1[0]['mark2'];
$mk3= $result1[0]['mark3'];
$tt= $result1[0]['total'];
if($mk1==null){$mk1="Not Published";}
if($mk2==null){$mk2="Not Published";}
if($mk3==null){$mk3="Not Published";}
if($tt==null){$tt="Not Published";}

$pid= $result1[0]['program_id'];
$schid= $result1[0]['school_id'];

$as2='select * from program Where program_id='.$pid.' ';
$result2=$db->display($as2);
$pgrm= $result2[0]['Program'];

$as3='select * from school Where school_id='.$schid.' ';
$result3=$db->display($as3);
$scname=$result3[0]['Name'];
?>
  <head>     
  <?php include_once('content.php') ?> 
  <div class="card-panel teal">
         <span class="white-text">
         <h5> Name:<?php echo $name;?></h5> 
         <h5> College:<?php echo $scname;?></h5> 
         <h5> Program:<?php echo $pgrm;?></h5>
         <h6>RESULTS</h6>
         <h5> JUDGE 1:<?php echo $mk1;?></h5>
         <h5> JUDGE 2:<?php echo $mk2;?></h5>
         <h5> JUDGE 3:<?php echo $mk3;?></h5>
         <h5> TOTAL:<?php echo $tt;?></h5>
         </span>
       </div>   
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
          
       </script>
    </body>