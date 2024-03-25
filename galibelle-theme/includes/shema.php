<?php $gal_collection_shema_img = get_field('gal_collection_shema_img'); ?>

<?php if( $gal_collection_shema_img ): ?>

		<div id="collection-shema" class="shema">
	      <div class="container">
	        <div class="row ">
	          <div class="col-lg-8 text-xs-center m-x-auto">
	          	<h2 class="collection-shema-title">YOU CAN CHANGE IT</h2>
	          	<img src="<?php echo $gal_collection_shema_img['url']; ?>" class="w-100">
	          </div>
	        </div>
	      </div> 
	    </div>

<?php endif; ?>