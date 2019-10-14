<?php include_once( 'user_header.php'); ?>















<?php
include_once( 'includes/connection.php');
 $db = new Database();
 if ( isset($_GET['id']) && $_GET['id']) {
 	$idd = $_GET['id'];
 }
 if ( isset($_POST['update'])) {
 $lvl = $_POST['level'];
echo '
<script type="text/javascript">
	window.location.href="view2.php?level='.$lvl.'&id='.$idd.'";
</script>';
 
 }




 ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" align="center">
                <form method="post" action="" data-parsley-validate="">

                    <div class="content-box">
                        <h3 class="content-box-header content-box-header-alt bg-default">
                            <span class="icon-separator">
                                <i class="glyph-icon icon-cog"></i>
                            </span>
                            <span class="header-wrapper">
                               
                                <small></small>
                            </span>
                        </h3>

                        <input type="hidden" name="Program_id" value="">
                        <div class="col-md-12" align="center">
                        <div class="form-group">
 							<h3>
                            
                            
                               
                                <small>Select Type of the Program</small>
                          
                        </h3>                       
                            <label class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-6">
                                 <select  name="level" required class="form-control">
                                 <option selected="selected" disabled="disabled">select</option>
                                     <option value="sj">Sub Junior</option>
                                    <option value="j">Junior</option>   
                                    <option value="s">Senior</option>  
                                </select>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="submit"  class="btn btn-success" name="update"  value="GO">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>      
        </div>
            
    </div>
    

    <!-- JS Demo -->
    <script type="text/javascript" src="assets/widgets/parsley/parsley.js"></script>
    <script type="text/javascript" src="assets/admin-all-demo.js"></script>

<?php include_once( 'home_footer.php'); ?>
