<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 
    // Recuperamos los datos
    $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $ubicacion = get_post_meta(get_the_ID(), '_semin_ubicacion', true);
?>

<section class="project-hero" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
    <div class="project-hero-overlay">
        <div class="container">
            <?php if($ubicacion): ?>
                <span class="hero-tag"><?php echo esc_html($ubicacion); ?></span>
            <?php endif; ?>
            
            <h1 class="project-title"><?php the_title(); ?></h1>
            
            <div class="breadcrumbs">
                <a href="<?php echo home_url('/proyectos'); ?>">Proyectos</a> > <span><?php the_title(); ?></span>
            </div>
        </div>
    </div>
</section>

<section class="project-content-section">
    <div class="container container-narrow">
        
        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <div class="project-navigation">
            <a href="<?php echo home_url('/proyectos'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Volver al Portafolio
            </a>
        </div>

    </div>
</section>

<?php endwhile; ?>

<style>
    /* Hero Detalle */
    .project-hero {
        height: 60vh; min-height: 400px;
        background-size: cover; background-position: center;
        position: relative;
    }
    .project-hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(0deg, #003366 0%, rgba(0,51,102,0.4) 100%);
        display: flex; align-items: flex-end; padding-bottom: 60px;
    }
    .hero-tag {
        background: #00a8e8; color: white; padding: 5px 15px;
        font-weight: 700; text-transform: uppercase; font-size: 0.9rem;
        border-radius: 4px; display: inline-block; margin-bottom: 15px;
    }
    .project-title {
        color: white; font-size: 3rem; font-weight: 800; margin: 0 0 10px 0; line-height: 1.1;
    }
    .breadcrumbs { color: rgba(255,255,255,0.7); }
    .breadcrumbs a { color: white; text-decoration: none; }

    /* Contenido */
    .project-content-section { padding: 80px 0; background: white; }
    .container-narrow { max-width: 900px; margin: 0 auto; padding: 0 20px; }

    /* Estilos del texto (Tipografía limpia) */
    .entry-content p { font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px; }
    .entry-content h2 { color: #003366; font-weight: 700; margin-top: 40px; margin-bottom: 20px; }
    .entry-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 20px 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .entry-content ul { margin-bottom: 20px; padding-left: 20px; }
    .entry-content li { margin-bottom: 10px; color: #555; }

    /* Botón Volver */
    .project-navigation { margin-top: 60px; border-top: 1px solid #eee; padding-top: 40px; }
    .btn-back {
        display: inline-flex; align-items: center; gap: 10px;
        color: #003366; font-weight: 700; text-decoration: none;
        transition: 0.3s;
    }
    .btn-back:hover { color: #00a8e8; transform: translateX(-5px); }
</style>

<?php get_footer(); ?>