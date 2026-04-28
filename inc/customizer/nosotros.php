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

    // ========================================================
    // NUEVA SECCIÓN: CLIENTES
    // ========================================================
    $wp_customize->add_section('semin_nosotros_clientes', array(
        'title'    => '🤝 Nosotros: Nuestros Clientes',
        'panel'    => 'semin_panel_pages',
        'priority' => 21,
    ));

    // Setting para clientes (guardará array JSON)
    $wp_customize->add_setting('semin_clientes_nosotros', array(
        'default'           => array(),
        'sanitize_callback' => 'semin_sanitize_clientes_array',
        'transport'         => 'refresh',
    ));

    // Control personalizado repetidor
    $wp_customize->add_control(new Semin_Clientes_Repeater_Control(
        $wp_customize,
        'semin_clientes_nosotros',
        array(
            'label'       => 'Agregar Clientes',
            'description' => 'Agrega logos y nombres de clientes. Puedes agregar tantos como quieras.',
            'section'     => 'semin_nosotros_clientes',
            'settings'    => 'semin_clientes_nosotros',
        )
    ));
}

/**
 * Control Personalizado: Repetidor de Clientes
 */
if (!class_exists('Semin_Clientes_Repeater_Control')) {
    class Semin_Clientes_Repeater_Control extends WP_Customize_Control {
        public $type = 'semin-clientes-repeater';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            </label>

            <div class="semin-clientes-repeater-container">
                <?php
                $clientes = get_theme_mod('semin_clientes_nosotros', array());
                if (!is_array($clientes)) {
                    $clientes = array();
                }
                
                foreach ($clientes as $index => $cliente) {
                    echo $this->render_cliente_item($index, $cliente);
                }
                ?>
            </div>

            <button type="button" class="button button-primary semin-add-cliente" style="margin-top: 15px;">
                + Agregar Cliente
            </button>

            <style>
                .semin-clientes-repeater-container { margin: 20px 0; }
                .semin-cliente-item { 
                    background: #f5f5f5; 
                    padding: 15px; 
                    margin: 10px 0; 
                    border: 1px solid #ddd; 
                    border-radius: 4px;
                }
                .semin-cliente-item input { width: 100%; margin: 8px 0; padding: 8px; border: 1px solid #ccc; border-radius: 3px; }
                .semin-cliente-item .button { margin-right: 10px; margin-bottom: 10px; }
                .semin-cliente-logo-preview { max-width: 100px; margin-top: 10px; margin-right: 10px; }
                .semin-cliente-remove { 
                    background: #dc3545 !important; 
                    color: white !important; 
                    border: none !important;
                }
                .semin-cliente-remove:hover { background: #c82333 !important; }
            </style>

            <script>
            jQuery(document).ready(function($) {
                // Agregar nuevo cliente
                $(document).on('click', '.semin-add-cliente', function(e) {
                    e.preventDefault();
                    var newIndex = $('.semin-cliente-item').length;
                    var newItem = `
                        <div class="semin-cliente-item">
                            <input type="text" class="cliente-nombre" placeholder="Nombre del cliente" value="">
                            <button type="button" class="button semin-upload-logo" data-index="${newIndex}">
                                Cargar Logo
                            </button>
                            <input type="hidden" class="cliente-logo" value="">
                            <img class="semin-cliente-logo-preview cliente-logo-preview" src="" style="display: none;">
                            <button type="button" class="button button-secondary semin-cliente-remove">
                                Eliminar
                            </button>
                        </div>
                    `;
                    $('.semin-clientes-repeater-container').append(newItem);
                });

                // Eliminar cliente
                $(document).on('click', '.semin-cliente-remove', function(e) {
                    e.preventDefault();
                    $(this).closest('.semin-cliente-item').remove();
                    semin_update_clientes_setting();
                });

                // Cargar logo
                $(document).on('click', '.semin-upload-logo', function(e) {
                    e.preventDefault();
                    var button = $(this);
                    var frame = wp.media({
                        title: 'Seleccionar Logo del Cliente',
                        button: { text: 'Usar este logo' },
                        multiple: false,
                    });

                    frame.on('select', function() {
                        var attachment = frame.state().get('selection').first().toJSON();
                        button.siblings('.cliente-logo').val(attachment.url);
                        button.siblings('.cliente-logo-preview')
                            .attr('src', attachment.url)
                            .show();
                        semin_update_clientes_setting();
                    });

                    frame.open();
                });

                // Actualizar nombre
                $(document).on('change', '.cliente-nombre', function() {
                    semin_update_clientes_setting();
                });

                // Guardar datos en setting
                function semin_update_clientes_setting() {
                    var clientes = [];
                    $('.semin-cliente-item').each(function() {
                        clientes.push({
                            nombre: $(this).find('.cliente-nombre').val(),
                            logo: $(this).find('.cliente-logo').val(),
                        });
                    });
                    
                    wp.customize('semin_clientes_nosotros', function(obj) {
                        obj.set(clientes);
                    });
                }
            });
            </script>
            <?php
        }

        private function render_cliente_item($index, $cliente) {
            $nombre = isset($cliente['nombre']) ? esc_attr($cliente['nombre']) : '';
            $logo = isset($cliente['logo']) ? esc_url($cliente['logo']) : '';
            $logo_display = $logo ? 'inline-block' : 'none';

            return "
                <div class='semin-cliente-item'>
                    <input type='text' class='cliente-nombre' placeholder='Nombre del cliente' value='{$nombre}'>
                    <button type='button' class='button semin-upload-logo' data-index='{$index}'>
                        Cargar Logo
                    </button>
                    <input type='hidden' class='cliente-logo' value='{$logo}'>
                    <img class='semin-cliente-logo-preview cliente-logo-preview' src='{$logo}' style='display: {$logo_display};'>
                    <button type='button' class='button button-secondary semin-cliente-remove'>
                        Eliminar
                    </button>
                </div>
            ";
        }
    }
}

/**
 * Sanitizar array de clientes
 */
function semin_sanitize_clientes_array($value) {
    if (!is_array($value)) {
        return array();
    }

    $sanitized = array();
    foreach ($value as $cliente) {
        if (is_array($cliente)) {
            $sanitized[] = array(
                'nombre' => sanitize_text_field($cliente['nombre'] ?? ''),
                'logo'   => esc_url_raw($cliente['logo'] ?? ''),
            );
        }
    }

    return $sanitized;
}