<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('post-id-' . get_the_ID()); ?>>
    <?php wp_body_open(); ?>
    <div class="body-overflow">
        <header class="hero">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 1435.6 562" class="heroSwirl" xml:space="preserve">
                <defs>
                </defs>
                <path class="heroSwirl-path" d="M54.9,0C8.7,114.4-76.4,390.4,148.1,450.8c284.9,76.6,516.2-79.4,661.6-218.8S1097.3,79.7,1219,81.8
	c121.7,2.2,216.3,67.4,216.3,67.4L1435.6,0H54.9z" />
            </svg>

            <nav id="site-navigation" class="main-nav">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'main-menu',
                    )
                );
                ?>
                <div class="burger">
                    <svg version="1.1" id="burger-bars" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 512" style="enable-background:new 0 0 448 512;" xml:space="preserve">
                        <path class="burger-path burger-path-1" d="M16,132h416c8.8,0,16-7.2,16-16V76c0-8.8-7.2-16-16-16H16C7.2,60,0,67.2,0,76v40C0,124.8,7.2,132,16,132z" />
                        <path class="burger-path burger-path-2" d="M16,292h416c8.8,0,16-7.2,16-16v-40c0-8.8-7.2-16-16-16H16c-8.8,0-16,7.2-16,16v40C0,284.8,7.2,292,16,292z" />
                        <path class="burger-path burger-path-3" d="M16,452h416c8.8,0,16-7.2,16-16v-40c0-8.8-7.2-16-16-16H16c-8.8,0-16,7.2-16,16v40C0,444.8,7.2,452,16,452z" />
                    </svg>
                </div>

            </nav><!-- #site-navigation -->
            <section class="header-content">
                <div class="header-left">
                    <?php
                    if (get_post_type() !== 'cases' || is_archive()) :
                        the_custom_logo('thumbnail');
                    endif;
                    ?>
                    <?php if (is_single() && get_post_type() === 'cases') : ?>
                        <div class="cases_header_wrapper">
                            <h1 class="cases_header_pagelabel"><?= the_title(); ?></h1>
                            <div class="cases_header_title">
                                <p>Portfolio</p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="header-right">
                    <?php if (is_single() && get_post_type() === 'cases') :

                        $cases_header_img = get_post_meta($post->ID, 'cases_header_image', true);

                        if (!empty($cases_header_img)) : ?>
                            <figure class="cases_header_fig">
                                <img loading="lazy" class="cases_header_img" src="<?= $cases_header_img ?>" alt="Cases header image">
                            </figure>
                        <?php endif; ?>

                    <?php elseif (is_single() && get_post_type() === 'post') :
                        $post_header_img = get_post_meta($post->ID, 'post_header_image', true);
                    ?>

                        <?php if (!empty($post_header_img)) : ?>
                            <figure class="cases_header_fig">
                                <img loading="lazy" class="cases_header_img" src="<?= $post_header_img ?>" alt="Cases header image">
                            </figure>

                        <?php endif; ?>


                    <?php else : ?>
                        <p class="header-heading"><?php _e('Uw Design & Development afdeling <br /> wij helpen u van idee tot eindproduct', 'labdesigns') ?></p>
                    <?php endif; ?>

                </div>
            </section>

        </header>