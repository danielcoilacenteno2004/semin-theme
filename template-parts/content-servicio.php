<?php
// Obtenemos el icono del campo personalizado
$icono = get_post_meta( get_the_ID(), 'servicio_icono', true );
if ( empty($icono) ) $icono = 'fas fa-check'; // Icono por defecto si se te olvida poner uno
?>

<div class="servicio-card">
    <div class="icon-box">
        <i class="<?php echo esc_attr($icono); ?>"></i>
    </div>
    <h3><?php the_title(); ?></h3>
    <div class="servicio-contenido">
        <?php the_content(); ?>
    </div>
</div>