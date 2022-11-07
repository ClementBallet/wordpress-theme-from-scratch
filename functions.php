<?php
// Ce fichier s'exécute à chaque fois que le thème sera chargé

// Ajoute le titre de la page dynamiquement dans la balise <title> :
// add_theme_support('title-tag');

// Mais on préférera créer une fonction où il y aura tous nos ajouts à un moment donné grâce aux hooks.
// Ici pour les ajouts de fonctionnalités avec add_theme_support
function wlc_supports () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
        'status',
        'chat'
    ));
    register_nav_menus( array(
        'menu-header' => 'Menu header',
        'menu-footer' => 'Menu footer'
    ));
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
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
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

function wlc_register_post_types() {
    // Modifie les phrases affichées dans l'administration
    // Si on ne les renseigne pas WP mettra les intitulés par défaut comme « Ajouter une publication, modifier la publication, supprimer la publication… ».
    $labels = array(
        'name' => 'Recettes',
        'all_items' => 'Toutes les recettes',
        'singular_name' => 'Recettes',
        'add_new_item' => 'Ajouter une recette',
        'edit_item' => 'Modifier la recette',
        'menu_name' => 'Recettes'
    );

    $supports = array(
        'title', // Active la modification du titre dans l'édition
        'editor', // Active Gutenberg
        'author', // Active le changement de l'auteur
        'thumbnail', // Active l'image mise en avant
        'excerpt', // Active l'extrait
        'comments', // Active les commentaires
        'revisions' // Active les révisions
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // true = Gutenberg, false = classic editor
        'has_archive' => true, // Active les catégories
        'supports' => $supports,
        'menu_position' => 10, // Position dans la sidebar dans l'admin
        'menu_icon' => 'dashicons-buddicons-community', // Icone dans la sidebar
    );

    register_post_type( 'recettes', $args );
}

add_action( 'init', 'wlc_register_post_types' );

function wlc_cpt_meta () {
    add_meta_box(
        'infos-recette', // Identifiant de la meta box
        'Informations de la recette', // Titre de la meta box qui apparait dans l'admin
        'wlc_render_recette_box', // Fonction appelée et qui renvoie le HTML de la meta box
        'recettes' // Sur quel écran on a envie de faire apparaitre la meta box
    );
}

function wlc_render_recette_box () {
    ?>
    <label for="infos-recette">Temps de réalisation :</label>
    <input type="number" name="infos-recette" id="infos-recette" value="0">
    <?php
}

function save_meta_recettes ($post_id) {
    if (array_key_exists('infos-recette', $_POST)) {
        //update_post_meta($post_id, 'infos-recette', $_POST['timer']);
    }
}

add_action('add_meta_boxes', 'wlc_cpt_meta');
add_action('save_post', 'save_meta_recettes');