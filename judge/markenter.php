<?php
                     


session_start();
   include_once('connectionj.php');
   /////////////////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////////////////////////
   $db = new Database();
   $message = '';
$reg = $_GET['regno'];
$verif = $_GET['verific'];
$ag=$_SESSION['programid'];
$jdgno=$_SESSION['jdgno'];
$sql='select * from program where Program_id='.$ag.' ';
$result=$db->display($sql);
$pgmtype= $result[0]['Program_type'];
$pgmtype2= "g";





if( isset( $_POST['SMark']))
 {
  $mark= $_POST['mark'];
  $veri1= $_POST['veri'];
     
      	 if( md5($verif) == md5($veri1) )
      	 {
      	 	   
      	 	   
      	 	   
                
                
               if($pgmtype == $pgmtype2)
      	 	   { 
                 $thy=random_num(4);
                 echo $thy;
      	 	   	   $sql='update student_program set '.$jdgno.'= '.$mark.' where regno='.$reg.' ';
                 $ff= $db->execute_query($sql);
                 $sql5='select * from student_program where regno='.$reg.' ';
                 $result5= $db->display($sql5);
                 $pgmid= $result5[0]['program_id'];
                 $schlid= $result5[0]['school_id'];
                 

                 $sql3='UPDATE student_program SET '.$jdgno.' = '.$mark.' WHERE program_id='.$pgmid.' AND school_id='.$schlid.' ';
                 $ff3= $db->execute_query($sql3);
                
                 
                   if($jdgno == 'mark1')
                   {
                     $sql4='update student_program set team="'.$thy.'" where program_id="'.$pgmid.'" and school_id="'.$schlid.'" ';
                     $ff3= $db->execute_query($sql4);
                     
                   }
                 header('Location: judge.php?message=Groups Mark Posted');
               } 
              else
               {
                  $sql='update student_program set '.$jdgno.'= '.$mark.' where regno='.$reg.' ';
                  $ff= $db->execute_query($sql);
                  header('Location: judge.php?message=Marks Posted');
               }
         }
         else
         {   
         	header('Location: judge.php?message=Invalid Captcha');
         }   
      

 }////end of isset

?>
<head>     
  <?php include_once('content.php') ?>   
<div style="height:100px"></div>
<div class="container"  >

   <form  method="post" action=" ">
          <div class="input-field">
           <input type="number" name="mark" class="validate">
           <label class="active" for="mark">MARK</label>
         </div>

         <div class="card-panel teal lighten-2" style="width:20%">
         <span class="white-text"><?php echo $verif ?>
         </span>
       </div>

       <div class="input-field">
           <input type="text" name="veri" class="validate">
           <label class="active" for="veri">Please Enter The Above Code</label>
         </div>

         
        <div class="center-align">
         <input type="submit" class="btn waves-effect teal " name="SMark" value="Submit Mark" >
       </div>
 </form>

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