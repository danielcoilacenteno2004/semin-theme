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

El tema está organizado en una arquitectura modular que separa la lógica de personalización, estilos y plantillas de página. La carga de archivos está orquestada por `/inc/customizer/loader.php` para asegurar la jerarquía correcta de paneles.

```text
/semin-theme/
│
├── 📄 Archivos Raíz
│   ├── style.css                    # Metadatos del tema y estilos globales
│   ├── functions.php                # Encolado de scripts, configuración y hooks del theme
│   ├── header.php                   # Plantilla de encabezado global
│   ├── footer.php                   # Plantilla de pie de página global
│   ├── index.php                    # Plantilla fallback (para posts y archives)
│   └── README.md                    # Documentación del proyecto
│
├── 📄 Plantillas de Páginas Principales
│   ├── front-page.php               # Plantilla: Home/Portada (Landing Page)
│   ├── page-contacto.php            # Plantilla: Contacto (Split Screen + Mapa + Formulario CF7)
│   ├── page-nosotros.php            # Plantilla: Nosotros (Historia + Equipo)
│   ├── page-proyectos.php           # Plantilla: Proyectos (Galería de obras)
│   ├── page-servicios.php           # Plantilla: Servicios (Catálogo de servicios)
│   ├── page-venta-de-grupos.php     # Plantilla: Venta de Grupos (Catálogos PDF)
│   ├── single-proyecto.php          # Plantilla: Detalle Individual de Proyecto
│   └── index.php                    # Plantilla fallback para posts
│
├── 🎨 /css/                         # Estilos específicos por página
│   ├── front-page.css               # Estilos: Landing Page (Hero, Marcas, Servicios, CTA)
│   ├── page-contacto.css            # Estilos: Formulario y Split Screen
│   ├── page-nosotros.css            # Estilos: Sección Nosotros
│   ├── page-proyectos.css           # Estilos: Galería de Proyectos
│   ├── page-servicios.css           # Estilos: Catálogo de Servicios
│   └── page-venta-de-grupos.css     # Estilos: Catálogos PDF
│
├── ⚙️ /inc/                         # Lógica y funcionalidad interna
│   │
│   ├── /core/                       # Funcionalidad central del tema
│   │   ├── setup.php                # Configuración inicial (theme support, menus, etc.)
│   │   └── post-types.php           # Definición de Custom Post Types (Proyectos, Servicios)
│   │
│   └── /customizer/                 # LÓGICA DEL PERSONALIZADOR (Apariencia > Personalizar)
│       ├── loader.php               # 🔧 Orquestador principal (carga todos los paneles)
│       │
│       ├── 🌍 Panel Global
│       │   └── global.php           # Configuración Global (Logo, Teléfono, Redes, Cabecera, Footer)
│       │
│       ├── 🏠 Panel Home
│       │   └── home.php             # Página de Inicio (Hero, Marcas, Servicios, CTA, Testimonio)
│       │
│       ├── 📄 Panel Páginas Internas (Padre)
│       │   └── pages.php            # Contenedor principal para secciones específicas
│       │
│       ├── 👥 Sección Nosotros
│       │   └── nosotros.php         # Gestión de historia, fotos corporativas y equipo
│       │
│       ├── 🔧 Sección Servicios
│       │   └── servicios.php        # Catálogo dinámico (Taller, Flota, Mantenimiento)
│       │
│       ├── 📸 Sección Proyectos
│       │   └── proyectos.php        # Galería de obras destacadas y filtrado
│       │
│       └── 🛒 Sección Venta de Grupos (Padre)
│           └── (Subcategorías para diferentes tipos de grupos)
│
└── 🧩 /template-parts/              # Componentes reutilizables
    └── content-servicio.php         # Componente: Card de servicio (usado en servicios home y page)
```

### 🔄 Flujo de Carga

1. **functions.php** → Inicia el tema y registra hooks
2. **loader.php** → Carga secuencialmente los paneles del Customizer
3. **global.php** → Define configuración compartida por todo el sitio
4. **home.php, pages.php, etc.** → Definen paneles específicos y sus campos
5. **Template files (front-page.php, page-*.php)** → Leen los datos del customizer y los renderizan

### 📊 Relaciones de Archivos

| Archivo | Propósito | Depende de |
|---------|-----------|-----------|
| `functions.php` | Hub central del tema | Enruta a `loader.php` |
| `loader.php` | Orquestador de paneles | Carga `global.php`, `home.php`, `pages.php`, etc. |
| `front-page.php` | Renderizado de Landing | Lee datos de `global.php` y `home.php` |
| `page-*.php` | Renderizado de páginas internas | Lee datos de `global.php` y sección específica |
| `header.php / footer.php` | Componentes globales | Utilizados por todas las plantillas |
| `template-parts/` | Componentes reutilizables | Incluidos en múltiples plantillas |

---

## 🔧 Configuración Personalizable (Customizer)

### Panel Global (`global.php`)
Controla elementos que aparecen en todas las páginas:
- **Logo y Branding:** Logotipo principal y favicon
- **Contacto:** Teléfono, email, dirección
- **Redes Sociales:** Enlaces a perfiles (Facebook, Instagram, LinkedIn, etc.)
- **Cabecera:** Menú principal y opciones de navegación
- **Pie de Página:** Copyright, links útiles, información de contacto

### Panel Home (`home.php`)
Gestiona la página de inicio:
- **Sección Hero:** Portada, CTA principal
- **Marcas/Clientes:** Logos de empresas asociadas
- **Servicios Destacados:** Servicios principales con descripciones
- **Call-to-Action:** Secciones de conversión
- **Testimonio:** Reseña o quote destacado

### Panel Páginas Internas (`pages.php`)
Padre de secciones específicas:

#### Nosotros (`nosotros.php`)
- Historia y misión de la empresa
- Fotos del equipo
- Descripción de valores

#### Servicios (`servicios.php`)
- Catálogo de servicios
- Categorías (Taller, Flota, Mantenimiento)
- Descripción y precios

#### Proyectos (`proyectos.php`)
- Galería de obras realizadas
- Filtrado por categoría
- Imagen destacada y descripción

#### Contacto (Configurado en `pages.php`)
- Mapa de ubicación (Google Maps)
- Formulario Contact Form 7
- Información de contacto

#### Venta de Grupos (`pages.php`)
- Carga de catálogos PDF
- Portadas personalizadas
- Descarga de documentos

---

## 📱 Características Principales

✨ **Responsive Design** - Adaptable a todos los dispositivos

🎨 **Tema Personalizable** - Todo desde el Customizer de WordPress

📊 **SEO Optimizado** - Estructura semántica y metadata

🚀 **Alto Rendimiento** - Carga rápida sin dependencias pesadas

🔒 **Seguro** - Sin constructores visuales riesgosos

📸 **Galerías Dinámicas** - Integración con Custom Post Types

---

## 🐛 Soporte y Mantenimiento

Para reportar problemas o solicitar cambios, consultar con el equipo de desarrollo de Semin S.R.L.

---

## 📝 Notas Finales

- **No editar archivos del customizer directamente desde el código.** Use siempre el panel de Apariencia > Personalizar
- Todas las imágenes deben estar optimizadas (máximo 100KB cada una)
- Las páginas deben estar publicadas y asignadas a la plantilla correcta para funcionar
- Realizar backup antes de cambios significativos en la configuración

---

**Última actualización:** Febrero 2026  
**Versión:** 1.0.0  
**Autor:** Semin S.R.L. Development Team
