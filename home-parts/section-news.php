<section id="news">

    <div class="container">
    <?php if(pll_current_language() == 'el'){ ?>
        <h2><?php echo get_field('τιτλος_νεων');?></h2>
        <?php }else{ ?>
          <h2><?php echo get_field('title_news');?></h2>
          <?php }?>
        <div class="row">
                <?php 
                $args = array(
                'post_type' => 'post',
                  'numberposts' => 3,
                  'category' => 6,
                  'lang' => '',
                );

              $news = get_posts( $args );
              
      
            //var_dump($news);?>
                <?php foreach($news as $new){
                  $postid = get_the_ID( $new );
                  $newscontent = $new->post_content;
                  $imgurl = catch_that_image();
                ?>
                <div class = "col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body card-main-news">
                        <img class="card-img-top mb-4" src="<?php  echo $imgurl; ?>">
                        <h5><?php echo mb_strimwidth (get_the_title($new), 0, 50, '...'); ?></h5>
                        <p><?php echo wp_trim_words($newscontent, 12) ; ?></p>
                        <?php if(pll_current_language() == 'el'){ ?>
                        <div class="d-flex justify-content-end primary-link">
                            <a href="<?php echo get_permalink($new);?>" style="color: #3397FF;"><?php echo pll__("Περισσότερα...");?></a>
                        </div>
                        <?php }else{ ?>
                          <div class="d-flex justify-content-end primary-link">
                            <a href="<?php echo get_permalink($new);?>" style="color: #3397FF;"><?php echo pll__("More...");?></a>
                        </div>
                        <?php } ?>


                    </div>
                </div>
                </div>
                <?php } ?>

            

      </div>
      <?php if(pll_current_language() == 'el'){ ?>
      <button
					onclick="window.location.href='https://aegean-startups.gr/category/nea/';"
					type="button" class="primary_btn"><?php echo pll__("Όλα τα νέα");?>
				</button>
        <?php }else{ ?>
          <button
					onclick="window.location.href='https://aegean-startups.gr/category/nea/';"
					type="button" class="primary_btn"><?php echo pll__("All News");?>
				</button>
        <?php } ?>

    </div>

</section>

