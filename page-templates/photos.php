<?php
/**
 * Template Name: Photos
 *
 *
 *
 * @package understrap
 */
?>

<?php get_header('inner'); ?>

<section id="photos-videos">
    <div class="container">
        <h2>Οι φωτογραφίες των Aegean Startups</h2>
        <h4>Διαγωνισμός 2011-2012</h4>
        <div class="row justify-content-center responsive-media">
            <?php 
			$com_images = get_field('field_6070245dbd923');
		
		    foreach($com_images as $com_image):?>

            <div class="col-md-4">
                <h6><?php echo $com_image['titlos_photos1'];?></h6>
                
                    <img id="myImg" src="<?php echo $com_image['image_diag1']; ?>" alt="">

                    <!-- The Modal -->
                     <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                 


            </div>


            <?php endforeach; ?>



        </div>

        <h4>Διαγωνισμός 2015-2016</h4>
        <div class="row justify-content-center videos-photos">
            <?php 
			$com_icons = get_field('field_60702508bd926');
		
		    foreach($com_icons as $com_icon):?>

            <div class="col-md-4">
                <h6><?php echo $com_icon['titlos_photos2'];?></h6>
                <img src="<?php echo $com_icon['image_diag2']; ?>" alt="">

            </div>
            <?php endforeach; ?>



        </div>

        <h4>Διαγωνισμός 2017-2018</h4>
        <div class="row justify-content-center videos-photos">
            <?php 
			$com_pictures = get_field('field_6070261ebd929');
		
		    foreach($com_pictures as $com_picture):?>

            <div class="col-md-4">
                <h6><?php echo $com_picture['titlos_photos3'];?></h6>
                <img src="<?php echo $com_picture['image_diag3']; ?>" alt="">


            </div>
            <?php endforeach; ?>



        </div>
        

    </div>
</section>
<script>
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<?php get_footer();?>