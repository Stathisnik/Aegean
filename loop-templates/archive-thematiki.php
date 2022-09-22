<?php

/**
 * 
 * Template Name: archive thematikis
 * 
 */

get_header('inner');
?>
<section id="archive-thematikes">
<div class="container">
<?php if(pll_current_language() == 'el'){ ?>
    <h2><?php echo pll__("Θεματικές Περιοχές"); ?></h2>
    <?php } else { ?>
        <h2><?php echo pll__("Thematic Areas"); ?></h2>
        <?php } ?>

    <?php if(pll_current_language() == 'el'){ ?>
    <?php
    $args = array(
        'post_type' => 'thematiki',
        'lang' => 'el',
    );

    $otherthematikes = get_posts($args);    ?>
     <?php } else { ?>
        <?php
    $args = array(
        'post_type' => 'thematiki',
        'lang' => 'en',
    );

    $otherthematikes = get_posts($args);    ?>
    
    <?php } ?>
    <?php foreach ($otherthematikes as $otherthematiki) {
        $postid = get_the_ID($otherthematiki);
        $otherthematiki_id = $otherthematiki->ID;
        $post_thumbnail_url = get_the_post_thumbnail_url($otherthematiki->ID);
        $image_thematiki = get_field('thematiki_img',$otherthematiki_id);
    ?>
        <div class="row">
            <div class="col-lg-12 mb-5">

                <h4> <?php echo get_the_title($otherthematiki); ?> </h4>
                <div class="row thematiki-content">
                <?php if($image_thematiki !=""){ ?>
                    <img class="thematiki-featured-image" src="<?php echo $image_thematiki; ?>" alt="">
                    <?php } else { ?>
							<img class="thematiki-featured-image" src="<?php echo get_stylesheet_directory_uri();?>/img/idea-grey.png"
							 alt="">
							<?php } ?>
                    <div class="thematiki-desc">
                        <p class="card-text"> <?php echo $otherthematiki->post_content; ?> </p>
                    </div>
                </div>
                <?php if(pll_current_language() == 'el'){ ?>
                <div class="text-right">
                    <a href="<?php echo get_the_permalink($otherthematiki_id); ?>" style="color:#3397FF;"> Περισσότερα </a>
                </div>
                <?php } else { ?>
                    <div class="text-right">
                    <a href="<?php echo get_the_permalink($otherthematiki_id); ?>" style="color:#3397FF;"> More </a>
                </div>
                <?php } ?>

            </div>

        </div>
    <?php } ?>
</div>
</section>

<?php get_footer(); ?>