<?php get_header('inner'); ?>
<main id="content">
    <header class="header">
        <h1 class="entry-title" style="margin-bottom: 84px;"><?php single_term_title(); ?></h1>
        <div class="archive-meta">
            <?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?>
		</div>
    </header>
    <div class="container" style="margin-bottom: 90px;">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


            <?php get_template_part( 'loop-templates/content','categories' ); ?>

            <?php endwhile; endif; ?>



        </div>
        <!-- Add the pagination functions here. -->

        <section class="container feed">
			<div class="row">
				<div class= "col">
					<div class="pagination-form">
					<div id="posts-pagination" class="pagination">
        <?php
        $big = 999999999; // an unlikely integer
        echo paginate_links( array(
            'base'            => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'          => '?paged=%#%', # or '/page/%#%'
            'current'         => max( 1, get_query_var('paged') ),
            'total'           => $query->max_num_pages,
            'prev_text'       => __( '<span class="meta-nav">&larr;</span> Προηγούμενη', 'city-portal' ),
            'next_text'       => __( 'Επόμενη <span class="meta-nav">&rarr;</span>', 'city-portal' ),
        ) );
        ?>
        </div>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							
							<?php
							foreach ( $posts as $post ) {
								get_template_part( 'template-parts/content', get_post_format() );
							}
							
							the_posts_pagination( array(
								'mid_size'	=>	10,
								'prev_text' => _('<'),
								'next_text' => _('>'),
							) );
						
							
						
						?>
					</div>
				</div>
			</div>
		</section>
	</div>

    <?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>