
<?php if( have_rows('gal_collection_model') ): ?>

	<div id="model-block" class="">
        <div class="container">
        	<h5 class="display-4 text-xs-center"><?php echo get_the_title( $post->ID ); ?> Highlights</h5>
        	<div class="row ">

		    <?php while ( have_rows('gal_collection_model') ) : the_row(); ?>

				        <?php if( get_row_layout() == 'model' ) : ?>
					        	<?php
									$gal_collection_model_name = get_sub_field('gal_collection_model_name');
									$gal_collection_model_description = get_sub_field('gal_collection_model_description');
									$gal_collection_model_img = get_sub_field('gal_collection_model_img');
									$gal_collection_model_url = get_sub_field('gal_collection_model_url');
									$params_model_img = array( 'width' => 400, 'height' => 400 );
								?>

								
						        <div class="model-col col-md-6 flex-md-middle">
						        	<img src="<?php echo bfi_thumb( $gal_collection_model_img, $params_model_img ); ?>" class="">
						        	<div class="model-col-text text-xs-center">
							        	<p class=""><?php echo $gal_collection_model_name; ?></p>
							        	<a class="" href="<?php echo $gal_collection_model_url; ?>" class="bbtn btn-link" data-toggle="modal" data-target="#shopnowmodal">Shop now</a>
							        </div>
						        </div>
						         
						        

				        <?php elseif( get_row_layout() == 'baner' ) : ?>
			        	
					        	<?php
									$gal_collection_banner_img = get_sub_field('gal_collection_banner_img');
									$gal_collection_banner_url = get_sub_field('gal_collection_banner_url');
									$params_banner_img = array( 'width' => 400, 'height' => 640 );
								?>

						        
						        <div class="model-col col-md-6">  
						        	<img src="<?php echo bfi_thumb( $gal_collection_banner_img, $params_banner_img ); ?>" class="">
						        </div>
						        

			        	<?php endif; ?>

		    <?php endwhile; ?>

			</div>
	    </div>
	</div>

<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="shopnowmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close-icon" aria-hidden="true">&times;</span>
          <span class="close-label" aria-hidden="true">close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select a country</h4>
      </div>
      <div class="modal-body row">
      	<?php 
      	$menu_id_1 = 58; //Shop online > 1
      	$menu_id_2 = 59; //Shop online > 2
      	$menu_id_3 = 60; //Shop online > 3
		$menu_id_4 = 61; //Shop online > 4	
      	?>
      	<div class="modal-col col-lg-3"><?php echo gal_get_menu_by_id($menu_id_1); ?></div>
      	<div class="modal-col col-lg-3"><?php echo gal_get_menu_by_id($menu_id_2); ?></div>
      	<div class="modal-col col-lg-3"><?php echo gal_get_menu_by_id($menu_id_3); ?></div>
      	<div class="modal-col col-lg-3"><?php echo gal_get_menu_by_id($menu_id_4); ?></div>
      </div>

    </div>
  </div>
</div>