<?php
get_header();
var_dump(get_post_meta(get_the_ID()));
?>

<?php if ( have_posts() ) : ?>
    <!-- the_post() est très important pour récupérer les infos de chaque posts. Si il n'est pas présent, alors une boucle infinie commencera. -->
    <?php while ( have_posts() ) : the_post(); ?>
        <main>
            <article>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        </main>
    <?php endwhile; ?>
<?php else : ?>
    <h1>Pas de pages à afficher</h1>
<?php endif; ?>

<?php
get_footer();
?>