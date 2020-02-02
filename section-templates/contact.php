<?php 

global $section_id;

?>



<div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'contact_section_subtitle')); ?></span>
        <h2 class="colorlib-heading"><?php echo esc_html(carbon_get_post_meta($section_id, 'contact_section_title')); ?></h2>
    </div>
</div>
<div class="row">


    <div class="col-md-5">
        <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
            <div class="colorlib-icon">
                <i class="fa fa-globe"></i>
            </div>
            <div class="colorlib-text">
                <p><a href="mailto:<?php echo esc_html(carbon_get_post_meta($section_id, 'contact_email')); ?>"><?php echo esc_html(carbon_get_post_meta($section_id, 'contact_email')); ?></a></p>
            </div>
        </div>

        <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
            <div class="colorlib-icon">
                <i class="fa fa-map"></i>
            </div>
            <div class="colorlib-text">
                <p><?php echo esc_html(carbon_get_post_meta($section_id, 'contact_address')); ?></p>
            </div>
        </div>

        <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
            <div class="colorlib-icon">
                <i class="fa fa-phone"></i>
            </div>
            <div class="colorlib-text">
                <p><a href="tel://"><?php echo esc_html(carbon_get_post_meta($section_id, 'contact_phone')); ?></a></p>
            </div>
        </div>
    </div>


    <div class="col-md-7 col-md-push-1">
        <div class="row">
            <?php 
            $contactFormShortcode = carbon_get_post_meta($section_id, 'contact_form_7_shortcode');
            echo do_shortcode($contactFormShortcode); ?>
        </div>
    </div>
</div>
