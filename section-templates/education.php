<?php
global $section_id;
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'education_subtitle')); ?></span>
        <h2 class="colorlib-heading animate-box"><?php echo esc_html(carbon_get_post_meta($section_id, 'education_title')); ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
        <div class="fancy-collapse-panel">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php

				$varTF = 0;
				$varCount = 1;
				$varIn = 1;
				$resTF = 'true';
                
                $mRashid_section_education_boxes = carbon_get_post_meta($section_id, 'education_accordion');

				foreach ($mRashid_section_education_boxes as $mRashid_section_education_box){

					if ($varTF !== 0){
						$resTF = 'false';
					}
					if ($varCount == 1){
						$resCount = 'One';
					}elseif ($varCount == 2){
						$resCount = 'Two';
					}elseif ($varCount == 3){
						$resCount = 'Three';
					}elseif ($varCount == 4){
						$resCount = 'Four';
					}elseif ($varCount == 5){
						$resCount = 'Five';
					}elseif ($varCount == 6){
						$resCount = 'Six';
					}elseif ($varCount == 7){
						$resCount = 'Seven';
					}elseif ($varCount == 8){
						$resCount = 'Eight';
					}elseif ($varCount == 9){
						$resCount = 'Nine';
					}elseif ($varCount == 10){
						$resCount = 'Ten';
					}
					if ($varIn == 1){
						$resIn = ' in';
						$resCol = '';
					}else{
						$resIn = '';
						$resCol = 'class="collapsed" ';
					}

				?>


                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo $resCount;?>">
                        <h4 class="panel-title">
                            <a <?php echo $resCol;?>data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $resCount;?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php echo esc_html($mRashid_section_education_box['accordion_title']);?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $resCount;?>" class="panel-collapse collapse<?php echo $resIn;?>" role="tabpanel" aria-labelledby="heading<?php echo $resCount;?>">
                        <div class="panel-body">
                            <p><?php echo esc_html($mRashid_section_education_box['accordion_content']);?></p>
                        </div>
                    </div>
                </div>

                <?php
				$varTF++;
				$varCount++;
				$varIn++;
				}?>
            </div>
