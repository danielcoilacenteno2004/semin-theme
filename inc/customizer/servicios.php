<?php
/**
 * Configuración: PÁGINA SERVICIOS
 * Ubicación: inc/customizer/servicios.php
 */
function semin_customize_servicios($wp_customize) {
    
    // SECCIÓN
    $wp_customize->add_section('semin_servicios_section', array(
        'title'    => '🛠️ Servicios: Taller y Flota',
        'panel'    => 'semin_panel_pages', // <--- ESTO ES LO QUE FALTABA
        'priority' => 30,
    ));
    
    // FOTOS PRINCIPALES
    $wp_customize->add_setting('semin_img_capacidades', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cap_img_ctrl', array(
        'label' => 'Foto Taller Principal', 'section' => 'semin_servicios_section', 'settings' => 'semin_img_capacidades'
    )));

    $wp_customize->add_setting('semin_img_powergy', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pow_img_ctrl', array(
        'label' => 'Foto Powergy', 'section' => 'semin_servicios_section', 'settings' => 'semin_img_powergy'
    )));

    // BUCLE DE 3 SERVICIOS
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("serv_{$i}_img", array('default' => '', 'transport' => 'refresh'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "serv_{$i}_img_ctrl", array(
            'label' => "Imagen Servicio $i", 'section' => 'semin_servicios_section', 'settings' => "serv_{$i}_img"
        )));

        $wp_customize->add_setting("serv_{$i}_title", array('default' => "Servicio $i"));
        $wp_customize->add_control("serv_{$i}_title_ctrl", array(
            'label' => "Título Servicio $i", 'section' => 'semin_servicios_section', 'settings' => "serv_{$i}_title", 'type' => 'text'
        ));
    }
}