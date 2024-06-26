<?php
$post_objects = get_field('gal_collection_alsolike');
$params_alsolike_img = array( 'width' => 404, 'height' => 413 );

if( $post_objects ): ?>

    <div id="alsolike-block" class="shema">
		<div class="container">
			<h5 class="display-4 text-xs-center">You may also like</h5>
			<div class="row ">
			    <?php foreach( $post_objects as $post): ?>
			        <?php setup_postdata($post); 
			        ?>
			        
			        <div class="col-md-4">
		        		<div class="alsolike-img">
		        			<a href="<?php the_permalink(); ?>">
			        			<?php $thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			        			<?php $gal_collection_alsolike_image = get_field('gal_collection_alsolike_image', $post->ID); ?>
			        			<?php 
			        			if ($gal_collection_alsolike_image) { ?>
			        				<img src="<?php echo bfi_thumb( $gal_collection_alsolike_image, $params_alsolike_img ); ?>" class="w-100">
			        			<?php } else { ?>
			        				<img src="<?php echo bfi_thumb( $thumb_url, $params_alsolike_img ); ?>" class="w-100">	
			        			<?php } ?>
				        		<p class="alsolike-subtitle"><?php echo get_field( 'gal_collection_subtitle', $post->ID ); ?></p>
				        	</a>
			        	</div><br /><p style="text-align: center;"><h7><?php echo get_the_title( $post->ID ); ?></h7></p>
			        </div>
			            
			        
			    <?php endforeach; ?>
			</div>
		</div>
	</div>
    
    <?php wp_reset_postdata(); ?>
<?php endif; 
