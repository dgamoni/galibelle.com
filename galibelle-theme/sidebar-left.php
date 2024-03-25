	
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-left') ) : ?>	
  
    <?php endif; ?> 

<h1 class="display-1 text-lg-left text-xs-center">Worldwide</h1>
<div class="text">
<p class="gal_shop_address_1">If you want to contact Galibelle Headquartes:</p>
<p class="main_city">GALIBELLE - YOU CAN CHANGE IT INTERNATIONAL LDA</p>
<p class="gal_shop_address_2">Rua do Centro Empresarial Lote EE02 Piso1</p>
<p class="gal_shop_address_2">Escritório 18, Quinta da Beloura</p>
<p class="gal_shop_address_2">2710-693 Sintra, Portugal</p>
<p class="gal_shop_phone">Phone: 351-210 987 997</p>
<p class="gal_shop_email"><a href="mailto:comercial@galibelle.com">comercial@galibelle.com</a></p>
</br>
</div>

<div class="contacts_content_with_sidebar_wrap">
	<div class="contacts_content_with_sidebar cf">
		<div class="sidebar">

			<?php
			$tax_city_office = get_terms( 'regions', 'hide_empty=0' );
			$first_term_id = 0;
			?>

			<div class="search-stores">
				<h3 class="display-4 townfilter-lable text-xs-center text-lg-left">Search</h3>
				<input type="text" class="townfilter text-xs-center text-lg-left" placeholder="CITY / COUNTRY" />
			</div>
			
			<p class="listback">BACK</p>

			<div class="elements contacts_elements">
				<?php if ( count( $tax_city_office ) > 0 ) {

					foreach ( $tax_city_office as $region ) {

						$tax_firm = get_terms( 'regions', array(
							'parent' => $region->term_id,
							//'hide_empty' => 0
						) );

						if ( empty( $first_term_id ) ) {
							$first_term_id = $region->term_id;
						}

						if (( count( $tax_firm ) > 0 ) && ($region->parent == 0 )){


	//								print_r($region);
							$gal_regions_zoom_map = get_field('gal_regions_zoom_map','term_' . $region->term_id);
							if ($gal_regions_zoom_map) {
								$zoom = $gal_regions_zoom_map;
							} else {
								$zoom = 0;
							}
							?>

							<p>
								<a
									href="<?php echo get_home_url('/'); echo 'shops/#list_'; echo $region->slug; ?>"
								   id="<?php echo 'gmap_' . $region->slug; ?>"
								    data-zoom="<?php echo $zoom; ?>"
									data-tax-id="<?php echo $region->term_id; ?>"
									data-map-url="<?php echo get_home_url() . '/shops/#gmap_' . $region->slug; ?>"
									data-list-url="<?php echo get_home_url() . '/shops/#list_' . $region->slug; ?>"
									class="region-link"
									><?php echo $region->name; ?>
									<!-- <span class="right"><?php echo $region->count; ?></span> -->
								</a>
							</p>

							<div>
								<ul id="firm_adress_sidebar" class="firm_adress">
									<?php foreach ( $tax_firm as $firm ) {
										$args = array(
											'post_type'      => 'shops',
											'posts_per_page' => - 1
										);

										$args['tax_query'] = array(
											array(
												'taxonomy' => 'regions',
												'field'    => 'id',
												'terms'    => array( $firm->term_id )
											)
										);

										$gal_regions_zoom_map2 = get_field('gal_regions_zoom_map','term_' . $firm->term_id);
										if ($gal_regions_zoom_map2) {
											$zoom2 = $gal_regions_zoom_map2;
										} else {
											$zoom2 = 0;
										}

										$res = array();
										$the_query = new WP_Query( $args );
										while ( $the_query->have_posts() ) : $the_query->the_post();
											$google_coordinats = get_field( 'gal_shop_google_maps', get_the_ID() );
											//$arr               = explode( ',', $google_coordinats );
											$lat               = $google_coordinats['lat'];
											$lng               = $google_coordinats['lng'];

											$res[] = array(
												$lat,
												$lng,
											);
										endwhile;
										wp_reset_query();
										$coords = json_encode( $res );
										?>
										<li class="search_country_list"">
											<a class="firm_adress_link" href="<?php echo get_home_url() . '/shops/#list_' . $firm->slug; ?>" data-map-url="<?php echo get_home_url() . '/shops/#gmap_' . $firm->slug; ?>" data-list-url="<?php echo get_home_url() . '/shops/#list_' . $firm->slug; ?>" id="<?php echo 'gmap_' . $firm->slug; ?>" data-tax-id="<?php echo $firm->term_id; ?>" data-zoom="<?php echo $zoom2; ?>" data-coords='<?php echo $coords; ?>'>
												<?php echo $firm->name; ?>
												<!-- <span class="right"><?php echo $firm->count; ?></span> -->
											</a>
											<div class="list" id="firms_list">
												<?php deco_get_firms_by_tax( $firm->term_id ); ?>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>

					<?php } ?>
				<?php } ?>
			</div> <!-- end elements contacts_elements -->
		
		</div> <!-- end sidebar -->
	</div>
</div>