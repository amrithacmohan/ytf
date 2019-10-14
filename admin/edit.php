<?php
    include_once( 'header.php' );
    $db=new Database();
    $message='';
    if(isset($_GET['id']) && $_GET['id']){
      $Program_id = $_GET['id'];
      $stmnt='select * from program where Program_id=:Program_id';
      $params = array(':Program_id' =>  $Program_id);
      $prgm = $db->display($stmnt, $params);
      if( $prgm ) { $prgm = $prgm[0];


        if(isset($_POST['submit'])) { //print_r($_POST);
    $sql='update program set Program=:program,Number_of_participants=:number,Stage=:stage,start=:start1,end=:end1 where Program_id=:Program_id';
    $params=array(
         ':program'      =>  $_POST['program'],
         ':number'      =>  $_POST['number'],
         ':stage'        =>  $_POST['stage'],
         ':start1'         =>  $_POST['start'],
         ':end1'         =>  $_POST['end'],
         ':Program_id'   =>  $Program_id         
      );
     if($db->execute_query($sql,$params))
      $message = '<div class="alert alert-success">successfully updated!</div>';
  }
    
 ?>

  <div id="page-title">
      <h2>Programs</h2>
    
  </div>

  <div class="panel">
      <div class="panel-body">
          <h3 class="title-hero">
            Edit
          </h3>

          <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
          <div class="row">
         

          
            

          
            <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Program</label>
                      <div class="col-sm-6">
                          <input type="text" required class="form-control" name="program" value="<?php echo $prgm['Program']; ?>" id="" placeholder="Program">
                      </div> 
                  </div>
            </div>
             <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Number of participants</label>
                      <div class="col-sm-6">
                          <input type="text" required class="form-control" name="number" value="<?php echo $prgm['Number_of_participants']; ?>" id="" placeholder="Number">
                      </div> 
                  </div>
            </div>


            <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Stage</label>
                      <div class="col-sm-6">
                            <select   required class="form-control" name="stage" id="stg" placeholder="Stage">
                        


        <?php

    

          $stmnt='SELECT * FROM `stage` ';


       if($district = $db->display($stmnt)){
            
            foreach ($district as $value) { ?>
              
              <option value="<?php echo $value['Stage_Number']; ?>" <?php if( $value['Stage_Number'] == $prgm['Stage'] ) echo ' selected'; ?>><?php echo $value['Name'];?></option>
            
            <?php }
       
       }

       else {
            
            $error= '';
        
       }


  ?>
                        
                      </select>
                      </div>
                  </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                      <label class="col-sm-3 control-label">Starts</label>
                      <div class="col-sm-6">
                          <input type="text" required class="form-control" name="start" value="<?php echo $prgm['start']; ?>" id="" placeholder="Date">
                      </div>
                  </div>
            </div><div class="col-md-10">
              <div class="form-group">
                    <label class="col-sm-3 control-label">Ends</label>
                      <div class="col-sm-6">
                          <input type="text" required class="form-control" name="end" value="<?php echo $prgm['end']; ?>" id="" placeholder="Time">
                      </div>
                  </div> 
                   <div class="">
                          <div class="">
                              <input type="submit" size="5" class="btn btn-success btn-lg" name="submit" value="Update">
                          </div>
               </div>
          
        </form>
  
<?php if(isset($message)) echo $message;?>

          </form>
      </div>
    </div>
    <?php 
    }
    } else {
      echo'<script type="text/javascript">
      window.location.href="home.php";
      </script>';
      }?>

<?php include_once('../footer.php');  ?>