# 🏭 Semin Corporate Theme (v1.0)

> Tema de WordPress a medida desarrollado para **Semin S.R.L.** (Ingeniería y Mantenimiento), optimizado para velocidad y gestión autónoma sin constructores visuales.

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-grey.svg)
![Status](https://img.shields.io/badge/status-production--ready-green.svg)

## 📖 Descripción del Proyecto

Este tema fue construido con una arquitectura de **"Zero-Bloat"** (Cero Hinchazón). A diferencia de los temas comerciales que usan Elementor o Divi, este tema utiliza la API nativa del Personalizador de WordPress, garantizando:

* 🚀 **Velocidad de carga superior** (Sin scripts innecesarios).
* 🔒 **Seguridad y Estabilidad** (Menor riesgo de conflictos).
* 🎨 **Gestión Centralizada** (Todo se edita desde un solo panel).

## 📂 Arquitectura del Sistema

El tema se organiza en **3 Paneles Maestros** dentro del personalizador (`Apariencia > Personalizar`):

### 1. 🌍 Semin: Configuración Global
* Control de Cabecera y Pie de página.
* Teléfonos, correos, redes sociales y logotipos.

### 2. 🏠 Semin: Página de Inicio
* Gestión de la Landing Page (Portada, Marcas, Servicios Home, CTA).

### 3. 📄 Semin: Páginas Internas
* **Venta Grupos:** Carga de catálogos PDF y portadas.
* **Nosotros:** Gestión de historia y fotos corporativas.
* **Servicios:** Catálogo de servicios (Taller, Flota, Mantenimiento).
* **Contacto:** Configuración de mapas y formularios.
* **Proyectos:** Galería de obras destacadas.

---

## 🛠️ Instalación y Requisitos

### Requisitos Técnicos
* WordPress 6.0 o superior.
* PHP 7.4 o superior.

### Plugins Recomendados
* **Contact Form 7:** Necesario para la funcionalidad del formulario en la página de contacto.

### Instrucciones de Despliegue
1.  Subir la carpeta `semin-theme` al directorio `/wp-content/themes/`.
2.  Activar el tema desde el panel de administración.
3.  Ir a **Apariencia > Personalizar** y configurar los paneles globales.
4.  Crear las páginas estáticas (Inicio, Contacto, Nosotros) y asignar sus plantillas correspondientes.

---

## 💻 Estructura de Código (Para Desarrolladores)

El núcleo del tema reside en `/inc/customizer/`. La carga de archivos está orquestada por `loader.php` para asegurar la jerarquía de paneles.

```text
/semin-theme/
├── style.css                 # Metadatos del tema
├── functions.php             # Encolado de scripts y configuración del theme
├── front-page.php            # Plantilla: Home
├── page-contacto.php         # Plantilla: Contacto (Split Screen)
└── /inc/customizer/          # LÓGICA DEL PERSONALIZADOR
    ├── loader.php            # Orquestador de carga
    ├── global.php            # Panel Global
    ├── home.php              # Panel Home
    ├── pages.php             # Panel Páginas Internas (Padre)
    ├── nosotros.php          # Sección Nosotros
    ├── servicios.php         # Sección Servicios
    └── proyectos.php         # Sección Proyectos
