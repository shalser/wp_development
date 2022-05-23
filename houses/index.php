<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="main__title">
            <?php the_field('title'); ?>
        </div>
        <div class="main__text">
            <?php the_field('main-text'); ?>
        </div>
        <div class="main__img">
            <img src="<?php bloginfo('template_url'); ?> . /assets/img/main-img.png" alt="">
        </div>
        <div class="project__title"><?php the_field('project__title'); ?></div>


        <div class="project">

            <?php
            $featured_posts = get_field('project');
            if ($featured_posts): ?>
                <ul>
                    <?php foreach ($featured_posts as $post):


                        setup_postdata($post); ?>
                        <li class="project_item">

                            <div class="project__name"><?php the_field('project-name'); ?></div>
                            <div class="project__size"><?php the_field('project__size'); ?></div>
                            <div class="project__area"><?php the_field('project__area'); ?></div>
                            <div class="project__price"><?php the_field('project__price'); ?></div>

                            <div class="project__images">
                                <div class="project__images-item">
                                    <img src="<?php the_field('project__images'); ?>" alt="">
                                </div>
                                <div class="project__images-item">
                                    <img src="<?php the_field('project__images-plan'); ?>" alt="">
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php

                wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>

    </div>

    <div class="download">
        <div class="download_inner">
            <img class="download_img" src="<?php bloginfo('template_url'); ?> . /assets/img/home-download.png"
                 alt="home-download">
            <a href="<?php the_field('download_img'); ?>" download><?php the_field('download_img-text'); ?></a>
        </div>
    </div>

    <div class="container">
        <div class="gallery">
            <div class="gallery__title"><?php the_field('title-gallery'); ?></div>
            <div class="gallery__text"><?php the_field('gallery-text'); ?></div>
            <div id="gallery__inner">
                <?php the_field('photo'); ?>
            </div>
        </div>

        <div class="main__img">
            <img src="<?php bloginfo('template_url'); ?> . /assets/img/main-img.png" alt="">
        </div>

    </div>
</main>

<?php get_footer(); ?>


