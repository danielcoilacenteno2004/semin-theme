<?php
/**
 * Cargador Maestro del Personalizador
 * Ubicación: inc/customizer/loader.php
 */
function semin_customizer_loader($wp_customize) {
    
    // =========================================================
    // 1. CARGAMOS LOS PANELES Y LA PORTADA
    // =========================================================
    
    // Global
    require_once get_template_directory() . '/inc/customizer/global.php';
    semin_customize_global($wp_customize); // <--- AHORA SÍ LO LLAMAMOS MANUALMENTE

    // Home
    require_once get_template_directory() . '/inc/customizer/home.php';
    semin_customize_home($wp_customize); // <--- AHORA SÍ LO LLAMAMOS MANUALMENTE
    
    // Páginas Internas (Crea el panel 'semin_panel_pages')
    require_once get_template_directory() . '/inc/customizer/pages.php';
    semin_customize_pages($wp_customize); 


    // =========================================================
    // 2. CARGAMOS LAS SECCIONES HIJAS (NOSOTROS / SERVICIOS)
    // =========================================================
    
    if ( file_exists( get_template_directory() . '/inc/customizer/nosotros.php' ) ) {
        require_once get_template_directory() . '/inc/customizer/nosotros.php';
        semin_customize_nosotros($wp_customize);
    }

    if ( file_exists( get_template_directory() . '/inc/customizer/servicios.php' ) ) {
        require_once get_template_directory() . '/inc/customizer/servicios.php';
        semin_customize_servicios($wp_customize);
    }
}
add_action('customize_register', 'semin_customizer_loader');