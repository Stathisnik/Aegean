<?php /* Template Name: Angels Page */ ?>
<?php get_header('inner'); ?>
<?php 
    $args = array(
        'role'    => 'angel',
        'orderby' => 'registered',
    );

    $angel_query = new WP_User_Query($args);
    $angels = $angel_query->get_results();

?>
<div class="wrapper" id="full-width-page-wrapper">

<div class="<?php echo esc_attr( $container ); ?>" id="content-pages">

    <div class="row">

        <div class="col-md-12 content-area" id="primary">

            <main class="site-main" id="main" role="main">
        
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <div class="row"> 
                            <?php
                                if($angels){
                                    foreach($angels as $angel){
                                        ?>
                                            <div class="col-md-4 text-center pb-5">
                                                <img src="<?php echo get_avatar_url($angel->ID); ?>" alt="" class="rounded-circle" width="120" height="150">
                                                <br><br>
                                                <h6><?php echo $angel->display_name; ?></h6> 
                                                <?php echo um_user('idiotita'); ?>
                                                <br>
                                            </div>
                                        <?php
                                    }
                                    um_reset_user();
                                }
                            ?>
                        </div>

                    </div><!-- .entry-content -->


                </article><!-- #post-## -->


            </main><!-- #main -->

        </div><!-- #primary -->

    </div><!-- .row end -->

</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>