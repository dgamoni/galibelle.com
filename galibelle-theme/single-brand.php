<?php get_header(); ?>

<?php 
$params_brand_img = array( 'width' => 626, 'height' => 637 );
?>
	<?php while (have_posts()): the_post(); ?>
		<div id="brand-block">
		    <div class="container">
			    <div class="row ">
		          <div class="col-lg-6">
		            <h1 class="display-1 text-lg-left text-xs-center"><?php the_title(); ?></h1>
		            <!-- <p><?php kama_excerpt(array('maxchar'=>'150')); ?></p>  -->
		            <p class="brand-content hidden-md-down"><?php echo get_the_content(); ?></p> 
		          </div>
		          <div class="col-lg-6">
		          	<?php $thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		          	<img src="<?php echo bfi_thumb( $thumb_url, $params_brand_img ); ?>" class="w-100">
		          </div>
		        </div>
		        <div class="row">
		        	<div id="brand-content-mobil" class="col-lg-12 hidden-lg-up text-xs-center">
		            	<p class="brand-content hidden-lg-up"><?php echo get_the_content(); ?></p> 
		            </div>
		        </div>
		    </div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part( 'includes/news' ); ?>

	<?php get_template_part( 'includes/subscribe' ); ?>


<?php get_footer(); ?>   