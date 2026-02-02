<?php
/*
Template Name: Página de Contacto
*/
get_header(); 

// 1. Recuperar datos ESPECÍFICOS de esta página
$titulo      = get_theme_mod('contacto_titulo', 'Contáctanos');
$info_title  = get_theme_mod('contacto_info_title', 'Información de Contacto'); // Nuevo
$info_desc   = get_theme_mod('contacto_info_desc', 'Estamos listos para atender sus requerimientos energéticos.'); // Nuevo
$direccion   = get_theme_mod('contacto_direccion', 'Parque Industrial, Arequipa - Perú'); // Nuevo
$mapa_iframe = get_theme_mod('contacto_mapa'); 
$form_code   = get_theme_mod('contacto_shortcode');

// 2. Recuperar datos GLOBALES (Del panel Global)
$telefono_txt = get_theme_mod('contact_phone_text', '923 494 455');
$email_txt    = get_theme_mod('contact_email_text', 'ventas@semin.pe');
?>

<div class="page-header" style="background: #002850; color: white; padding: 60px 0; text-align: center;">
    <div class="container">
        <h1><?php echo esc_html($titulo); ?></h1>
    </div>
</div>

<section class="contact-content section-padding" style="padding: 60px 0;">
    <div class="container">
        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px;">
            
            <div class="contact-info">
                
                <h3><?php echo esc_html($info_title); ?></h3>
                <p><?php echo nl2br(esc_html($info_desc)); ?></p>
                
                <ul style="list-style: none; padding: 0; margin-top: 30px; font-size: 1.1rem;">
                    
                    <li style="margin-bottom: 15px;">
                        <i class="fas fa-map-marker-alt" style="color: #004481; width: 25px;"></i> 
                        <?php echo esc_html($direccion); ?>
                    </li>
                    
                    <li style="margin-bottom: 15px;">
                        <i class="fas fa-phone" style="color: #004481; width: 25px;"></i> 
                        <?php echo esc_html($telefono_txt); ?>
                    </li>
                    
                    <li style="margin-bottom: 15px;">
                        <i class="fas fa-envelope" style="color: #004481; width: 25px;"></i> 
                        <?php echo esc_html($email_txt); ?>
                    </li>
                </ul>

                <div class="map-container" style="margin-top: 40px; border: 2px solid #eee;">
                    <?php 
                    if ($mapa_iframe) {
                        echo $mapa_iframe; 
                    } else {
                        echo '<p style="background:#f4f4f4; padding:20px; text-align:center; color:#777;">
                                📍 <strong>Mapa no configurado</strong><br>
                                <small>Pega el iframe en Personalizar > Páginas Internas > Contacto</small>
                              </p>';
                    }
                    ?>
                </div>
                
                <style>
                    .map-container iframe { width: 100% !important; height: 300px !important; }
                    @media(max-width: 768px) { .contact-grid { grid-template-columns: 1fr !important; } }
                </style>
            </div>

            <div class="contact-form-wrapper" style="background: #f9f9f9; padding: 40px; border-radius: 8px;">
                <h3>Envíenos un mensaje</h3>
                
                <?php if ($form_code): ?>
                    <div class="semin-form-style">
                        <?php echo do_shortcode($form_code); ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" style="background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeeba;">
                        <strong>⚠️ Falta el Formulario</strong><br>
                        Instala "Contact Form 7", crea un formulario y pega el shortcode en:<br>
                        <em>Personalizar > Páginas Internas > Contacto</em>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>