<?php /* Template Name: Success-form Page */ ?>
 

<?php get_header('inner'); ?>
 
<div class="container">
  <h1><?php echo pll__("Επιτυχία υποβολής");?></h1>
  <h2><?php echo pll__("Επόμενη φάση:");?><?php echo pll__("Αξιολόγηση");?></h2>
  <p class="p-text"><?php echo pll__("Συγχαρητήρια για την υποβολή της επιχειρηματικής σου ιδέας!");?></p>
  
    <p class="p-text"><?php echo pll__("Όταν αξιολογηθεί η ιδέα σου, θα λάβεις ειδοποίηση για την εξέλιξή της.");?></p>
	
	<div class="d-flex justify-content-center learn-more">
	<a href="<?php echo get_home_url();?>" class="btn under" ><?php echo pll__("Αρχική σελίδα");?></a>
     </div>
</div>

    

<?php get_footer();
