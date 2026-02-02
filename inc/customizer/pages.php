<?php
/**
 * Configuración del Personalizador: PÁGINAS INTERNAS
 * Ubicación: inc/customizer/pages.php
 * * Este archivo crea el Panel Maestro "Páginas Internas" y configura "Venta Grupos".
 * NOTA: No lleva add_action al final porque se llama manualmente desde loader.php
 */

function semin_customize_pages($wp_customize) {

    // =================================================================
    // 0. CREAR EL PANEL MAESTRO: "PÁGINAS INTERNAS"
    // =================================================================
    $wp_customize->add_panel('semin_panel_pages', array(
        'title'       => '📄 Semin: Páginas Internas',
        'description' => 'Configuración específica para Venta Grupos, Nosotros, Servicios, etc.',
        'priority'    => 30,
    ));


    // =================================================================
    // 1. SECCIÓN: VENTA DE GRUPOS (BROCHURE)
    // =================================================================
    
    $wp_customize->add_section('semin_grupos_section', array(
        'title'       => '⚡ Venta Grupos: Brochure',
        'description' => 'Configura la zona de descarga del catálogo.',
        'panel'       => 'semin_panel_pages', // <--- Se asigna al Panel creado arriba
        'priority'    => 10,
    ));

    // 1. Archivo PDF
    $wp_customize->add_setting('semin_brochure_file', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'brochure_pdf_ctrl', array(
        'label'       => 'Archivo PDF del Catálogo',
        'section'     => 'semin_grupos_section',
        'settings'    => 'semin_brochure_file',
        'description' => 'Sube aquí el PDF que descargarán los clientes.'
    )));

    // 2. Imagen de Portada (Libro)
    $wp_customize->add_setting('semin_brochure_cover', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'brochure_cover_ctrl', array(
        'label'       => 'Imagen Portada del Catálogo',
        'section'     => 'semin_grupos_section',
        'settings'    => 'semin_brochure_cover',
        'description' => 'Sube una imagen vertical (tipo portada de revista).'
    )));

    // 3. Título de la Sección
    $wp_customize->add_setting('semin_brochure_title', array('default' => 'Catálogo de Soluciones 2026', 'transport' => 'refresh'));
    $wp_customize->add_control('brochure_title_ctrl', array(
        'label'    => 'Título de la Descarga',
        'section'  => 'semin_grupos_section',
        'settings' => 'semin_brochure_title',
        'type'     => 'text'
    ));

    // =================================================================
    // 2. SECCIÓN: PÁGINA CONTACTO
    // =================================================================
    $wp_customize->add_section('semin_contacto_section', array(
        'title'    => '📞 Página: Contacto',
        'panel'    => 'semin_panel_pages',
        'priority' => 40,
    ));

    // A. Título Principal (H1)
    $wp_customize->add_setting('contacto_titulo', array('default' => 'Contáctanos', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_titulo_ctrl', array(
        'label'    => 'Título de la Página',
        'section'  => 'semin_contacto_section',
        'settings' => 'contacto_titulo',
        'type'     => 'text'
    ));

    // --- DATOS DE LA COLUMNA IZQUIERDA ---
    
    // B. Título Columna Info
    $wp_customize->add_setting('contacto_info_title', array('default' => 'Información de Contacto', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_info_title_ctrl', array(
        'label'    => 'Título Columna Info',
        'section'  => 'semin_contacto_section',
        'settings' => 'contacto_info_title',
        'type'     => 'text'
    ));

    // C. Descripción
    $wp_customize->add_setting('contacto_info_desc', array('default' => 'Estamos listos para atender sus requerimientos energéticos.', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_info_desc_ctrl', array(
        'label'    => 'Descripción Corta',
        'section'  => 'semin_contacto_section',
        'settings' => 'contacto_info_desc',
        'type'     => 'textarea'
    ));

    // D. Dirección (Faltaba esto)
    $wp_customize->add_setting('contacto_direccion', array('default' => 'Parque Industrial, Arequipa - Perú', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_direccion_ctrl', array(
        'label'    => 'Dirección Física',
        'section'  => 'semin_contacto_section',
        'settings' => 'contacto_direccion',
        'type'     => 'text'
    ));

    // --- INTEGRACIONES ---

    // E. Shortcode
    $wp_customize->add_setting('contacto_shortcode', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_shortcode_ctrl', array(
        'label'       => 'Shortcode Formulario',
        'description' => 'Pega aquí el código de Contact Form 7',
        'section'     => 'semin_contacto_section',
        'settings'    => 'contacto_shortcode',
        'type'        => 'text'
    ));

    // F. Mapa
    $wp_customize->add_setting('contacto_mapa', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control('contacto_mapa_ctrl', array(
        'label'       => 'Iframe Google Maps',
        'section'     => 'semin_contacto_section',
        'settings'    => 'contacto_mapa',
        'type'        => 'textarea'
    ));
    
}
// ¡OJO! Aquí NO ponemos add_action, porque loader.php se encarga de llamarlo.