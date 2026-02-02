<?php
/**
 * Semin Theme: Archivo Maestro de Funciones
 * * @package SeminTheme
 * @version 3.0 Modular
 * @author  Sergio Coila
 * * GUÍA DE ARQUITECTURA:
 * 1. /inc/core/       -> Configuración técnica global (CSS, JS, CPTs).
 * 2. /inc/customizer/ -> Campos editables organizados por página.
 */

// 1. Configuración del Núcleo (Core)
require_once get_template_directory() . '/inc/core/setup.php';
require_once get_template_directory() . '/inc/core/post-types.php';

// 2. Cargador del Personalizador (Campos Editables)
require_once get_template_directory() . '/inc/customizer/loader.php';