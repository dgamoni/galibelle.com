
	

	<footer class="footer" id="footer">
		<div class="container">
	        <div class="row">
	            <div class="col-xl-2 col-lg-3 col-sm-6">
	            	<nav id="footer-menu-primary" class="footer-menu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_primary', 'menu_class' => '' ) ); ?>
					</nav>
	            </div>
	            <div class="col-xl-2 col-lg-3 col-sm-6">
	            	<nav id="footer-menu-secondary" class="footer-menu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_secondary', 'menu_class' => '' ) ); ?>
					</nav>
	            </div>
	            <div class="col-xl-8 col-lg-6">
	              <div class="row">
	                <div class="col-xl-5  col-lg-0"></div>
	                <div class="col-xl-4 text-xl-right col-md-6 col-sm-6">© 2016 Galibelle. All Rights Reserved</div>
	                <div class="col-xl-3 text-xl-right col-md-6 col-sm-6"><a href="/privacy-policy/">Privacy policy</a></div>
	              </div>
	            </div>
	        </div>
		</div>
	</footer>



<?php wp_footer(); ?>

</body>
</html> 