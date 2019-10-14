<?php
include_once('connectionj.php');
 $db = new Database();
 if( isset( $_POST['login']))
 {
 	$rg=$_POST['regno'];
 	header('Location: pinfo.php?regno='.$rg.' ');
    exit();
 }
?>
<head>     
  <?php include_once('content.php') ?> 
  <div style="height:200px"></div>
  <div class="container"  >

   <form  method="post" action="">
          
<div style="height:50px"></div>
         <div class="input-field">
           <input type="text" name="regno" >
           <label class="active" for="regno">Reg No</label>
         </div>
         <div style="height:50px"></div>
        <div class="center-align">
         <input type="submit" class="btn waves-effect teal" name="login" value="submit">
       </div>
 </form>

</div>
      
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
                  
       </script>
  </body>