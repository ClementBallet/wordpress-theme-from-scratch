<?php
// Ce fichier s'exécute à chaque fois que le thème sera chargé

// Ajoute le titre de la page dynamiquement dans la balise <title> :
// add_theme_support('title-tag');

// Mais on préférera créer une fonction où il y aura tous nos ajouts à un moment donné grâce aux hooks.
// Ici pour les ajouts de fonctionnalités avec add_theme_support
function wlc_supports () {
    add_theme_support('title-tag');
}

// On appelle la fonction add_action avec comme 1er paramètre le moment où l'on veut agir (hook) et en 2e paramètre la fonction déclarée dans une chaine de caractère
add_action('after_setup_theme', 'wlc_supports');

/**
 * Prépare tous les styles CSS et les scripts JS de mon projet et les charge.
 * On pourrait également ajouter ici des fichiers externes via des CDN (par exemple Bootstrap).
 * get_template_directory_uri() renvoie dynamiquement le chemin vers le thème.
 * @return void
 */
function wlc_register_assets () {
    wp_register_style('style-live-coding', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style-live-coding');
    wp_register_script('scripts-live-coding', get_template_directory_uri() . '/scripts.js', [], false, true);
    wp_enqueue_script('scripts-live-coding');
}

add_action('wp_enqueue_scripts', 'wlc_register_assets');

/**
 * Change la façon dont est affiché le titre dans l'onglet du navigateur.
 * Place un | entre les éléments plutôt qu'un -
 * @return string
 */
function wlc_title_separator () {
    return '|';
}

// Les filtres sont des hooks qui altèrent des valeurs sur un élément.
// Ici, on se place sur les séparateurs de titres dans l'onglet du navigateur et on altère/change sa valeur de sortie.
add_filter('document_title_separator', 'wlc_title_separator');