<?php
/**
 * Configuración: PÁGINA NOSOTROS
 * Ubicación: inc/customizer/nosotros.php
 */
function semin_customize_nosotros($wp_customize) {
    
    // SECCIÓN
    $wp_customize->add_section('semin_nosotros_section', array(
        'title'    => '👥 Nosotros: Historia',
        'panel'    => 'semin_panel_pages', // <--- ESTO ES LO QUE FALTABA
        'priority' => 20,
    ));
    
    // FOTOS
    $wp_customize->add_setting('semin_img_ingeniero', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'semin_img_ingeniero_ctrl', array(
        'label' => 'Foto Historia (Ingeniero)', 'section' => 'semin_nosotros_section', 'settings' => 'semin_img_ingeniero'
    )));

    $wp_customize->add_setting('semin_img_taller', array('default' => '', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'semin_img_taller_ctrl', array(
        'label' => 'Foto Misión/Visión', 'section' => 'semin_nosotros_section', 'settings' => 'semin_img_taller'
    )));
}