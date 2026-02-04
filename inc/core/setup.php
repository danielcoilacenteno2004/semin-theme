<?php
/**
 * Core Setup: Carga de Assets y Soportes del Tema
 * Ubicación: inc/core/setup.php
 */

function semin_scripts_modular() {
    
    // 1. CARGA DE LIBRERÍAS EXTERNAS Y GLOBAL
    // FontAwesome (CDN)
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
    
    // Estilo Global (style.css) - Usamos filemtime para evitar caché
    wp_enqueue_style( 'semin-global', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );


    // 2. 🧠 CARGADOR DINÁMICO DE CSS (AUTOMÁTICO)
    // Obtiene el archivo PHP que WordPress decidió usar para esta página actual
    global $template;

    // A. LÓGICA AUTOMÁTICA (Basada en nombre de archivo)
    // Ej: si usa 'page-servicios.php' -> busca 'css/page-servicios.css'
    $nombre_plantilla = basename( $template, '.php' );
    $ruta_relativa_css = '/css/' . $nombre_plantilla . '.css';
    $ruta_absoluta_css = get_template_directory() . $ruta_relativa_css;

    if ( file_exists( $ruta_absoluta_css ) ) {
        wp_enqueue_style( 
            'css-auto-' . $nombre_plantilla, 
            get_template_directory_uri() . $ruta_relativa_css, 
            array('semin-global'), 
            filemtime( $ruta_absoluta_css ) // ¡Versión dinámica basada en fecha de modificación!
        );
    }

    // B. LÓGICA MANUAL / EXCEPCIONES (Opcional pero recomendada)
    // Si entras a un "Servicio Individual" (CPT), queremos que use el CSS de la página de Servicios
    if ( is_singular('servicio') ) {
        wp_enqueue_style( 
            'css-page-servicios', 
            get_template_directory_uri() . '/css/page-servicios.css', 
            array('semin-global'), 
            '1.0' 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'semin_scripts_modular' );


// 3. SOPORTES DEL TEMA
function semin_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array('height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true));
}
add_action( 'after_setup_theme', 'semin_theme_support' );