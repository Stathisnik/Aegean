<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>

  <div class="<?php echo esc_attr( $container ); ?>">

    <div class="row">
      <div class="col-md-12">
        <footer class="site-footer " id="colophon">
          <div class="site-info">
            <div class="row logo-section">
              <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>\img\aegean-startups-logo-new.svg"
                alt="test">
              <div class="vl"></div>
              <img class="logo-university"
                src="<?php echo get_stylesheet_directory_uri(); ?>\img\uni_aegean_white_gr.svg" alt="test">
            </div>
            <div class="row">
              <div class="col-md-3 mt-md-0 mt-3">
                <ul class="list-unstyled">
                  <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
                </ul>
              </div>
              <div class="col-md-3 mt-md-0 mt-3">

                <ul class="list-unstyled">
                  <?php wp_nav_menu(array('theme_location' => 'footer-menu-2')); ?>
                </ul>

              </div>
              <hr class="clearfix w-100 d-md-none">
              <div class="col-md-3 mb-md-0 mb-3">
                <ul class="list-unstyled">
                  <?php wp_nav_menu(array('theme_location' => 'footer-menu-3')); ?>
                </ul>

              </div>

              <hr class="clearfix w-100 d-md-none">
              <div class="col-md-3 mb-md-0 mb-3">
                <ul class="list-unstyled">
                  <?php wp_nav_menu(array('theme_location' => 'footer-menu-4')); ?>
                </ul>
                <ul class="list-unstyled">
                  <a class="social-icons">
                    <a class="fab fa-facebook-f white-text mr-2" href="https://www.facebook.com/aegeanstartups/"
                      target="_blank"> </a>
                    <a class="fab fa-twitter white-text mr-2" href="https://twitter.com/AegeanStartups" target="_blank">
                    </a>
                    <a class="fab fa-linkedin white-text mr-2" href="https://www.linkedin.com/company/aegean-startups/" target="_blank">
                    </a>
                    <a class="fab fa-youtube white-text mr-2" href="https://www.youtube.com/channel/UCRlHbF9m9qsRkTzSWw3QtUA" target="_blank">
                    </a>
                  </a>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <div class="cpfooter">
            <p><?php echo pll__("© 2021, University of the Aegean");?> <a href="//icsdweb.aegean.gr/is-lab/"
                target="_blank"><?php echo pll__("/ Information Systems Laboratory");?></a> <img class="logocp"
                src="<?php echo get_stylesheet_directory_uri(); ?>/https://icsdweb.aegean.gr/is-lab/" alt=""></p>
                <p><?php echo pll__("Powered by");?> <a href="//www.crowdpolicy.com"
                target="_blank"><?php echo pll__("Crowdpolicy");?></a> <img class="logocp"
                src="<?php echo get_stylesheet_directory_uri(); ?>/img/cp_tiny.png" alt=""></p>
          </div>
        </footer>

        <?php wp_footer(); ?>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f22895ec2845977">
        </script>
        <script>
          (function (d) {
            var s = d.createElement("script");
            s.setAttribute("data-account", "iqACGcwVzt");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
          })(document)
        </script>
        </body>
        <script>
          jQuery("#um_field_14_um_divider_14_6").prependTo(".nsl-container.nsl-container-block");
        </script>
        <script>
          //Scroll back to top

          var progressPath = document.querySelector('.progress-wrap path');
          var pathLength = progressPath.getTotalLength();
          progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
          progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
          progressPath.style.strokeDashoffset = pathLength;
          progressPath.getBoundingClientRect();
          progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
          var updateProgress = function () {
            var scroll = jQuery(window).scrollTop();
            var height = jQuery(document).height() - jQuery(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
          }
          updateProgress();
          jQuery(window).scroll(updateProgress);
          var offset = 50;
          var duration = 550;
          jQuery(window).on('scroll', function () {
            if (jQuery(this).scrollTop() > offset) {
              jQuery('.progress-wrap').addClass('active-progress');
            } else {
              jQuery('.progress-wrap').removeClass('active-progress');
            }
          });
          jQuery('.progress-wrap').on('click', function (event) {
            event.preventDefault();
            jQuery('html, body').animate({
              scrollTop: 0
            }, duration);
            return false;
          });


          jQuery(function () {
            jQuery('.scrollbtn').on('click', 'a[href^="#"]', function (e) {
              e.preventDefault();
              jQuery('html, body').animate({
                scrollTop: jQuery(jQuery(this).attr('href')).offset().top
              }, 800, 'linear');
            });
          });
        </script>
        <?php $profile_id = um_profile_id();
$profile_name =um_get_display_name( $profile_id ); ?>
        <script>
          jQuery('#post-155 .entry-content').append(
            '<div><a href="<?php echo get_home_url(); ?>/user/<?php echo $profile_name;  ?>" class="btn-com">Το προφίλ μου</a></div>'
          );
        </script>
        </html>