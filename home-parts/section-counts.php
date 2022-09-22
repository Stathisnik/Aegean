<section id="counts">
      <div class="container">
      <?php 
            $args = array(
                  'meta_query' => array(
                        'relation' => 'OR',
                              array(
                                    'key'     => 'legal_identity',
                                    'value'   => 'Επιχείρηση',
                                     'compare' => '='
                              ),
                              array(
                                    'key'     => 'legal_identity',
                                    'value'   => 'Οργανισμός',
                                    'compare' => '='
                              )
                  )
             );
            $user_query = new WP_User_Query( $args );
            $legal_person = $user_query->get_results();
      ?>
      <?php if(pll_current_language() == 'el'){ ?>
            <h2><?php echo get_field('τιτλος_μετρησεων');?></h2>
            <?php }else{ ?>
                  <h2><?php echo get_field('title_counts');?></h2>
                  <?php }?>
            <?php 
                  $custom_measurements = get_field('field_603665890315c','option');
                  // var_dump($custom_measurements);
                  if($custom_measurements == "οχι"): 
            ?>
                  <div class="row mx-auto justify-content-between">
                        <div class="col text-center">
                              <?php $count_ideas = wp_count_posts( 'businessidea' )->publish;?>

                              <div class="counter" data-count="<?php echo $count_ideas;?>"> 0 </div>
                              <p><?php echo pll__("Επιχειρηματικές Ιδέες");?></p>
                        </div>
                        <div class="col text-center">
                              <?php $total_users = count_users(); ?>
                              <div class="counter" data-count="<?php echo $total_users['total_users'];?>"> 0 </div>

                              <p><?php echo pll__("Μέλη");?></p>
                        </div>
                        <div class="col text-center">
                              <div class="counter" data-count="<?php echo count($legal_person);?>"> 0 </div>
                              <p><?php echo pll__("Επιχειρήσεις/Φορείς");?></p>
                        </div>
                        <div class="col text-center">
                              <?php $total_users = count_users();?>
                              <div class="counter" data-count="<?php echo $total_users['avail_roles']['mentor']; ?>"> 0 </div>
                              <p><?php echo pll__("Μέντορες");?></p>
                        </div>
                        <div class="col text-center">
                              <div class="counter" data-count="<?php echo get_field('field_603e50718f8bb','option'); ?>"> 0 </div>
                              <p><?php echo pll__("Υποστηρικτές");?></p>
                        </div>
                  </div>
            <?php elseif($custom_measurements == "ναι"): ?>
                  <div class="row mx-auto justify-content-between">
                              <?php 
                                    $measurements = get_field('custom_measurements','option');
                                    $business_ideas = get_field('business_ideas','option'); 
                                    $members = get_field('members','option'); 
                                    $mentors = get_field('mentors','option'); 
                                    $contributors = get_field('contributors','option');
                                    $business_org = get_field('business_org', 'option')
                              ?>
                               <!-- Επιχειρηματικές Ιδέες -->
                              <?php if( in_array("business" , $measurements) ): ?>
                                    <div class="col text-center">
                                          <?php $count_ideas = wp_count_posts( 'businessidea' )->publish;?>
                                          <div class="counter" data-count="<?php echo $business_ideas + $count_ideas; ?>"> 0 </div>
                                          <p><?php echo pll__("Επιχειρηματικές Ιδέες");?></p>
                                    </div>
                                    <?php else: ?>
                                          <div class="col text-center">
                                                <?php $count_ideas = wp_count_posts( 'businessidea' )->publish;?>
                                                <div class="counter" data-count="<?php echo $count_ideas;?>"> 0 </div>
                                                <p><?php echo pll__("Επιχειρηματικές Ιδέες");?></p>
                                          </div>
                              <?php endif; ?>
                              
                              <!-- Μέλη -->
                              <?php if( in_array("members" , $measurements) ): ?>
                                    <div class="col text-center">
                                          <?php $total_users = count_users(); ?>
                                          <div class="counter" data-count="<?php echo $members + $total_users['total_users'];?>"> 0 </div>
                                          <p><?php echo pll__("Μέλη");?></p>
                                    </div>
                                    <?php else: ?>
                                          <div class="col text-center">
                                                <?php $total_users = count_users(); ?>
                                                <div class="counter" data-count="<?php echo $total_users['total_users']; ?>"> 0 </div>

                                                <p><?php echo pll__("Μέλη");?></p>
                                          </div>
                              <?php endif; ?>
                              
                              <!-- Μέντορες -->
                              <?php if( in_array("mentors" , $measurements) ): ?>
                                    <div class="col text-center">
                                          <?php $total_users = count_users();?>
                                          <div class="counter" data-count="<?php echo $mentors + $total_users['avail_roles']['mentor'] ?>"> 0 </div>
                                          <p><?php echo pll__("Μέντορες");?></p>
                                    </div>
                                    <?php else: ?>
                                          <div class="col text-center">
                                                <?php $total_users = count_users();?>
                                                <div class="counter" data-count = "<?php echo $total_users['avail_roles']['mentor']; ?>"> 0 </div>
                                                <p><?php echo pll__("Μέντορες");?></p>
                                          </div>
                              <?php endif; ?>

                              <!-- Επιχειρήσεις/Φορείς -->
                              <?php if( in_array("businessOrg" , $measurements) ): ?>
                                    <div class="col text-center">
                                          <div class="counter" data-count="<?php echo count($legal_person) + get_field('business_org','option');?>"> 0 </div>
                                          <p><?php echo pll__("Επιχειρήσεις/Φορείς");?></p>
                                    </div>
                                    <?php else: ?>
                                          <div class="col text-center">
                                                <div class="counter" data-count="<?php echo count($legal_person); ?>"> 0 </div>
                                                <p><?php echo pll__("Επιχειρήσεις/Φορείς");?></p>
                                          </div>
                              <?php endif; ?>
                              
                              <!-- Υποστηρικτές -->
                              <div class="col text-center">
                                    <div class="counter" data-count= "<?php echo $contributors; ?>" > 0 </div>
                                    <p><?php echo pll__("Υποστηρικτές");?></p>
                              </div>
                  </div>
            <?php endif; ?>
      </div>
</section>

<script>

jQuery('#counts').bind('inview', monitor);
function monitor(event, visible)
{
    if(visible)
    {
      jQuery('.counter').each(function () {
      var $this = jQuery(this),
      countTo = $this.attr('data-count');
      jQuery({
      countNum: $this.text()
      }).animate({
      countNum: countTo
      }, {
      duration: 1500,
      easing: 'linear',
      step: function () {
            $this.text(Math.floor(this.countNum));
      },
      complete: function () {
            $this.text(this.countNum);
            //alert('finished');
      }
      });
});
    }

}





</script>