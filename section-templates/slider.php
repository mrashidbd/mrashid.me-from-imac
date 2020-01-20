<?php
global $section_id;

$mRashid_section_meta = carbon_get_post_meta( $section_id, 'slider_array' );

$mRashid_op_slider_image = '';

foreach ($mRashid_section_meta as $slider_data){
	if(isset($slider_data['slider_image'])){
		$mRashid_op_slider_image = wp_get_attachment_image_src($slider_data['slider_image'], 'full');
	} ?>
<li style="background-image: url(<?php echo esc_url($mRashid_op_slider_image[0]);?>">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                <div class="slider-text-inner js-fullheight">
                    <div class="desc">
                        <h1><?php echo $slider_data['slider_title']; ?></h1>
                        <h2><?php echo esc_html($slider_data['slider_subtitle']); ?></a></h2>
                        <p><a href="<?php echo esc_url($slider_data['slider_button_link']); ?>" class="btn btn-primary btn-learn"><?php echo esc_html($slider_data['slider_button']); ?><i class="fa fa-<?php echo esc_html($slider_data['slider_button_icon']); ?>"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<?php } ?>
