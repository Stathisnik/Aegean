<?php
/**
     * 
     * Template Name: archive katigoria
     * 
 */

get_header('inner');
?>
 
<div class="container">
		<h2 class="font-weight-bold text-center mt-3"><?php echo pll__("Κατηγορίες");?></h2>

        <?php 
                $args = array(
                'post_type' => 'katigoria',
                'lang' => '',
                );

 				 $otherkatigories = get_posts( $args );	?>
				<?php foreach($otherkatigories as $otherkatigoria){
			  $postid = get_the_ID( $otherkatigoria);
			  $otherkatigoria_id = $otherkatigoria->ID;
			  ?>
		<div class="row">
			<div class="col-lg-12 mb-5">

                <h4> <?php echo get_the_title($otherkatigoria);?> </h4>
                <p class="card-text"> <?php echo $otherkatigoria->post_content; ?> </p>
                <div class="text-right">
                    <a href="<?php echo get_the_permalink($otherkatigoria_id); ?>" style="color:#3397FF;"> Περισσότερα </a>
                </div>

			</div>  

		</div>
        <?php } ?>
	</div>

<?php get_footer(); ?>