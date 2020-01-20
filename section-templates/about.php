<?php
global $section_id;
?>
<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
    <div class="col-md-12">
        <div class="about-desc">
            <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta( $section_id, 'about_subtitle' )); ?></span>
            <h2 class="colorlib-heading"><?php echo esc_html(carbon_get_post_meta( $section_id, 'about_title' )); ?></h2>
            <?php echo apply_filters( 'the_content', carbon_get_post_meta( $section_id, 'about_desc' ) );
 ?>
            <?php //echo wpautop( carbon_get_post_meta( $section_id, 'about_desc' ) ); ?>
        </div>
    </div>
</div>
<div class="row">
    <?php
    $about_service_array = carbon_get_post_meta( $section_id, 'about_services' );
    $i = 1;
    foreach( $about_service_array as $service_data ) :
    if ($i > 4){
			$i = 1;
		}
    ?>
    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
        <div class="services color-<?php echo $i; ?>">
            <span class="icon2"><i class="fa <?php echo esc_html($service_data['about_service_icon']); ?>"></i></span>
            <h3><?php echo esc_html($service_data['about_service_title']); ?></h3>
        </div>
    </div>
    <?php 
    $i++;
    endforeach ?>
</div>
<div class="row">
    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
        <div class="hire">
            <h2><?php echo esc_html(carbon_get_post_meta( $section_id, 'cta_text' )); ?></h2>
            <a href="<?php echo esc_url(carbon_get_post_meta( $section_id, 'cta_link' )); ?>" class="btn-hire"><?php echo esc_html(carbon_get_post_meta( $section_id, 'cta_btn' )); ?></a>
        </div>
    </div>
</div>
