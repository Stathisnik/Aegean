<?php
/**
 * Template Name: Public-Mentors-Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('inner');
$container = get_theme_mod( 'understrap_container_type' );
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
                            <div class="row" style=" margin-right: -90px; margin-left: -90px;"> 
                                <?php
                                    $users = get_users( array( 'fields' => array( 'ID' ) ) );
                                    foreach($users as $user){
                                        um_fetch_user($user->ID);
                                        $roles = um_user('roles');
                                        $isMentor = array_search("mentor",$roles);
                                        if(is_int($isMentor)){
                                            $user_data = get_userdata( $user->ID );
                                            echo "<pre>";
                                            // var_dump($user_data);
                                            echo "</pre>";
                                            ?>
                                            
                                                <div class="col-md-4 text-center pb-5">
                                                    <img src="<?php echo get_avatar_url($user->ID); ?>" alt="" class="rounded-circle" width="150" height="150">
                                                    <br><br>
                                                    <h6><?php echo $user_data->data->display_name; ?></h6> 
                                                    <?php echo um_user('idiotita'); ?>
                                                    <br>
                                                    <?php if(um_user('linkedin')){ ?>
                                                        <a target="_blank" href="<?php echo um_user('linkedin');?>"><i class="fab fa-linkedin" style="color:#0A66C2;"></i></a>
                                                    <?php } ?> 
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
