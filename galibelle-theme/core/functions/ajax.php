<?php



add_action( 'wp_ajax_get_firms_places', 'get_firms_places' );
add_action( 'wp_ajax_nopriv_get_firms_places', 'get_firms_places' );

function get_firms_places() {

	$term_id = $_POST['term_id'];

	$args = array(
		'post_type'      => 'shops',
		'posts_per_page' => - 1
	);

	if ( $term_id ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'regions',
				'field'    => 'id',
				'terms'    => array( $term_id )
			)
		);
	}

	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$google_coordinats = get_field( 'gal_shop_google_maps', get_the_ID() );
		//$arr               = explode( ',', $google_coordinats );
		$lat               = $google_coordinats['lat'];
		$lng               = $google_coordinats['lng'];

		$res[] = array(
			get_the_title(),
			$lat,
			$lng,
			'<span class="gmap_point"></span>'
		);
	endwhile;
	wp_reset_query();
	echo json_encode( $res );
	exit;

}








/**
 * get_firms_by_region
 */
add_action( 'wp_ajax_deco_get_firms_by_region', 'deco_get_firms_by_tax' );
add_action( 'wp_ajax_nopriv_deco_get_firms_by_region', 'deco_get_firms_by_tax' );

function deco_get_firms_by_tax( $first_term_id = 0 ) {

	if ( empty( $first_term_id ) ) {
		$first_term_id = intval( $_POST['term_id'] );
	}


	$r = new WP_Query( array(
		'post_type'      => 'shops',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'regions',
				'field'    => 'id',
				'terms'    => array( $first_term_id )
			)
		)
	) );

	ob_start();

	$i = 1;
	while ( $r->have_posts() ): $r->the_post();
		
		$gal_regions_zoom_map = get_field( 'gal_regions_zoom_map', get_the_ID() );
		if ($gal_regions_zoom_map) {
			$zoom = $gal_regions_zoom_map;
		} else {
			$zoom = 0;
		} 
		?>

		<?php $object_terms = wp_get_object_terms( $r->post->ID, 'regions' ); ?>

		<div class="box cf" id="<?php echo $object_terms[0]->slug; ?>">
			<div class="images">

				<?php

				$images = get_field( 'office_gallery' );

				if ( $images ): ?>
					<ul>
						<?php foreach ( $images as $image ): ?>
							<li>
								<a href="<?php echo $image['url']; ?>" class="fancybox-hidden-gallery">
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								</a>

								<p><?php echo $image['caption']; ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>
			<div class="text">
				<!-- <p class="main_city"><?php echo $object_terms[0]->slug; ?></p> -->
				<p class="main_city"><?php echo $object_terms[0]->name; ?></p>
				<p class="adres">
					<?php


					$office_coords = get_field( 'gal_shop_google_maps', get_the_ID() );

					//list( $lat, $lng ) = explode( ',', $office_coords );
					// $lat = trim( $lat );
					// $lng = trim( $lng );

					$lat               = $office_coords['lat'];
					$lng               = $office_coords['lng'];

					?>
					<?php $object_terms2 = wp_get_object_terms($r->post->ID,'regions'); ?>
					<!-- <a href="#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-term-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link"> -->
						<span><?php echo get_the_title(); ?></span>
						<!--p><?php //echo get_the_title(); ?></p-->
						<?php //echo get_field( 'field_543bcfa3b8961', get_the_ID() ); ?>
					<!-- </a> -->
					<?php
					//$office_address = get_field( 'office_address', get_the_ID() );
					?>
				</p>

				<?php if ( $gal_shop_address_1 = get_field( 'gal_shop_address_1', get_the_ID() ) ) { ?>
					<a href="#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-zoom="<?php echo $zoom; ?>" data-term-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link gal_shop_address_2_link">
						<p class="gal_shop_address_1"><?php echo $gal_shop_address_1; ?></p>
					</a>
				<?php } ?>

				<?php if ( $gal_shop_address_2 = get_field( 'gal_shop_address_2', get_the_ID() ) ) { ?>
					<a href="#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-zoom="<?php echo $zoom; ?>" data-term-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link gal_shop_address_2_link">
						<p class="gal_shop_address_2"><?php echo $gal_shop_address_2; ?></p>
					</a>
				<?php } ?>

				<?php if ( $gal_shop_phone = get_field( 'gal_shop_phone', get_the_ID() ) ) { ?>
					<p class="gal_shop_phone"><?php echo $gal_shop_phone; ?></p>
				<?php } ?>

				<?php if ( $gal_shop_email = get_field( 'gal_shop_email', get_the_ID() ) ) { ?>
					<p class="gal_shop_email">
						<a href="mailto:<?php echo $gal_shop_email; ?>"><?php echo $gal_shop_email; ?></a>
					</p>
				<?php } ?>

				<?php if ( $gal_shop_website_url = get_field( 'gal_shop_website_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_website_url">
						<a href="<?php echo $gal_shop_website_url; ?>"><?php echo $gal_shop_website_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_facebook_url = get_field( 'gal_shop_facebook_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_facebook_url">
						<a href="<?php echo $gal_shop_facebook_url; ?>"><?php echo $gal_shop_facebook_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_instagram_url = get_field( 'gal_shop_instagram_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_instagram_url">
						<a href="<?php echo $gal_shop_instagram_url; ?>"><?php echo $gal_shop_instagram_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_google_maps = get_field( 'gal_shop_google_maps', get_the_ID() ) ) { ?>
					<p class="gal_shop_google_maps">
						<?php echo $gal_shop_google_maps['address']; ?>
					</p>
				<?php } ?>

			</div>
		</div>
		<ul id="search_city_list">
			<li>
				<a href="/stores/#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-zoom="<?php echo $zoom; ?>" data-tax-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link firm_adress_link">
						<!-- <?php echo $object_terms[0]->slug; ?> -->
						<?php echo $object_terms[0]->name; ?>
				</a>
	
	<!-- list -->
		<div class="list box cf" id="<?php echo $object_terms[0]->slug; ?>">
			<div class="images">

				<?php

				$images = get_field( 'office_gallery' );

				if ( $images ): ?>
					<ul>
						<?php foreach ( $images as $image ): ?>
							<li>
								<a href="<?php echo $image['url']; ?>" class="fancybox-hidden-gallery">
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								</a>

								<p><?php echo $image['caption']; ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>
			<div class="text">
				<!-- <p class="main_city"><?php echo $object_terms[0]->slug; ?></p> -->
				<p class="adres">
					<?php


					$office_coords = get_field( 'gal_shop_google_maps', get_the_ID() );

					//list( $lat, $lng ) = explode( ',', $office_coords );
					// $lat = trim( $lat );
					// $lng = trim( $lng );

					$lat               = $office_coords['lat'];
					$lng               = $office_coords['lng'];

					?>
					<?php $object_terms2 = wp_get_object_terms($r->post->ID,'regions'); ?>
					<a href="#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-zoom="<?php echo $zoom; ?>" data-term-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link">
						<span><?php echo get_the_title(); ?></span>
						<!--p><?php //echo get_the_title(); ?></p-->
						<?php //echo get_field( 'field_543bcfa3b8961', get_the_ID() ); ?></a>
					<?php
					//$office_address = get_field( 'office_address', get_the_ID() );
					?>
				</p>

				<?php if ( $gal_shop_address_1 = get_field( 'gal_shop_address_1', get_the_ID() ) ) { ?>
					<p class="gal_shop_address_1"><?php echo $gal_shop_address_1; ?></p>
				<?php } ?>

				<?php if ( $gal_shop_address_2 = get_field( 'gal_shop_address_2', get_the_ID() ) ) { ?>
					<p class="gal_shop_address_2"><?php echo $gal_shop_address_2; ?></p>
				<?php } ?>

				<?php if ( $gal_shop_phone = get_field( 'gal_shop_phone', get_the_ID() ) ) { ?>
					<p class="gal_shop_phone"><?php echo $gal_shop_phone; ?></p>
				<?php } ?>

				<?php if ( $gal_shop_email = get_field( 'gal_shop_email', get_the_ID() ) ) { ?>
					<p class="gal_shop_email">
						<a href="mailto:<?php echo $gal_shop_email; ?>"><?php echo $gal_shop_email; ?></a>
					</p>
				<?php } ?>

				<?php if ( $gal_shop_website_url = get_field( 'gal_shop_website_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_website_url">
						<a href="<?php echo $gal_shop_website_url; ?>"><?php echo $gal_shop_website_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_facebook_url = get_field( 'gal_shop_facebook_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_facebook_url">
						<a href="<?php echo $gal_shop_facebook_url; ?>"><?php echo $gal_shop_facebook_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_instagram_url = get_field( 'gal_shop_instagram_url', get_the_ID() ) ) { ?>
					<p class="gal_shop_instagram_url">
						<a href="<?php echo $gal_shop_instagram_url; ?>"><?php echo $gal_shop_instagram_url; ?></a>
					</p>
				<?php } ?>
				<?php if ( $gal_shop_google_maps = get_field( 'gal_shop_google_maps', get_the_ID() ) ) { ?>
					<p class="gal_shop_google_maps">
						<?php echo $gal_shop_google_maps['address']; ?>
					</p>
				<?php } ?>

			</div>
		</div>
	<!-- end list -->
				
			</li>
		</ul> 



	<?php endwhile;
	$content = ob_get_contents();
	ob_end_clean();


	if ( count( $_POST ) > 0 ) {
		$res['content'] = $content;

		$pieces                = explode( ",", $office_coords );
		$res['office_coords']  = $pieces;
		$res['office_address'] = $office_address;

		echo json_encode( $res );
		exit;
	} else {
		echo $content;
	}
} 


/**
 * load more news ajax
 */
add_action( 'wp_ajax_deco_get_last_news', 'deco_get_last_news' );
add_action( 'wp_ajax_nopriv_deco_get_last_news', 'deco_get_last_news' );

function deco_get_last_news( $offset = 1 ) {

	if ( empty( $offset ) ) {
		$offset = intval( $_POST['offset'] );
	}
	$paged = $offset + 1;

	$args_news = array(
		'post_type' => array(
			'post',
			),
		'post_status' => array(
			'publish',
			),
		'posts_per_page' => 3,
		'paged'	=> $paged
	);

	$query_news = new WP_Query( $args_news );
	$params_news_img = array( 'width' => 405, 'height' => 183 );
	ob_start();
	?>
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
			<?php wp_reset_query();

		$content = ob_get_contents();
		ob_end_clean();

		$res['content'] = $content;
		$res['offset']  = $paged;
		$res['count'] = ($query_news->post_count);

		echo json_encode( $res );
		exit;

}// end get_last_news