<?php 
include_once( 'header.php'); 
$db = new Database();
$message = '';
if( isset( $_POST['submit'])) {
	$name = $_POST['name'];
    $stagesize = $_POST['stagesize'];



	$stmnt="select * from stage where Name = :name";
	$params = array(
			':name' => $name);


	if( !$db->display($stmnt, $params))
	{
		 
		 $stmnt="INSERT INTO `stage` (`Name`,`size`) VALUES (:name,:size)";
		 $params = array(
		 	':name' => $name,
		 	':size'=>$stagesize,
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
	else
	{
		
		$message = 'Same VALUES';
	}

}
?>

	<div id="page-title">
	    <h2>Add Stage Details</h2>
	  
	</div>

	<div class="panel">
    	<div class="panel-body">
	        
	        
	        

	        <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
        	

        	
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Stage Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="name" id="" placeholder="Stage Name">
	                    </div>
	                </div>
        		</div>

                  <div class="col-md-10">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Stage Size</label>
		                    <div class="col-sm-6">
		                         <select name="stagesize" required class="form-control">
		                             <option value="2">Large</option>
		                            <option value="1">Small</option>   
		                        </select>
		                    </div>
		                </div>
	        		</div>

        		  <div class="form-group">
			                    <div class="input-group" align="center">
			                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Submit">
			                    </div>
			                </div>

        		  <?php echo $message; ?>

<?php include_once( '../footer.php' ); ?>