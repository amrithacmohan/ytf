   
<?php
include_once('connectionj.php');
 $db = new Database();
$regno =$_GET['regno'];

$as='select * from student_program Where regno='.$regno.' ';
$result1=$db->display($as);
$name= $result1[0]['name'];
$pid= $result1[0]['program_id'];
$schid= $result1[0]['school_id'];

$as2='select * from program Where program_id='.$pid.' ';
$result2=$db->display($as2);
$pgrm= $result2[0]['Program'];
$st= $result2[0]['Stage'];
$start=$result2[0]['start'];
$end=$result2[0]['end'];

$as3='select * from school Where school_id='.$schid.' ';
$result3=$db->display($as3);
$scname=$result3[0]['Name'];

$as4='select * from stage Where Stage_Number='.$st.' ';
$result4=$db->display($as4);
$stgname=$result4[0]['Name'];
?>
  <head>     
  <?php include_once('content.php') ?> 
  <div class="card-panel teal">
         <span class="white-text">
         <h5> Name:<?php echo $name;?></h5> 
         <h5> School:<?php echo $scname;?></h5> 
         <h5> Program:<?php echo $pgrm;?></h5>
         <h5> Stage:<?php echo $stgname;?></h5>
         <h5> Start Time:<?php echo $start;?></h5>
         <h5> End Time:<?php echo $end;?></h5>
         </span>
       </div>   
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
          
       </script>
    </body>