
<?php $rows = get_field('gal_home_slider'); ?>

<?php if( $rows ): ?>

	<div class="container container-slider"> <!-- container -->
		<div id="carousel-home" class="carousel slide" data-ride="carousel">
		 	
			<ol class="carousel-indicators">
				<?php
					
					foreach ($rows as $key => $row) {
						if ( $key == 0 ) {
							echo '<li data-target="#carousel-home" data-slide-to="'.$key.'" class="active"></li>';
						} else {
							echo '<li data-target="#carousel-home" data-slide-to="'.$key.'"></li>';
						}
					}
				?>
			</ol>

			<div class="carousel-inner" role="listbox">
				<?php
					foreach ($rows as $key => $row) {
						if ( $key == 0 ) {
							$class="active";
						} else {
							$class="";
						}
						$gal_home_slider_title = $row['gal_home_slider_title'];
						$gal_home_slider_link = $row['gal_home_slider_link'];
						$gal_home_slider_img = $row['gal_home_slider_img'];
					    
					    echo '<div class="carousel-item '.$class.'">';
					      echo '<img src="'.$gal_home_slider_img['url'].'" alt="'.$gal_home_slider_img['alt'].'">';
						  echo '<div class="carousel-caption">';
						    echo '<h2>'.$gal_home_slider_title.'</h2>';
						    echo '<a href="'.$gal_home_slider_link.'"><button type="button" class="btn btn-warning">See more</button></a>';
						  echo '</div>';
					    echo '</div>';

					}
				?>
			</div>	

		</div> <!-- /#carousel-home -->
	</div> <!-- /container -->

<?php endif; ?>