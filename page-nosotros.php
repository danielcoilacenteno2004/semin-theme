<?php
/* Template Name: Nosotros - Estilo Modasa */
get_header(); 

// --- 1. LÓGICA PHP ---
$hero_bg    = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
$img_inge   = get_theme_mod('semin_img_ingeniero'); 
$img_taller = get_theme_mod('semin_img_taller');

// Fallbacks
if (empty($img_taller)) $img_taller = get_template_directory_uri() . '/img/semin-taller-principal.jpg';
if (empty($img_inge)) $img_inge = 'https://via.placeholder.com/500x600?text=Sube+Foto+en+Personalizar';
?>

<main class="nosotros-modasa">

    <section class="page-hero-pro" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="container hero-content">
            <h1 class="hero-title"><?php the_title(); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo home_url(); ?>">Inicio</a> <span class="sep">></span> <span>Nosotros</span>
            </div>
        </div>
    </section>

    <section class="section-pro historia-modasa">
        <div class="container grid-modasa-historia">
            <div class="historia-texto">
                <h4 style="color:#00a8e8; font-weight:700; letter-spacing:1px; margin-bottom:10px;">NUESTRA TRAYECTORIA</h4>
                <h2 class="modasa-title">Más de 30 años de <br><span class="text-cyan">Innovación y Energía</span></h2>
                <div class="modasa-line"></div>
                <p>Nacimos en Arequipa para responder a la demanda crítica de energía en la minería y gran industria. Hoy, SEMIN S.R.L. es sinónimo de continuidad operativa, especializándonos en Ingeniería de Detalle, Automatización y Mantenimiento de Activos de Generación.</p>
                <p>Nuestra capacidad técnica nos permite ejecutar desde el reflotamiento de grupos electrógenos de alta potencia (hasta 5 MW) hasta la fabricación de tableros de transferencia (TTA) y sincronismo. Mantenemos una cadena de suministro robusta con marcas líderes como Cummins, Perkins y Volvo, garantizando repuestos genuinos y soporte certificado allí donde otros no llegan.</p>
                
                <a href="<?php echo home_url('/contacto'); ?>" class="btn-modasa-blue">SOLICITAR ASESORÍA &rarr;</a>
            </div>
            <div class="historia-imagen">
                <img src="<?php echo esc_url($img_inge); ?>" alt="Ingeniero Semin">
            </div>
        </div>
    </section>

    <section class="modasa-split-section">
        <div class="split-image" style="background-image: url('<?php echo esc_url($img_taller); ?>');"></div>
        
        <div class="split-content">
            <div class="content-wrapper">
                <div class="mv-block">
                    <h3>Visión</h3>
                    <p>Ser líderes en el mercado peruano de
                        energía industrial, reconocidos por la
                        excelencia de nuestros servicios y la
                        satisfacción de nuestros clientes.</p>
                </div>
                <div class="mv-block">
                    <h3>Misión</h3>
                    <p>Ofrecer soluciones energéticas a
                        nuestros clientes, brindándoles un
                        servicio de respaldo energético
                        confiable y de alta calidad.</p>
                </div>
                </div>
        </div>

        <div class="floating-card">
            <h3>Talento, esfuerzo y dedicación.</h3>
            <h3 class="text-cyan">Ingenieros comprometidos.</h3>
            <div class="card-line"></div>
        </div>
    </section>

    <section class="section-pro valores-modasa">
        <div class="container" style="text-align:center;">
            <h2 class="modasa-title" style="margin-bottom:60px;">Nuestros Valores</h2>
            <div class="grid-rombos">
                <div class="rombo-item">
                    <div class="rombo-shape"><i class="fas fa-shield-alt"></i></div>
                    <h4>Seguridad</h4>
                    <p>Nuestra licencia para operar. Cero accidentes es la única meta aceptable.</p>
                </div>
                <div class="rombo-item">
                    <div class="rombo-shape"><i class="fas fa-cogs"></i></div>
                    <h4>Excelencia</h4>
                    <p>No solo reparamos, mejoramos el rendimiento original del equipo.</p>
                </div>
                <div class="rombo-item">
                    <div class="rombo-shape"><i class="fas fa-handshake"></i></div>
                    <h4>Integridad</h4>
                    <p>Diagnósticos transparentes. Sin costos ocultos ni sorpresas técnicas.</p>
                </div>
                <div class="rombo-item">
                    <div class="rombo-shape"><i class="fas fa-bolt"></i></div>
                    <h4>Rapidez</h4>
                    <p>Entendemos que cada minuto sin energía cuesta dinero. Actuamos ya.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>