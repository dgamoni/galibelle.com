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

					<?php 
						wp_nav_menu( array(
							'theme_location'  => 'mobil',
							'menu'            => '', 
							'container'       => '', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_class'      => 'dl-menu', 
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => new MobilMenuWalker(),
						) );
					?>

				</div><!-- /dl-menuwrapper -->
			</nav>

			<div id="mainlogo" class="pull-md-left ">
				<div id="blog-title" class="blogtitle">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo('name') ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_big.png" alt="">
					</a>
				</div>
			</div>

	        <nav id="header-menu" class="pull-lg-right pull-md-left mobileoff" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
			</nav>

		</div> <!-- /container -->
 
		
	</header>

	