# TA Catalog Theme

Tema WordPress/WooCommerce para el catálogo de Técnicos Americanos.

## Estado

Sprint 1 — Skeleton funcional, versión `0.1.0`.

## Requisitos

- WordPress 6.6 o superior.
- PHP 7.4 o superior.
- WooCommerce opcional; requerido para las funciones de tienda.

## Instalación

1. En WordPress, ir a **Apariencia > Temas > Añadir nuevo > Subir tema**.
2. Seleccionar `ta-catalog-theme-0.1.0.zip`.
3. Instalar y activar.
4. Asignar los menús en **Apariencia > Menús**.
5. Configurar logo y botón de cabecera en **Apariencia > Personalizar**.
6. Si se usa WooCommerce, verificar las páginas de tienda, carrito y checkout.

## Arquitectura

- `functions.php`: arranque y constantes.
- `inc/`: configuración, assets, widgets, Customizer y WooCommerce.
- `template-parts/`: componentes reutilizables.
- `assets/`: estilos y JavaScript.
- `theme.json`: tokens y estilos del editor.
- `woocommerce.php`: wrapper de integración sin copiar plantillas internas del plugin.

## Criterios de actualización

- No editar plantillas dentro del plugin WooCommerce.
- Priorizar hooks y filtros.
- Incrementar `TA_CATALOG_VERSION` y la cabecera de `style.css` en cada release.
- Revisar compatibilidad antes de cambiar el valor `Tested up to`.

## Licencia

GNU General Public License v2 o posterior.

