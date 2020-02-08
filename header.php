<!DOCTYPE HTML>
<html <?php language_attributes();?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--	<link rel="shortcut icon" href="favicon.ico">-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">



    <?php wp_head(); ?>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
	<![endif]-->

</head>

<?php 
$siteLogo = carbon_get_theme_option( 'site_logo' );
$siteName = carbon_get_theme_option( 'site_name' );
$jobEntries = carbon_get_theme_option( 'job_entries' );
    
$siteLogoUrl = wp_get_attachment_image_src( $siteLogo, 'thumbnail');

?>

<body>
    <div id="colorlib-page">
        <div class="container-wrap">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
            <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
                <div class="text-center">
                    <div class="author-img" style="background-image: url(<?php echo esc_url( $siteLogoUrl[0] ); ?>);"></div>
                    <h1 id="colorlib-logo"><a href="<?php echo site_url(); ?>"><?php echo esc_html( $siteName ); ?></a></h1>
                    <?php foreach($jobEntries as $jobEntry) : ?>
                    <span class="job-tag"><?php echo esc_html( $jobEntry['job_position'] ) . ' at '; ?><a href="<?php echo esc_url( $jobEntry['job_link'] ); ?>" target="_blank"><?php echo esc_html( $jobEntry['job_provider'] ); ?></a></span>
                    <?php endforeach; ?>
                </div>
                <?php
                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                if(is_front_page()) : ?>
                <nav id="colorlib-main-menu" role="navigation" class="navbar">
                    <div id="navbar" class="collapse">
                        <ul>
                            <li class="active"><a href="<?php echo site_url(); ?>" data-nav-section="home">Home</a></li>
                            <li><a href="#" data-nav-section="about">About</a></li>
                            <li><a href="#" data-nav-section="services">Services</a></li>
                            <li><a href="#" data-nav-section="skills">Skills</a></li>
                            <li><a href="#" data-nav-section="education">Education</a></li>
                            <li><a href="#" data-nav-section="experience">Experience</a></li>
                            <li><a href="#" data-nav-section="work">Work</a></li>
                            <li><a href="#" data-nav-section="blog">Blog</a></li>
                            <li><a href="#" data-nav-section="contact">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <?php elseif (strpos($url,'project') !== false) : ?>

                <nav id="colorlib-sub-menu">
                    <div id="submenu-navbar">
                        <ul>
                            <li><a href="<?php echo site_url(); ?>" data-nav-section="home">Home</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('project'); ?>">All Projects</a></li>
                        </ul>
                    </div>
                </nav>

                <?php endif; ?>

                <div class="colorlib-footer">
                    <?php 
                    $widgetHeader = carbon_get_theme_option( 'social_link_title' );
                    $socialLinks = carbon_get_theme_option( 'social_links' );                    
                     ?>

                    <div class="social-widget">
                        <h4><?php echo $widgetHeader; ?></h2>
                            <ul>

                                <?php foreach($socialLinks as $socialLink) : ?>

                                <li><a href="<?php echo $socialLink['social_link']; ?>"><i class="fa <?php echo $socialLink['icon_class']; ?>"></i></a></li>

                                <?php endforeach; ?>

                            </ul>
                    </div>

                    <p>
                        <small>
                            <?php echo esc_html( 'Copyright &copy;' ); ?>
                            <script>
                                document.write(new Date().getFullYear());

                            </script>
                            <?php echo esc_html( ' | ' ); ?><a href="<?php echo site_url(); ?>" target="_blank"><?php echo esc_html( 'mrashid.me' ); ?></a><br><?php echo esc_html( 'All rights reserved.' ); ?>
                        </small>
                    </p>

                </div>

            </aside>

            <div id="colorlib-main">
