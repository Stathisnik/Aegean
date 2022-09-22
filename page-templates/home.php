<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();?>
<main>
    <?php get_template_part('home-parts/section', 'program');?>
	<?php get_template_part('home-parts/section', 'community');?>
	<?php //get_template_part('home-parts/section', 'day-research');?>
    <?php get_template_part('home-parts/section', 'business-ideas');?>
    <?php get_template_part('home-parts/section', 'thematikes');?>
    <?php get_template_part('home-parts/section', 'counts');?>
	<?php get_template_part('home-parts/section', 'be-part');?>
    <?php get_template_part('home-parts/section', 'news');?>
	<?php get_template_part('home-parts/section', 'foreis');?>
    <?php get_template_part('home-parts/section', 'supporters');?>
    <?php get_template_part('home-parts/section', 'feedback');?>
    <?php get_template_part('home-parts/section', 'about');?>
    


</main>

<?php get_footer(); ?>