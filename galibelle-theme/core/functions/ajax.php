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
					<a href="#gmap_<?php echo $lat; ?>_<?php echo $lng; ?>_<?php echo $object_terms2[0]->slug; ?>" data-term-id="<?php echo $first_term_id; ?>" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-coord="<?php echo $office_coords; ?>" class="smap-link">
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