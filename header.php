<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
	<link href=“https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400&display=swap” rel=“stylesheet”>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v0.0.4/css/unicons.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">
		<header class='mainheader'>
		<a href=<?php echo get_home_url(); ?>><img class="header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>\img\aegean-startups-logo-new.svg" alt=""></a>
			<div class="bg-img"> </div>
			<div class="transition-mask"> </div>


			<!-- ******************* The Navbar Area ******************* -->
			<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

				<div id="header-image">
				</div>




				<nav class="navbar navbar-expand-xl navbar-dark">
					

					<?php if ('container' == $container) : ?>
						<div class="container responsivemenu">
						<?php endif; ?>

						<!-- Your site title as branding in the menu -->
						<?php if (!has_custom_logo()) { ?>

							<?php if (is_front_page() && is_home()) : ?>

								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

							<?php else : ?>

								<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>

							<?php endif; ?>


						<?php } else { ?>
							
							<!--<a style="margin: auto;" href=<?php //echo get_home_url(); ?>></a>
						    <img class="header-logo" src="<?php //echo get_stylesheet_directory_uri(); ?>\img\aegean-startups-logo-new.svg" alt="">
						-->
							
							

						<?php	} ?>
						<!-- end custom logo -->

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse justify-content-center',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
						<?php if ('container' == $container) : ?>
							<?php
							if (is_user_logged_in()) { ?>
								<div class="dropdown">
											<?php $profile_id = um_profile_id();
											$profile_display_name = um_get_display_name($profile_id); ?>
									<a onclick="myFunction()" class="dropbtn loggedusrb" ><?php echo $profile_display_name  ?><i class="fas fa-caret-down"></i></a>
									<div id="myDropdown" class="dropdown-content">
										<a href="<?php echo get_home_url(); ?>/user/"><?php echo pll__("Προφίλ");?></a>
										<a href="<?php echo wp_logout_url( home_url() ); ?>"><?php echo pll__("Έξοδος");?></a>
										
  									</div>
								</div>
							<?php	} else { ?>
								<div  class="userbox">
									<a href="<?php echo get_home_url( ); ?>/syndesi/"><?php echo pll__("Σύνδεση/");?></a>  <a href="<?php echo get_home_url( ); ?>/engrafi-2/"><?php echo pll__("Εγγραφή");?></a>
								</div>
							<?php } ?>
						</div><!-- .container -->
					<?php endif; ?>
				<?php pll_the_languages(array('dropdown' => 1,"show_flags"=>1,"show_names"=>0)); ?>
				</nav><!-- .site-navigation -->

			</div><!-- #wrapper-navbar end -->
			
           <div class="container">
			<div class="row hero">
              
            <?php if(pll_current_language() == 'el'){ ?>
			<div class="col-md-6 mobile-order-1">
				<?php	
				?>
			<?php if(is_user_logged_in()){
				$userole = um_user('roles');

					if($userole[0] == 'member'){ ?>
					<a href="<?php echo get_home_url();?>/ypovoli-ideas/" class="primary_btn call_btn green"><?php echo pll__("Ανέβασε την επιχειρηματική σου ιδέα!");?></a>

				<?php }else{?>
					<a href="<?php echo get_home_url();?>/idees/" class="primary_btn call_btn green"><?php echo pll__("Δες τις επιχειρηματικές ιδέες των Aegean Startups!");?></a>

					<?php } 
				}else{?>
				<a href="<?php echo get_home_url();?>/engrafi-2/" class="primary_btn call_btn green"><?php echo pll__("Γίνε μέλος της κοινότητας των Aegean Startups!");?></a>
				
				<?php }?>
			</div>
			<?php }else{?>
				<div class="col-md-6 mobile-order-1">
				<?php	
				?>
			<?php if(is_user_logged_in()){
				$userole = um_user('roles');

					if($userole[0] == 'member'){ ?>
					<a href="<?php echo get_home_url();?>/submit-idea/" class="primary_btn call_btn green"><?php echo pll__("Upload your business idea!");?></a>

				<?php }else{?>
					<a href="<?php echo get_home_url();?>/ideas/" class="primary_btn call_btn green"><?php echo pll__("Support business ideas!");?></a>

					<?php } 
				}else{?>
				<a href="<?php echo get_home_url();?>/engrafi-2/" class="primary_btn call_btn green"><?php echo pll__("Become a community member!");?></a>
				
				<?php }?>
			</div>
			<?php } ?>



			<div class="col-md-6">
			
			<?php if(pll_current_language() == 'el'){ ?>
					<h2><?php echo get_field('αρχικο_κειμενο_στην_αρχικη_σελιδα');?></h2>
					<?php }else{?>
						<h2><?php echo get_field('top_page_content');?></h2>
						<?php } ?>
				
			
			</div>
             
                 </div>
				</div>

		</header>
		<script>
			/* When the user clicks on the button,
				toggle between hiding and showing the dropdown content */
				function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}

				// Close the dropdown menu if the user clicks outside of it
				window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
					}
				}
				}
			</script>