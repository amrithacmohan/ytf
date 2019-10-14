<?php
include_once('connectionj.php');
 $db = new Database();
?>
<head>     
  <?php include_once('content.php') ?> 
  <div class="container " >
  
<?php
$sql=' select * from program';
$result=$db->display($sql);


?>
<p class="z-depth-4 "><div class="blue white-text darken-2 center-align"> SELECT A PROGRAM</div></p>

         <div class="collection" >

          <?php  foreach($result as $value) { 
           if($value['mstatus']!= 0){
           ?>
          <a href="proresult2.php?pgid=<?php echo $value['Program_id']; ?>" class="collection-item waves-effect"><h4 class="center-align"><?php echo $value['Program'];?></h4></a> <?php  } } ?>
         
        </div>
   </div>

   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
          
       </script>
    </body>