<?php 
get_header(); 

// --- 1. LÓGICA PHP (RECUPERACIÓN DE DATOS) ---

// A. Imagen Lateral "Sobre Nosotros"
$about_img = get_theme_mod('home_about_img', get_template_directory_uri() . '/img/semin-taller-principal.jpg');

// B. Imagen de Fondo Hero (Portada)
$filtro_azul = 'linear-gradient(rgba(0,68,129,0.7), rgba(0,40,80,0.8))';
$bg_image_url = get_theme_mod('hero_imagen_fondo');

if ( $bg_image_url ) {
    $estilo_fondo = 'background: ' . $filtro_azul . ', url(' . esc_url($bg_image_url) . ');';
} else {
    $estilo_fondo = 'background: ' . $filtro_azul . ';';
}
?>

<section class="hero-section" style="<?php echo $estilo_fondo; ?>">
    <div class="hero-content">
        <h1><?php echo esc_html(get_theme_mod('hero_titulo', 'Energía que Mueve tu Empresa')); ?></h1>
        <p><?php echo esc_html(get_theme_mod('hero_subtitulo', 'Especialistas en venta, alquiler y mantenimiento de grupos electrógenos en el sur del Perú.')); ?></p>
        <div class="hero-buttons">
            <a href="<?php echo esc_url(get_theme_mod('hero_btn_url', '#contacto')); ?>" class="btn btn-primary">
                Solicitar Cotización
            </a>
        </div>
    </div>
</section>


<section class="logos-section">
    <div class="container">
        <h3><?php echo esc_html(get_theme_mod('semin_brands_title', 'Especialistas en Marcas')); ?></h3>
        
        <div class="logos-grid">
            <?php 
            for ($i = 1; $i <= 5; $i++) {
                $img_url = get_theme_mod("semin_brand_logo_$i");
                if ( !empty($img_url) ) {
                    echo '<div class="logo-item"><img src="' . esc_url($img_url) . '" alt="Marca Motor"></div>';
                }
            }
            ?>
            
            <?php if(current_user_can('administrator') && !get_theme_mod('semin_brand_logo_1')): ?>
                <div style="border: 1px dashed #ccc; padding: 20px; width: 100%; color: #888; text-align: center;">
                    <small>⚠️ Administrador: Sube los logos en Personalizar > Inicio: Marcas</small>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="logos-section bg-light">
    <div class="container">
        <h3><?php echo esc_html(get_theme_mod('semin_allies_title', 'Nuestros Aliados')); ?></h3>
        
        <div class="logos-grid">
            <?php 
            for ($j = 1; $j <= 6; $j++) {
                $img_url = get_theme_mod("semin_ally_logo_$j");
                if ( !empty($img_url) ) {
                    echo '<div class="logo-item"><img src="' . esc_url($img_url) . '" alt="Aliado Estratégico"></div>';
                }
            }
            ?>
        </div>
    </div>
</section>


<section class="intro-section">
    <div class="container intro-grid">
        <div class="intro-text">
            <span class="subtitle">
                <?php echo esc_html(get_theme_mod('home_about_small', 'SOBRE SEMIN S.R.L.')); ?>
            </span>
            
            <h2>
                <?php echo esc_html(get_theme_mod('home_about_title', 'Expertos en Soluciones Energéticas Integrales')); ?>
            </h2>
            
            <div class="intro-desc">
                <p>
                    <?php echo nl2br(esc_html(get_theme_mod('home_about_desc', 'Con años de experiencia en el mercado de Arequipa y el sur del Perú...'))); ?>
                </p>
            </div>
            
            <br>
            <a href="<?php echo home_url('/nosotros'); ?>" class="btn-text">Más sobre nosotros &rarr;</a>
        </div>
        
        <div class="intro-image">
            <img src="<?php echo esc_url($about_img); ?>" alt="Equipo Semin" class="img-nosotros">
        </div>
    </div>
</section>


<section id="servicios" class="services-section">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html(get_theme_mod('home_sol_title', 'Nuestras Soluciones')); ?></h2>
            <hr>
            <p><?php echo esc_html(get_theme_mod('home_sol_subtitle', 'Cubrimos todo el ciclo de vida de su proyecto energético.')); ?></p>
        </div>
        
        <div class="services-grid">
            
            <div class="service-card">
                <h3><?php echo esc_html(get_theme_mod('home_s1_title', 'Venta de Grupos')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('home_s1_desc', 'Equipos encapsulados y abiertos para prime y standby.')); ?></p>
            </div>
            
            <div class="service-card">
                <h3><?php echo esc_html(get_theme_mod('home_s2_title', 'Alquiler de Flota')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('home_s2_desc', 'Alquiler de generadores por horas, días o meses.')); ?></p>
            </div>
            
            <div class="service-card">
                <h3><?php echo esc_html(get_theme_mod('home_s3_title', 'Mantenimiento')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('home_s3_desc', 'Servicio preventivo y correctivo (Overhaul).')); ?></p>
            </div>
            
            <div class="service-card">
                <h3><?php echo esc_html(get_theme_mod('home_s4_title', 'Tableros y Automatización')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('home_s4_desc', 'Fabricación de Tableros de Transferencia (TTA).')); ?></p>
            </div>
            
        </div>
    </div>
</section>


<section class="cta-section">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('home_cta_title', '¿Necesita energía inmediata para su proyecto?')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('home_cta_sub', 'Nuestro equipo de ingenieros está listo para asesorarlo.')); ?></p>
        
        <?php $whatsapp = get_theme_mod('contact_phone_link', 'https://wa.me/51923494455'); ?>
        
        <a href="<?php echo esc_url($whatsapp); ?>" class="btn btn-primary btn-large" target="_blank">
            Contactar por WhatsApp
        </a>
    </div>
</section>

<?php get_footer(); ?>