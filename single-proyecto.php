<?php
/**
 * Redirección de páginas individuales de proyectos hacia la página principal de proyectos.
 * Las páginas individuales han sido deshabilitadas por solicitud del diseño.
 */
wp_redirect(home_url('/proyectos'), 301);
exit;