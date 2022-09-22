<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$ideas_on_competition = [];
?>
<div class="container">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <header class="entry-header">
            <?php if ('post' == get_post_type()) { ?>
                <div class="entry-meta">
                    <?php understrap_posted_on(); ?>
                </div>
            <?php } ?>
        </header>
        <br>
        <?php
        $postid = get_the_ID();
        $perigrafi_tis_ideas = get_field('field_5ef9add15ce6c', $postid);
        $titlos_epixirimatikis_ideas = get_field('field_5ef9a8fe847ec', $postid);
        $epipleon_melh = get_field('field_5ef9aad213336', $postid);
        $typos_proiontos_sistimatos = get_field('field_5ef9b1ac48d79', $postid);
        $aniki_se_diagonismo = get_field('field_5ef9acb911334', $postid);
        $klados_ = get_field('field_5ef9af8b9153e', $postid);
        $anagkes = get_field('field_5efca059282eb', $postid);
        $typos_anagkhs = get_field('field_5eff14ac4e2c4', $postid);
        $sustainable_development_goals = get_field('field_5f16a62b8aa04', $postid);
        $goals = get_field('field_5f1936b0d46d8', $postid);
        $stadio = get_field('field_5ef9b2bd0c190', $postid);
        $eikona_video = get_field('field_5f00afdb6b723', $postid);
        $adapodotika_ofeli = get_field('field_5efca18309955', $postid);
        $author = get_the_author_meta('ID');
        $business_needs = get_field('field_5fce37209584e', $postid);

        $title = get_field('field_5fb3e228cb8b4');
        $banner = get_field('field_5fb5622a25a3b');
        $description = get_field('field_5fb3e240cb8b5');
        $stoxoi = get_field('field_5fb5642d18ad5');
        $stage = get_field('field_5fb56808ccb6c');
        $category = get_field('field_5fb3d48973dce');
        $prizes = get_field('field_5fb3d7fb73dd5');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="different">
                        <h2 class="font-weight-bold mt-3">
                            <?php echo $title; ?>
                        </h2>
                    </div>
                    <br>
                    <div class="different">
                        <?php if ($banner) { ?>
                            <ul class="different">
                                
                                    <div class="different"><img class="content-img" src="<?php echo $banner['url']; ?>">

                                    </div>
                                
                            </ul>
                        <?php } ?>
                    </div>

                    <br>
                    <h6 class="small_title description"><?php echo pll__("Περιγραφή"); ?></h6>
                    <div class="different">
                        <?php echo $description; ?>
                    </div>

                    <br>
                    <p>
                    <h6 class="small_title targets"><?php echo pll__("Στόχοι βιώσιμης ανάπτυξης"); ?></h6>
                    </p>
                    <?php
                    $synergasia_gia_stoxous =  $stoxoi['συνεργασία_για_στόχους'];
                    $exaleipsi_peinas = $stoxoi['hunger'];
                    $kali_ygeia = $stoxoi['καλή_υγεία'];
                    $poiotiki_ekpedefsi =  $stoxoi['ποιοτική_εκπαίδευση'];
                    $isotita_filon = $stoxoi['ισότητα_των_φύλων'];
                    $nero_apoxetefsi = $stoxoi['καθαρό_νερό_και_αποχέτευση'];
                    $ananeosimi_energeia =  $stoxoi['ανανεώσιμη_ενέργεια'];
                    $theseis_ergasias_oik_anaptixi = $stoxoi['καλές_θέσεις_εργασίας_και_οικονομική_ανάπτυξη'];
                    $kainotomia_ypodomes = $stoxoi['καινοτομία_και_υποδομές'];
                    $miosi_anisotiton =  $stoxoi['μείωση_των_ανισοτήτων'];
                    $aeiforeis_poleis = $stoxoi['αειφόρες_πόλεις_και_κοινότητες'];
                    $ipefthini_katanalosi = $stoxoi['υπεύθυνη_κατανάλωση'];
                    $draseis_gia_klima = $stoxoi['δράσεις_για_το_κλίμα'];
                    $ypothallasia_zoi = $stoxoi['υποθαλάσσια_ζωή'];
                    $xersea_zoi =  $stoxoi['χερσαία_ζωή'];
                    $eirini_dikaiosini = $stoxoi['ειρήνη_και_δικαιοσύνη'];
                    $sinergasies_gia_stoxous = $stoxoi['συνεργασίες_για_στόχους'];

                    if ($synergasia_gia_stoxous) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-1.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__("1. Συνεργασία για στόχους"); ?></p>
                        </div>
                        <p><?php echo $synergasia_gia_stoxous; ?></p>
                    <?php }
                    if ($exaleipsi_peinas) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-2.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__("2. Εξάλειψη Πείνας"); ?></p>
                        </div>
                        <p><?php echo $exaleipsi_peinas; ?></p>
                    <?php }
                    if ($kali_ygeia) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-3.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("3. Καλή υγεία"); ?> </p>
                        </div>
                        <p><?php echo $kali_ygeia; ?></p>
                    <?php }
                    if ($poiotiki_ekpedefsi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-4.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("4. Ποιοτική εκπαίδευση"); ?> </p>
                        </div>
                        <p><?php echo $poiotiki_ekpedefsi; ?></p>
                    <?php }
                    if ($isotita_filon) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-5.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("5. Ισότητα των φύλων"); ?> </p>
                        </div>
                        <p><?php echo $isotita_filon; ?></p>
                    <?php }
                    if ($nero_apoxetefsi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-6.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("6. Καθαρό νερό και αποχέτευση "); ?></p>
                        </div>
                        <p><?php echo $nero_apoxetefsi; ?></p>
                    <?php }
                    if ($ananeosimi_energeia) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-7.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("7. Ανανεώσιμη ενέργεια"); ?> </p>
                        </div>
                        <p><?php echo $ananeosimi_energeia; ?></p>
                    <?php }
                    if ($theseis_ergasias_oik_anaptixi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-8.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__(" 8. Καλές θέσεις εργασίας και οικονομική ανάπτυξη"); ?> </p>
                        </div>
                        <p><?php echo $theseis_ergasias_oik_anaptixi; ?></p>
                    <?php }
                    if ($kainotomia_ypodomes) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-9.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__(" 9. Καινοτομία και υποδομές"); ?> </p>
                        </div>
                        <p><?php echo $kainotomia_ypodomes; ?></p>
                    <?php }
                    if ($miosi_anisotiton) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-10.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__(" 10. Μείωση των ανισοτήτων"); ?> </p>
                        </div>
                        <p><?php echo $miosi_anisotiton; ?></p>
                    <?php }
                    if ($aeiforeis_poleis) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-11.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("11. Αειφόρες πόλεις και κοινότητες"); ?> </p>
                        </div>
                        <p><?php echo $aeiforeis_poleis; ?></p>
                    <?php }
                    if ($ipefthini_katanalosi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-12.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("12. Υπεύθυνη κατανάλωση"); ?> </p>
                        </div>
                        <p><?php echo $ipefthini_katanalosi; ?></p>
                    <?php }
                    if ($draseis_gia_klima) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-13.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__(" 13. Δράσεις για το κλίμα "); ?></p>
                        </div>
                        <p><?php echo $draseis_gia_klima; ?></p>
                    <?php }
                    if ($ypothallasia_zoi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-14.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("14. Υποθαλάσσια ζωή "); ?></p>
                        </div>
                        <p><?php echo $ypothallasia_zoi; ?></p>
                    <?php }
                    if ($xersea_zoi) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-15.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("15. Χερσαία ζωή"); ?> </p>
                        </div>
                        <p><?php echo $xersea_zoi; ?></p>
                    <?php }
                    if ($eirini_dikaiosini) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-16.png" alt="">
                            <p class="font-weight-bold m-2"> <?php echo pll__("16. Ειρήνη και δικαιοσύνη "); ?></p>
                        </div>
                        <p><?php echo $eirini_dikaiosini; ?></p>
                    <?php }
                    if ($sinergasies_gia_stoxous) { ?>
                        <div class="d-flex my-4">
                            <img class="sdg-img-ideas" src="/wp-content/uploads/2020/07/sdg-17.png" alt="">
                            <p class="font-weight-bold m-2"><?php echo pll__(" 17. Συνεργασίες για στόχους "); ?></p>
                        </div>
                        <p><?php echo $sinergasies_gia_stoxous; ?></p>
                    <?php } ?>


                    <br>
                    <h6 class="small_title prizes"><?php echo pll__("Βραβεία"); ?></h6>
                    <div class="diffrent">
                        <?php echo $prizes; ?>
                    </div>
                    <hr>
                    <span style="font-size: 14px;font-weight: normal;color: #909192;"><?php echo pll__("Κοινοποίηση"); ?></span>
                    <div class="addthis_inline_share_toolbox_4iwa"></div>
                </div>

                <div class="col-md-3">
                <section id="dis-column">
                    <?php $roloi_xristi = um_user('roles'); ?>
                    <?php if( is_user_logged_in() && ( in_array('member',$roloi_xristi) || in_array('administrator',$roloi_xristi) ) ):?>
                        <div class="text-center">
                            <h6><?php echo pll__("Είμαι μέλος"); ?></h6>
                            <button onclick="window.location.href='https:/aegean-crowdsourcing/ypovoli-ideas/'" class="primary_btn full_width sm_margin"><?php echo pll__("Υποβολή επιχειρηματικής ιδέας!"); ?></button>
                            <!-- <button onclick="window.location.href='https:/aegean-crowdsourcing/ypovoli-drasis/'" class="primary_btn full_width sm_margin"><?php echo pll__("Υποβολή δράσης!"); ?></button> -->
                        </div>
                        <br>
                    <?php endif; ?>

                    <?php if( is_user_logged_in() && ( um_user('legal_identity') == "Επιχείρηση" || um_user('legal_identity') == "Οργανισμός" ) ): ?>
                        <div class="text-center">
                            <h6><?php echo pll__("Είμαι επιχείρηση / οργανισμός"); ?></h6>
                            <button onclick="window.location.href='https:/aegean-crowdsourcing/ypovoli-ideas/'" class="primary_btn full_width sm_margin"><?php echo pll__("Υποβολή επιχειρηματικής ιδέας!"); ?></button>
                        </div>
                        <br>
                    <?php endif; ?>

                    <?php if( is_user_logged_in() && ( in_array('mentor',$roloi_xristi) || in_array('administrator',$roloi_xristi) ) ): ?>
                        <div class="text-center">
                            <h6><?php echo pll__("Είμαι μέντορας"); ?></h6>
                            <button onclick="window.location.href='https:/aegean-crowdsourcing/engrafi-2/'" class="primary_btn full_width sm_margin"><?php echo pll__("Θέλω να συμμετέχω"); ?></button>
                        </div>
                    <?php endif; ?>
                    <div class="different">
                        <div class="profinfo">
                            <h6><?php echo pll__("Στάδιο"); ?></h6>
                            <div class="different">
                                <div class="different">
                                    <b><?php echo $stage ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="different">

                        <div class="profinfo">
                            <h6><?php echo pll__("Κατηγορία"); ?></h6>
                            <div class="different">
                                <div class="different-category">
                                    <?php
                                    if ($category) {
                                        foreach ($category as $value) { ?>

                                            <!--<a href="<?php //echo get_the_permalink( $value-> id); ?>">--><?php echo $value->post_title ?></a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="horizontal-line">
                    <div class="social-share"><?php echo pll__("Κοινοποίηση"); ?></div>
                    <div class="addthis_inline_share_toolbox_4iwa"></div>

                </div>
            </div>
        </div>
</div>
</section>
<?php if ($stage != "1ο στάδιο - Υποβολή ιδεών") { ?>

<?php } ?>

<section id="anages-section">
    <div class="container">
        <h3 class="heading-more"><?php echo pll__("Ανάγκες"); ?></h3>
        <div class="card-deck">
            <?php
            $args = array(
                'post_type' => 'businessneed',
                'numberposts' => 4
            );
            $business_needs = get_posts($args);
            ?>

            <?php foreach ($business_needs as $business_need) {  ?>
                <?php
                $business_need_id = $business_need->ID;
                $tipos_anagis = get_field('field_5f6c8a9c515f6', $business_need_id);
                ?>
                <a href="<?php echo get_permalink($business_need_id); ?>">
                    <div class="card">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div> <h6 style="color: black;" class="text-left"><?php echo mb_strimwidth(get_the_title($business_need_id), 0, 80, '...'); ?></h6> </div>
                            <div class="d-flex justify-content-end learn-more">
                                <a href="<?php echo get_permalink($business_need_id); ?>" style="color: #3397FF;"><?php echo pll__("Περισσότερα >"); ?></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?php echo get_the_date('d/m/y', $business_need_id); ?></small>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>




<?php

$args = array(
    'post_type'   => 'businessidea',
    'lang' => "el",
    'posts_per_page' => -1,
);


$ideas = new WP_Query($args);

foreach ($ideas->posts as $idea) {
    $diagonismos_relation = get_field("field_5ef9acb911334", $idea->ID);
    $othercompetition_id = $othercompetition->ID;
    $image_thematiki = get_field('thematiki_img',$othercompetition_id);
    // var_dump($diagonismos_relation);
    if (isset($diagonismos_relation["aniki_se_diagonismo"]) && $diagonismos_relation["select2"]->post_title != NULL && $diagonismos_relation["select2"]->post_title == $post->post_title) {
        array_push($ideas_on_competition, $idea);
    }
}

?>

<section id="busideas-section">
    <div class="container">
        <h3 class="heading-more"><?php echo pll__("Επιχειρηματικές ιδέες διαγωνισμού"); ?></h3>
        <div class="card-deck" style="justify-content: center;">
            <?php
            $args = array(
                // 'author' => $author,
                'post_type' => 'businessidea',
                'numberposts' => 4,
            );
            $ideas_on_competition = get_posts($args);
            ?>
            <?php foreach ($ideas_on_competition as $other_idea) {
					$other_idea_id = $other_idea->ID; //retrieve the id of card - idea
					$other_idea_img = get_field('field_5f00afdb6b723', $other_idea_id);
					$eikona_video = get_field('field_5f00afdb6b723', $postid); //retrieve the image of the card by giving the right id ($other_idea_id)
				?>
                <div class="col-md-3">
            <a href="<?php echo get_permalink($other_idea_id); ?>">
                <div class="card">
                    <div class="card-body">
                        <?php if ($other_idea_img['φωτογραφίες'] != "") { ?>
                        <div class="sec-ideas-img"
                            style="background-image: url('<?php echo $other_idea_img['φωτογραφίες']; ?>')">
                        </div>
                        <?php } else { ?>
                        <div class="sec-ideas-img"
                            style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/aegean_feature_img-idea.png'; ?>')">
                        </div>

                        <?php } ?>
                        <h5 class="card-title-news"><?php echo get_the_title($other_idea); ?></h5>
                        <div class="d-flex justify-content-end learn-more">
                            <a href="<?php echo get_permalink($other_idea_id); ?>"
                                style="color: #3397FF;"><?php echo pll__("Περισσότερα >"); ?></a>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <button onclick="window.location.href='https:/aegean-crowdsourcing/idees/';" type="button" class="primary_btn"><?php echo pll__("'Ολες οι ιδέες"); ?></button>
	<?php if (empty($synergasia_gia_stoxous or $exaleipsi_peinas or $kali_ygeia or $poiotiki_ekpedefsi or $isotita_filon 
	or $nero_apoxetefsi or $ananeosimi_energeia or $theseis_ergasias_oik_anaptixi or $kainotomia_ypodomes or $miosi_anisotiton
	or $aeiforeis_poleis or $ipefthini_katanalosi or $draseis_gia_klima or $ypothallasia_zoi or $xersea_zoi 
	or $eirini_dikaiosini or  $sinergasies_gia_stoxous)){ ?>
		<style>
			.small_title.targets{
				display:none;
			}
		</style>
		<?php } ?>

        <?php if (empty($prizes)){ ?>
		<style>
			.small_title.prizes {
				display:none;
			}
		</style>
	<?php } ?>

    <?php if (empty($description)){ ?>
		<style>
			.small_title.description {
				display:none;
			}
		</style>
	<?php } ?>
</section>
</article>
</div>