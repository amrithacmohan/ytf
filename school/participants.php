
<?php 
include_once( 'header.php'); 
$db = new Database();
$message = '';
$is_group = false;
$name_item = '';








	
	 $stmnt =  "select * from School where School_id=" .$_SESSION['userid'];
 

if( $res = $db->display($stmnt))
		 {


		 	$id =  $res[0]['School_id'];
		 }

		// if(isset($_GET['program_id'])) { 	


  //       	$Program_id = $_GET['program_id'];
  //       	$stmnt="select * from program where Program_id = :programid";
		// 	$params = array(
		// 		':programid'=>$Program_id
		// 	);
		// 	$program = $db->display($stmnt, $params);
		// 	if( $program ) $program = $program[0];
		// 	if( $program['Program_type'] == 'g') {
		// 		$is_group = true;
		// 	}
     



if( isset( $_POST['submit'])) {
	$name  = $_POST['name'];
	$address  = $_POST['address'];
	$mob  = $_POST['mob'];
	

          // $Program_id = $_GET['program_id'];
 
          // $stmnt =  "select * from participants where `Program_id`=". $Program_id." AND `School_id`=". $id." AND `Level`='".$level."'" ;
	
  //     if( ! $db->display($stmnt))
  //     {
      		
		// 	for( $i=0; $i<$program['Number_of_participants']; $i++ )
		// {


		  $stmnt='INSERT INTO participants(`name`, `address`,`mob`,`school_id`) 
		 VALUES (:name, :address,:mob,:school_id)';

		 
		 $params = array(
		 	':name' => $name,
		 	':address' => $address,
		 	
		 	 ':mob' => $mob,
		    
		 	
		 	':school_id'  =>$id

		 	
		 	);
		

		 if( $db->execute_query($stmnt, $params))
		 {
		 	$message="Added";
		 }  
		 
   
	
	else
		 {
		 	$message = 'UnsucessFull';
		 }

}


?>

<div id="page-title">
	    <h2>Add Details</h2>
	  
	</div>

	<div class="panel">
    	<div class="panel-body">
	        <h3 class="title-hero">
	         Add Participant Details
	        </h3>
        		<?php if( $is_group ): ?>
	       			<form action="" method="post"> 
        			</form>
        		<?php endif; ?>
	        <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
        	
        		<div class="row">
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control"  name="name" id="" value="" placeholder="Name">
	                    </div>
	                </div>
        		</div>
        		
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Address</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control"  name="address" id="" value="" placeholder="Address">
	                    </div>
	                </div>
        		</div>
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Mobile Number</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control"  name="mob" id="" value="" placeholder=
	                        "Number">
	                    </div>
	                </div>
        		</div>
        		
        		  <div class="form-group">
			                    <div class="input-group">
			                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Submit">
			                    </div>
			                </div>

        		  <?php echo $message; ?>
<?php 
		// else
		// {
		// 	$message='No permission';
		// }
	 ?>
<?php include_once( '../footer.php' ); ?>










