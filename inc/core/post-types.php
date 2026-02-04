<?php
/**
 * Definición de Custom Post Types (Proyectos y Servicios)
 * Ubicación: inc/core/post-types.php
 */

// =================================================================
// 1. REGISTRO DE PROYECTOS
// =================================================================
function semin_register_proyectos() {
    $args = array(
        'labels'       => array('name' => 'Proyectos', 'singular_name' => 'Proyecto', 'add_new' => 'Añadir Nuevo'),
        'public'       => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-building', // Cambié a edificio (más acorde a proyectos)
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'trabajo'), 
        'show_in_rest' => true,
    );
    register_post_type('proyecto', $args);
}
add_action('init', 'semin_register_proyectos');


// =================================================================
// 2. REGISTRO DE SERVICIOS (NUEVO)
// =================================================================
function semin_register_servicios() {
    $args = array(
        'labels'       => array('name' => 'Servicios', 'singular_name' => 'Servicio', 'add_new' => 'Añadir Nuevo'),
        'public'       => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-hammer', // El martillo queda mejor aquí (Servicios Técnicos)
        
        // 'page-attributes' es CRÍTICO: Te permite usar el campo "Orden" (1, 2, 3...)
        'supports'     => array('title', 'editor', 'thumbnail', 'page-attributes'), 
        
        'rewrite'      => array('slug' => 'servicio'), 
        'show_in_rest' => true,
    );
    register_post_type('servicio', $args);
}
add_action('init', 'semin_register_servicios');


// =================================================================
// 3. GESTIÓN DE METABOXES (CAMPOS EXTRA)
// =================================================================
function semin_add_meta_boxes_global() {
    // Metabox para Proyectos: Cliente/Ubicación
    add_meta_box('proyecto_meta', 'Datos del Proyecto', 'semin_proyecto_callback', 'proyecto', 'side');

    // Metabox para Servicios: Icono (FontAwesome)
    add_meta_box('servicio_meta', 'Icono del Servicio', 'semin_servicio_callback', 'servicio', 'side');
}
add_action('add_meta_boxes', 'semin_add_meta_boxes_global');


// --- CALLBACK: PROYECTOS ---
function semin_proyecto_callback($post) {
    $val = get_post_meta($post->ID, '_semin_ubicacion', true);
    echo '<label><strong>Cliente / Ubicación:</strong></label>';
    echo '<input type="text" name="semin_ubicacion" value="' . esc_attr($val) . '" placeholder="Ej: Cerro Verde, Arequipa" style="width:100%; margin-top:5px;">';
}

// --- CALLBACK: SERVICIOS ---
function semin_servicio_callback($post) {
    $val = get_post_meta($post->ID, '_semin_servicio_icono', true);
    // Si está vacío, sugerimos uno por defecto
    if(empty($val)) $val = 'fas fa-cogs'; 
    
    echo '<label><strong>Clase del Icono (FontAwesome):</strong></label>';
    echo '<input type="text" name="semin_servicio_icono" value="' . esc_attr($val) . '" style="width:100%; margin-top:5px;">';
    echo '<p style="font-size:12px; color:#666; margin-top:5px;">Ejemplos: <code>fas fa-bolt</code>, <code>fas fa-wrench</code>, <code>fas fa-hard-hat</code>.</p>';
}


// =================================================================
// 4. GUARDADO DE DATOS (SAVE POST)
// =================================================================
function semin_save_metas_global($post_id) {
    
    // Evitar auto-guardados
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Guardar Meta de Proyectos
    if (isset($_POST['semin_ubicacion'])) {
        update_post_meta($post_id, '_semin_ubicacion', sanitize_text_field($_POST['semin_ubicacion']));
    }

    // Guardar Meta de Servicios
    if (isset($_POST['semin_servicio_icono'])) {
        update_post_meta($post_id, '_semin_servicio_icono', sanitize_text_field($_POST['semin_servicio_icono']));
    }
}
add_action('save_post', 'semin_save_metas_global');