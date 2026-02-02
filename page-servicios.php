<?php
/* Template Name: Servicios - Semin Master (Estilo Cummins) */
get_header(); 

// 1. RECUPERAR IMÁGENES
$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');
$img_taller = get_theme_mod('semin_img_capacidades', 'https://via.placeholder.com/800x600?text=Foto+Taller+Semin');

// Imagen Powergy (Con fallback por si acaso)
$img_powergy = get_theme_mod('semin_img_powergy', get_template_directory_uri() . '/img/logo-powergy.png'); 

$servicios = array();
for ($i = 1; $i <= 3; $i++) {
    $servicios[$i] = array(
        'img'   => get_theme_mod("serv_{$i}_img", 'https://via.placeholder.com/600x400?text=Servicio+' . $i),
        'title' => get_theme_mod("serv_{$i}_title", "Servicio Principal $i"),
    );
}
?>

<style>
    /* --- Base --- */
    .servicios-master img { max-width: 100%; height: auto; display: block; }
    .servicios-master .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; box-sizing: border-box; }
    
    /* --- Hero --- */
    .hero-master {
        padding: 160px 0 100px;
        background-color: #003366; 
        background-size: cover; background-position: center;
        position: relative;
    }
    .hero-master::before {
        content: ''; position: absolute; top:0; left:0; width:100%; height:100%;
        background: linear-gradient(90deg, rgba(0,51,102,0.95) 0%, rgba(0,51,102,0.6) 100%);
    }
    .hero-content { position: relative; z-index: 2; max-width: 800px; }
    .hero-title { font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 20px; line-height: 1.1; }
    .hero-desc { font-size: 1.25rem; color: #e0e0e0; font-weight: 400; max-width: 600px; }

    /* --- Intro & Grid --- */
    .intro-section { padding: 80px 0; text-align: center; }
    .section-head h2 { font-size: 2.5rem; color: #003366; font-weight: 800; margin-bottom: 15px; }
    .section-head p { font-size: 1.1rem; color: #666; max-width: 700px; margin: 0 auto; }
    .divider { width: 80px; height: 4px; background: #00a8e8; margin: 20px auto; }

    .main-services-grid {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 0;
        margin-top: 60px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }
    .master-card { position: relative; height: 450px; overflow: hidden; }
    .master-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .master-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%;
        background: linear-gradient(0deg, rgba(0,51,102,1) 0%, rgba(0,51,102,0.7) 60%, transparent 100%);
        padding: 40px 30px; color: white;
        height: 100%; display: flex; flex-direction: column; justify-content: flex-end;
        transition: 0.3s;
    }
    .master-card:hover img { transform: scale(1.1); }
    .master-card:hover .master-overlay { background: rgba(0,51,102,0.95); }
    .card-num { font-size: 4rem; font-weight: 800; color: rgba(255,255,255,0.1); position: absolute; top: 20px; right: 20px; }
    .master-card h3 { font-size: 1.8rem; margin-bottom: 15px; font-weight: 700; }
    .master-btn { display: inline-block; color: #00a8e8; font-weight: 700; text-transform: uppercase; text-decoration: none; margin-top: 20px; letter-spacing: 1px; }

    /* --- Capacidades (Taller) --- */
    .capabilities-section { padding: 100px 0; background: #fff; }
    .cap-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 60px; align-items: center; margin-top: 50px; }
    .cap-list { list-style: none; padding: 0; }
    .cap-item { display: flex; margin-bottom: 30px; align-items: flex-start; }
    .cap-icon {
        flex-shrink: 0; width: 60px; height: 60px; background: #f4f8fb; color: #003366;
        border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-right: 20px;
        transition: 0.3s;
    }
    .cap-item:hover .cap-icon { background: #00a8e8; color: white; }
    .cap-text h4 { font-size: 1.3rem; color: #003366; margin-bottom: 8px; font-weight: 700; }
    .cap-text p { color: #666; font-size: 0.95rem; line-height: 1.6; }

    /* --- SECCIÓN POWERGY (NUEVO DISEÑO) --- */
    .parts-section { padding: 100px 0; background: #003366; color: white; }
    .parts-header { text-align: center; margin-bottom: 50px; }
    
    .powergy-container {
        display: flex; 
        align-items: center; 
        justify-content: center;
        gap: 60px;
        background: rgba(255,255,255,0.05); /* Fondo sutil */
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 12px;
        padding: 50px;
        max-width: 900px;
        margin: 0 auto;
        transition: transform 0.3s;
    }
    .powergy-container:hover { transform: translateY(-5px); border-color: rgba(255,255,255,0.3); }

    .powergy-img img { 
        max-height: 100px; /* Controla el tamaño del logo */
        width: auto; 
        filter: drop-shadow(0 0 10px rgba(255,255,255,0.2));
    }
    
    .btn-powergy {
        background: #00a8e8;
        color: white;
        padding: 18px 45px;
        font-weight: 800;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 50px; /* Botón redondeado moderno */
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0,168,232, 0.4);
        display: inline-flex; align-items: center; gap: 10px;
        white-space: nowrap;
    }
    .btn-powergy:hover {
        background: white;
        color: #00a8e8;
        transform: scale(1.05);
        box-shadow: 0 15px 35px rgba(255,255,255, 0.2);
    }

    /* --- CTA Inferior --- */
    .cta-strip { padding: 60px 0; background: #00a8e8; text-align: center; }
    .cta-btn-white {
        background: white; color: #003366; padding: 15px 40px; font-weight: 800;
        text-decoration: none; border-radius: 4px; display: inline-block;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1); transition: 0.3s;
    }
    .cta-btn-white:hover { box-shadow: 0 15px 30px rgba(0,0,0,0.2); transform: scale(1.05); }

    /* Responsive */
    @media (max-width: 992px) {
        .main-services-grid { grid-template-columns: 1fr; }
        .master-card { height: 350px; }
        .cap-grid { grid-template-columns: 1fr; }
        .powergy-container { flex-direction: column; text-align: center; gap: 30px; }
    }
</style>

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
                $descripciones = [
                    1 => "Suministro de energía confiable con motores Cummins, Perkins y Volvo. Equipos encapsulados para trabajo pesado.",
                    2 => "Diseño y montaje de tableros de transferencia (TTA), sincronismo y distribución. Modernización de sistemas.",
                    3 => "Planes de mantenimiento preventivo y correctivo. Overhaul de motores y pruebas de carga con banco resistivo."
                ];
                for ($i = 1; $i <= 3; $i++): ?>
                <article class="master-card">
                    <img src="<?php echo esc_url($servicios[$i]['img']); ?>" alt="<?php echo esc_attr($servicios[$i]['title']); ?>">
                    <div class="master-overlay">
                        <span class="card-num">0<?php echo $i; ?></span>
                        <h3><?php echo esc_html($servicios[$i]['title']); ?></h3>
                        <p style="opacity:0.9; line-height:1.6; margin-bottom:20px;"><?php echo $descripciones[$i]; ?></p>
                        <a href="<?php echo home_url('/contacto'); ?>" class="master-btn">Cotizar Servicio &rarr;</a>
                    </div>
                </article>
                <?php endfor; ?>
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