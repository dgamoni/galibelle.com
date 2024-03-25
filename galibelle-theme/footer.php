	<footer class="footer" id="footer">
		<div class="container">
	        <div class="row">
	            <div class="col-xl-2 col-lg-3 col-sm-6">
	            	<div class="footer-text">© 2016 Galibelle.<br>					<?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,google,pinterest,mail" sharebtn_style="icon" sharebtn_counter="hidden" counters=0 style="icon" point_type="simple"]'); ?>
					</div>
	            </div>
	            <div class="col-xl-2 col-lg-3 col-sm-6 text-xl-center">
	            	<div class="footer-text"><a href="/privacy-policy/" style="color:#222;">PRIVACY POLICY</a></div>
	            </div>
	            <div class="col-xl-8 col-lg-6">
	              <div class="row">
	                <nav id="footer-menu-primary" class="footer-menu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_primary', 'menu_class' => '' ) ); ?>
					</nav>
	              </div>
	            </div>
	        </div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html> 