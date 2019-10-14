<?php
   include_once('../includes/connection.php');

   $db = new Database();
$message = '';
if( isset( $_POST['login'])) {
	$schoolcode = $_POST['schoolcode'];
	$password = $_POST['password'];

	$stmnt = 'select * from school where School_code = :schoolcode and Password = :password';
	$params = array(
		':schoolcode' => $schoolcode,
		':password' => md5($password)
		);
	$result = $db->display($stmnt, $params);
	if( $result ) {
		session_start();
		$_SESSION['userid'] = $result[0]['School_id'];
		$_SESSION['schoolcode'] = $schoolcode;
		$_SESSION['type']	= 'school';


		header('Location: home.php');
		exit();
	}
	else
	{
		$message = 'incorrect School Code or password';
	}
}
?>



<!-- <!DOCTYPE html> 
<html>
<head>
	<title>login</title>
</head>
<body>
<form action="" method="post">
	<h3> Enter School Code<input type="text" name="schoolcode" placeholder="Scool Code"><br><br><br>
	Enter password<input type="password" name="password" placeholder = "Password"></h3>
	<input type="submit" name="login" value="login" ><br>
	<?php echo $message; ?>
</form>-->

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>School Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <script type="text/javascript" src="../assets/js-core.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" action="" data-parsley-validate="">
			        <div class="content-box">
			            <h3 class="content-box-header content-box-header-alt bg-default">
			                <span class="icon-separator">
			                    <i class="glyph-icon icon-cog"></i>
			                </span>
			                <span class="header-wrapper">
			                    Login
			                    <small>Use the form below to login to your account.</small>
			                </span>
			            </h3>
			            <div class="content-box-wrapper">
			                <div class="form-group">
			                    <div class="input-group">
			                        <input type="text" class="form-control" name="schoolcode" placeholder="SchooL code" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <div class="input-group">
			                        <input type="password" class="form-control" name="password" placeholder="Password" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <div class="input-group">
			                        <input type="submit" class="btn btn-success btn-block" name="login" value="Login">
			                    </div>
			                </div>
			                <?php echo $message; ?>
			            </div>
			        </div>
			    </form>
			</div>		
		</div>
			
	</div>
	

    <!-- JS Demo -->
	<script type="text/javascript" src="../assets/widgets/parsley/parsley.js"></script>
    <script type="text/javascript" src="../assets/admin-all-demo.js"></script>
</body>

<?php
include_once('../footer.php');
?>