<?php 
 include_once( 'includes/connection.php' );
$db = new Database();
$message = '';
$Schoolcode = $_GET['School_code'];
$as='select * from school Where School_code='.$Schoolcode.' ';
                        $result1=$db->display($as);
                        $status= $result1[0]['st'];
                        $pass= $result1[0]['Password'];

if( isset( $_POST['submit'])) {

	
	$Name= $_POST['name'];
	$Address=$_POST['address'];
	$Nameofprinci=$_POST['nameofprinci'];
	$Password=$_POST['password'];
	$Password=md5($Password);
    $g='1';
	if($pass==$Password)
	{	
	
		 if( $status == 0)
	      {

			$sql="update school set Name='" .$Name. "', Address='" .$Address. "', Name_of_principal='" .$Nameofprinci. "', st='" .$g. "' where School_code='" .$Schoolcode. "' " ;
                             
			
			

			    if ($db->execute_query($sql) )
			     {
			        $message = 'School Added';  
			        header("Location: http://localhost/ytf/school/login.php");
                    die();
				 }
			    else
			     {
					$message = 'Error';
			     }
	      }
	   else{
		           $message='Link Expired';
	       }
	}
else{
	   $message='Invalid  password';
	}
}

 ?>
<link rel="stylesheet" type="text/css" href="assets/styles.css">

<div id="page-title">
	    <h2>Enter College Details</h2>
	    
	</div>

	<div class="panel">
    	<div class="panel-body">
	        
	        <form class="form-horizontal bordered-row" data-parsley-validate action="" method="post">
	        	<div class="row">
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
<?php include_once('footer.php'); ?>
