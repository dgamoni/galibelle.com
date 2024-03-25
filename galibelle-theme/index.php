<?php get_header(); ?>

  <div class="container">
    <div class="row ">
        
        <div class="col-lg-8">
          <?php while (have_posts()): the_post(); ?>
              <?php $params_post_img = array( 'width' => 846 ); ?>
              <?php $attachment_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
              <?php if ($attachment_url) { ?>
                 <img src="<?php echo bfi_thumb( $attachment_url, $params_post_img ); ?>" class="post_img w-100">
              <?php } ?>
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
          <?php endwhile; ?>
        </div>

        <div class="col-lg-4 sidebar-right">
          <?php get_sidebar('right'); ?>
        </div>

        <div class="col-lg-12">
          <?php get_template_part( 'includes/subscribe' ); ?>
        </div>

    </div>
  </div>

<?php get_footer(); ?> 