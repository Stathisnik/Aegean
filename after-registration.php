<?php
/**
 * 
 * Template Name: After Registration
 * 
 * @package understrap
 */

 get_header('inner');
?>

<div class="container proto mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12">
            <h3> Συμπλήρωσε κάποια επιπλέον στοιχεία για να ολοκληρώσεις την εγγραφή σου </h3>
            <form method = "POST" action="" class="mt-5">
                <div class="form-group">
                        <label for="nomiko_prosopo" class = "font-weight-bold"> Είμαι </label>
                        <select id="nomiko_prosopo" name = "nomiko_prosopo" class="form-control" required>
                            <option selected disabled> Διαλέξτε μια από τις επιλογές </option>
                            <option value = "Φυσικό Πρόσωπο" name="natural_person" id="natural_person"> Φυσικό Πρόσωπο </option>
                            <option value = "Νομικό Πρόσωπο" name = "legal_person" id="legal_person"> Νομικό Πρόσωπο </option>
                        </select>
                </div>
                <div class = "form-group">
                    <label for ="nomiki_idiotita" class = "font-weight-bold hide"> Επιχείρηση ή Οργανισμός </label>
                    <select id="nomiki_idiotita" name = "nomiki_idiotita" class="form-control hide">
                        <option selected disabled> Διαλέξτε μια από τις επιλογές </option>
                        <option value = "Επιχείρηση" name="business"> Επιχείρηση </option>
                        <option value = "Οργανισμός" name = "organization"> Οργανισμός </option>
                    </select>
                </div>
                <input type="submit" value = 'Καταχώρηση Στοιχείων' name = "submit" class = "primary_btn">
            </form>
        </div>
    </div>
</div>

<script>
   jQuery(document).ready(function (){
        
        jQuery('.hide').css("display","none");

        jQuery('#nomiko_prosopo').change(function(){
            var x = jQuery("#nomiko_prosopo").val();
            if(x == "Νομικό Πρόσωπο"){
                jQuery('.hide').css("display","block")
            }else if(x == "Φυσικό Πρόσωπο"){
                jQuery('.hide').css("display","none")
            }
        }); 

    });
</script>

<?php 

    $user_id = get_current_user_id();
    if( isset($_POST['submit']) ){
    // collect value of input field
    $nomiko_prosopo = $_POST['nomiko_prosopo'];
    $nomiki_idiotita = $_POST['nomiki_idiotita'];


    if($nomiko_prosopo){
        update_user_meta( $user_id, 'is_legal', $nomiko_prosopo);
    }

    if($nomiko_prosopo == "Νομικό Πρόσωπο"){
        update_user_meta( $user_id , 'legal_identity', $nomiki_idiotita);
    }

    $url = get_home_url().'/user/';
    wp_redirect($url);
    exit;

}


?>



<?php get_footer(); ?>