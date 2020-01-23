<?php 

$post_date = get_the_date('F j, Y');

$post_category = get_the_category();
 
if ( ! empty( $post_category ) ) {
    $post_category = esc_html( $post_category[0]->name );   
}


?>
<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
    <div class="blog-entry">
        <a href="blog.html" class="blog-img"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
        <div class="desc">
            <span><small><?php echo $post_date; ?></small> | <small><?php echo $post_category; ?></small> | <small> <i class="fa fa-eyes"></i><?php echo getPostViews(get_the_ID()); ?></small></span>
            <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>

            <?php
            
            $content = strip_tags(get_the_content());
            
            
            $sliced_content = slice_excerpt($content, 30);
            
            echo '<p>' . $sliced_content . ' [...]</p>';
            
            
            
            
            ?>


        </div>
    </div>
</div>
