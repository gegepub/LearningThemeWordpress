<?php

// chargement de scripts et de styles

function csm_enqueue_style() {
    // -- Normmalize CSS
    wp_enqueue_style( 'csmnormalize', get_template_directory_uri() . '/assets/normalize.css', false ); // false car pas de dépendences 

    // -- WP style
    wp_enqueue_style( 'csmcss', get_stylesheet_uri(), false );

    // -- Font Awesome
    wp_enqueue_style( 'fontawesome-cdn', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' , array(), '4.7.0' );

    // -- Google Font
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato' , false );
}

function csm_enqueue_script() {
	//wp_enqueue_script( 'my-js', 'filename.js', false );
}

add_action( 'wp_enqueue_scripts', 'csm_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'csm_enqueue_script' );

// Fonctionnnalités du thème

# Image de logo Personnalisable (activé dans Wordpress)
add_theme_support( 'custom-logo', array(
    'height'      => 50,
    'width'       => 200,
    'flex-height' => false,
    'flex-width'  => false,
    'header-text' => array( 'site-title', 'site-description')
 ));


# Menu Wordpress 
function register_csm_menu() {
    register_nav_menu( 'csm-menu', 'Menu du Haut' );
}

add_action( 'init', 'register_csm_menu' );


#image du Header Personnalisable                            
$args = array(                                          
    'width'         => 1600,
    'height'        => 359,
    'default-iamge' => get_template_directory_uri() . '/assets/img/bandeau-saint-marc.jpg',
    'uploads'       => true
);

add_theme_support( 'custom-header', $args );

register_default_headers( array(
    'bandeauDuHaut' => array (
        'url'           =>  '%s/assets/img/bandeauDuHaut.jpg',
        'thumbnail_url' =>  '%s/assets/img/bandeauDuHaut.jpg',
        'description'   =>  __('Proposition 1', 'isen')
    ),
    'bandeauCsm' => array (
        'url'           =>  '%s/assets/img/bandeau-saint-marc.jpg',
        'thumbnail_url' =>  '%s/assets/img/bandeau-saint-marc.jpg',
        'description'   =>  __('Proposition 2', 'csm')
    ),
));

#Custom Background()
add_theme_support( 'custom-background');

# Création d'un CUSTOM POST TYPE
add_action( 'init', 'create_post_type');
function create_post_type() {
    register_post_type( 'accueil-news', array(
        'labels'    => array(
            'name'          => __( 'Accueil News' ),
            'singular name' => __( 'Accueil News' )
        ),
        'public'        => true,
        'has_archive'   => false
    ));
}

# Featured Image
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'accueil-news', 'thumbnail' );
add_image_size( 'accueil-size', 500, 310, true ); // pour créer une image dans ce bon format

// Position pour Widget

add_action( 'widgets_init', 'csm_widgets_init' );
function csm_widgets_init() {
    register_sidebar( array(
        'name'          => 'Pied de page 1',
        'id'            => 'csm-footer-1',
        'description'   => 'Widget pour le placement de la Google Map',
        'before_widget' => '<div id="%1$s" class="gmap %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar( array(
        'name'          => 'Pied de page 2',
        'id'            => 'csm-footer-2',
        'description'   => 'Widget pour le placement de la Newsletter',
        'before_widget' => '<div id="%1$s" class="newsletter %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));    

    register_sidebar( array(
        'name'          => 'Pied de page 3',
        'id'            => 'csm-footer-3',
        'description'   => 'Widget pour le placement des coordonnées de contact',
        'before_widget' => '<div id="%1$s" class="contact %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));    
}
?>