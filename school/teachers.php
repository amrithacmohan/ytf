
<?php 
include_once( 'header.php'); 
$db = new Database();
$message = '';
if( isset( $_POST['submit'])) {
	//$code = $_SESSION['userid'];
	$name = $_POST['name'];
	$stmnt =  "select * from School where School_id=" .$_SESSION['userid'];
    $result1=$db->display($stmnt);
    $code= $result1[0]['School_code'];
	
		 
	
		 
		 $stmnt='INSERT INTO teachers(`School_code`, `Name`) 
		 VALUES (:code, :name)';
		 $params = array(
		 	':code' => $code,
		 	':name' => $name
		 	
		 	);
		 if( $db->execute_query($stmnt, $params))
		 {
		 	$message="Added";
		 }
		 else
		 {
		 	$message = 'UnsucessFull';
		 }


	





	//}
	







}
?>
		<div id="page-title">
	    <h2>Teachers</h2>
	  
	</div>

	<div class="panel">
    	<div class="panel-body">
	        <h3 class="title-hero">
	         Add Teachers
	        </h3>

	        <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
        	

        	
        		
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="name" id="" placeholder="Name">
	                    </div>
	                </div>
        		</div>
        		  <div class="">
			                    <div class="">
			                        <input type="submit" class="btn btn-success btn-lg" name="submit" value="Submit">
			                    </div>
			                </div>

        		  <?php echo $message; ?>

<?php include_once( '../footer.php' ); ?>