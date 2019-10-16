
<?php 
include_once( 'header.php'); 
$db = new Database();
$message = '';
if( isset( $_POST['submit'])) {
	$programtype = $_POST['programtype'];
	$program = $_POST['program'];
	$number = $_POST['number'];
	$stagesize = $_POST['stagesize'];
	$timelim = $_POST['timelim'];
	/*$stage = $_POST['stage'];
	$date = $_POST['date'];
	$time = $_POST['Time'];*/


	// $stmnt="select * from program where Program = :program";
	// $params = array(
	// 		':Program' => $program);

	// print_r($_POST);
	// if( !$db->display($stmnt, $params))
	// {
		 
		 $stmnt='INSERT INTO program(`Program_type`, `Program`,`Number_of_participants`, `st_size`, `time_limit`) 
		 VALUES (:programtype, :program, :_number, :stage, :_time)';
		 $params = array(
		 	':programtype' => $programtype,
		 	':program' => $program,
		 	':_number' =>$number,
		 	':stage' => $stagesize,
		 	
		 	':_time' => $timelim
		 	);
		 if( $db->execute_query($stmnt, $params))
		 {
		 	//$message="Added"; 
		 	echo"<script>
             window.alert('Added');
            </script> ";
		 }
		 else
		 {
		 	//$message = 'UnsucessFull';
		 	echo"<script>
             window.alert('UnsucessFull');
            </script> ";
		 }


	//}
	







}
?>













	<div id="page-title">
	    <h2>Add a New Program</h2>
	  
	</div>

	<div class="panel">
    	<div class="panel-body">
	        

	        <form class="form-horizontal bordered-row" data-parsley-validate method="post" action="">
        	   <div class="row">
        	   <div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Program</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="program" id="" placeholder="Program">
	                    </div>
	                </div>
        		</div>
        		<div class="row">
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Number of participants</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control"  name="number" id="" value="1" placeholder="Number">
	                    </div>
	                </div>
        		</div>
        		<div class="col-md-10">
			        	<div class="form-group">
		                    <label class="col-sm-3 control-label">Program Type</label>
		                    <div class="col-sm-6">
		                         <select name="programtype" required class="form-control">
		                             <option value="g">Group Program</option>
		                            <option value="s">Solo</option>   
		                        </select>
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

	        		<div class="row">
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Allowed Time</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control"  name="timelim" id=""  placeholder="Number">
	                    </div>
	                </div>
        		</div>


        <!--		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Stage</label>
	                    <div class="col-sm-6">
	                          <select   required class="form-control" name="stage" id="stg" placeholder="Stage">
	                    	


	                    <?php


	                    $stmnt="select * from stage";
	                    $stage = $db->display( $stmnt);
	                    if( $stage ) {

	                    	foreach ($stage as $value) {


	                    		echo "<option  value='". $value['Stage_Number']."' >" . $value['Name'] . "</option>";


	                    	}

	                    }




	                    ?>

	                    	
	                    </select>
	                    </div>
	                </div>
        		</div>
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Date</label>
	                    <div class="col-sm-6">
	                        <input type="text" required class="form-control" name="date" id="datepicker-d" placeholder="Date">
	                    </div>
	                </div>
        		</div>
        		<div class="col-md-10">
		        	<div class="form-group">
	                    <label class="col-sm-3 control-label">Time</label>
	                    <div class="col-sm-6">

	                    <div class="input-group bootstrap-timepicker timepicker">
	                        <input id="timepickeFKr" type="text" class="form-control input-small"    name="Time"   placeholder="Time">
	                        <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
	                    </div>
	 -->                <div class="">
			                    <div class="col-md-10">
			                        <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit">
			                    </div>
			         </div>
        	
        </form>


 <script type="text/javascript" src="<?php echo PATH; ?>/assets/timepicker/js/bootstrap-timepicker.js"></script>



<script type="text/javascript" src="../assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>


        <script type="text/javascript">
        		$(document).ready(function(){

        			$('#timepickeFKr').timepicker();


        			$('#datepicker-d').datepicker({
        				format: 'yyyy-mm-dd'
        			});

        		});


        </script>
<?php 
	echo( $message);
?>


	
<?php include_once( '../footer.php' ); ?>