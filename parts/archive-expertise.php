<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LabDesigns
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-base'); ?>>


    <div class="thumb-img">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('thumbnail'); ?></a>

        <?php endif; ?>
    </div>



    <div class="exp-header">

        <a href="<?php the_permalink(); ?>" rel="bookmark" class="title-link">
            <h2><?php the_title(); ?></h2>
        </a>
    </div><!-- .exp-header -->




</article><!-- #post-<?php the_ID(); ?> -->