<?php get_header(); ?>

<?php 
$gal_collection_link = get_field('gal_collection_link');
$gal_collection_poster_img = get_field('gal_collection_poster_img');
$params_big_img = array( 'width' => 830, 'height' => 640 );
$params_mini_img = array( 'width' => 262, 'height' => 242 );
?>
	<?php while (have_posts()): the_post(); ?>
		<div id="main-collection-block">
		    <div class="container">
			    <div class="row ">
		          <div class="col-lg-4">
		            <h1 class="display-1 text-lg-left text-xs-center"><?php the_title(); ?></h1>
		            <!-- <p><?php kama_excerpt(array('maxchar'=>'150')); ?></p>  -->
		            <p class="collecton-content hidden-md-down"><?php echo get_the_content(); ?></p> 
		            <a data-toggle="modal" data-target="#shopnowmodal" class="hidden-md-down" href="<?php echo $gal_collection_link; ?>">
		            	<button type="button" class="btn btn-warning">Shop <?php the_title(); ?></button>
		            </a>
		          </div>
		          <div id="collectin-poster" class="col-lg-8">
		          	<?php $thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		          	<img src="<?php echo bfi_thumb( $thumb_url, $params_big_img ); ?>" class="w-100">
		          	<div id="mini_poster_img">
		          		<img src="<?php echo bfi_thumb( $gal_collection_poster_img['url'], $params_mini_img ); ?>">
		          	</div> 
		          </div>
		        </div>
		        <div class="row">
		        	<div id="collection-content-mobil" class="col-lg-12 hidden-lg-up text-xs-center">
		            	<p class="collecton-content hidden-lg-up"><?php echo get_the_content(); ?></p> 
		            </div>
		        </div>
		    </div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part( 'includes/model' ); ?>

	<?php get_template_part( 'includes/shema' ); ?>

	<?php get_template_part( 'includes/alsolike' ); ?>

	<?php get_template_part( 'includes/subscribe' ); ?>


<?php get_footer(); ?>  