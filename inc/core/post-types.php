<?php
/**
 * Definición de Proyectos (Custom Post Type)
 */

function semin_register_proyectos() {
    $args = array(
        'labels'       => array('name' => 'Proyectos', 'singular_name' => 'Proyecto', 'add_new' => 'Añadir Nuevo'),
        'public'       => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-hammer',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'trabajo'), 
        'show_in_rest' => true,
    );
    register_post_type('proyecto', $args);
}
add_action('init', 'semin_register_proyectos');

// Metabox: Cliente / Ubicación
function semin_add_meta_box_proyecto() {
    add_meta_box('proyecto_meta', 'Datos del Proyecto', 'semin_proyecto_meta_callback', 'proyecto', 'side');
}
add_action('add_meta_boxes', 'semin_add_meta_box_proyecto');

function semin_proyecto_meta_callback($post) {
    $val = get_post_meta($post->ID, '_semin_ubicacion', true);
    echo '<label><strong>Cliente / Ubicación:</strong></label>';
    echo '<input type="text" name="semin_ubicacion" value="' . esc_attr($val) . '" style="width:100%; margin-top:5px;">';
}

function semin_save_proyecto_meta($post_id) {
    if (isset($_POST['semin_ubicacion'])) {
        update_post_meta($post_id, '_semin_ubicacion', sanitize_text_field($_POST['semin_ubicacion']));
    }
}
add_action('save_post', 'semin_save_proyecto_meta');