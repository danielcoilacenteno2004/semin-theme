<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <article>
            <h1 style="font-size: 2.5rem; margin-bottom: 20px;"><?php the_title(); ?></h1>
            <div class="contenido-wordpress">
                <?php the_content(); ?>
            </div>
        </article>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>