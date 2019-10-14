
        <footer class="footer-wrapper">
            <section class="container">
                <div class="col-xs-4 col-md-2 footer-nav">
                    <ul class="nav-link">
                        <li><a href="index.html#" class="nav-link__item">Cities</a></li>
                        <li><a href="movie-list-left.html" class="nav-link__item">Movies</a></li>

                    </ul>
                </div>
                <div class="col-xs-4 col-md-2 footer-nav">
                    <ul class="nav-link">
                        <li><a href="coming-soon.html" class="nav-link__item">Coming soon</a></li>
                        <li><a href="cinema-list.html" class="nav-link__item">Cinemas</a></li>

                    </ul>
                </div>
             
                <div class="col-xs-12 col-md-offset-2 col-md-6">
                    <div class="footer-info">
                        <p class="heading-special--small">A.Movie<br><span class="title-edition">in the social media</span></p>

                        <div class="social">
                            <a href='index.html#' class="social__variant fa fa-facebook"></a>
                            <a href='index.html#' class="social__variant fa fa-twitter"></a>
                            <a href='index.html#' class="social__variant fa fa-vk"></a>
                            <a href='index.html#' class="social__variant fa fa-instagram"></a>
                            <a href='index.html#' class="social__variant fa fa-tumblr"></a>
                            <a href='index.html#' class="social__variant fa fa-pinterest"></a>
                        </div>
                        
                        <div class="clearfix"></div>
                        <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
                    </div>
                </div>
            </section>
        </footer>
    </div>

    <!-- open/close -->
        <div class="overlay overlay-hugeinc">
            
            <section class="container">

                <div class="col-sm-4 col-sm-offset-4">
                    <button type="button" class="overlay-close">Close</button>
                    <form id="login-form" class="logins" method='post' novalidate='' action="login.php">
                        <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

                        <div class="social social--colored">
                              
                            <a href='../user/registration.php' class="btn btn-md btn--ready">register</a>
                        </div>

                        <p class="login__tracker">or</p>
                        
                        <div class="field-wrap">
                        <input type='email' placeholder='Email' name='username' class="login__input">
                        <input type='password' placeholder='Password' name='password' class="login__input">

                        <input type='checkbox' id='#informed' class='login__check styled'>
                        <label for='#informed' class='login__check-info'>remember me</label>
                         </div>
                        
                        <div class="login__control">
                            <button type='submit' name="login" value="login" class="btn btn-md btn--warning btn--wider">sign in</button>
                            <!-- <a href="index.html#"  class="login__tracker form__tracker">Forgot password?</a> -->
                        </div>
                    </form>
                </div>

            </section>
        </div>








        <form class="hidden" name="photo" action="" method="post" enctype="multipart/form-data" id="uploadFileForm"  > 
          <input type="file" name="image" size="30" class="hidden"  id="uploadFile" accept="image/x-png, image/gif, image/jpeg" /> 
          <input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub"/>
        </form>

        <div>
         <!-- Button trigger modal -->
         <button type="button" id="setImg" class="btn btn-primary hidden" data-target="#modal" data-toggle="modal"> </button>

         <!-- Modal -->
         <div class="modal fade dmodel" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this=""   >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="img-container">
                  <img id="image" src="<?php echo PATH; ?>/assets/images/loding.gif" alt="Picture">
                </div>
              </div>
              <div class="modal-footer"> 

                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />

                <input type="hidden" id="r" name="r" />
                <input type="hidden" id="sx" name="sx" />
                <input type="hidden" id="sy" name="sy" />
                <button type="button" id="crop_btn" class="btn btn-default" data-dismiss="modal">save</button>
              </div>
            </div>
          </div>
        </div>
        </div>



















  <!-- JavaScript-->


        <script>window.jQuery || document.write('<script src="../assets/theme/js/external/jquery-1.10.1.min.js"><\/script>')</script>
        <!-- Migrate --> 


        <!-- JS --> 
        <script type="text/javascript" src="<?php echo PATH; ?>/assets/js/jquery.form.js"></script>

        <script type="text/javascript" src="<?php echo PATH; ?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo PATH; ?>/assets/widgets/parsley/parsley.js"></script>

        <!-- <script type="text/javascript" src="<?php// echo PATH; ?>/assets/select2/js/select2.min.js"></script> -->


        <script type="text/javascript" src="<?php echo PATH; ?>/assets/js/cropper.min.js"></script>


        <!-- <script type="text/javascript" src="<?php //echo PATH; ?>/assets/datepicker/js/bootstrap-datepicker.min.js"></script> -->





        <script type="text/javascript" src="<?php echo PATH; ?>/assets/js/cropper.min.js"></script>

        <script type="text/javascript" src="<?php echo PATH; ?>/assets/table-sort/jquery.tablesorter.min.js"></script>




        <script src="../assets/theme/js/external/jquery-migrate-1.2.1.min.js"></script>
        <!-- Bootstrap 3-->  

      

        <script src="../assets/theme/js/jquery-ui.js"></script>



   



        <script type="text/javascript" src="../assets/theme/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="../assets/theme/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Mobile menu -->
        <script src="../assets/theme/js/jquery.mobile.menu.js"></script>
         <!-- Select -->
        <script src="../assets/theme/js/external/jquery.selectbox-0.2.min.js"></script>
        <!-- Stars rate -->
    
     

        <?php
 if($here ==1 ) {
  echo '   <script src="../assets/theme/js/external/idangerous.swiper.min.js"></script>
';
 }   else if($here ==2) {

  echo '
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script> ';
        echo '
        <script src="../assets/theme/js/external/infobox.js"></script>';
 }
  else if($here ==3 ) {
 
        echo '<script src="../assets/theme/js/external/jquery.magnific-popup.min.js"></script>
        ';
 }


  else if($here ==4 ) {
 
        echo '<script src="../assets/js/jspdf.min.js"></script>
        ';
 }



  else if($here ==5 ) {
 
        echo '
        
         <script src="../assets/theme/js/external/jquery.raty.js"></script>
        <script src="../assets/theme/js/external/idangerous.swiper.min.js"></script>
        <script src="../assets/theme/js/external/jquery.magnific-popup.min.js"></script>
        <script src="../assets/theme/js/external/infobox.js"></script>


        ';
 }



  else  {

  echo '    <script src="../assets/theme/js/external/jquery.raty.js"></script>
   <script src="../assets/theme/js/external/twitterfeed.js"></script>
';
 }
