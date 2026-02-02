<?php
/* Template Name: Proyectos - Galería Semin Grid */
get_header(); 

// 1. CONFIGURACIÓN
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Imagen destacada de ESTA página (banner)
?>

<main class="proyectos-page">

    <section class="hero-proyectos" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="hero-overlay">
            <div class="container hero-content">
                <h1 class="hero-title">Portafolio de Proyectos</h1>
                <div class="hero-breadcrumbs">
                    <a href="<?php echo home_url(); ?>">Inicio</a> <span style="color:#00a8e8; margin:0 10px;">></span> Proyectos
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section">
        <div class="container">
            <div class="projects-grid">
                
                <?php 
                // CONSULTA A LA BASE DE DATOS: Traer todos los 'proyecto'
                $args = array(
                    'post_type' => 'proyecto',
                    'posts_per_page' => -1 // -1 significa "traer todos"
                );
                $query = new WP_Query($args);

                if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
                        // Variables de cada proyecto
                        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $ubicacion = get_post_meta(get_the_ID(), '_semin_ubicacion', true);
                        if(!$ubicacion) $ubicacion = "Proyecto Semin"; // Fallback
                ?>

                <article class="project-card" onclick="location.href='<?php the_permalink(); ?>'">
                    <span class="proj-tag"><?php echo esc_html($ubicacion); ?></span>
                    
                    <?php if($img): ?>
                        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title(); ?>" class="proj-img">
                    <?php else: ?>
                        <div class="proj-img-placeholder"></div>
                    <?php endif; ?>
                    
                    <div class="proj-overlay">
                        <h3><?php the_title(); ?></h3>
                        <div class="proj-desc">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                        <div class="proj-link">
                            Ver Caso Completo <i class="fas fa-arrow-right" style="margin-left:5px;"></i>
                        </div>
                    </div>
                </article>

                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                else: 
                ?>
                    <p style="text-align:center; width:100%;">No hay proyectos cargados aún. Ve al escritorio > Proyectos Semin para añadir uno.</p>
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

<style>
    /* Reset Base */
    .proyectos-page img { max-width: 100%; height: auto; display: block; }
    .proyectos-page .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; box-sizing: border-box; }

    /* Hero Banner */
    .hero-proyectos {
        height: 350px; 
        background-color: #003366; background-size: cover; background-position: center;
        position: relative; text-align: center;
    }
    .hero-overlay {
        position: absolute; top:0; left:0; width:100%; height:100%;
        background: linear-gradient(180deg, rgba(0,51,102,0.7) 0%, rgba(0,51,102,0.9) 100%);
        display: flex; align-items: center; justify-content: center;
    }
    .hero-title { font-size: 3rem; font-weight: 800; color: white; margin-bottom: 10px; }
    .hero-breadcrumbs { color: rgba(255,255,255,0.7); }
    .hero-breadcrumbs a { color: white; text-decoration: none; }

    /* Grid */
    .gallery-section { padding: 80px 0; background: #f4f8fb; }
    .projects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }

    /* --- TARJETA --- */
    .project-card {
        background: white; border-radius: 12px; overflow: hidden; position: relative;
        height: 400px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); cursor: pointer;
        border-bottom: 5px solid #00a8e8;
    }

    /* Imagen */
    .proj-img { 
        width: 100%; height: 100%; object-fit: cover; 
        transition: transform 0.8s ease; 
    }
    .project-card:hover .proj-img { transform: scale(1.05); /* Zoom muy leve */ }

    /* Etiqueta siempre visible */
    .proj-tag {
        position: absolute; top: 20px; right: 20px; 
        background: #00a8e8; color: white;
        padding: 5px 12px; border-radius: 4px; 
        font-weight: 700; font-size: 0.75rem; text-transform: uppercase;
        z-index: 2; box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    /* --- EL DEGRADADO (SOLUCIÓN SUAVE) --- */
    .proj-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%;
        
        /* 1. Degradado MUY ALTO y suave que no cambia de color */
        /* Va de azul oscuro abajo a transparente arriba */
        background: linear-gradient(to top, rgba(0,51,102,1) 0%, rgba(0,51,102,0.8) 40%, transparent 100%);
        
        padding: 40px 25px 25px; /* Espacio interno */
        display: flex; flex-direction: column; justify-content: flex-end;
        
        /* 2. Posición Inicial: Bajamos el panel para esconder el texto */
        /* El translate 65px esconde justo la descripción */
        transform: translateY(65px); 
        
        /* 3. Animación fluida */
        transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }

    /* Título */
    .proj-overlay h3 {
        color: white; font-size: 1.4rem; font-weight: 800; margin: 0 0 5px 0;
        text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        /* El título no se mueve internamente, se mueve con todo el panel */
    }

    /* Descripción */
    .proj-desc {
        color: rgba(255,255,255,0.85); font-size: 0.95rem; line-height: 1.5;
        margin-bottom: 15px; margin-top: 10px;
        
        /* Truco visual: La opacidad cambia un poco para que aparezca suave */
        opacity: 0.5; 
        transition: opacity 0.5s ease;
    }

    /* Enlace */
    .proj-link {
        color: #00a8e8; font-weight: 700; text-transform: uppercase; font-size: 0.85rem;
        opacity: 0; /* Empieza invisible */
        transition: opacity 0.3s ease;
    }

    /* --- ESTADO HOVER --- */
    
    /* Al pasar el mouse, el panel sube a su posición natural (0) */
    .project-card:hover .proj-overlay {
        transform: translateY(0);
        /* IMPORTANTE: NO cambiamos el background. Eso evita el "salto". */
    }

    /* Los textos se vuelven totalmente visibles */
    .project-card:hover .proj-desc { opacity: 1; }
    .project-card:hover .proj-link { opacity: 1; }

    /* CTA Final */
    .cta-strip { background: #003366; padding: 70px 0; text-align: center; }
    .btn-outline-white {
        display: inline-block; border: 2px solid rgba(255,255,255,0.3); color: white;
        padding: 12px 35px; font-weight: 700; text-decoration: none; border-radius: 4px; transition: 0.3s; margin-top: 20px;
    }
    .btn-outline-white:hover { border-color: #00a8e8; background: #00a8e8; color: white; }

    /* Responsive */
    @media (max-width: 768px) {
        .projects-grid { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.5rem; }
        .proj-overlay { transform: translateY(0); background: linear-gradient(to top, rgba(0,51,102,1) 0%, rgba(0,51,102,0.9) 60%, transparent 100%); }
        .proj-desc, .proj-link { opacity: 1; }
    }
</style>


<?php get_footer(); ?>