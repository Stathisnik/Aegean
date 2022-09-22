<?php
/**
 * Template Name: Roles Page
 *
 * @package understrap
 */

get_header('inner');
?>
<div class="container">

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="row justify-content-center">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </div>
        
        <div class="row pb-4">
            <div class="col-md-12" id="content-pages">
                <?php the_content(); ?>

                <!-- Show button if user is not logged in -->
                <?php if( !is_user_logged_in() ): ?>
                    <div class="row">
                        <?php $button_url = get_field( 'roles_page_link',get_the_id() );
                            if($button_url): ?>
                            <a class="btn primary_btn com" href="<?php echo get_field('roles_page_link',get_the_id() ); ?>"> <?php echo get_field('roles_page_button_title', get_the_id()); ?> </a>
                        <?php endif; ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>


    <?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); 
