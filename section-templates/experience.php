<?php
global $section_id;
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'experience_title'));?></span>
        <h2 class="colorlib-heading animate-box"><?php echo esc_html(carbon_get_post_meta($section_id, 'experience_subtitle'));?></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="timeline-centered">
            <?php
	$i = 1;
            
$mRashid_section_experience_boxes = carbon_get_post_meta( $section_id, 'experience_item');
            
	foreach ($mRashid_section_experience_boxes as $mRashid_section_experience_box):
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
            <article class="timeline-entry animate-box" data-animate-effect="<?php echo $k; ?>">
                <div class="timeline-entry-inner">

                    <div class="timeline-icon color-<?php echo $i;?>">
                        <i class="fa <?php echo esc_html($mRashid_section_experience_box['icon_class']);?>"></i>
                    </div>

                    <div class="timeline-label">
                        <h2><a href="#"><?php echo esc_html($mRashid_section_experience_box['title']);?></a> <span><?php echo esc_html($mRashid_section_experience_box['from']);?>-<?php echo esc_html($mRashid_section_experience_box['to']);?></span></h2>
                        <p><?php echo esc_html($mRashid_section_experience_box['content']);?></p>
                    </div>
                </div>
            </article>
            <?php
		$i++;
	endforeach;?>

            <article class="timeline-entry begin animate-box" data-animate-effect="fadeInBottom">
                <div class="timeline-entry-inner">
                    <div class="timeline-icon color-none">
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
