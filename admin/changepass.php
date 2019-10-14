
<?php 
include_once( 'header.php' );

   $db = new Database();
$message = '';
$message1 = '';
if( isset( $_POST['submit'])) {
	$cpassword = $_POST['cpassword'];
	$newpassword1 = $_POST['newpassword1'];
	$newpassword2=$_POST['newpassword2'];

	if( $newpassword1 == $newpassword2 ) {
		$stmnt = 'select * from admin where username = :username and password = :password';
		$params = array(
		':username' => $_SESSION['username'],
		':password' => $cpassword
		);
		//$row =  $db->display($stmnt, $params);
		if( $db->display($stmnt, $params) ) {	
			$stmnt = 'update admin set password = :newpassword1 where username = :username';
			$params = array(
			':username' => $_SESSION['username'],
			':newpassword1' => $newpassword1
			);
			if( $db->execute_query($stmnt, $params) ) {
				$message1 = 'Password changed sucessfully';
			}
		} else {
		 	$message='Current password is wrong';
		}
	} else {
		$message = 'miss match';
	}
}
?>



<div id="page-title">
	    <h2>Change password</h2>
	    
	</div>

	<div class="panel">
    	<div class="panel-body">
	        <h3 class="title-hero">
	            Elements
	        </h3>

	        <form class="form-horizontal bordered-row" data-parsley-validate action="" method="post">
	        	<div class="row">
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Current Password</label>
		                    <div class="col-sm-4">
		                        <input type="password" name="cpassword" placeholder="current password" class="form-control">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">New password</label>
		                    <div class="col-sm-4">
		                        <input type="password" name="newpassword1" placeholder = "New password" class="form-control">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Re-Enter password</label>
		                    <div class="col-sm-4">
                               <input type="password" name="newpassword2" placeholder = "Re-enter password" class="form-control">
		                    </div>
		                </div>
	        		</div>
                </div>
                <div class="content-box text-center">
                    <input type="submit" name="submit" value="Submit"  class="btn btn-primary">
                </div>
                <?php if($message1): ?>
	                <div class="alert alert-success">
						<?php echo $message1; ?>
				<?php elseif($message):?>
				<div class="alert alert-danger">
						<?php echo $message; ?>
	                </div>
            	<?php endif; ?>
	        </form>
	    </div>
    </div>
<?php include_once('../footer.php'); ?>

