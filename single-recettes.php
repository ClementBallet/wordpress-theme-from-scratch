<?php
get_header();
?>

<?php
$timer = get_field('temps_de_preparation');
?>

<p>Le temps de préparation est de <?= $timer ?> minutes.</p>

<?php
get_footer();
?>