?>
   
        <!-- Form element -->
        <script src="../assets/theme/js/external/form-element.js"></script>


     
        <!-- Form validation -->
        <script src="../assets/theme/js/form.js"></script>

        <!-- Twitter feed -->
      
        <!-- Custom -->
        <script src="../assets/theme/js/custom.js"></script>
    
        <script type="text/javascript">


 




 
 // $('select').select2();

  $("table").tablesorter(); 
  $('table').addClass('tablesorter');


  var selectOption = {};
  $("select > option").each(function () {
      if(selectOption[this.text]) {
          $(this).remove();
      } else {
          selectOption[this.text] = this.value;
      }
  });



 $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip(); 
 });




 



 /***********************************uplad image only **************************************/


 $(document).on("click", "#upload_image", function(e) {
  e.preventDefault();
  $('#uploadFile').val('');
  $('#uploadFile').click();
  $('#modal.dmodel').attr("to_this", "aimage_base");

});




/////////////////////////////////////////////////////


 $('.select-the-seat > input[type=checkbox]').click(function(){
  if( $(this).is(':checked') )
    $(this).closest('div').css('background-color', 'green');
  else
    $(this).closest('div').css('background-color', '#9e9090');

 });



 var down = false;
 $(document).mousedown(function() {
     down = true;
 }).mouseup(function() {
     down = false;  
 });



 // $('.select-the-seat>input[type="checkbox"]').mouseover(function(){
 //      if(down)
 //        chekedHereh(this);
 // });
 
 // $('.select-the-seat>input[type="checkbox"]').mousedown(function(){ 
 //        chekedHereh(this);
 // });
 
 $('.hoverclickas').mouseover(function(){
      if(down)
        chekedHereh($(this).closest('td').find('input[type="checkbox"]'));
 });
 
 $('.hoverclickas').mousedown(function(){ 
        chekedHereh($(this).closest('td').find('input[type="checkbox"]'));
 });
 
var chekedHereh = function(thiss) {


  if( $(thiss).is(':checked') ){

    $(thiss).prop('checked', false);

    if( !$(thiss).is(':checked') )
    $(thiss).parent('div').css('background-color', '#9e9090');

  }else {

    $(thiss).prop('checked', true);

    if( $(thiss).is(':checked') )
    $(thiss).parent('div').css('background-color', 'green');

  }



};




