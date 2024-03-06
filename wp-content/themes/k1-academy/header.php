<?php
/**
 * Basic Header Template
 *
 * @package KingdomOne
 */

use KingdomOne\Navwalker;
?>

<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'w-100 overflow-x-hidden' ); ?>>
	<?php wp_body_open(); ?>
	<header class="d-flex sticky-top text-bg-primary shadow-sm" id="site-header">
		<div class="container">
			<nav class="navbar navbar-expand-lg py-0">
				<a class="navbar-brand my-2 align-items-md-center" href="<?php echo esc_url( site_url() ); ?>" class="logo" aria-label="to Home Page">
					<figure class='w-100 h-100 text-white'>
						<?php echo file_get_contents( get_template_directory() . '/img/k1-academy-solid.svg' ); ?>
					</figure>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
						aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end ms-auto flex-grow-0" id='navbarNav' tabindex="-1">
					<div class="offcanvas-header mt-5">
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
								style='--bs-btn-close-color:white;filter:var(--bs-btn-close-white-filter)'></button>
					</div>
					<?php
					$menu_args = array(
						'menu_class'      => 'navbar-nav header-nav',
						'container'       => 'div',
						'container_class' => 'offcanvas-body',
						'walker'          => new Navwalker(),
					);
					if ( is_user_logged_in() ) {
						$menu_args['theme_location'] = 'logged_in_menu';
						wp_nav_menu( $menu_args );
					} else {
						$menu_args['theme_location'] = 'logged_out_menu';
						wp_nav_menu( $menu_args );
					}
					?>
				</div>
				<?php get_template_part( 'template-parts/content', 'color-toggle' ); ?>
			</nav>
		</div>
	</header>