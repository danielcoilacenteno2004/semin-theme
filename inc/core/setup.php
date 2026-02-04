<?php
/**
 * Core Setup: Carga de Assets y Soportes del Tema
 */

function semin_scripts_modular() {
    // 1. Carga Global (Siempre necesaria)
    wp_enqueue_style( 'semin-global', get_stylesheet_uri(), array(), '3.1' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );

    // 2. 🧠 CARGADOR DINÁMICO DE CSS (AUTOMÁTICO)
    // Obtiene el archivo PHP que WordPress decidió usar para esta página actual
    global $template;

    // Extrae el nombre limpio del archivo (ej: 'C:/.../page-venta-de-grupos.php' -> 'page-venta-de-grupos')
    $nombre_plantilla = basename( $template, '.php' );

    // Define dónde debería estar el CSS correspondiente
    // Busca en: /wp-content/themes/semin-theme/css/[nombre-plantilla].css
    $ruta_relativa_css = '/css/' . $nombre_plantilla . '.css';
    $ruta_absoluta_css = get_template_directory() . $ruta_relativa_css;

    // Pregunta: ¿Existe ese archivo CSS?
    if ( file_exists( $ruta_absoluta_css ) ) {
        // ¡Sí existe! Cárgalo dinámicamente.
        wp_enqueue_style( 
            'css-auto-' . $nombre_plantilla, // ID único (ej: css-auto-page-venta-de-grupos)
            get_template_directory_uri() . $ruta_relativa_css, 
            array('semin-global'), 
            '1.0' 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'semin_scripts_modular' );

// 2. SOPORTES DEL TEMA
function semin_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array('height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true));
}
add_action( 'after_setup_theme', 'semin_theme_support' );