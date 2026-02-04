<?php
/* Template Name: Servicios - Semin Master */
get_header(); 

// 1. RECUPERAR IMÁGENES GLOBALES (Personalizador)
// Hero Background: Usa la imagen destacada de la página
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');

// Imágenes Secundarias
$img_taller = get_theme_mod('semin_img_capacidades', 'https://via.placeholder.com/800x600?text=Foto+Taller+Semin');
$img_powergy = get_theme_mod('semin_img_powergy', get_template_directory_uri() . '/img/logo-powergy.png'); 
?>

<main class="servicios-master">

    <section class="hero-master" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="container hero-content">
            <h1 class="hero-title">Soluciones de Potencia <br> y Continuidad Operativa</h1>
            <p class="hero-desc">Ingeniería especializada en Generación, Automatización y Mantenimiento para la gran minería e industria del sur del Perú.</p>
        </div>
    </section>

    <section class="intro-section">
        <div class="container">
            <div class="section-head">
                <h2>Respaldo Total al Cliente</h2>
                <div class="divider"></div>
                <p>En SEMIN, entendemos que cada minuto de inactividad cuesta. Por eso, hemos diseñado un ecosistema de servicios que cubre desde la venta del equipo hasta el soporte post-venta.</p>
            </div>

            <div class="main-services-grid">
                <?php 
                // CONSULTA DINÁMICA DE SERVICIOS
                $args = array(
                    'post_type'      => 'servicio',
                    'posts_per_page' => -1, // Traer TODOS los servicios
                    'orderby'        => 'menu_order', // Orden manual definido en admin
                    'order'          => 'ASC'
                );
                $servicios_query = new WP_Query($args);
                $count = 1; // Para el número decorativo (01, 02...)

                if ($servicios_query->have_posts()) :
                    while ($servicios_query->have_posts()) : $servicios_query->the_post();
                        
                        // Imagen: Si no hay destacada, usa placeholder
                        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if(empty($thumb)) $thumb = 'https://via.placeholder.com/600x800?text=Servicio+Semin';
                ?>
                    
                    <article class="master-card">
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                        
                        <div class="master-overlay">
                            <span class="card-num"><?php echo sprintf("%02d", $count); ?></span>
                            
                            <h3><?php the_title(); ?></h3>
                            
                            <div style="opacity:0.9; line-height:1.6; margin-bottom:20px; color:#ddd;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                            
                            <a href="<?php echo home_url('/contacto'); ?>" class="master-btn">Cotizar Servicio &rarr;</a>
                        </div>
                    </article>

                <?php 
                    $count++; 
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback si no hay servicios creados
                    echo '<p style="text-align:center; padding:40px; color:#888;">No hay servicios registrados. Ve al Panel > Servicios para agregar.</p>';
                endif; 
                ?>
            </div>
        </div>
    </section>

    <section class="capabilities-section">
        <div class="container">
            <div class="cap-grid">
                <div class="cap-image">
                    <img src="<?php echo esc_url($img_taller); ?>" alt="Taller Semin" style="border-radius: 8px; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                </div>
                <div class="cap-content">
                    <h5 style="color:#00a8e8; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">Nuestras Capacidades</h5>
                    <h2 style="font-size:2.2rem; color:#003366; font-weight:800; margin-bottom:40px;">Ingeniería de Detalle y Taller Especializado</h2>
                    <ul class="cap-list">
                        <li class="cap-item">
                            <div class="cap-icon"><i class="fas fa-tools"></i></div>
                            <div class="cap-text">
                                <h4>Overhaul de Motores</h4>
                                <p>Recuperamos la potencia original. Rectificación, cambio de kits, camisas y pistones bajo normativa.</p>
                            </div>
                        </li>
                        <li class="cap-item">
                            <div class="cap-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="cap-text">
                                <h4>Pruebas con Banco de Carga</h4>
                                <p>Certificamos el funcionamiento real simulando cargas escalonadas al 110%.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="parts-section">
        <div class="container">
            <div class="parts-header">
                <h2>Repuestos y Suministros Genuinos</h2>
                <p style="opacity:0.8; max-width:600px; margin:0 auto;">Mantenga la garantía de sus equipos. Visite nuestra división especializada en venta de suministros: Filtración, Lubricantes y Electrónica.</p>
            </div>
            
            <div class="powergy-container">
                <div class="powergy-img">
                     <img src="<?php echo esc_url($img_powergy); ?>" alt="Powergy">
                </div>
                <div class="powergy-action">
                    <a href="https://powergy.pe" target="_blank" class="btn-powergy">
                        Visitar Powergy.pe <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </section>

    <section class="cta-strip">
        <div class="container">
            <h2 style="color:white; font-weight:800; margin-bottom:10px;">¿Emergencia en Planta?</h2>
            <p style="color:rgba(255,255,255,0.9); margin-bottom:30px; font-size:1.1rem;">Nuestro equipo de guardia técnica está disponible las 24 horas.</p>
            <a href="https://wa.me/51923494455" class="cta-btn-white"><i class="fab fa-whatsapp"></i> Contactar Soporte</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>