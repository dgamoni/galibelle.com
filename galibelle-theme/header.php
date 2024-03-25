<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&subset=latin-ext" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="top-header" class="mobileoff">
		<div class="container">
			<?php get_template_part( 'includes/top-header' ); ?>
		</div>
	</div>

	<header class="header" id="header">

		<div class="container">

			<nav id="header-menu-mobil" class="mobileon" role="navigation">
						
				<div id="dl-menu" class="dl-menuwrapper">
					<button class="dl-trigger">Menu</button>
					<span class="dl-trigger dl-trigger-label">Menu</span>

					<ul class="dl-menu">
						<li>
							<a href="#">Fashion</a>
							<ul class="dl-submenu">
								<li>
									<a href="#">Men</a>
									<ul class="dl-submenu">
										<li><a href="#">Shirts</a></li>
										<li><a href="#">Jackets</a></li>
										<li><a href="#">Chinos &amp; Trousers</a></li>
										<li><a href="#">Jeans</a></li>
										<li><a href="#">T-Shirts</a></li>
										<li><a href="#">Underwear</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Women</a>
									<ul class="dl-submenu">
										<li><a href="#">Jackets</a></li>
										<li><a href="#">Knits</a></li>
										<li><a href="#">Jeans</a></li>
										<li><a href="#">Dresses</a></li>
										<li><a href="#">Blouses</a></li>
										<li><a href="#">T-Shirts</a></li>
										<li><a href="#">Underwear</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Children</a>
									<ul class="dl-submenu">
										<li><a href="#">Boys</a></li>
										<li><a href="#">Girls</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Electronics</a>
							<ul class="dl-submenu">
								<li><a href="#">Camera &amp; Photo</a></li>
								<li><a href="#">TV &amp; Home Cinema</a></li>
								<li><a href="#">Phones</a></li>
								<li><a href="#">PC &amp; Video Games</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Furniture</a>
							<ul class="dl-submenu">
								<li>
									<a href="#">Living Room</a>
									<ul class="dl-submenu">
										<li><a href="#">Sofas &amp; Loveseats</a></li>
										<li><a href="#">Coffee &amp; Accent Tables</a></li>
										<li><a href="#">Chairs &amp; Recliners</a></li>
										<li><a href="#">Bookshelves</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Bedroom</a>
									<ul class="dl-submenu">
										<li>
											<a href="#">Beds</a>
											<ul class="dl-submenu">
												<li><a href="#">Upholstered Beds</a></li>
												<li><a href="#">Divans</a></li>
												<li><a href="#">Metal Beds</a></li>
												<li><a href="#">Storage Beds</a></li>
												<li><a href="#">Wooden Beds</a></li>
												<li><a href="#">Children's Beds</a></li>
											</ul>
										</li>
										<li><a href="#">Bedroom Sets</a></li>
										<li><a href="#">Chests &amp; Dressers</a></li>
									</ul>
								</li>
								<li><a href="#">Home Office</a></li>
								<li><a href="#">Dining &amp; Bar</a></li>
								<li><a href="#">Patio</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Jewelry &amp; Watches</a>
							<ul class="dl-submenu">
								<li><a href="#">Fine Jewelry</a></li>
								<li><a href="#">Fashion Jewelry</a></li>
								<li><a href="#">Watches</a></li>
								<li>
									<a href="#">Wedding Jewelry</a>
									<ul class="dl-submenu">
										<li><a href="#">Engagement Rings</a></li>
										<li><a href="#">Bridal Sets</a></li>
										<li><a href="#">Women's Wedding Bands</a></li>
										<li><a href="#">Men's Wedding Bands</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /dl-menuwrapper -->
			</nav>

			<div id="mainlogo" class="pull-md-left ">
				<div id="blog-title" class="blogtitle">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo('name') ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
					</a>
				</div>
			</div>

	        <nav id="header-menu" class="pull-lg-right pull-md-left mobileoff" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
			</nav>

		</div> <!-- /container -->
 
		
	</header>

	