////////////////////////////////////////////////////////









 $('#uploadFile').change(function() {


  $("#uploadFileForm").ajaxForm({
    url :"<?php echo PATH;  ?>/upladimage.php",
    cache : false,
    success: function(responseText,statusText, xhr, $form) { 
      $imageHrCro = ''+responseText.trim();
      if ($imageHrCro.trim().length >1) {
        $imageHrCro = '<?php echo PATH;  ?>'+'/'+responseText.trim();
        $('.img-container > img').attr('src', $imageHrCro);
        $('#setImg').click();
        $('body').removeClass("modal-x");
        $('body').removeClass("loading");
      }    
    }
  }).submit();
  $('body').addClass("modal-x");
  $('body').addClass("loading"); 
  $('#upladimagepfinalsub').click();                
});    

 var cropBoxData;
 var cropBoxData;
 var canvasData;
 var cropper;

 $('#modal.dmodel').on('shown.bs.modal', function () {            
  cropper = new Cropper(document.getElementById('image'), { 
    autoCropArea: 0.5,
    aspectRatio: 16 / 16,
    guides: true,
    minContainerWidth :350,
    minContainerHeight : 350,
    ready: function () { 
      cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);           
    }, crop: function(e) {
      updateCoords(e);
    }
  });
}).on('hidden.bs.modal', function () {

  cropBoxData = cropper.getCropBoxData();
  canvasData = cropper.getCanvasData();
  cropper.destroy();
  var x_ = $('#x').val();
  var y_ = $('#y').val();
  var w_ = $('#w').val();
  var h_ = $('#h').val();
  var TARGET_W = 300;
  var TARGET_H = 300;
  var photo_url_ = $('#image').attr('src');
  photo_url_ = photo_url_.substr(3);
  photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
  $sest_utl_p_ = 'movies/images_/';
  $.post('<?php echo PATH;  ?>/crop_photo.php', {
   x:x_, 
   y:y_, 
   w:w_, 
   h:h_, 
   photo_url:photo_url_, 
   targ_w:TARGET_W, 
   targ_h:TARGET_H, 
   sest_utl_p_:$sest_utl_p_ },
   function(response){ 
               //console.log(response);
               if (response.trim().length > 1) { 

                response =$.parseJSON(response); 
                if(response.success == 1) {   
                  $to_image = $('#modal').attr("to_this");
                  $('#'+$to_image).find('.fileinput-new').attr('value', response.name);
                  $('#'+$to_image).find('.fileinput-new').attr("path",response.path+response.name);
                  $('#'+$to_image).find('img').attr('src',"http://"+response.full);
                // no nd
                chek_imag();
              }
            }
          }); 
});


function updateCoords(e) {
  $('#x').val(e.detail.x);
  $('#y').val(e.detail.y);
  $('#w').val(e.detail.width);
  $('#h').val(e.detail.height);

  $('#r').val(e.detail.rotate);
  $('#sx').val(e.detail.scaleX);
  $('#sy').val(e.detail.scaleY);
}


function chek_imag () {
  $dimage = $('span.fileinput-new').text();

  console.log($dimage );
  if($dimage.trim().length > 2){ 
  } else { 
  }

  console.log($dimage);

}



/**************************************end image edit *************************************************/



 $(document).on("click", "#upload_image_non_Crop", function(e) {
  e.preventDefault();
  $('#uploadFile_non_Crop').val('');
  $('#uploadFile_non_Crop').click(); 

});



 $('#uploadFile_non_Crop').change(function() {


  $("#uploadFileForm_nonCrop").ajaxForm({
    url :"<?php echo PATH;  ?>/upladimage.php",
    cache : false,
    success: function(responseText,statusText, xhr, $form) { 
      console.log(responseText,statusText, xhr, $form);

      $imageHrCro = ''+responseText.trim();
      
      if ($imageHrCro.trim().length >1) {

        $('#aimage_base_nonCrop').find('.fileinput-new').attr('value', $imageHrCro.replace(/^.*[\\\/]/, '') );
        
        $imageHrCro = '<?php echo PATH;  ?>'+'/'+responseText.trim();
        $('img.my_image_here_cust').attr('src', $imageHrCro);

      }    
    }
  }).submit();

  $('#upladimagepfinalsub').click();                
});    








</script>
</body>
</html>
