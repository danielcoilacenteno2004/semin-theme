<?php
/**
 * Core Setup: Carga de Assets y Soportes del Tema
 * Ubicación: inc/core/setup.php
 */

function semin_scripts_modular() {
    
    // =================================================================
    // 1. GLOBAL Y LIBRERÍAS
    // =================================================================
    // FontAwesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
    
    // Style.css (Global)
    wp_enqueue_style( 'semin-global', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );


    // =================================================================
    // 2. CARGADOR AUTOMÁTICO (INTELIGENTE)
    // =================================================================
    // Intenta adivinar el CSS basado en el nombre del archivo PHP
    global $template;
    $nombre_plantilla = basename( $template, '.php' );
    $ruta_relativa_css = '/css/' . $nombre_plantilla . '.css';
    $ruta_absoluta_css = get_template_directory() . $ruta_relativa_css;

    if ( file_exists( $ruta_absoluta_css ) ) {
        wp_enqueue_style( 
            'css-auto-' . $nombre_plantilla, 
            get_template_directory_uri() . $ruta_relativa_css, 
            array('semin-global'), 
            filemtime( $ruta_absoluta_css ) 
        );
    }


    // =================================================================
    // 3. CARGADOR MANUAL (SEGURIDAD / EXCEPCIONES)
    // =================================================================
    // Aquí forzamos la carga para asegurar que no fallen las páginas críticas
    
    // A. SERVICIOS (Página Principal + Detalle Individual CPT)
    if ( is_page('servicios') || is_page_template('page-servicios.php') || is_singular('servicio') ) {
        wp_enqueue_style( 
            'css-page-servicios', 
            get_template_directory_uri() . '/css/page-servicios.css', 
            array('semin-global'), 
            filemtime( get_template_directory() . '/css/page-servicios.css' ) 
        );
    }

    // B. NOSOTROS (Nueva)
    if ( is_page('nosotros') || is_page_template('page-nosotros.php') ) {
        wp_enqueue_style( 
            'css-page-nosotros', 
            get_template_directory_uri() . '/css/page-nosotros.css', 
            array('semin-global'), 
            filemtime( get_template_directory() . '/css/page-nosotros.css' ) 
        );
    }

    // C. CONTACTO (Nueva)
    if ( is_page('contacto') || is_page_template('page-contacto.php') ) {
        wp_enqueue_style( 
            'css-page-contacto', 
            get_template_directory_uri() . '/css/page-contacto.css', 
            array('semin-global'), 
            filemtime( get_template_directory() . '/css/page-contacto.css' ) 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'semin_scripts_modular' );


// 4. SOPORTES DEL TEMA
function semin_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array('height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true));
}
add_action( 'after_setup_theme', 'semin_theme_support' );