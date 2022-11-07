<?php
get_header(); // Appelle header.php si il est déclaré dans le thème. Sinon, il charge le header par défaut.
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
get_footer(); // Appelle footer.php si il est déclaré dans le thème. Sinon, il charge le footer par défaut.
?>