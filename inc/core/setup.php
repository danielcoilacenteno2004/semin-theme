<?php
/**
 * Core Setup: Carga de Assets y Soportes del Tema
 */

// 1. CARGA DE ESTILOS Y SCRIPTS
function semin_scripts_modular() {
    // Globales
    wp_enqueue_style( 'semin-global', get_stylesheet_uri(), array(), '3.1' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );

    // Condicionales
    if ( is_front_page() ) wp_enqueue_style( 'css-front-page', get_template_directory_uri() . '/css/front-page.css', array('semin-global'), '1.0' );
    if ( is_page_template('page-nosotros.php') ) wp_enqueue_style( 'css-page-nosotros', get_template_directory_uri() . '/css/page-nosotros.css', array('semin-global'), '1.0' );
    if ( is_page_template('page-proyectos.php') || is_singular('proyecto') || is_post_type_archive('proyecto') ) wp_enqueue_style( 'css-page-proyectos', get_template_directory_uri() . '/css/page-proyectos.css', array('semin-global'), '1.0' );
    if ( is_page_template('page-grupos.php') ) wp_enqueue_style( 'css-page-grupos', get_template_directory_uri() . '/css/page-grupos.css', array('semin-global'), '1.0' );
    if ( is_page_template('page-contacto.php') ) wp_enqueue_style( 'css-page-contacto', get_template_directory_uri() . '/css/page-contacto.css', array('semin-global'), '1.0' );
    if ( is_page_template('page-servicios.php') ) wp_enqueue_style( 'css-page-servicios', get_template_directory_uri() . '/css/page-servicios.css', array('semin-global'), '1.0' );


}
add_action( 'wp_enqueue_scripts', 'semin_scripts_modular' );

// 2. SOPORTES DEL TEMA
function semin_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array('height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true));
}
add_action( 'after_setup_theme', 'semin_theme_support' );