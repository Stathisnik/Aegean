<?php
/**
 * Template Name: Photos and videos
 *
 *
 *
 * @package understrap
 */
?>

<?php get_header('inner'); ?>

<section id="photos-videos">
    <div class="container">
        <h2>Τα βίντεο των Aegean Startups</h2>
        <h4>Aegean Startups 2015</h4>
        <div class="row justify-content-center responsive-media">
            <?php 
			$photos_videos = get_field('field_6034fcd660f20');
		
		    foreach($photos_videos as $photo_video):?>

            <div class="col-md-4">
                <h6><?php echo $photo_video['titlos_aeg'];?></h6>
                <img src="<?php echo $photo_video['image_aeg']; ?>" alt="">
                <p><?php echo $photo_video['video_aeg'];?><p>

            </div>
            <?php endforeach; ?>



        </div>

        <h4>Aegean Startups 2018</h4>
        <div class="row justify-content-center videos-photos">
            <?php 
			$images_videos = get_field('field_6035070b9c7ee');
		
		    foreach($images_videos as $image_video):?>

            <div class="col-md-4">
                <h6><?php echo $image_video['titlos_aeg_2'];?></h6>
                <img src="<?php echo $image_video['image_aeg_2']; ?>" alt="">
                <p><?php echo $image_video['video_aeg_2'];?><p>

            </div>
            <?php endforeach; ?>



        </div>
    </div>
</section>
<?php get_footer();?>