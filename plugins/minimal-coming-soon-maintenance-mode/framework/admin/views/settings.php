<?php

/**
 * Settings panel view for the plugin
 *
 * @link       http://www.webfactoryltd.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

if (!defined('WPINC')) {
    die;
}

require_once 'header.php';
?>

<form role="form" method="post" class="signals-admin-form">
    <div class="signals-body signals-clearfix">
        <?php

        // Display the message if $signals_csmm_err is set
        if (!empty($signals_csmm_err)) {
            echo $signals_csmm_err;
        }

        if (get_transient('csmm_error_msg')) {
            echo get_transient('csmm_error_msg');
        }

        $current_user = wp_get_current_user();
        $name = '';
        if (!empty($current_user->user_firstname)) {
            $name = ' ' . $current_user->user_firstname;
        }
        $meta = csmm_get_meta();
        $promo_delta = HOUR_IN_SECONDS * 3;
        $promo_delta2 = DAY_IN_SECONDS * 30;
        $notice_shown = false;

        // temporarily removed
        if (
            false && !get_transient('csmm_rate_hide')
            && (time() - $meta['first_install_gmt']) > (DAY_IN_SECONDS / 2)
        ) {
            echo '<div id="rating-notice"><p>';
            echo '<b>Hi' . $name . '!</b><br>We saw you\'ve been using the <b>Minimal Maintenance Mode</b> plugin for some time (that\'s awesome!) and wanted to ask for your help to <b>make the plugin better</b>.<br>It just takes a minute of your time to rate the plugin. It helps us out a lot! Thank you!</p>';
            echo '<p><a href="https://wordpress.org/support/plugin/minimal-coming-soon-maintenance-mode/reviews/#new-post" target="_blank" class="button button-flat">Rate the plugin</a>';
            echo '<a href="#" id="mm_rate_cancel">I\'ve already rated the plugin</a>';
            echo '</p></div>';
        }

        if (
            !$notice_shown && !get_transient('csmm_welcome_hide')
            && (time() - $meta['first_install_gmt']) < $promo_delta && (time() - $meta['first_install_gmt']) > 3
        ) {
            echo '<div id="upsell-notice"><p>';
            echo 'Minimal Coming Soon &amp; Maintenance Mode PRO features over 190 themes, advanced SEO options, content animations, Instagram filters, animated backgrounds and premium support.';
            echo '<br>We\'ve prepared a special <b>50% DISCOUNT</b>.</p>';
            echo '<p><a href="#pro" data-anchor="pricing-table" class="button button-flat csmm-change-tab">GET the 50% DISCOUNT NOW</a>';
            echo ' &nbsp; <a href="#" id="mm_welcome_cancel" style="color: white;"><small>I\'m not interested</small></a>';
            echo '</p></div>';
            $notice_shown = true;
        }

        if (
            !$notice_shown && !get_transient('csmm_olduser_hide')
            && (time() - $meta['first_install_gmt']) > $promo_delta2
        ) {
            echo '<div id="upsell-notice"><p>';
            echo 'We have a <a style="color: white;" class="csmm-change-tab" data-anchor="pricing-table" href="#pro">special offer</a> for <b>users like you</b> who\'ve been using the Minimal Coming Soon &amp; Maintenance Mode plugin for a long time: a <b>50% DISCOUNT</b> on lifetime licenses! No nonsense! Pay once and use the PRO plugin forever.</p>';
            echo '<p><a href="#pro" data-anchor="pricing-table" class="button button-flat csmm-change-tab" data-anchor="pricing-table">GET the 50% DISCOUNT NOW</a>';
            echo ' &nbsp; <a href="#" id="mm_olduser_cancel" style="color: white;"><small>I don\'t need PRO features</small></a>';
            echo '</p></div>';
            $notice_shown = true;
        }
        ?>

        <div class="signals-float-left">
            <div class="signals-mobile-menu">
                <a href="#">
                    <img src="<?php echo CSMM_URL; ?>/framework/admin/img/toggle.png" />
                </a>
            </div>

            <ul class="signals-main-menu">
                <li><a href="#basic"><?php _e('Basic', 'signals'); ?></a></li>
                <li><a href="#seo"><?php _e('SEO', 'signals'); ?></a></li>
                <li><a href="#themes"><?php _e('Themes', 'signals'); ?></a></li>
                <li><a href="#design"><?php _e('Design', 'signals'); ?></a></li>
                <li><a href="#email"><?php _e('Email', 'signals'); ?></a></li>
                <li><a href="#form"><?php _e('Form', 'signals'); ?></a></li>
                <li><a href="#advanced"><?php _e('Advanced', 'signals'); ?></a></li>
                <li><a href="#support"><?php _e('Support', 'signals'); ?></a></li>
                <li><a style="color: white; background-color: #fe2929;;" href="#pro"><span style="height: auto; font-size: 19px;" class="dashicons dashicons-star-filled"></span> <b><?php _e('PRO', 'signals'); ?></b> <span style="height: auto; font-size: 19px;" class="dashicons dashicons-star-filled"></span></a></li>
            </ul>
        </div><!-- .signals-float-left -->

        <div class="signals-float-right">
            <?php

            // Including tabs content
            require_once 'settings-basic.php';
            require_once 'settings-seo.php';
            require_once 'settings-themes.php';
            require_once 'settings-email.php';
            require_once 'settings-design.php';
            require_once 'settings-form.php';
            require_once 'settings-advanced.php';
            require_once 'settings-support.php';
            require_once 'settings-pro.php';
            ?>
        </div><!-- .signals-float-right -->

        <div class="signals-fixed-save-btn">
            <div>
                <p class="footer-buttons-left">
                    <?php wp_nonce_field('csmm_save_settings', 'csmm_save_nonce'); ?>
                    <button type="submit" name="signals_csmm_submit" class="signals-btn signals-btn-red"><strong><?php _e('Save Changes', 'signals'); ?></strong></button>
                    <a id="csmm-preview" style="margin: 0 0 0 15px;" href="<?php echo home_url(); ?>/?preview_coming_soon" class="signals-btn" target="_blank"><strong><?php _e('Preview Maintenance Page', 'signals'); ?></strong></a>
                    <a title="Check out 70+ pixel perfect themes and other great PRO features" style="margin: 0 0 0 15px;" href="#pro" class="signals-btn csmm-change-tab" target="_blank"><span style="font-size: 19px;" class="dashicons dashicons-star-filled"></span> <strong><?php _e('Go PRO', 'signals'); ?></strong> <span style="font-size: 19px;" class="dashicons dashicons-star-filled"></span></a>
                </p>
                <p class="footer-buttons-right">
                    <a href="<?php echo csmm_generate_web_link('thank-you-for-creating'); ?>" target="_blank">Minimal Coming Soon & Maintenance Mode</a> v<?php echo csmm_get_plugin_version(); ?>. Please <a target="_blank" href="https://wordpress.org/support/plugin/minimal-coming-soon-maintenance-mode/reviews/#new-post" title="Let others know how you like the plugin">rate the plugin ★★★★★</a> Thank you!
                </p>
            </div><!-- .signals-tile-body -->
        </div><!-- .signals-fixed-save-btn -->
    </div><!-- .signals-body -->
</form><!-- form.signals-admin-form -->

<?php
require_once 'footer.php';
