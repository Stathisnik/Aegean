<?php
/**
 * Template Name: actions
 *
 * 
 *
 * @package understrap
 */
?>



<?php get_header('inner'); ?>

<div><img class="title-img-above" src="<?php echo get_stylesheet_directory_uri(); ?>/img/action-icon.svg" alt="">
</div>

<h2><?php echo pll__("Δράσεις");?></h2>





<section id="ideas">

  <?php 

$args = array(
  'posts_per_page' => -1,
  'post_type'   => 'action',
  'lang'=>'el'          
);
 

$actions = new WP_Query($args);
    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3 responsivetabs">
        <h6 class="heading-filters"><?php echo pll__("Φίλτρα");?></h6>
        <form method="post" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="filter">

          <h6><?php echo pll__("Ανήκει σε διαγωνισμό");?></h6>
          <div class="filter-card-full">
            <?php
            $i=0;

            $system_type_filters = get_field_object("field_5f059ef3b31f4")["choices"];
            $field_key = "ανήκει_σε_κάποιον_διαγωνισμό_δράσεων_των_aegean_startups";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo $system_type; $i++;?>
              </label>
            </div>

            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Τύπος Δράσης");?></p>
          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_5f059ac549ca2")["choices"];
            $field_key = "τύπος_δράσης_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo $system_type; $i++;?>
              </label>
            </div>

            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Έχει υποβληθεί η δράση σε άλλο διαγωνισμό");?></p>
          <div class="filter-card-full">
            <?php
            $system_type_filters = get_field_object("field_5f059ef3b31f4")["choices"];
            $field_key = "έχει_υποβληθεί_η_δράση_σε_άλλο_διαγωνισμό;_";
            foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo $system_type; $i++;?>
              </label>
            </div>
            <?php } ?>
          </div>
          <br>
          <p><?php echo pll__("Θα έχει εσοδα");?></p>
          <div class="filter-card-full">
            <?php
              $system_type_filters = get_field_object("field_5f059c9627f13")["choices"];
              $field_key = "θα_έχετε_εσοδα;";
              foreach($system_type_filters as $system_type){ ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
              <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                <?php echo $system_type; $i++;?>
              </label>
            </div>

            <?php } ?>
          </div>
          <span></span>
          <input type="hidden" name="action" value="actions_filter">
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
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  <!--this is the button of title-->
                  <p><?php echo pll__("Ανήκει σε διαγωνισμό");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <!--this is the content -->
                <?php
            $i=0;

            $system_type_filters = get_field_object("field_5f059ef3b31f4")["choices"];
            $field_key = "ανήκει_σε_κάποιον_διαγωνισμό_δράσεων_των_aegean_startups";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo $system_type; $i++;?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card filter-card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                  aria-controls="collapseTwo">
                  <p><?php echo pll__("Τύπος Δράσης");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            $system_type_filters = get_field_object("field_5f059ac549ca2")["choices"];
            $field_key = "τύπος_δράσης_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo $system_type; $i++;?>
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
                  <p><?php echo pll__("Έχει υποβληθεί η δράση σε άλλο διαγωνισμό");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
            $system_type_filters = get_field_object("field_5f059ef3b31f4")["choices"];
            $field_key = "έχει_υποβληθεί_η_δράση_σε_άλλο_διαγωνισμό;_";
            foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo $system_type; $i++;?>
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
                  <p><?php echo pll__("Θα έχει εσοδα");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body filter-card-full">
                <?php
              $system_type_filters = get_field_object("field_5f059c9627f13")["choices"];
              $field_key = "θα_έχετε_εσοδα;_";
              foreach($system_type_filters as $system_type){ ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>"
                    name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
                  <label class="form-check-label" for="selectCheck_<?php echo $i;?>">
                    <?php echo $system_type; $i++;?>
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
          if($actions->have_posts()): ?>
          <?php while($actions->have_posts()): ?>
          <?php $actions->the_post(); ?>
          <div class="col-md-4 col-sm-6">
            <div class="card idea-card">
              <a href="<?php echo get_permalink();?>">
                <div class="card-body">
                <?php 						 
                      $postid = get_the_ID();
                      $eikona_kai_video = get_field('field_5f43761576775',$postid); ?>
                  <?php 
                if($eikona_kai_video['φωτογραφίες'] != ""){ ?>
                  <div class="sec-ideas-img"
                    style="background-image: url('<?php echo $eikona_kai_video['φωτογραφίες'];?>" />

                  </div>
                  <?php } else { ?>
                  <div class="sec-ideas-img"
                    style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/aegean_feature_img-action.png';?>')">
                  </div>

                  <?php } ?>

                  <h5 class="card-title-news"><?php echo get_the_title();?></h5>

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