<?php
global $section_id;

$animation_speed = carbon_get_post_meta( $section_id, 'data_speed' );
$animation_interval = carbon_get_post_meta( $section_id, 'refresh_interval' );
$counter_background = carbon_get_post_meta( $section_id, 'counter_background' );
$counter_background_src = wp_get_attachment_image_src( $counter_background, 'full');
$mRashid_section_counter_box = carbon_get_post_meta( $section_id, 'single_counter');

?>
<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(<?php echo esc_url($counter_background_src[0]);?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="colorlib-narrow-content">
        <div class="row">
        </div>
        <div class="row">
            <?php foreach ($mRashid_section_counter_box as $counter_box): ?>
            <div class="col-md-3 text-center animate-box">
                <span class="colorlib-counter js-counter" data-from="<?php echo esc_html($counter_box['count_from']);?>" data-to="<?php echo esc_html($counter_box['count_to']); ?>" data-speed="<?php echo esc_html($animation_speed);?>" data-refresh-interval="<?php echo esc_html($animation_interval);?>"></span>
                <span class="colorlib-counter-label"><?php echo esc_html($counter_box['counter_label']);?></span>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
