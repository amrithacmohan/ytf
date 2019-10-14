<?php 
include_once( 'header.php' );

   $db = new Database();
$message = '';


if( isset( $_POST['submit'])) {

	$Schoolcode = $_POST['schoolcode'];
	$Name= $_POST['name'];
	$Address=$_POST['address'];
	$Nameofprinci=$_POST['nameofprinci'];
	$Password=$_POST['password'];

	
			$stmnt = "INSERT INTO `school` (`School_code`, `Admin_id`, `Name`, `Address`, `Name_of_principal`, `Password`) VALUES (:School_code , :Admin_id , :Name, :Address, :Name_of_principal, :Password)";
			$params = array(
			':School_code' => $Schoolcode,
			':Admin_id' =>  $_SESSION['userid'],
			':Name' => $Name,
			':Address' => $Address,
			':Name_of_principal' => $Nameofprinci,
			':Password' => md5($Password)
			

			);

if ($db->execute_query($stmnt, $params) ) {
	$message = 'School Added';
}
else
{
	$message = 'Error';
}

	
}

 ?>
<div id="page-title">
	    <h2>Add a New College</h2>
	    
	</div>

	<div class="panel">
    	<div class="panel-body">
	       
	        <form class="form-horizontal bordered-row" data-parsley-validate action="" method="post">
	        	<div class="row">
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">College Code</label>
		                    <div class="col-sm-4">
		                        <input type="Text" name="schoolcode" placeholder="school code" class="form-control"  min="6">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Name of College</label>
		                    <div class="col-sm-4">
		                        <input type="text" name="name" placeholder = "Name" class="form-control">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Address</label>
		                    <div class="col-sm-4">
                               <input type="text" name="address" placeholder = "Address" class="form-control">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Name of Principal</label>
		                    <div class="col-sm-4">
                               <input type="text" name="nameofprinci" placeholder = "Name of Principal" class="form-control">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Password</label>
		                    <div class="col-sm-4">
                               <input type="password" name="password" placeholder = "Password" class="form-control">
		                    </div> 
		                </div>
	        		</div>
                </div>
                <div class="content-box text-center">
                    <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                </div>
              
				<?php if($message):?>
				<div class="alert alert-success">
						<?php echo $message; ?>
	                </div>
            		<?php endif; ?>
	        </form>
	    </div>
    </div>
<?php include_once('../footer.php'); ?>

