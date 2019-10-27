<?php
include_once('connectionj.php');
 $db = new Database();
$pid =$_GET['pgid'];
$n=1;


$rssj='select * from student_program where program_id='.$pid.'  group by school_id order by total desc ';

?>
<head>     
  <?php include_once('content.php') ?> 
  <div class="container " >

<?php
$result1=$db->display($rssj); 
//$T= $result1[0]['total']; 

if(count($result1)!=0){	
?>
<p class="z-depth-4 "><div class="blue white-text darken-2 center-align"> RESULTS</div></p>

     <div class="collection" >

          <?php  foreach($result1 as $value) {?>

         <div class="card-panel teal">
         <span class="white-text">
         <h5> RANK:<?php echo $n; $n++?></h5>
         <h5> NAME:<?php echo $value['name'];?></h5> 
         <h5> REGNO:<?php echo $value['regno'];?></h5> 
         <h5> SCORE:<?php echo $value['total'];?></h5>
        
         </span>
         </div>
         <?php   } } ?>
         
     </div>
   










<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
          
       </script>
    </body>