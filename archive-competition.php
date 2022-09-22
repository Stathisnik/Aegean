<?php get_header('inner'); ?>


<h2 class="heading-ideas"><?php echo pll__("Διαγωνισμοί"); ?></h2>

<section id="ideas">

  <?php

  $args = array(
    'posts_per_page' => -1,
    'post_type'   => 'competition',
    'lang' => "el",
    // 'posts_per_page'   => 2,
  );


  $competitions = new WP_Query($args);

  ?>

  <div class="container">

    

    <form method="post" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="filter">

      <div class="row">
        <div class="col-md-3 responsivetabs">
        <h6 class="heading-filters"><?php echo pll__("Φίλτρα"); ?></h6>
          <h6><?php echo pll__("Στάδιο"); ?></h6>

          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_5fb56808ccb6c")["choices"];
            $field_key = "stage";
            foreach ($system_type_filters as $system_type) { ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>" name="<?php echo $field_key . "/" . $system_type; ?>" id="selectCheck_<?php echo $i; ?>">
                <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                  <?php echo $system_type;
                  $i++; ?>
                </label>
              </div>
            <?php } ?>
          </div>

          <br>

          <h6><?php echo pll__("Κατηγορία"); ?></h6>

          <div class="filter-card-full">
            <?php

            $args = array(
              'post_type' => 'katigoria',
            );

            $system_type_filters = new WP_Query($args);
            ?>

            <?php
            $field_key = "category";
            foreach ($system_type_filters->posts as $post) { ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $post->ID; ?>" name="<?php echo $field_key . "/" . $post->ID; ?>" id="selectCheck_<?php echo $i; ?>">
                <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                  <?php echo $post->post_title;
                  $i++; ?>
                </label>
              </div>
            <?php } ?>
          </div>

          <span></span>

          <input type="hidden" name="action" value="competitions_filter">
          <input type="submit" class="primary_btn" value=<?php echo pll__("Αναζήτηση"); ?>>
    </form>

    <script>
      jQuery(function($) {
        $(".form-check-input").on("change", function(ev) {
          fetchFilterData()
        })
        $('#filter').on("submit", function(ev) {
          ev.preventDefault();
          fetchFilterData()
        });

        function fetchFilterData() {
          var filter = $('#filter');
          $.ajax({
            url: filter.attr('action'),
            data: filter.serialize(), // form data
            type: filter.attr('method'), // POST
            beforeSend: function(xhr) {
              filter.find('span').text('Processing...'); // changing the button label
            },
            success: function(data) {
              filter.find('span').text(''); // changing the button label back
              $('#response').html(data); // insert data
            },
            error: function(error) {
              //handle error
              console.log(error)
              filter.find('span').text('Oops, error');
            }
          });
        }
      });
    </script>
  </div>

  <div class="mobileaccordion col-md-3">
    <div id="accordion">

      <div class="card filter-card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <!--this is the button of title-->
              <h6><?php echo pll__("Στάδιο"); ?></h6>
            </a>
          </h5>
        </div>
      </div>


      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body filter-card-full">
          <?php
          $system_type_filters = get_field_object("field_5fb56808ccb6c")["choices"];
          $field_key = "stage";
          foreach ($system_type_filters as $system_type) { ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>" name="<?php echo $field_key . "/" . $system_type; ?>" id="selectCheck_<?php echo $i; ?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                <?php echo $system_type;
                $i++; ?>
              </label>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="card filter-card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
              <!--this is the button of title-->
              <h6><?php echo pll__("Κατηγορία"); ?></h6>
            </a>
          </h5>
        </div>
      </div>

      <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body filter-card-full">
          <?php

          $args = array(
            'post_type' => 'katigoria',
          );

          $system_type_filters = new WP_Query($args);
          ?>

          <?php
          $field_key = "category";
          foreach ($system_type_filters->posts as $post) { ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $post->post_title; ?>" name="<?php echo $field_key . "/" . $post->post_title; ?>" id="selectCheck_<?php echo $i; ?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                <?php echo $post->post_title;
                $i++; ?>
              </label>
            </div>
          <?php } ?>
        </div>

        <span></span>
      </div>
    </div>



  </div>

  <div class="col-md-9">
    <div id="response" class="row">
      <?php
      if ($competitions->have_posts()) : ?>
        <?php while ($competitions->have_posts()) : $competitions->the_post();

          $category = get_field('field_5fb3d48973dce');
          $stage = get_field('field_5fb56808ccb6c');
          $other_idea_img = get_field('field_5f00afdb6b723', $competitions->ID);
          $img_url = $other_idea_img['φωτογραφίες'] != "" ? $other_idea_img['φωτογραφίες'] :  get_stylesheet_directory_uri() . '/img/aegean_feature_img-competition.png';

        ?>

          <div class="col-md-12 col-sm-6">
            <div class="card competition-card">
              <a href="<?php echo get_permalink($other_idea_id); ?>">
                <div class="card-body">
                  <div class="sec-ideas-img" style="background-image: url(<?php echo $img_url ?>);">
                    <div class="overlay"></div>
                    <h4 class="card-title-news"><?php echo get_the_title($other_idea); ?></h4>
                  </div>

                </div>
                <div class="card-footer" style="padding: 1.25rem;">
                  <p class="stage"><?php echo pll__("Στάδιο"); ?> <?php echo $stage; ?></p>
                  <div class="dates">
                    <p class="start"><?php echo get_the_date(); ?></p>
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


  <div id="posts-pagination" class="pagination">
    <?php

    $big = 999999999; // an unlikely integer
    echo paginate_links([
      'base'            => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format'          => '/page/%#%', # or ?paged=%#% '/page/%#%'
      'current'         => max(1, get_query_var('paged')),
      'total'           => $competitions->max_num_pages,
      'prev_text'       => __('<span class="meta-nav">&lt;</span>', 'aegeanx'),
      'next_text'       => __('<span class="meta-nav">&gt;</span>', 'aegeanx'),
    ]);
    ?>
  </div>
</section>


<?php get_footer(); ?>