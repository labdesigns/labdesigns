<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    $exp_args = array(
        'cat' => 3, // (int) - Display posts that have this category (and any children of that category), using category id.
        'posts_per_page' => 4, // (int) - number of post to show per page (available with Version 2.1). Use 'posts_per_page' => -1 to show all posts.
        'order' => 'DESC', // (string) - Designates the ascending or descending order of the 'orderby' parameter. Default to 'DESC'.
    );
    $exp_query = new WP_Query($exp_args);
    if ($exp_query->have_posts()) :

    ?>
        <div class="section-title-wrap">
            <h1 class="section-title">
                <?php echo $exp_query->query_vars["category_name"]; ?>
            </h1>
        </div>

        <section class="front-page-expertise">
            <?php if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post(); ?>
                    <div class="riedeltje">
                        <?= the_content(); ?>
                    </div>

            <?php
                endwhile;
            endif;
            ?>



            <?php /* Start the Loop */
            while ($exp_query->have_posts()) :
                $exp_query->the_post();

                /*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                get_template_part('parts/archive', 'expertise');

            endwhile;
            wp_reset_postdata();
            the_posts_navigation();
            ?>

        <?php else :

        get_template_part('template-parts/content', 'none');

    endif;
        ?>

        </section> <!-- #section expertise -->

        <?php
        $case_args = array(
            'post_type' => 'cases',
            'posts_per_page' => 6, // (int) - number of post to show per page (available with Version 2.1). Use 'posts_per_page' => -1 to show all posts.
            'order' => 'DESC', // (string) - Designates the ascending or descending order of the 'orderby' parameter. Default to 'DESC'.
        );
        $case_query = new WP_Query($case_args);
        if ($case_query->have_posts()) :        ?>
            <div class="section-title-wrap">
                <h1 class="section-title">
                    <?php _e('Portfolio', 'labdesigns') ?>
                </h1>
            </div>
            <div class="front-page-cases-bg-wrapper">
                <section class="front-page-cases">
                    <div class="glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php
                                while ($case_query->have_posts()) :
                                    $case_query->the_post(); ?>

                                    <li class="glide__slide"><?= get_template_part('parts/archive', 'cases'); ?></li>

                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<" aria-label="previous slide">
                                <svg version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">

                                    <path class="st0" d="M8,256c0,137,111,248,248,248s248-111,248-248S393,8,256,8S8,119,8,256z M456,256c0,110.5-89.5,200-200,200
	S56,366.5,56,256S145.5,56,256,56S456,145.5,456,256z M384,236v40c0,6.6-5.4,12-12,12H256v67c0,10.7-12.9,16-20.5,8.5l-99-99
	c-4.7-4.7-4.7-12.3,0-17l99-99c7.6-7.6,20.5-2.2,20.5,8.5v67h116C378.6,224,384,229.4,384,236z" />
                                </svg>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">" aria-label="next slide">

                                <svg version="1.1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">

                                    <path class="st0" d="M504,256C504,119,393,8,256,8S8,119,8,256s111,248,248,248S504,393,504,256z M56,256c0-110.5,89.5-200,200-200
	s200,89.5,200,200s-89.5,200-200,200S56,366.5,56,256z M128,276v-40c0-6.6,5.4-12,12-12h116v-67c0-10.7,12.9-16,20.5-8.5l99,99
	c4.7,4.7,4.7,12.3,0,17l-99,99c-7.6,7.6-20.5,2.2-20.5-8.5v-67H140C133.4,288,128,282.6,128,276z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                    the_posts_navigation();
                    ?>

                <?php else :

                get_template_part('template-parts/content', 'none');

            endif;
                ?>

                </section>
                <div class="more-cases">
                    <a href="<?= get_site_url() ?>/cases"><?php _e('meer cases', 'labdesigns') ?> <img loading="lazy" class="more-cases-img" src="<?= get_template_directory_uri() ?>/assets/img/more-cases.svg" alt=""></a>
                </div>

            </div>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
