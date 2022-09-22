<?php
/**
 * Template Name: Old Competitions
 */
get_header('inner'); 

    $args = array(
    'posts_per_page' => -1,
    'category_name'   => 'old_competitions',
    'lang' => "el",
    // 'posts_per_page'   => 2,
    );


    $old_competitions = new WP_Query($args);

?>


<div class="container">
    <h2 class="text-center pt-3"> Αρχείο Παλαιότερων Διαγωνισμών </h2>
    <div class="row justify-content-center p-3">
        <div class="col-md-9">
            <div id="response" class="row">
            <?php
            if ($old_competitions->have_posts()) : ?>
                <?php while ($old_competitions->have_posts()) : $old_competitions->the_post();
                $img_url = $other_idea_img['φωτογραφίες'] != "" ? $other_idea_img['φωτογραφίες'] :  get_stylesheet_directory_uri() . '/img/aegean_feature_img-competition.png';

                ?>

                <div class="col-md-12 col-sm-6">
                    <div class="card competition-card">
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="card-body">
                        <div class="sec-ideas-img" style="background-image: url(<?php echo $img_url ?>);">
                            <div class="overlay"></div>
                            <h4 class="card-title-news"><?php echo get_the_title(); ?></h4>
                        </div>

                        </div>
                    </a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php wp_reset_postdata();
            else : ?>
                <p class="text-center"></p>
            <?php endif; ?>


            </div>
        </div>
    </div>
</div>
  <?php get_footer(); ?>