<?php 

$args_news = array(
	'post_type' => array(
		'post',
		),
	'post_status' => array(
		'publish',
		),
	'posts_per_page' => 3,
);

$query_news = new WP_Query( $args_news );
$params_news_img = array( 'width' => 405, 'height' => 183 );
 ?>	

<div id="lastnews-block">
    <div class="container">
    	<h5 class="display-4 text-xs-center">Lastest news</h5>
	    
	    <div id="load_more_content" class="row ">
			<?php while ($query_news->have_posts()): $query_news->the_post(); ?>
				<?php setup_postdata( $post ); ?>
		          
		          <div class="col-md-4 lastnewspost">
		          	<?php $thumb_url =  wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
		          	<a href="<?php echo get_post_permalink( $post->ID ); ?>">
		          		<img src="<?php echo bfi_thumb( $thumb_url, $params_news_img  ); ?>" class="w-100">
		          	</a>
		            <h3 class="news-title"><?php the_title(); ?></h3>
		            <p><?php kama_excerpt(array('maxchar'=>'150')); ?></p>
		          </div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php wp_reset_query(); ?>

        </div> <!-- end load_more_content -->

        <a href="#" data-offset="1" id="load_more_news" class="text-xs-center">Load more..</a>

    </div>
</div>