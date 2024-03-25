
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
							        	<a class="" href="<?php echo $gal_collection_model_url; ?>" class="bbtn btn-link">Shop now</a>
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