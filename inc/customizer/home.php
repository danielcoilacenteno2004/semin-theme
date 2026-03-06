<?php
/**
 * Configuración: PÁGINA DE INICIO (HOME)
 * Ubicación: inc/customizer/home.php
 * NOTA: Este archivo crea el Panel "Inicio" y sus secciones.
 */

function semin_customize_home($wp_customize) {

    // =================================================================
    // 0. CREAR EL PANEL MAESTRO: "PÁGINA DE INICIO"
    // =================================================================
    // Si falta esto, todas las secciones de abajo desaparecen o salen sueltas.
    $wp_customize->add_panel('semin_panel_home', array(
        'title'       => '🏠 Semin: Página de Inicio',
        'description' => 'Edita la Portada, Marcas, Aliados y CTA Final.',
        'priority'    => 20, // Saldrá debajo de Global
    ));
    

    // =================================================================
    // 1. SECCIÓN: PORTADA (HERO)
    // =================================================================
    $wp_customize->add_section('semin_hero_options', array(
        'title'    => '1. Portada Principal',
        'panel'    => 'semin_panel_home', // <--- Asignado al Panel Home
        'priority' => 10,
    ));

    // Título Hero
    $wp_customize->add_setting('hero_titulo', array('default' => 'Expertos en Soluciones Integrales', 'transport' => 'refresh'));
    $wp_customize->add_control('hero_titulo_control', array(
        'label' => 'Título Principal', 'section' => 'semin_hero_options', 'settings' => 'hero_titulo', 'type' => 'text'
    ));

    // Subtítulo Hero
    $wp_customize->add_setting('hero_subtitulo', array('default' => 'Garantizamos calidad...', 'transport' => 'refresh'));
    $wp_customize->add_control('hero_subtitulo_control', array(
        'label' => 'Subtítulo', 'section' => 'semin_hero_options', 'settings' => 'hero_subtitulo', 'type' => 'textarea'
    ));

    // Botón Hero
    $wp_customize->add_setting('hero_btn_url', array('default' => '#contacto', 'transport' => 'refresh'));
    $wp_customize->add_control('hero_btn_url_control', array(
        'label' => 'URL del Botón', 'section' => 'semin_hero_options', 'settings' => 'hero_btn_url', 'type' => 'url'
    ));

    // Imagen Fondo Hero
    $wp_customize->add_setting('hero_imagen_fondo', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_ctrl', array(
        'label' => 'Imagen de Fondo', 'section' => 'semin_hero_options', 'settings' => 'hero_imagen_fondo'
    )));


    // =================================================================
    // 2. SECCIÓN: MARCAS Y ALIADOS
    // =================================================================
    $wp_customize->add_section('semin_home_logos', array(
        'title'    => '2. Marcas y Aliados',
        'panel'    => 'semin_panel_home', // <--- Asignado al Panel Home
        'priority' => 20,
    ));

    // Título Marcas
    $wp_customize->add_setting('semin_brands_title', array('default' => 'Especialistas en Marcas', 'transport' => 'refresh'));
    $wp_customize->add_control('semin_brands_title_control', array(
        'label' => 'Título Sección Motores', 'section' => 'semin_home_logos', 'settings' => 'semin_brands_title', 'type' => 'text'
    ));

    // Bucle 5 Marcas
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("semin_brand_logo_$i", array('default' => '', 'transport' => 'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "brand_logo_{$i}_ctrl", array(
            'label' => "Logo Motor #$i", 'section' => 'semin_home_logos', 'settings' => "semin_brand_logo_$i"
        )));
    }

    // Título Aliados (Separador visual)
    $wp_customize->add_setting('semin_allies_title', array('default' => 'Nuestros Aliados Estratégicos', 'transport' => 'refresh'));
    $wp_customize->add_control('semin_allies_title_control', array(
        'label' => '--- SEPARADOR --- Título Aliados', 'section' => 'semin_home_logos', 'settings' => 'semin_allies_title', 'type' => 'text'
    ));

    // Bucle 6 Aliados
    for ($j = 1; $j <= 6; $j++) {
        $wp_customize->add_setting("semin_ally_logo_$j", array('default' => '', 'transport' => 'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "ally_logo_{$j}_ctrl", array(
            'label' => "Logo Aliado #$j", 'section' => 'semin_home_logos', 'settings' => "semin_ally_logo_$j"
        )));
    }


    // =================================================================
    // 3. SECCIÓN: SOBRE NOSOTROS (HOME)
    // =================================================================
    $wp_customize->add_section('semin_home_about', array(
        'title'    => '3. Sobre Nosotros (Resumen)',
        'panel'    => 'semin_panel_home', // <--- Asignado al Panel Home
        'priority' => 30,
    ));

    $wp_customize->add_setting('home_about_small', array('default' => 'SOBRE SEMIN S.R.L.'));
    $wp_customize->add_control('home_about_small_ctrl', array(
        'label' => 'Antetítulo', 'section' => 'semin_home_about', 'settings' => 'home_about_small', 'type' => 'text'
    ));

    $wp_customize->add_setting('home_about_title', array('default' => 'Expertos en Soluciones...'));
    $wp_customize->add_control('home_about_title_ctrl', array(
        'label' => 'Título Principal', 'section' => 'semin_home_about', 'settings' => 'home_about_title', 'type' => 'text'
    ));

    $wp_customize->add_setting('home_about_desc', array('default' => 'Descripción corta...'));
    $wp_customize->add_control('home_about_desc_ctrl', array(
        'label' => 'Descripción', 'section' => 'semin_home_about', 'settings' => 'home_about_desc', 'type' => 'textarea'
    ));

    $wp_customize->add_setting('home_about_img', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_about_img_ctrl', array(
        'label' => 'Imagen Lateral', 'section' => 'semin_home_about', 'settings' => 'home_about_img'
    )));


