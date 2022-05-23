<footer class="footer">
    <div class="container">
        <a href="tel:<?php the_field('href'); ?>" class="phone"><?php the_field('phone'); ?></a>
        <div class="footer__email"><?php the_field("email"); ?></div>
    </div>
</footer>

<!--<script-->
<!--    src="https://code.jquery.com/jquery-3.4.1.js"-->
<!--    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="-->
<!--    crossorigin="anonymous"></script>-->


<?php wp_footer(); ?>
</body>
</html>

