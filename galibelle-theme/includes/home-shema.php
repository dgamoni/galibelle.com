<?php $rows = get_field('gal_home_shema'); ?>

<?php if( $rows ):
	foreach ($rows as $key => $row) {
		$gal_home_shema_title = $row['gal_home_shema_title'];
		$gal_home_shema_text = $row['gal_home_shema_text'];
		$gal_home_shema_link = $row['gal_home_shema_link'];
		$gal_home_shema_img = $row['gal_home_shema_img'];
		?>

		<div id="home-shema" class="shema">
	      <div class="container">
	        <div class="row ">
	          <div class="col-lg-4">
	            <h2 class="home-shema-title"><?php echo $gal_home_shema_title; ?></h2>
	            <p><?php echo $gal_home_shema_text; ?></p> 
	          </div>
	          <div class="col-lg-8 text-lg-right flex-lg-middle">
	          	<img src="<?php echo $gal_home_shema_img['url']; ?>" class="w-100">
	          </div>
	        </div>
	      </div> 
	    </div>

	<?php } ?>

<?php endif; ?>