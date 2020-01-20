<?php
/*
 * Template Name: OnePage Landing
 */

get_header(); ?>
<section id="colorlib-hero" class="js-fullheight" data-section="home" style="background: #fff url(<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif) no-repeat center center;">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <?php $section_id = 17; get_template_part("section-templates/slider");?>
        </ul>
    </div>
</section>

<section class="colorlib-about" data-section="about">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-12">
                <?php $section_id = 24; get_template_part("section-templates/about"); ?>
            </div>
        </div>
    </div>
</section>

<section class="colorlib-services" data-section="services">
    <div class="colorlib-narrow-content">
        <?php $section_id = 27; get_template_part("section-templates/services"); ?>
    </div>
</section>

<?php $section_id = 31; get_template_part("section-templates/counter"); ?>

<section class="colorlib-skills" data-section="skills">
    <?php $section_id = 36; get_template_part("section-templates/skills"); ?>
</section>

<section class="colorlib-education" data-section="education">
    <div class="colorlib-narrow-content">
        <?php $section_id = 39; get_template_part("section-templates/education"); ?>
    </div>
</section>

<section class="colorlib-experience" data-section="experience">
    <div class="colorlib-narrow-content">
        <?php $section_id = 42; get_template_part("section-templates/experience"); ?>
    </div>
</section>

<section class="colorlib-work" data-section="work">
    <div class="colorlib-narrow-content">
        <?php $section_id = 821; get_template_part("section-templates/work"); ?>

        <?php 

// if ( ! wp_next_scheduled( 'update_project_list' ) ) {
// wp_schedule_event( time(), 'weekly', 'update_project_list' );
//}
//add_action( 'update_project_list', 'get_projects_from_behance_api' );
// function get_projects_from_behance_api(){
//
// get_template_part("/inc/metaboxes/behance-data-input");
//
// }

         ?>

    </div>
</section>







<section class="colorlib-blog" data-section="blog">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Read</span>
                <h2 class="colorlib-heading">Recent Blog</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="blog-entry">
                    <a href="blog.html" class="blog-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-1.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
                    <div class="desc">
                        <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
                        <h3><a href="blog.html">Renovating National Gallery</a></h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInRight">
                <div class="blog-entry">
                    <a href="blog.html" class="blog-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-2.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
                    <div class="desc">
                        <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
                        <h3><a href="blog.html">Wordpress for a Beginner</a></h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="blog-entry">
                    <a href="blog.html" class="blog-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-3.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a>
                    <div class="desc">
                        <span><small>April 14, 2018 </small> | <small> Inspiration </small> | <small> <i class="icon-bubble3"></i> 4</small></span>
                        <h3><a href="blog.html">Make website from scratch</a></h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box">
                <p><a href="#" class="btn btn-primary btn-lg btn-load-more">Load more <i class="icon-reload"></i></a></p>
            </div>
        </div>
    </div>
</section>

<section class="colorlib-contact" data-section="contact">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Get in Touch</span>
                <h2 class="colorlib-heading">Contact</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-globe-outline"></i>
                    </div>
                    <div class="colorlib-text">
                        <p><a href="#">info@domain.com</a></p>
                    </div>
                </div>

                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-map"></i>
                    </div>
                    <div class="colorlib-text">
                        <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                    </div>
                </div>

                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="colorlib-text">
                        <p><a href="tel://">+123 456 7890</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-md-push-1">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
