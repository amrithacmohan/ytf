<?php


////////////////////////////////////////////////////////////////////////////////
function random_num($size) {
	$alpha_key = '';
	$keys = range('A', 'Z');

	for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}

	$length = $size - 2;

	$key = '';
	$keys = range(0, 9);

	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}

	return $alpha_key . $key;
}


//////////////////////////////////////////////////////////////////////////////////



session_start();
$ag= $_SESSION['programid'];
$th= $_SESSION['jdgno'];

   include_once('connectionj.php');
   $db = new Database();
   $message =$_GET['message'];
   
?>
 <head>     
  <?php include_once('content.php') ?> 
  <div class="container " >
  <div class="fixed-action-btn">
  <a href="index.php" class="btn-floating btn-large"><i class="large material-icons">arrow_back</i></a>
  </div>
<?php
$verif= random_num(3);


$sql=' select * from student_program where program_id= '.$ag.' order by regno ';
$result=$db->display($sql);


?>
<p class="z-depth-4 "><div class="blue white-text darken-2 center-align"> SELECT REG-NO TO ENTER SCORE</div></p>

         <div class="collection" >

          <?php  foreach($result as $value) { 
           if(is_null($value["$th"]) && $value['regno']!= null){
           ?>
          <a href="markenter.php?regno=<?php echo $value['regno']; ?>&verific=<?php echo $verif; ?>" class="collection-item waves-effect"><h4 class="center-align"><?php echo $value['regno'];?></h4></a> <?php  } } ?>
         
        </div>
   </div>     


    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav(); 
           $(document).ready(function(){
           Materialize.toast("<?php echo $message ?>", 3000);

            });
       </script>
    </body>
  