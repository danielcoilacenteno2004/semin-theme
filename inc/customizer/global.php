<?php
/**
 * Configuración Global del Tema (Panel Maestro)
 * Ubicación: inc/customizer/global.php
 */

function semin_customize_global($wp_customize) {

    // =================================================================
    // 1. CREAMOS EL PANEL MAESTRO: "GLOBAL"
    // =================================================================
    // Este será el contenedor (carpeta) principal para ajustes generales.
    $wp_customize->add_panel('semin_panel_global', array(
        'title'       => '🌍 Semin: Configuración Global',
        'description' => 'Ajustes generales que afectan toda la web (Cabecera, Pie de página, Contacto).',
        'priority'    => 10, // Saldrá primero en la lista
    ));


    // =================================================================
    // 2. SECCIÓN: CONTACTO (HEADER Y FOOTER)
    // =================================================================
    $wp_customize->add_section('semin_contact_options', array(
        'title'       => 'Datos de Contacto',
        'description' => 'Estos datos aparecen en la barra superior azul y en el pie de página.',
        'panel'       => 'semin_panel_global', // <--- AQUÍ LO METEMOS AL PANEL
        'priority'    => 10,
    ));

    // --- A. EMAIL ---
    $wp_customize->add_setting('contact_email_text', array(
        'default'   => 'ventas@semin.pe', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('contact_email_text_control', array(
        'label'    => 'Texto del Correo',
        'section'  => 'semin_contact_options',
        'settings' => 'contact_email_text',
        'type'     => 'text'
    ));
    
    $wp_customize->add_setting('contact_email_link', array(
        'default'   => 'mailto:ventas@semin.pe', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('contact_email_link_control', array(
        'label'    => 'Enlace del Correo (mailto:)',
        'section'  => 'semin_contact_options',
        'settings' => 'contact_email_link',
        'type'     => 'text'
    ));

    // --- B. TELÉFONO / WHATSAPP ---
    $wp_customize->add_setting('contact_phone_text', array(
        'default'   => '923 494 455', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('contact_phone_text_control', array(
        'label'    => 'Texto del Teléfono',
        'section'  => 'semin_contact_options',
        'settings' => 'contact_phone_text',
        'type'     => 'text'
    ));

    $wp_customize->add_setting('contact_phone_link', array(
        'default'   => 'https://wa.me/51923494455', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('contact_phone_link_control', array(
        'label'    => 'Enlace de WhatsApp',
        'description' => 'Usa formato: https://wa.me/51...',
        'section'  => 'semin_contact_options',
        'settings' => 'contact_phone_link',
        'type'     => 'url'
    ));


    // =================================================================
    // 3. SECCIÓN: REDES SOCIALES (NUEVA)
    // =================================================================
    // Agrego esto para que veas el poder de los paneles. 
    // Ahora tendrás "Contacto" y "Redes" ordenados dentro de "Global".
    $wp_customize->add_section('semin_social_options', array(
        'title'    => 'Redes Sociales',
        'panel'    => 'semin_panel_global', // <--- AL MISMO PANEL
        'priority' => 20,
    ));

    // Facebook
    $wp_customize->add_setting('social_facebook', array('default' => '#'));
    $wp_customize->add_control('social_facebook_ctrl', array(
        'label'    => 'URL Facebook',
        'section'  => 'semin_social_options',
        'settings' => 'social_facebook',
        'type'     => 'url'
    ));

    // LinkedIn
    $wp_customize->add_setting('social_linkedin', array('default' => '#'));
    $wp_customize->add_control('social_linkedin_ctrl', array(
        'label'    => 'URL LinkedIn',
        'section'  => 'semin_social_options',
        'settings' => 'social_linkedin',
        'type'     => 'url'
    ));

}
add_action('customize_register', 'semin_customize_global');

// ... (aquí arriba está tu código de redes sociales) ...

    // =================================================================
    // 4. REORDENAMIENTO DE SECCIONES NATIVAS DE WORDPRESS
    // =================================================================
    
    // Mover "Identidad del sitio" (Logo/Icono) a la posición 40
    $wp_customize->get_section('title_tagline')->priority = 40;

    // Opcional: Mover "Ajustes página de inicio" al final del todo (100)
    $wp_customize->get_section('static_front_page')->priority = 100;

    // Opcional: Mover "CSS Adicional" al final (110)
    $wp_customize->get_section('custom_css')->priority = 110;

// <--- Cierre de function semin_customize_global
add_action('customize_register', 'semin_customize_global');