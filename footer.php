<?php if (!is_page('Contact')) : ?>
    <div class="footer-contact">
        <h3><?php _e('Waar kan ik je mee helpen ?', 'labdesigns') ?> </h3>
        <?php
        if (defined('ICL_LANGUAGE_CODE')) {

            if (ICL_LANGUAGE_CODE === 'en') {
                echo do_shortcode('[contact-form-7 id="269" title="Contact form footer en"]');
            } else {
                echo do_shortcode('[contact-form-7 id="200" title="Contact form footer"]');
            }
        }
        ?>
    </div>

<?php endif; ?>

<footer class="footer">

    <?php require get_template_directory() . '/assets/img/footer-svg.php'; ?>

    <section class="footer-main">
        <div class="footer-content">
            <div class="footer-content-cols footer-menu">
                <nav id="footer-navigation" class="footer-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'footer-menu',
                            'menu_class'     => 'main-menu',
                        )
                    );
                    ?>
                </nav><!-- #footer-navigation -->
            </div>
            <div class="footer-content-cols footer-logo"><?= the_custom_logo(); ?></div>
        </div>
        <div class="footer-bottom"> <span class="footer-copy">© </span>Copyrights 2020 labdesigns
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer_bottom_menu',
                    'menu_id'        => 'bottom-menu',
                    'menu_class'     => 'footer-bottom-menu',
                )
            );
            ?>
        </div>
    </section>

</footer>
<?php wp_footer(); ?>
</div> <!-- /body-overflow -->
</body>

</html>