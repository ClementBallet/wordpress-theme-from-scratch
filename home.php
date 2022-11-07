<?php
get_header(); // Appelle header.php si il est déclaré dans le thème. Sinon, il charge le header par défaut.
?>

<?php if ( have_posts() ) : ?>
    <ul>
        <!-- the_post() est très important pour récupérer les infos de chaque posts. Si il n'est pas présent, alors une boucle infinie commencera. -->
        <?php while ( have_posts() ) : the_post(); ?>
            <li>
                <a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php
get_footer(); // Appelle footer.php si il est déclaré dans le thème. Sinon, il charge le footer par défaut.
?>