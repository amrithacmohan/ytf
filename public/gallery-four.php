<?php include_once( 'header.php' ); 

$db = new Database();
$message = array( NULL, NULL);
?>


<div style="margin-top: 2em;" class="place-form-area"></div>
        <section class="container">
            <div class="col-sm-12">
                <h2 class="page-heading">Gallery</h2>
                
                <div class="row">
                <div class="gallery-wrapper">


<?php

 


$casts = selectFromTable ('*', 'cast', ' delete_status =  0' , $db );

foreach ($casts as  $value) {

    if (file_exists(  '../movies/images_/' .$value['image'] ) && !empty($value['image'])) {


      $image =  PATH . '/movies/images_/' .$value['image'];



      echo '


      <div class="col-sm-4 col-md-3">
          <div class="gallery-item">
              <a href="'.$image.'" class="gallery-item__image gallery-item--photo">
                  <img alt="'.$value['name'].'" src="'.$image.'">
              </a>
              <a href='.$image.' class="gallery-item__descript gallery-item--photo-link">
                  <span class="gallery-item__icon"><i class="fa fa-camera"></i></span>
                  <p  title="'.$value['description'].'" class="gallery-item__name">'.$value['name_in_movie'].'</p>
              </a>
          </div>
      </div>



      ';

    }
 


}

?>


 
                </div>
                </div>
    

                <div class="pagination paginatioon--full">
                   <!--  <a href='gallery-four.html#' class="pagination__prev">prev</a>
                    <a href='gallery-four.html#' class="pagination__next">next</a> -->
                </div>
            </div>

        </section>
        
        <div class="clearfix"></div>

        <?php

        $here = 3;

        ?>

		
		<script type="text/javascript">
            $(document).ready(function() {
                init_Gallery();
            });
		</script>
        <?php include_once( 'footer.php' ); ?>
 