<?php

/**
 * Template part for displaying portfolio cases
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LabDesigns
 */

$cases_header_img = get_post_meta($post->ID, 'cases_header_image', true);
// $cases_short_descr = get_post_meta($post->ID, 'cases_short_descr', true);
$cases_client = get_post_meta($post->ID, 'cases_client_descr', true);
$cases_assign = get_post_meta($post->ID, 'cases_assignment_descr', true);
$cases_delv = get_post_meta($post->ID, 'cases_delivered_descr', true);
$cases_rev = get_post_meta($post->ID, 'cases_review_descr', true);

$cases_tech_list_items = get_post_meta($post->ID, 'cases_tech_list', true);

$cases_github = get_post_meta($post->ID, 'cases_github', true);
$cases_ext_url = get_post_meta($post->ID, 'cases_ext_url', true);
$cases_dienstverband = get_post_meta($post->ID, 'cases_dienstverb', true);


$cases_prod_imgs = get_post_meta($post->ID, 'cases_prod_img_list', true);

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('content-cases-part'); ?>>


    <div class="entry-content">

        <div class="entry-content-wrapper">
            <?php if ($cases_client) : ?>
                <h2 class="title-link case-title"><?= the_title(); ?></h2>
                <div class="case_content"> <?= wpautop($cases_client) ?></div>
            <?php endif; ?>


            <?php if ($cases_assign) : ?>
                <h2 class="title-link case-title"><?php _e('Opdracht', 'labdesigns') ?> </h2>
                <div class="case_content"> <?= wpautop($cases_assign) ?></div>
            <?php endif; ?>

            <?php if ($cases_delv) : ?>
                <h2 class="title-link case-title"><?php _e('Opgeleverd', 'labdesigns') ?> </h2>
                <div class="case_content"> <?= wpautop($cases_delv) ?></div>
            <?php endif; ?>

        </div>
        <div class="sidebar">
            <?php if ($cases_dienstverband) : ?>
                <div class="cases-bizrel">
                    <h3><?php _e('Dienstverband', 'labdesigns') ?></h3>
                    <p> <?= $cases_dienstverband ?></p>
                </div>

            <?php endif; ?>

            <?php

            if (!empty($cases_tech_list_items)) : ?>
                <div class="cases-tech_list">
                    <h3><?php _e('Tech lijst:', 'labdesigns') ?></h3>
                    <div class="cases-tech_list-items">
                        <?php foreach ($cases_tech_list_items as $items) : ?>
                            <div class="cases-tech_list-item">

                                <?php if (!empty($items['image'])) : ?>
                                    <img loading="lazy" src=" <?php echo $items['image']; ?>" alt="<?php echo $items['title']; ?>">
                                <?php endif; ?>
                                <p class="tech-item-title"><?php echo $items['title']; ?></p>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>


            <?php if (!empty($cases_github)) : ?>
                <div class="cases-github-link">

                    <a href="<?php echo $cases_github; ?>" target="_blank" rel="noopener noreferrer">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" class="gitlogo-main" viewBox="0 0 496 483.6" xml:space="preserve">
                            <defs>
                            </defs>
                            <path class="gitlogo" d="M165.9,389.4c0,2-2.3,3.6-5.2,3.6c-3.3,0.3-5.6-1.3-5.6-3.6c0-2,2.3-3.6,5.2-3.6
                                C163.3,385.5,165.9,387.1,165.9,389.4z M134.8,384.9c-0.7,2,1.3,4.3,4.3,4.9c2.6,1,5.6,0,6.2-2s-1.3-4.3-4.3-5.2
                                C138.4,381.9,135.5,382.9,134.8,384.9L134.8,384.9z M179,383.2c-2.9,0.7-4.9,2.6-4.6,4.9c0.3,2,2.9,3.3,5.9,2.6
                                c2.9-0.7,4.9-2.6,4.6-4.6C184.6,384.2,181.9,382.9,179,383.2z M244.8,0C106.1,0,0,105.3,0,244c0,110.9,69.8,205.8,169.5,239.2
                                c12.8,2.3,17.3-5.6,17.3-12.1c0-6.2-0.3-40.4-0.3-61.4c0,0-70,15-84.7-29.8c0,0-11.4-29.1-27.8-36.6c0,0-22.9-15.7,1.6-15.4
                                c0,0,24.9,2,38.6,25.8c21.9,38.6,58.6,27.5,72.9,20.9c2.3-16,8.8-27.1,16-33.7c-55.9-6.2-112.3-14.3-112.3-110.5
                                c0-27.5,7.6-41.3,23.6-58.9c-2.6-6.5-11.1-33.3,2.6-67.9c20.9-6.5,69,27,69,27c20-5.6,41.5-8.5,62.8-8.5s42.8,2.9,62.8,8.5
                                c0,0,48.1-33.6,69-27c13.7,34.7,5.2,61.4,2.6,67.9c16,17.7,25.8,31.5,25.8,58.9c0,96.5-58.9,104.2-114.8,110.5
                                c9.2,7.9,17,22.9,17,46.4c0,33.7-0.3,75.4-0.3,83.6c0,6.5,4.6,14.4,17.3,12.1C428.2,449.8,496,354.9,496,244
                                C496,105.3,383.5,0,244.8,0z M97.2,344.9c-1.3,1-1,3.3,0.7,5.2c1.6,1.6,3.9,2.3,5.2,1c1.3-1,1-3.3-0.7-5.2
                                C100.8,344.3,98.5,343.6,97.2,344.9z M86.4,336.8c-0.7,1.3,0.3,2.9,2.3,3.9c1.6,1,3.6,0.7,4.3-0.7c0.7-1.3-0.3-2.9-2.3-3.9
                                C88.7,335.5,87.1,335.8,86.4,336.8z M118.8,372.4c-1.6,1.3-1,4.3,1.3,6.2c2.3,2.3,5.2,2.6,6.5,1c1.3-1.3,0.7-4.3-1.3-6.2
                                C123.1,371.1,120.1,370.8,118.8,372.4z M107.4,357.7c-1.6,1-1.6,3.6,0,5.9s4.3,3.3,5.6,2.3c1.6-1.3,1.6-3.9,0-6.2
                                C111.6,357.4,109,356.4,107.4,357.7L107.4,357.7z" />
                        </svg> Github Repo
                    </a>
                </div>
            <?php endif; ?>
            <?php if (!empty($cases_ext_url)) : ?>
                <div class="cases-ext-link">

                    <a href="<?= $cases_ext_url; ?>" target="_blank" rel="noopener noreferrer">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" class="ext-url-main" viewBox="0 0 512 512" xml:space="preserve">
                            <style type="text/css">

                            </style>
                            <defs>
                            </defs>
                            <path class="ext-url" d="M432,320h-32c-8.8,0-16,7.2-16,16v112H64V128h144c8.8,0,16-7.2,16-16V80c0-8.8-7.2-16-16-16H48
                                C21.5,64,0,85.5,0,112v352c0,26.5,21.5,48,48,48l0,0h352c26.5,0,48-21.5,48-48l0,0V336C448,327.2,440.8,320,432,320z M488,0H360
                                c-21.4,0-32,25.9-17,41l35.7,35.7L135,320.4c-9.4,9.4-9.4,24.6-0.1,33.9c0,0,0,0,0.1,0.1l22.7,22.6c9.4,9.4,24.6,9.4,33.9,0.1
                                c0,0,0,0,0.1-0.1l243.6-243.7L471,169c15,15,41,4.5,41-17V24C512,10.7,501.3,0,488,0z" />
                        </svg>
                        <?php _e('Bekijk project', 'labdesigns') ?>
                    </a>
                </div>

            <?php endif; ?>


            <div class="adjacent">
                <?php
                $next_post = get_adjacent_post(false, '', false);
                if (!empty($next_post)) : ?>
                    <a class="adjacent-link" href="<?= get_permalink($next_post->ID); ?>" title="<?= $next_post->post_title; ?>">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #FFFFFF;
                                }
                            </style>
                            <defs>
                            </defs>
                            <path class="st0" d="M25,50C11.2,50,0,38.8,0,25S11.2,0,25,0s25,11.2,25,25S38.8,50,25,50z M36.7,20.6H25v-7.1
                        c0-1.1-1.3-1.6-2.1-0.9L11.4,24.1c-0.5,0.5-0.5,1.2,0,1.7l11.5,11.6c0.8,0.8,2.1,0.2,2.1-0.9v-7.1h11.7c0.7,0,1.2-0.5,1.2-1.2v-6.5
                        C37.9,21.1,37.4,20.6,36.7,20.6z" />
                        </svg> <?php _e('Vorige', 'labdesigns'); ?>
                    </a>
                    <div></div>
                <?php endif;

                $prev_post = get_adjacent_post(false, '', true);
                if (!empty($prev_post)) : ?>
                    <a class="adjacent-link" href="<?= get_permalink($prev_post->ID); ?>" title="<?= $prev_post->post_title; ?>"><?php _e('Volgende', 'labdesigns') ?>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #FFFFFF;
                                }
                            </style>
                            <defs>
                            </defs>
                            <path class="st0" d="M248,0c137,0,248,111,248,248S385,496,248,496S0,385,0,248S111,0,248,0z M132,292h116v70.9
                        c0,10.7,13,16.1,20.5,8.5l114.3-114.9c4.7-4.7,4.7-12.2,0-16.9l-114.3-115c-7.6-7.6-20.5-2.2-20.5,8.5V204H132c-6.6,0-12,5.4-12,12
                        v64C120,286.6,125.4,292,132,292z" />
                        </svg>
                    </a>
                <?php endif;
                ?>


            </div>
        </div>
    </div><!-- .entry-content -->
    <?php

    if (!empty($cases_prod_imgs)) : ?>
        <div class="cases-prod_imgs">
            <?php foreach ($cases_prod_imgs as $items) : ?>
                <div class="cases-prod_imgs-item">

                    <?php if (!empty($items['image'])) : ?>
                        <img loading="lazy" class="prod-img" src=" <?php echo $items['image']; ?>" alt="<?php echo $items['title']; ?>">
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>
        </div>
        <div class="prod-img_modal">
            <div class="btn-prev"></div>
            <img loading="lazy" src="" alt="" class="prod-img_gall">
            <div class="btn-next"></div>
        </div>
    <?php endif; ?>
    <?php if ($cases_rev) : ?>

        <div class="entry-content">
            <h2 class="title-link case-title case-review"><?php _e('Klant review', 'labdesigns') ?></h2>
            <div class="case_content"> <?= wpautop($cases_rev) ?></div>
        </div>
    <?php endif; ?>




</article><!-- #post-<?php the_ID(); ?> -->