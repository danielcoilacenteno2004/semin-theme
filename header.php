<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>

<header class="site-header">

    <?php 
    // 1. OBTENER DATOS DEL PERSONALIZADOR
    $email_txt  = get_theme_mod('contact_email_text', 'ventas@semin.pe');
    $email_link = get_theme_mod('contact_email_link', 'mailto:ventas@semin.pe');
    $phone_txt  = get_theme_mod('contact_phone_text', '923 494 455');
    $phone_link = get_theme_mod('contact_phone_link', 'https://wa.me/51923494455');
    $fb_url     = get_theme_mod('social_facebook');
    $li_url     = get_theme_mod('social_linkedin');
    ?>

    <div class="main-header">
        <div class="container main-header-content">
            <div class="logo">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<h1><a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></h1>';
                }
                ?>
            </div>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="<?php echo home_url(); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>">Inicio</a></li>
                    <li><a href="<?php echo home_url('/nosotros'); ?>" class="<?php echo is_page('nosotros') ? 'active' : ''; ?>">Nosotros</a></li>
                    <li><a href="<?php echo home_url('/servicios'); ?>" class="<?php echo is_page('servicios') ? 'active' : ''; ?>">Servicios</a></li>
                    <li><a href="<?php echo home_url('/proyectos'); ?>" class="<?php echo is_page('proyectos') ? 'active' : ''; ?>">Proyectos</a></li>
                    <li><a href="<?php echo home_url('/venta-de-grupos'); ?>" class="<?php echo is_page('venta-de-grupos') ? 'active' : ''; ?>">Venta de Grupos</a></li>
                    <li><a href="<?php echo home_url('/contacto'); ?>" class="<?php echo is_page('contacto') ? 'active' : ''; ?>">Contacto</a></li>
                </ul>
            </nav>

            <div class="header-icons">
                <a href="<?php echo esc_url($email_link); ?>" class="icon-link" aria-label="Enviar correo">
                    <i class="fas fa-envelope"></i>
                    <span class="sr-only"><?php echo esc_html($email_txt); ?></span>
                </a>

                <a href="<?php echo esc_url($phone_link); ?>" class="icon-link" aria-label="WhatsApp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    <span class="sr-only"><?php echo esc_html($phone_txt); ?></span>
                </a>

                <?php if ( !empty($fb_url) && $fb_url !== '#' ) : ?>
                    <a href="<?php echo esc_url($fb_url); ?>" target="_blank" class="icon-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                <?php endif; ?>

                <?php if ( !empty($li_url) && $li_url !== '#' ) : ?>
                    <a href="<?php echo esc_url($li_url); ?>" target="_blank" class="icon-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>