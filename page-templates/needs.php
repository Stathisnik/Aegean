<?php
/**
 * Template Name: needs
 *
 * 
 *
 * @package understrap
 */
?>



<?php get_header('inner'); ?>

  <div><img class="title-img-above" src="<?php echo get_stylesheet_directory_uri(); ?>/img/idea-icon.svg" alt="">
  </div>

<h2><?php echo pll__("Ανάγκες Επιχειρήσεων");?></h2>
<p class="title-page"><?php echo pll__("Εδώ μπορείτε να βρείτε όλες τις ανάγκες επιχειρήσεων");?></p>


<section id="ideas">

  <?php 

$args = array(
  'posts_per_page' => -1,
  'post_type'   => 'businessneed',
   'post_status' => "publish",
  'lang' => "el",
  'orderby' => 'date', // we will sort posts by date
  'order'    => 'DESC', // ASC or DESC      
);
 

$needs = new WP_Query($args);
    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3 responsivetabs">
        <h6 class="heading-filters"><?php echo pll__("Φίλτρα");?></h6>
        <form method="post" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="filter">
          <p><?php echo pll__("Ανάγκες");?></p>
          <div class="filter-card-full">
            <?php
              $i=0;
              $system_type_filters = get_field_object("field_5f6c8a9c515f6")["choices"];
              $field_key = "need_type_buss";
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
          <p><?php echo pll__("Κλάδος Επιχείρησης");?></p>
          <div class="filter-card-full">
          <?php
            $system_type_filters = get_option("um_fields")["legal_person_klados"]["options"];
            $field_key = "κλάδος_επιχείρησης_";
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
          <p><?php echo pll__("Ποιο νησί αφορά η ανάγκη;");?></p>
          <div class="filter-card-full">
          <?php
            $system_type_filters = get_field_object("field_603d06f8f0157")["choices"];//get_option("um_fields")["edra_business"]["options"];

            $field_key = "nisi_anagki_έδρα";
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
            
          <span></span>
          <input type="hidden" name="action" value="needs_filter">
          <input type="submit" class="primary_btn" value=<?php echo pll__("Αναζήτηση");?>>
        </form>

        <script>
           jQuery(function ($) {
            $(".form-check-input").on("change",function(ev){
              fetchFilterData()
            })
            $('#filter').on("submit",function (ev) {
              ev.preventDefault();
              fetchFilterData()
            });

            function fetchFilterData(){
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
                  error: function(error){
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
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <p><?php echo pll__("Ανάγκες");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body filter-card-full">
              <?php
                      $system_type_filters = get_field_object("field_5f6c8a9c515f6")["choices"];
                      $field_key = "τύπος__ανάγκης";
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
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <!--this is the button of title-->
                <p><?php echo pll__("Κλάδος Επιχείρησης");?></p>
                </a>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body filter-card-full"><!--this is the content -->
                    <?php
                    $i=0;
                    $system_type_filters = get_option("um_fields")["klados_business"]["options"];
                    $field_key = "κλάδος_επιχείρησης_";
                    foreach($system_type_filters as $system_type){ ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>" name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
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
                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <p><?php echo pll__("Έδρα της επιχείρησης");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body filter-card-full">
              <?php
                    $system_type_filters = get_option("um_fields")["edra_business"]["options"];
                    $field_key = "έδρα_της_επιχείρησης_";
                    foreach($system_type_filters as $system_type){ ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>" name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
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
                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <p><?php echo pll__("Η επιχείρηση έχει παρουσία σε άλλα νησιά;");?></p>
                </a>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body filter-card-full">
              <?php
                    // $system_type_filters = get_field_object("field_5f06f834d1dd3")["choices"];
                    $system_type_filters = get_option("um_fields")["business_island"]["options"];
                    $field_key = "η_επιχείρηση_έχει_παρουσία_σε_άλλα_νησιά_";
                    foreach($system_type_filters as $system_type){ ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $system_type; ?>" name="<?php echo $field_key."/".$system_type; ?>" id="selectCheck_<?php echo $i;?>">
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
          if($needs->have_posts()): ?>
            <?php while($needs->have_posts()): ?>
              <?php $needs->the_post();
                  
              ?>

              <div class="col-md-4 sm-2">

              <a href="<?php echo get_permalink( );?>">
                <div class="card card-content">
              
                  <div class="card-body" style="padding-bottom: 1px;">
                    <?php 
                    $tipos_anagis = get_field('field_5f6c8a9c515f6');
                    $anagkes = get_field('field_5f6c8bc3515f7');
                    $author_id = get_the_author_meta('ID');
                    um_fetch_user( $author_id );
                    $klados_epixirisis = um_user('klados_business');
                    $edra_epixirisis = um_user('business_edra');    
                    um_reset_user();

                    if($anagkes){ ?>
                        <h6 style="color: black;" class="text-left"><?php echo mb_strimwidth(get_the_title(), 0, 80, '...'); ?></h6>
                        <?php if($tipos_anagis != 'Άλλο'): ?>
                          <p style="color: black;font-weight: normal;text-align: left!important;"><?php echo $tipos_anagis; ?></p>
                        <?php endif; ?>
                   <?php } ?>
                    <?php the_content();?>
                    <div class="card-footer">
                      <small class="text-muted"><?php echo get_the_date('d/m/y'); ?></small>
                    </div>
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