// =================================================================
    // 4. SECCIÓN: BANNER DE SERVICIOS (HOME)
    // =================================================================
    $wp_customize->add_section('semin_home_solutions', array(
        'title'    => '4. Banner de Servicios',
        'panel'    => 'semin_panel_home', // <--- Asignado al Panel Home
        'priority' => 40,
    ));

    // 4.1 Título del Banner
    $wp_customize->add_setting('home_sol_title', array(
        'default'   => 'UN EQUIPO CAPACITADO PARA BRINDAR LA MEJOR ATENCIÓN', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('home_sol_title_ctrl', array(
        'label'    => 'Título del Banner', 
        'section'  => 'semin_home_solutions', 
        'settings' => 'home_sol_title', 
        'type'     => 'text'
    ));

    // 4.2 Subtítulo / Descripción
    $wp_customize->add_setting('home_sol_subtitle', array(
        'default'   => 'En SEMIN S.R.L., sabemos lo importante que es la operatividad de sus equipos, por ello, contamos con servicios con calidad y confianza a la medida de sus necesidades.', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('home_sol_subtitle_ctrl', array(
        'label'    => 'Texto Descriptivo', 
        'section'  => 'semin_home_solutions', 
        'settings' => 'home_sol_subtitle', 
        'type'     => 'textarea'
    ));

    // 4.3 Imagen de Fondo del Banner
    $wp_customize->add_setting('home_servicios_banner_img', array(
        'default'   => '', 
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_servicios_banner_img_ctrl', array(
        'label'       => 'Imagen de Fondo (Banner)',
        'description' => 'Sube una imagen apaisada (horizontal). Recomendado: Foto de técnicos trabajando o maquinaria industrial en alta calidad.',
        'section'     => 'semin_home_solutions',
        'settings'    => 'home_servicios_banner_img'
    )));


    // =================================================================
    // 5. SECCIÓN: LLAMADA FINAL (FOOTER)
    // =================================================================
    $wp_customize->add_section('semin_home_cta', array(
        'title'    => '5. Llamada Final (Footer)',
        'panel'    => 'semin_panel_home', // <--- Asignado al Panel Home
        'priority' => 50,
    ));

    $wp_customize->add_setting('home_cta_title', array('default' => '¿Necesita energía inmediata?'));
    $wp_customize->add_control('home_cta_title_ctrl', array(
        'label' => 'Título CTA', 'section' => 'semin_home_cta', 'settings' => 'home_cta_title', 'type' => 'text'
    ));

    $wp_customize->add_setting('home_cta_sub', array('default' => 'Nuestro equipo de ingenieros...'));
    $wp_customize->add_control('home_cta_sub_ctrl', array(
        'label' => 'Subtítulo CTA', 'section' => 'semin_home_cta', 'settings' => 'home_cta_sub', 'type' => 'textarea'
    ));

}
// SIN add_action, porque lo llamamos desde loader.php