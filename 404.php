<?php get_header(); ?>

<main id="primary" class="site-main err">
    <section class="err-content">
        <article id="post-<?php the_ID(); ?>" <?php post_class('error'); ?>>

            404: This is not the page you are looking for :p
        </article>
    </section>
</main>

<?php
// get_sidebar();
get_footer();
