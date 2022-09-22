<?php
/**
 * Template Name: ideas
 *
 *
 *
 * @package understrap
 */
?>



<?php get_header('inner'); ?>

<div><img class="title-img-above" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon.svg" alt="">
</div>

<h2><?php echo pll__("Επιχειρηματικές Ιδέες");?></h2>
<p class="title-page"><?php echo pll__("Εδώ μπορείτε να βρείτε όλες τις επιχειρηματικές ιδέες");?></p>



<section id="ideas">

  <?php 

$args = array(
  'posts_per_page' => -1,
  'post_type'   => 'businessidea',
  'post_status' => "publish",
  'lang' => "el",
  'orderby' => 'date', // we will sort posts by date
  'order'    => 'DESC', // ASC or DESC          
);
 

$ideas = new WP_Query($args);
    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3 responsivetabs">
        <h6 class="heading-filters"><?php echo pll__("Φίλτρα");?></h6>
        <form method="post" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="filter">


        <p><?php echo pll__("Διαγωνισμός");?></p>
          <div class="filter-card-full">
            <?php
            $args = array(
              'post_type' => 'competition',
            );
            $system_type_filters = new WP_Query($args);
            ?>
            <?php
            $field_key = "ανήκει_σε_διαγωνισμό_";
            foreach ($system_type_filters->posts as $post) { ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $post->ID; ?>" 
                name="<?php echo $field_key . "/" . $post->ID; ?>" id="selectCheck_<?php echo $i; ?>">
                <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                  <?php echo $post->post_title;
                  $i++; ?>
                </label>
              </div>
            <?php } ?>
          </div>

          <p><?php echo pll__("Τύπος Προϊόντος - Συστήματος");?></p>
          <div class="filter-card-full">
            <?php
            $i=0;

            $system_type_filters = get_field_object("field_5f033252a1929")["choices"];
            $field_key = "τυπος_προϊόντος_-_συστήματος_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo pll__($system_type); $i++;?>
              </label>
            </div>

            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Κλάδος");?></p>
          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_603385484fbbc")["choices"];
            $field_key = "κλάδος_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo pll__($system_type); $i++;?>
              </label>
            </div>
            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Στάδιο");?></p>
          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_5ef9b2bd0c190")["choices"];
            $field_key = "στάδιο";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo pll__($system_type); $i++;?>
              </label>
            </div>
            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Εχει ιδρυθεί η επιχείρηση");?></p>
          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_5f03366e8f051")["choices"];
            $field_key = "εχει_ιδρυθεί_η_επιχείρηση_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo pll__($system_type); $i++;?>
              </label>
            </div>
            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Τύπος ανάγκης");?></p>
          <div class="filter-card-full">
            <?php
            // echo "<pre>";
            // var_dump(get_field_object("field_5eff14ac4e2c4"));
            // echo "</pre>";
            $system_type_filters = get_field_object("field_5eff14ac4e2c4")["choices"];
            $field_key = "τυπος_αναγκης_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo pll__($system_type); $i++;?>
              </label>
            </div>
            <?php } ?>
          </div>
          <span></span>
          <input type="hidden" name="action" value="ideas_filter">
          <input type="submit" class="primary_btn" value=<?php echo pll__("Αναζήτηση");?>>
        </form>

        <script>
          jQuery(function ($) {
            $(".form-check-input").on("change", function (ev) {
              fetchFilterData()
            })
            $('#filter').on("submit", function (ev) {
              ev.preventDefault();
              fetchFilterData()
            });

            function fetchFilterData() {
              var filter = $('#filter');
              $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                type: filter.attr('method'), // POST
                beforeSend: function (xhr) {
                  filter.find('span').text('Processing...'); // changing the button label
                },
                success: function (data) {
                  filter.find('span').text(''); // changing the button label back
                  $('#response').html(data); // insert data
                },
                error: function (error) {
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
        <h6 class="heading-filters"><?php echo pll__("Φίλτρα");?></h6>
        <div id="accordion">
        <div class="card filter-card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                  aria-controls="collapseThree">
                  <p><?php echo pll__("Διαγωνισμός");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body filter-card-full">
              <?php
            $args = array(
              'post_type' => 'competition',
            );
            $system_type_filters = new WP_Query($args);
            ?>
            <?php
            $field_key = "ανήκει_σε_διαγωνισμό_";
            foreach ($system_type_filters->posts as $post) { ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $post->ID; ?>" 
                name="<?php echo $field_key . "/" . $post->ID; ?>" id="selectCheck_<?php echo $i; ?>">
                <label class="form-check-label" for="selectCheck_<?php echo $i; ?>">
                  <?php echo $post->post_title;
                  $i++; ?>
                </label>
              </div>
            <?php } ?>
          </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  <!--this is the button of title-->
                  <p><?php echo pll__("Τύπος Προϊόντος - Συστήματος");?></p>
                </a>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <!--this is the content -->
                <?php
            $i=0;

            $system_type_filters = get_field_object("field_5f033252a1929")["choices"];
            $field_key = "τυπος_προϊόντος_-_συστήματος_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo pll__($system_type); $i++;?>
                  </label>
                </div>

                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                  aria-controls="collapseThree">
                  <p><?php echo pll__("Κλάδος");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            $system_type_filters = get_field_object("field_603385484fbbc")["choices"];
            $field_key = "κλάδος_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo pll__($system_type); $i++;?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                  aria-controls="collapseFour">
                  <p><?php echo pll__("Στάδιο");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            $system_type_filters = get_field_object("field_5ef9b2bd0c190")["choices"];
            $field_key = "στάδιο";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo pll__($system_type); $i++;?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingFive">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                  aria-controls="collapseFive">
                  <p><?php echo pll__("Εχει ιδρυθεί η επιχείρηση");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            $system_type_filters = get_field_object("field_5f03366e8f051")["choices"];
            $field_key = "εχει_ιδρυθεί_η_επιχείρηση_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo pll__($system_type); $i++;?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingSix">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                  aria-controls="collapseSix">
                  <p><?php echo pll__("Τύπος ανάγκης");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            // echo "<pre>";
            // var_dump(get_field_object("field_5eff14ac4e2c4"));
            // echo "</pre>";
            $system_type_filters = get_field_object("field_5eff14ac4e2c4")["choices"];
            $field_key = "τυπος_αναγκης_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo pll__($system_type); $i++;?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div id="response" class="row">
          <?php
          if($ideas->have_posts()): ?>
          <?php while($ideas->have_posts()): ?>
          <?php $ideas->the_post();
            $other_idea_img = get_field('field_5f00afdb6b723',$ideas->ID); ?>
          <div class="col-md-4 col-sm-6">
            <div class="card idea-card">
              <a href="<?php echo get_permalink($other_idea_id);?>">
                <div class="card-body">
                  <?php if($other_idea_img['φωτογραφίες'] != ""){ ?>
                  <div class="sec-ideas-img"
                    style="background-image: url('<?php echo $other_idea_img['φωτογραφίες'];?>')">

                  </div>
                  <?php } else { ?>
                  <div class="sec-ideas-img"
                    style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/aegean_feature_img-idea.png';?>')">
                  </div>

                  <?php } ?>

                  <h5 class="card-title-news"><?php echo get_the_title($other_idea);?></h5>

                </div>
                <div class="card-footer" style="padding: 1.25rem;">
                  <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
                </div>
              </a>
            </div>
          </div>
          <?php endwhile;?>
          <?php wp_reset_postdata();
          else: ?>
          <p class="text-center"></p>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>

</section>


<?php get_footer();?>