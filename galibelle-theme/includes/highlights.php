

<?php if( have_rows('gal_home_highlights') ): ?>

  <div id="highlights-block" class="hidden-xs-down">
        <div class="container">
          <h5 class="display-4 text-xs-center">Highlights</h5>
          
          <div id="highlights-carousel" class="highlights-carousel">
              <?php while ( have_rows('gal_home_highlights') ) : the_row(); ?>
                    <?php
                      $gal_home_highlights_name = get_sub_field('gal_home_highlights_name');
                      $gal_home_highlights_description = get_sub_field('gal_home_highlights_description');
                      $gal_home_highlights_image = get_sub_field('gal_home_highlights_image');
                      $gal_home_highlights_url = get_sub_field('gal_home_highlights_url');
                      $params_highlights_image = array( 'width' => 370, 'height' => 358 );
                    ?>
                        <div class="carousel-cell">
                          <img src="<?php echo bfi_thumb( $gal_home_highlights_image, $params_highlights_image ); ?>" class="w-100">
                          <div class="highlights-col-text text-xs-center">
                            <p class=""><?php echo $gal_home_highlights_name; ?></p>
                            <a class="highlights-link" href="<?php echo $gal_home_highlights_url; ?>" class="bbtn btn-link">Shop now</a>
                          </div>
                        </div>
              <?php endwhile; ?>
          </div>

      </div>
  </div>

<?php endif; ?>