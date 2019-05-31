<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slogan">Your tiny home is our passion</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-menu',
                        'container_class' => 'footer-menu-wrapper',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'fallback_cb'     => '',
                        'menu_id'         => 'footer-menu',
                    )

                ); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-5">
                <ul class="contact-details">
                    <li><a href="mailto:<?=get_option('email')?>"><?=get_option('email')?></a></li>
                    <li><a href="tel:<?=formatPhoneNumber(get_option('phone'))?>"><?=get_option('phone')?></a></li>
                    <li><a href="tel:<?=formatPhoneNumber(get_option('mobile'))?>"><?=get_option('mobile')?></a></li>
                </ul>
                <address>
                    <?=get_option('address')?>
                    <span>By appointment only</span>
                </address>
                <ul class="social-media">
                    <li><a href="<?=get_option('facebook')?>" target="_blank"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="<?=get_option('instagram')?>" target="_blank"><span class="fa fa-instagram"></span></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <?php
                if(is_active_sidebar('footerwidget')){
                    dynamic_sidebar('footerwidget');
                }
                ?>
            </div>
            <div class="col-xl-12">
                <p class="copyright">Copyright <?=get_bloginfo('name')?>. <span>Website by <a href="https://www.designgarage.co.nz/" target="_blank">Design Garage</a></span></p>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>

