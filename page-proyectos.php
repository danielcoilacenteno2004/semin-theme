<?php
/* Template Name: Proyectos - Galería Semin Grid */
get_header(); 

// 1. CONFIGURACIÓN
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Imagen destacada de la página
?>

<main class="proyectos-page">

    <section class="hero-proyectos" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="hero-overlay">
            <div class="container hero-content">
                <h1 class="hero-title">Portafolio de Proyectos</h1>
                <div class="breadcrumbs">
                    <a href="<?php echo home_url(); ?>">Inicio</a> <span class="sep">></span> <span>Proyectos</span>
                </div>
            </div>
        </div>
    </section>

    <section class="projects-section">
        <div class="container">
            <div class="projects-list">
                
                <?php 
                // CONSULTA A LA BASE DE DATOS: Traer todos los 'proyecto'
                $args = array(
                    'post_type'      => 'proyecto',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $query = new WP_Query($args);

                if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
                        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $ubicacion = get_post_meta(get_the_ID(), '_semin_ubicacion', true);
                        $content = get_the_content();
                        if ( empty($content) ) {
                            $content = get_the_excerpt();
                        }
                ?>

                <article class="project-item-card">
                    <div class="project-info">
                        <?php if(!empty($ubicacion)): ?>
                            <span class="proj-tag"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($ubicacion); ?></span>
                        <?php endif; ?>
                        
                        <h2 class="project-item-title"><?php the_title(); ?></h2>
                        
                        <div class="project-item-desc">
                            <?php echo apply_filters('the_content', $content); ?>
                        </div>
                    </div>
                    
                    <div class="project-media">
                        <?php if($img): ?>
                            <img src="<?php echo esc_url($img); ?>" alt="<?php the_title(); ?>" class="project-item-img">
                        <?php else: ?>
                            <div class="project-item-placeholder">
                                <i class="fas fa-building"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>

                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                else: 
                ?>
                    <p style="text-align:center; width:100%; color:#888; padding: 40px 0;">No hay proyectos cargados aún. Ve al escritorio > Proyectos para añadir uno.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <section class="cta-strip">
        <div class="container">
            <h2 style="color:white; font-size:2rem; font-weight:700; margin-bottom:10px;">¿Tiene un desafío similar?</h2>
            <a href="<?php echo home_url('/contacto'); ?>" class="btn-outline-white">Contactar Ahora</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>