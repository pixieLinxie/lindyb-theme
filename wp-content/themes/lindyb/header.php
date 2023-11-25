<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.png" type="image/png" />
	<?php
	$description = '';
	if (is_archive()) {
		$archive_description = strip_tags(get_the_archive_description());
		$description = $archive_description;
	} else {
		$description = get_post_meta(get_the_ID(), '_meta_description_field', true);
	}
	?>
	<meta name="description" content="<?php echo esc_attr($description); ?>">
	<?php wp_head(); ?>
	<script>
		document.documentElement.className = "js";
	</script>
</head>

<body <?php body_class('loading'); ?>>

	<header class="header position-relative">
		<div class="container d-flex justify-between align-center">
			<a href="/" title="home page">
				<svg class="logo" xmlns="http://www.w3.org/2000/svg">
					<g id="lindybLogo" data-name="Lindy B Logo">
						<g id="Lindy_" data-name="Lindy">
							<polygon class="fill-primary" points="14.26 25.76 14.26 30.26 0 30.26 0 2.85 5.33 2.85 5.33 25.76 14.26 25.76" />
							<path class="fill-primary" d="M22.81,3.27a3.19,3.19,0,0,1-.94,2.33,3.28,3.28,0,0,1-4.62,0,3.16,3.16,0,0,1-.95-2.33A3.23,3.23,0,0,1,19.58,0a3.16,3.16,0,0,1,2.29.94A3.22,3.22,0,0,1,22.81,3.27Z" />
							<rect class="fill-primary" x="16.87" y="8.32" width="5.33" height="21.94" />
							<path class="fill-primary" d="M47.06,17.41V30.26h-5.3V18.06a5.63,5.63,0,0,0-1.27-4A4.47,4.47,0,0,0,37,12.74a4.55,4.55,0,0,0-3.5,1.35,5.59,5.59,0,0,0-1.28,4v12.2H26.9V8.32h5.34V10a7.77,7.77,0,0,1,2-1.26A9.34,9.34,0,0,1,38,8a9.91,9.91,0,0,1,4.66,1.08,7.85,7.85,0,0,1,3.26,3.25A10.53,10.53,0,0,1,47.06,17.41Z" />
							<path class="fill-primary" d="M67.26,1.14v9.35a9.31,9.31,0,0,0-2.47-1.57A10.4,10.4,0,0,0,60.54,8a10.07,10.07,0,0,0-9,5.39,12.15,12.15,0,0,0-1.37,5.83,12.43,12.43,0,0,0,1.37,5.87,10.32,10.32,0,0,0,3.75,4.07A9.9,9.9,0,0,0,60.5,30.6a9.72,9.72,0,0,0,4.55-1A9.4,9.4,0,0,0,67.26,28v2.29h5.37V1.14ZM58.57,25.05a5.85,5.85,0,0,1-2.17-2.29,7.37,7.37,0,0,1-.83-3.56,7.1,7.1,0,0,1,.82-3.5,5.72,5.72,0,0,1,2.15-2.21,5.85,5.85,0,0,1,2.87-.75,5.66,5.66,0,0,1,2.87.77,5.87,5.87,0,0,1,2.15,2.24,7.16,7.16,0,0,1,.83,3.52,7.26,7.26,0,0,1-.83,3.54,5.79,5.79,0,0,1-2.15,2.26A5.64,5.64,0,0,1,58.57,25.05Z" />
							<polygon class="fill-primary" points="97.43 8.32 84.17 40.1 78.6 40.1 83.06 29.41 74.62 8.32 80.53 8.32 86.08 23.36 91.85 8.32 97.43 8.32" />
						</g>
						<g id="_B." data-name="B.">
							<path class="stroke-accent" d="M122.94,30.26H111.88V2.85h10.57a11.28,11.28,0,0,1,4.85,1,7.32,7.32,0,0,1,3.13,2.63,6.75,6.75,0,0,1,1.07,3.71,6.4,6.4,0,0,1-1.33,4.11A7.15,7.15,0,0,1,128,16.11a6.63,6.63,0,0,1,2.57,2h0a7.17,7.17,0,0,1,1.59,4.53,7,7,0,0,1-1.13,3.9,7.55,7.55,0,0,1-3.22,2.73A11.24,11.24,0,0,1,122.94,30.26Zm-10.06-1h10.06a10.33,10.33,0,0,0,4.39-.88A6.67,6.67,0,0,0,130.14,26a6.09,6.09,0,0,0,1-3.36,6,6,0,0,0-1.38-3.9h0a5.25,5.25,0,0,0-3.3-2.06l-1.87-.34,1.79-.63a6.53,6.53,0,0,0,3-2.08,5.4,5.4,0,0,0,1.11-3.49A5.81,5.81,0,0,0,129.59,7a6.37,6.37,0,0,0-2.72-2.27,10.4,10.4,0,0,0-4.42-.86h-9.57Zm9.68-2.53h-6.35V17.48h6.2a5.71,5.71,0,0,1,3.86,1.26,4.35,4.35,0,0,1,1.51,3.46,4.19,4.19,0,0,1-1.43,3.34h0A5.68,5.68,0,0,1,122.56,26.73Zm-5.35-1h5.35a4.73,4.73,0,0,0,3.14-.95h0a3.18,3.18,0,0,0,1.08-2.58,3.34,3.34,0,0,0-1.16-2.7,4.77,4.77,0,0,0-3.21-1h-5.2ZM122.07,15h-5.86V6.38h5.86a5.51,5.51,0,0,1,3.65,1.13,3.94,3.94,0,0,1,1.37,3.17,3.89,3.89,0,0,1-1.38,3.19A5.7,5.7,0,0,1,122.07,15Zm-4.86-1h4.86a4.69,4.69,0,0,0,3-.86,2.89,2.89,0,0,0,1-2.41,3,3,0,0,0-1-2.41,4.55,4.55,0,0,0-3-.89h-4.86Z" />
							<path class="stroke-accent" d="M138.07,30.53a3.23,3.23,0,1,1,2.29-1A3.16,3.16,0,0,1,138.07,30.53Zm0-5.55a2.19,2.19,0,0,0-1.63.65,2.22,2.22,0,0,0-.65,1.62,2.19,2.19,0,0,0,.65,1.62h0a2.19,2.19,0,0,0,1.63.66,2.13,2.13,0,0,0,1.58-.66,2.34,2.34,0,0,0,0-3.24A2.14,2.14,0,0,0,138.07,25Z" />
						</g>
					</g>
				</svg>
			</a>

			<button class="menu-btn" aria-label="menu button">
				<span class="menu-btn__burger"></span>
				<span class="sr-only">Menu Button</span>
			</button>

			<nav class="nav">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header_menu_location',
					'add_li_class'  => 'menu-nav__item',
					'add_a_class'  => 'menu-nav__link'
				));
				?>
			</nav>
		</div>
	</header>