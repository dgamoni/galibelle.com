<?php
$post_objects = get_field('gal_home_joinus');

if( $post_objects ): ?>

    <div id="joinus-block">
		<div class="container">
			<h5 class="display-4 text-xs-center">Join us</h5>
			<div class="row ">
			    <?php foreach( $post_objects as $post): ?>
			        <?php setup_postdata($post); 
			        ?>
			        
			        <div class="col-md-6 text-md-left text-xs-center">
			        	<div class="row ">
			        		<div class="col-xl-7 hidden-sm-down">
				        		<?php the_post_thumbnail( array( 350, 320, 'bfi_thumb' => true ) ); ?>
				        	</div>

				        	<div class="col-xl-4 flex-xl-middle joinus-content">
					            <h3><?php the_title(); ?></h3>
					            <p><?php kama_excerpt("maxchar=100"); ?></p>
					        	<a href="<?php the_permalink(); ?>" class="bbtn btn-link">Know more</a>
					        </div>
				        </div>
			        </div>
			            
			        
			    <?php endforeach; ?>
			</div>
		</div>
	</div>
    
    <?php wp_reset_postdata(); ?>
<?php endif; 