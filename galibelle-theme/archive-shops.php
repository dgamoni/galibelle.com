<?php get_header(); ?>

		<div id="shops-block">
		    <div class="container">
		    	<div class="row ">
		    		<div class="col-lg-4 sidebar-left">
		    			<?php get_sidebar('left'); ?>
		    		</div>
		            <div class="col-lg-8 hidden-sm-down">
						
						<div class="content">
							<div class="gmap embed-responsive embed-responsive-4by3">
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCarBfioQaf3fSqftkPJNozzczQQO8w9iA&v=3.exp&libraries=places,drawing,geometry"></script>
								<div id="g_map" style="width:816px; height: 600px;margin: 0px;padding: 0px;"></div>
							</div>
						</div> <!-- end content 1-->

					</div>
		        </div>
		    </div>
		</div>

<?php get_footer(); ?> 




