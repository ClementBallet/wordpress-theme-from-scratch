<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <main>
            <article>
                <?php if ( !empty(the_post_thumbnail()) ) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
                <?php the_excerpt(); ?>
            </article>
        </main>
    <?php endwhile; ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php
get_footer();
?>
