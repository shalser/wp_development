<footer class="footer">
    <div class="container">
        <div class="footer__inner">
<!--            <a class="logo" href="#">-->
<!--                <img class="logo__img" src="--><?php //bloginfo('template_url'); ?><!--/assets/images/logo.svg" alt="logo">-->
<!--            </a>-->
            <?php the_custom_logo(); ?>

            <div class="social footer__social">
                <a class="social__link" href="<?php the_field('insta-link'); ?>">
                    <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/instagram.svg" alt="instagram icon">
                </a>
                <a class="social__link" href="<?php the_field('telegram-link'); ?>">
                    <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/telegram.svg" alt="telegram icon">
                </a>
                <a class="social__link" href="<?php the_field('wz-link'); ?>">
                    <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/whatsapp.svg" alt="whatsapp icon">
                </a>
                <a class="social__link" href="<?php the_field('fb-link'); ?>">
                    <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/facebook.svg" alt="facebook icon">
                </a>
            </div>

            <a class="footer__copy" href="#">
                Политика конфиденциальности
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


</body>

</html>
