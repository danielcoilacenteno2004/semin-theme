<?php
/* Template Name: Venta Grupos - Brochure */
get_header(); 

// 1. DATOS DEL HERO (Imagen Destacada)
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');

// 2. DATOS DEL BROCHURE (Desde el Personalizador)
$pdf_url = get_theme_mod('semin_brochure_file', '#');
$cover_img = get_theme_mod('semin_brochure_cover', ''); // Foto portada catalogo
$brochure_title = get_theme_mod('semin_brochure_title', 'Catálogo General 2026');
?>

<main>

    <section class="hero-grupos" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1><?php the_title(); ?></h1>
            <p class="hero-subtitle">Potencia y Respaldo para la Industria</p>
        </div>
    </section>

    <section class="grupos-editorial">
        <div class="container">
            <div class="editorial-grid">
                
                <div class="editorial-text">
                    <?php 
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; 
                    ?>
                </div>

                <div class="benefits-sidebar">
                    <div class="benefit-card">
                        <i class="fas fa-certificate"></i>
                        <h4>Garantía Real</h4>
                        <p>Equipos originales con respaldo de fábrica.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-shipping-fast"></i>
                        <h4>Entrega Inmediata</h4>
                        <p>Stock disponible en Arequipa y Lima.</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-tools"></i>
                        <h4>Soporte Técnico</h4>
                        <p>Mantenimiento y repuestos asegurados.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="brochure-download">
        <div class="container">
            <div class="download-box">
                
                <div class="download-info">
                    <span class="tag">DOCUMENTACIÓN TÉCNICA</span>
                    <h2><?php echo esc_html($brochure_title); ?></h2>
                    <p>Descargue la ficha técnica completa con tablas de potencia, dimensiones, consumo de combustible y especificaciones de alternadores.</p>
                    
                    <?php if( $pdf_url ): ?>
                        <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="btn btn-download">
                            <i class="fas fa-file-pdf"></i> Descargar PDF
                        </a>
                    <?php else: ?>
                        <p style="color:red; font-size:0.8rem;">⚠️ (Sube el PDF en Personalizar > Venta/Brochure)</p>
                    <?php endif; ?>
                </div>

                <div class="download-img">
                    <?php if($cover_img): ?>
                        <img src="<?php echo esc_url($cover_img); ?>" alt="Portada Catálogo Semin">
                    <?php else: ?>
                        <div style="width:200px; height:280px; background:#ddd; display:flex; align-items:center; justify-content:center; color:#888;">
                            FOTO
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>