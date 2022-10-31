<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    wp_head(); // Appelle les fonctionnalités de base de WordPress comme la barre d'admin, mais aussi la balise <title> qui est générée dynamiquement avec le nom de chaque pages
    ?>

    <!-- On n'appelle pas les fichiers de style de la manière suivante mais dynamiquement dans functions.php -->
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>