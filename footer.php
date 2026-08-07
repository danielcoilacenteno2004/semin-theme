<?php 
// Datos dinámicos del personalizador
$email_txt  = get_theme_mod('contact_email_text', 'ventas@semin.pe');
$email_link = get_theme_mod('contact_email_link', 'mailto:ventas@semin.pe');
$phone_txt  = get_theme_mod('contact_phone_text', '923 494 455');
$phone_link = get_theme_mod('contact_phone_link', 'https://wa.me/51923494455');
?>

<footer style="background: #000000; color: #ccc; padding: 60px 0 30px; font-size: 0.95rem;">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px; align-items: center;">
        
        <!-- Info de la empresa -->
        <div style="flex: 1; min-width: 280px;">
            <h3 style="color: #ffffff; font-size: 1.4rem; font-weight: 800; margin-bottom: 12px;">Semin S.R.L.</h3>
            <p style="color: #aaa; margin-bottom: 15px;">Expertos en soluciones energéticas, venta y mantenimiento de grupos electrógenos.</p>
            <p style="color: #888; font-size: 0.85rem;"><i class="fas fa-map-marker-alt" style="color: #00a8e8; margin-right: 8px;"></i> Calle Lircay N°222, San Martín de Socabaya - Arequipa</p>
        </div>

        <!-- Bloque Destacado de Contacto (Ventas & Teléfono Único) -->
        <div class="footer-contact-highlight" style="flex: 1.2; min-width: 300px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 25px 30px;">
            <span style="color: #00a8e8; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 10px;">Atención Comercial & Ventas</span>
            
            <div style="display: flex; flex-wrap: wrap; gap: 20px 30px; align-items: center; margin-top: 15px;">
                <!-- Teléfono único de Ventas (923 494 455) -->
                <a href="<?php echo esc_url($phone_link); ?>" target="_blank" style="display: flex; align-items: center; gap: 12px; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 1.1rem; transition: 0.3s;" onmouseover="this.style.color='#00a8e8'" onmouseout="this.style.color='#ffffff'">
                    <span style="width: 40px; height: 40px; background: rgba(0, 168, 232, 0.15); color: #00a8e8; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                    <span><?php echo esc_html($phone_txt); ?></span>
                </a>

                <!-- Correo de Ventas (Texto plano sin mailto) -->
                <p style="margin: 0; color: #ffffff; font-weight: 600; font-size: 0.95rem; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-envelope" style="color: #00a8e8;"></i>
                    <span><?php echo esc_html($email_txt); ?></span>
                </p>
            </div>
        </div>

    </div>
    
    <div style="text-align: center; margin-top: 50px; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 25px; font-size: 0.85rem; color: #777;">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Semin S.R.L. Todos los derechos reservados.</p>
        </div>
    </div>
    
    <?php wp_footer(); ?>
</footer>
</body>
</html>