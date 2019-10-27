<?php 
include_once( 'header.php'); 
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

//////////////////////////////////////////////////////////


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
    //print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}


                             }

 ////////////////////////////////////////////////////////
 function createlinks($name1,$user1,$Password1)
{
	
$s2=" Dear".$name1." .Thank you for agreeing to judge Drishya. Your username is".$user1." and password :".$Password1." ";

//echo $s2;
return $s2;
}   


////////////////////////////////////////////////////////////////                         

if( isset( $_POST['submit'])) {
	$name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $pid = $_POST['pid'];
    $jno1= $_POST['jno'];
    $pass12 = random_num(8);
    $pass =md5($pass12);



	 
		 $stmnt="INSERT INTO `judge` (`Name`,`password`,`pgm_id`,`contactinfo`,`mailid`,`jdgno`) VALUES (:name,:pass,:pid,:con,:maili,:jdno)";
		 $params = array(
		 	':name' => $name,
		 	':pass' => $pass,
		 	':pid' => $pid,
		 	':con' => $phno,
		 	':maili' => $email,
		 	':jdno' => $jno1,
		 	);
		 if( $db->execute_query($stmnt, $params))
		 {
		 	$message="Added";
		 	$po=createlinks($name,$email,$pass12);
		 	//echo $po;
		 	sendmessage1($phno,$po);
		 }
		 else
		 {
		 	$message = 'UnsucessFull';
		 }


	







}
?>

	<div id="page-title">
	    <h2>Add Judges</h2>
	  
	</div>

	<div class="panel">
    	<div class="panel-body">
	        

	        <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
        	

        	
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="name" id="" placeholder="Judge Name">
	                    </div>
	                </div>
        		</div>



        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">E-mail</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="email" id="" placeholder="Email ID">
	                    </div>
	                </div>
        		</div>

                 <div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Phone No</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="phno" id="" placeholder="Contact NO">
	                    </div>
	                </div>
        		</div>


<?php  
$sql='select * from program';
$result=$db->display($sql);
?>


                     <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Program</label>
                            <div class="col-sm-6">
                                 <select  name="pid" required class="form-control">
                               
                               <?php  foreach($result as $value) { ?>
                                     <option value=<?php echo $value['Program_id'];?> > <?php echo $value['Program'];?>  </option>
                                 <?php   } ?>
                                </select>
                            </div>
                        </div>
                    </div>



                   <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judge No</label>
                            <div class="col-sm-6">
                                 <select  name="jno" required class="form-control">
                              
                                     <option value="mark1" >1</option>
                                     <option value="mark2" >2</option>
                                     <option value="mark3" >3</option>
                                </select>
                            </div>
                        </div>
                    </div>












        		  <div class="form-group">
			                    <div class="input-group">
			                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
			                    </div>
			                </div>

        		<?php  echo $message; ?>

<?php include_once( '../footer.php' ); ?>

