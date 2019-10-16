
<?php 
include_once( 'header.php' );

   $db = new Database();
   $message = '';


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



function sendmessage1($Contact,$p) {

require('textlocal.class.php');
$a= 'amrithacmohan@gmail.com';
$b= '#Amritha1';
$c= '4Cf4ddN4mLo-ZDu15I5ckuFNxnolDTzU7lY4A0b0Me';
$textlocal = new Textlocal($a,$b,false);

$numbers = array($Contact);
$sender = 'TXTLCL';
$message = $p;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}


                             }

function createlinks($Schoolcode,$Password)
{
	$s1="Please use the given link to register to Drishya.";
$s2="  <a>localhost/ytf/schoolreg.php?School_code=".$Schoolcode." </a>";
$s="<a href=".$s2."></a>";
$s3=$s1.''.$s;
$s4="your temporary password is ";
$s5=$Password;
$s6=$s4.$s5;
$mes=$s3.$s6;
echo $mes;
return $mes;
}






if( isset( $_POST['submit'])) {

	$Schoolcode = $_POST['schoolcode'];
	$Contact= $_POST['contact'];
	
	$Password=random_num(8);;
    $Password=$Password;
	$stmnt="select * from school where School_code = :schoolcode";
	$params = array(
			':schoolcode' => $Schoolcode);
	
		 if( !$db->display($stmnt, $params))
	{

			$stmnt = "INSERT INTO `school` (`School_code`, `Admin_id`, `coninfo`,`Password`) VALUES (:School_code , :Admin_id , :con, :Password)";
			$params = array(
			':School_code' => $Schoolcode,
			':Admin_id' =>  $_SESSION['userid'],
			':con' => $Contact,
			':Password' =>md5($Password)
			

			);

			if ($db->execute_query($stmnt, $params) ) {
			$message = 'College Added';
				}
			else
			{
					$message = 'Error';
			}
	}
	else{
		$message='Same values';
	}


$p=createlinks($Schoolcode,$Password);
ECHO $p;

//sendmessage1($Contact,$p);
	
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
		                        <input type="Text" name="schoolcode" placeholder="college code" class="form-control"  min="6">
		                    </div>
		                </div>
	        		</div>
	        		<div class="col-md-12">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Contact no</label>
		                    <div class="col-sm-4">
		                        <input type="text" name="contact" placeholder = "Phone Number" class="form-control">
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

