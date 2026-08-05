# TA Catalog Theme

Tema clásico y modular para WordPress + WooCommerce, orientado a catálogos técnicos con una presentación limpia, responsive y centrada en productos.

## Versión actual

`v0.7.0-alpha` — Sprint 3: Single Product Experience.

## Características

- Ficha individual con galería, resumen comercial, variaciones, stock y compra destacada.
- Barra de compra móvil conectada al formulario canónico de WooCommerce.
- Tarjetas de producto y archivo de tienda responsive.
- Header persistente, footer configurable y navegación accesible.
- Paletas global y WooCommerce configurables desde el Personalizador.
- Formas configurables de botones e iconos SVG intercambiables de carrito y búsqueda.
- Soporte nativo para zoom, lightbox y slider de galería WooCommerce.
- Estilos CSS modulares, sin dependencias front-end externas.
- Integración mediante hooks y filtros; no modifica archivos del plugin WooCommerce.

## Requisitos

- WordPress 6.6 o superior.
- PHP 7.4 o superior.
- WooCommerce para las funciones de catálogo y compra.

## Instalación

El archivo instalable se encuentra en `dist/ta-catalog-theme-0.7.0-alpha.zip`.

1. En WordPress, abrir **Apariencia > Temas > Añadir nuevo > Subir tema**.
2. Seleccionar el ZIP, instalarlo y activarlo.
3. Asignar los menús y el logo.
4. Configurar textos, colores, botones e iconos en **Apariencia > Personalizar > TA Catalog**.

## Estructura

- `ta-catalog-theme/`: código fuente instalable.
- `ta-catalog-theme/inc/`: configuración y lógica separada por responsabilidad.
- `ta-catalog-theme/assets/css/`: estilos base, tienda, tarjetas y ficha individual.
- `ta-catalog-theme/assets/js/`: navegación y mejora móvil de compra.
- `docs/`: arquitectura y lista de comprobación.
- `dist/`: ZIP de distribución.

## Desarrollo

La versión se declara en `style.css` y en `TA_CATALOG_VERSION`. Cada entrega debe validar sintaxis PHP, consistencia de versión, estructura del ZIP y ausencia de archivos de desarrollo dentro del instalable.

Licencia GPL-2.0-or-later.
