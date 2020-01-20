<?php
global $section_id;
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta( $section_id, 'service_subtitle' )); ?></span>
        <h2 class="colorlib-heading"><?php echo esc_html(carbon_get_post_meta( $section_id, 'service_title' )); ?></h2>
    </div>
</div>
<div class="row row-pt-md">
    <?php
$mRashid_section_service_box = carbon_get_post_meta( $section_id, 'service_box' );
$i = 1;
foreach ($mRashid_section_service_box as $service_box):
	if ($i > 6){
	    $i = 1;
}
?>
    <div class="col-md-4 text-center animate-box">
        <div class="services color-<?php echo $i; ?>">
            <span class="icon">
                <i class="fa <?php echo $service_box['expertise_icon'] ?>"></i>
            </span>
            <div class="desc">
                <h3><?php echo $service_box['expertise_title'] ?></h3>
                <p><?php echo $service_box['expertise_texts'] ?></p>
            </div>
        </div>
    </div>
    <?php
$i++;
endforeach; ?>
</div>
