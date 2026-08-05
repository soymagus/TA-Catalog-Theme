# TA Catalog Theme

Tema WordPress/WooCommerce para el catálogo de Técnicos Americanos.

## Estado

Sprint 3 — Single Product Experience, versión `0.7.0-alpha`.

## Requisitos

- WordPress 6.6 o superior.
- PHP 7.4 o superior.
- WooCommerce opcional; requerido para las funciones de tienda.

## Instalación

1. En WordPress, ir a **Apariencia > Temas > Añadir nuevo > Subir tema**.
2. Seleccionar `ta-catalog-theme-0.7.0-alpha.zip`.
3. Instalar y activar.
4. Asignar los menús en **Apariencia > Menús**.
5. Configurar logo, colores, botones e iconos en **Apariencia > Personalizar > TA Catalog**.
6. Si se usa WooCommerce, verificar las páginas de tienda, carrito y checkout.

## Experiencia de producto

- Galería nativa con zoom, lightbox y slider.
- Resumen comercial responsive y variaciones WooCommerce.
- Mensajes de confianza configurables en el Customizer.
- Barra de compra móvil vinculada al formulario real.
- Tarjetas, archivo, tabs y productos relacionados con estilos modulares.

## Personalización visual

- **Colores globales:** principal, secundario, acento, texto, fondo, paneles y bordes.
- **Colores WooCommerce:** acciones, hover, precios, ofertas, confirmaciones y tarjetas.
- **Botones:** cuadrados, suaves, redondeados o tipo píldora.
- **Iconos:** carrito, bolsa o canasta; tres variantes de búsqueda; contorno libre, cuadrado, redondeado o circular.
- Los valores iniciales reproducen la identidad visual predeterminada del tema.

## Arquitectura

- `functions.php`: arranque y constantes.
- `inc/`: configuración, assets, widgets, Customizer y WooCommerce.
- `template-parts/`: componentes reutilizables.
- `assets/`: CSS modular y JavaScript condicional.
- `theme.json`: tokens y estilos del editor.
- `woocommerce.php`: wrapper de integración sin copiar plantillas internas del plugin.

## Criterios de actualización

- No editar plantillas dentro del plugin WooCommerce.
- Priorizar hooks y filtros.
- Incrementar `TA_CATALOG_VERSION` y la cabecera de `style.css` en cada release.
- Revisar compatibilidad antes de cambiar el valor `Tested up to`.

## Licencia

GNU General Public License v2 o posterior.
