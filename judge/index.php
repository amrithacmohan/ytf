
<?php
function checkTime($time1,$time2)
                       {
                          $start = strtotime($time1);
                          $end = strtotime($time2);
                          if ($start-$end > 0)
                          return 1;
                          else
                          return 0;
                        }
 /////////////////////////////////////////////////////////////////////////////////////////  
   include_once('connectionj.php');
   $db = new Database();
   $message = "";
   date_default_timezone_set("Asia/Kolkata");
   $currentTime = time();
   $time1 = date('Y-m-d H:i',$currentTime);
  
if( isset( $_POST['login']))
 {




       $name1= $_POST['name'];
       $password1= $_POST['password'];

       $stmnt = 'select * from judge where mailid = :name and Password = :password';
       $params = array(
       ':name' => $name1,
       ':password' => md5($password1)
       );
       $result = $db->display($stmnt, $params);
            if( $result ) 
            {   $ag=$result[0]['pgm_id'];
                $sql='select * from program where program_id='.$ag.' ';
                $result1=$db->display($sql);
                $time2= $result1[0]['start'];
                   if(checkTime($time2,$time1))
                     {
                      $message= 'You can only login after '.$time2.' ';
                     }
                     else 
                     {
                       session_start();
                       $_SESSION['programid'] = $result[0]['pgm_id'];
                       $_SESSION['user'] = $name;
                       $_SESSION['id'] = $result[0]['id'];
                       $_SESSION['jdgno'] = $result[0]['jdgno'];

                       header('Location: judge.php?message=welcome');
                       exit();  
                     } 
            }
           else
            {
                $message = 'incorrect username or password';
    
            }
          
}
  

?>
 <head>     
  <?php include_once('content.php') ?>   
<div style="height:200px"></div>
<div class="container"  >

   <form  method="post" action="index.php">
          <div class="input-field">
           <input type="email" name="name" class="validate">
           <label class="active" for="email">User Name</label>
         </div>
<div style="height:50px"></div>
         <div class="input-field">
           <input type="password" name="password" class="validate">
           <label class="active" for="email">Password</label>
         </div>
         <div style="height:50px"></div>
        <div class="center-align">
         <input type="submit" class="btn waves-effect teal" name="login" value="Login">
       </div>
 </form>

</div><!---container-->



      <!--JavaScript at end of body for optimized loading-->
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script>
          $(".button-collapse").sideNav();
          $(document).ready(function(){
           Materialize.toast("<?php echo $message ?>", 3000);

            });
       </script>
    </body>
  