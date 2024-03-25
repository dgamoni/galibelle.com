
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
						$gal_home_slider_img_mobil = $row['gal_home_slider_img_mobil'];
						$gal_home_slider_youtube = $row['gal_home_slider_youtube'];
						if($gal_home_slider_youtube) {
							$slider_youtube_overlay = 'slider_youtube_overlay';
						}else {
							$slider_youtube_overlay = '';
						}
					    ?>
					    <div class="carousel-item <?php echo $class; ?>">
					      <img class="<?php echo $slider_youtube_overlay; ?> hidden-xs-down" src="<?php echo $gal_home_slider_img['url']; ?>" alt="<?php echo $gal_home_slider_img['alt']; ?>">
					      <img class="<?php echo $slider_youtube_overlay; ?> hidden-sm-up w-100" src="<?php echo $gal_home_slider_img_mobil['url']; ?>" alt="<?php echo $gal_home_slider_img_mobil['alt']; ?>">
						  <?php if($gal_home_slider_youtube) : ?>
							  <div class="embed-container-gal_home_slider_youtube">
								 <?php echo $gal_home_slider_youtube; ?>
							   </div>
						  <?php endif; ?>
						  <div class="carousel-caption">
						    <?php if($gal_home_slider_youtube) : ?>
						    	<h2 class="slider_youtube_title"><?php echo $gal_home_slider_title; ?></h2>
						    	<a href="#"><button type="button" class="btn btn-warning slider_youtube_start">SEE VIDEO</button></a>
						    <?php else : ?>
						    	<h2><?php echo $gal_home_slider_title; ?></h2>
						    	<a href="<?php echo $gal_home_slider_link; ?>"><button type="button" class="btn btn-warning">SEE MORE</button></a>
						    <?php endif; ?>
						  </div>
					    </div>
					    <?php
					}
				?>
			</div>	

		</div> <!-- /#carousel-home -->
	</div> <!-- /container -->

<?php endif; ?>