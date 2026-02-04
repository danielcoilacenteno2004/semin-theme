<?php
/* Template Name: Nosotros - Estilo Modasa */
get_header(); 

// --- 1. LÓGICA PHP ---
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
$img_inge   = get_theme_mod('semin_img_ingeniero'); 
$img_taller = get_theme_mod('semin_img_taller');

// Fallbacks
if (empty($img_taller)) $img_taller = get_template_directory_uri() . '/img/semin-taller-principal.jpg';
if (empty($img_inge)) $img_inge = 'https://via.placeholder.com/500x600?text=Sube+Foto+en+Personalizar';
?>

<style>
    /* --- Estructura Base --- */
    .nosotros-modasa img { max-width: 100%; height: auto; display: block; }
    .nosotros-modasa .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; box-sizing: border-box; }
    
    /* --- Hero Banner --- */
    .page-hero-pro {
        padding: 140px 0 80px;
        background-color: #003366;
        background-size: cover; background-position: center;
        text-align: center; position: relative;
    }
    .page-hero-pro::before {
        content: ''; position: absolute; top:0; left:0; width:100%; height:100%;
        background: rgba(0, 51, 102, 0.85);
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-title { font-size: 3rem; font-weight: 800; color: white; margin-bottom: 10px; text-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    .breadcrumbs { font-size: 1rem; color: rgba(255,255,255,0.8); font-weight: 600; }
    .breadcrumbs a { color: white; text-decoration: none; }

    /* --- Historia --- */
    .section-pro { padding: 80px 0; background: #fff; }
    .grid-modasa-historia { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
    
    .modasa-title { font-size: 2.5rem; font-weight: 800; color: #003366; line-height: 1.1; margin-bottom: 25px; }
    .text-cyan { color: #00a8e8; }
    .modasa-line { width: 80px; height: 5px; background: #00a8e8; margin-bottom: 30px; }
    
    .btn-modasa-blue {
        display: inline-block; background: #003366; color: white; padding: 15px 35px;
        text-decoration: none; font-weight: 700; border-radius: 4px; margin-top: 25px; transition: 0.3s;
    }
    .btn-modasa-blue:hover { background: #00a8e8; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,168,232,0.4); }
    .historia-imagen img { border-radius: 8px; box-shadow: 20px 20px 0px rgba(0,168,232,0.1); }

    /* --- SECCIÓN SPLIT (SOLUCIÓN DEFINITIVA) --- */
    .modasa-split-section { display: flex; flex-wrap: wrap; position: relative; width: 100%; }
    
    .split-image { 
        width: 50%; background-size: cover; background-position: center; min-height: 600px; 
        background-color: #ccc; 
    }
    
    .split-content { 
        width: 50%; 
        background: linear-gradient(135deg, #00a8e8 0%, #008ec4 100%);
        /* FIX 1: Padding izquierdo AUMENTADO a 240px. 
           Esto crea un carril de seguridad gigante para la tarjeta. */
        padding: 80px 60px 80px 240px; 
        color: white; display: flex; align-items: center; box-sizing: border-box;
    }
    
    .mv-block { margin-bottom: 40px; border-left: 3px solid rgba(255,255,255,0.3); padding-left: 20px; }
    .mv-block h3 { font-size: 1.6rem; font-weight: 700; margin-bottom: 10px; color: #fff; }
    .mv-block p { font-size: 1rem; opacity: 0.95; line-height: 1.6; margin: 0; }
    .policy-tags span { display: inline-block; background: rgba(0,0,0,0.2); padding: 6px 15px; border-radius: 30px; font-size: 0.85rem; margin: 5px 5px 0 0; font-weight: 600; }

    /* --- Tarjeta Flotante --- */
    .floating-card {
        position: absolute; 
        top: 50%; left: 50%; 
        transform: translate(-50%, -50%); 
        background: white; 
        padding: 45px; 
        width: 380px; 
        box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        z-index: 10; 
        border-left: 8px solid #003366; 
    }
    .floating-card h3 { color: #003366; margin: 0; font-size: 1.6rem; font-weight: 800; line-height: 1.2; }
    .card-line { width: 100%; height: 2px; background: #eee; margin-top: 25px; position: relative; }
    .card-line::after { content:''; position: absolute; left:0; top:0; width:60px; height:2px; background: #00a8e8; }

    /* --- Valores --- */
    .valores-modasa { background-color: #f4f8fb; }
    .grid-rombos { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; }
    .rombo-item { text-align: center; transition: transform 0.3s ease; padding: 20px 10px; }
    .rombo-item:hover { transform: translateY(-10px); }
    .rombo-shape { 
        width: 90px; height: 90px; background: linear-gradient(135deg, #003366 0%, #001a33 100%);
        margin: 0 auto 35px; transform: rotate(45deg); display: flex; align-items: center; justify-content: center;
        box-shadow: 0 15px 30px rgba(0,51,102, 0.3); border: 4px solid white; outline: 2px solid #00a8e8;
    }
    .rombo-shape i { transform: rotate(-45deg); color: white; font-size: 2rem; text-shadow: 0 2px 5px rgba(0,0,0,0.5); }
    .rombo-item h4 { color: #003366; font-weight: 800; font-size: 1.2rem; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; }
    .rombo-item p { color: #555; font-size: 0.95rem; line-height: 1.5; }

    /* --- FIX 2: RESPONSIVE AGRESIVO (Hasta 1400px) --- */
    /* Si la pantalla mide menos de 1400px (Laptops), cambiamos el diseño para que NO choque */
    @media (max-width: 1400px) {
        .modasa-split-section { flex-direction: column; }
        .split-image, .split-content { width: 100%; }
        .split-image { height: 400px; }
        
        /* Quitamos el padding gigante izquierdo */
        .split-content { padding: 70px 40px !important; } 
        
        /* La tarjeta se pone encima de la foto (estilo vertical) */
        .floating-card { 
            position: relative; 
            top: 0; left: 0; 
            transform: none; 
            width: 90%; 
            max-width: 500px;
            margin: -60px auto 30px; /* Sube sobre la foto */
        }
        
        .grid-modasa-historia { grid-template-columns: 1fr; gap: 40px; }
        .grid-rombos { grid-template-columns: 1fr 1fr; gap: 50px; }
    }
    
    @media (max-width: 600px) {
        .grid-rombos { grid-template-columns: 1fr; }
        .hero-title { font-size: 2rem; }
        .historia-imagen { order: -1; margin-bottom: 20px; }
    }
</style>

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
                <p>SEMIN S.R.L. inició sus actividades respondiendo a la demanda crítica del sector minero en el sur del Perú. Nos especializamos en la <strong>ingeniería de detalle</strong> que mantiene a la industria en movimiento.</p>
                <p>Hemos consolidado alianzas estratégicas que nos permiten ofrecer soporte certificado para marcas globales como Cummins y Perkins en geografías complejas.</p>
                
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
                    <h3>Visión Corporativa</h3>
                    <p>Ser la referencia técnica indiscutible en el sur del Perú para soluciones de energía crítica y electromecánica al 2030.</p>
                </div>
                <div class="mv-block">
                    <h3>Misión</h3>
                    <p>Garantizar la continuidad operativa de nuestros clientes mediante ingeniería de precisión, seguridad (HSE) y respuesta inmediata.</p>
                </div>
                <!--DESCOMENTAR SI SE DESEA AGREGAR CIERTAS CERTIFICACIONES -->
                <!-- <div class="mv-block" style="border:none; padding-left:0;">
                    <div class="policy-tags">
                        <span><i class="fas fa-hard-hat"></i> Seguridad</span>
                        <span><i class="fas fa-check"></i> Calidad ISO</span>
                        <span><i class="fas fa-leaf"></i> Ambiente</span>
                    </div>
                </div> -->
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