<?php
global $section_id;
?>
<div class="colorlib-narrow-content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
            <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'skill_title'));?></span>
            <h2 class="colorlib-heading animate-box"><?php echo esc_html(carbon_get_post_meta($section_id, 'skill_subtitle'));?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
            <?php echo apply_filters( 'the_content', carbon_get_post_meta( $section_id, 'skill_desc' ) ); ?>
        </div>
        <?php
$mRashid_section_skill_boxes = carbon_get_post_meta($section_id, 'skill_single_anime');
$i = 1;
foreach ($mRashid_section_skill_boxes as $mRashid_section_skill_box):
if ($i > 6){
$i = 1;
}

$j = $i+2;
$j = $j%2;
$k = '';

if($j===1){
$k = 'fadeInLeft';
}elseif($j===0){
$k = 'fadeInRight';
}
?>
        <div class="col-md-6 animate-box" data-animate-effect="<?php echo $k; ?>">
            <div class="progress-wrap">
                <h3><?php echo esc_html($mRashid_section_skill_box['skill_label']);?></h3>
                <div class="progress">
                    <div class="progress-bar color-<?php echo $i;?>" role="progressbar" aria-valuenow="<?php echo esc_html($mRashid_section_skill_box['skill_achieved']);?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo esc_html($mRashid_section_skill_box['skill_achieved']);?>%">
                        <span><?php echo esc_html($mRashid_section_skill_box['skill_achieved']);?>%</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
$i++;
endforeach;?>
    </div>
</div>
