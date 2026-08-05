# TA Catalog Theme

Tema clásico modular para WordPress y WooCommerce, diseñado para presentar catálogos técnicos con una experiencia clara, profesional y responsive.

**Versión actual:** `0.6.0-alpha`

**Estado:** Sprint 2 – Product Experience

**Licencia:** GPL-2.0-or-later

## Características

- Product Cards con imagen contenida, categoría, descripción corta, rating, precio, badges y acciones.
- Shop Archive propio con hero, breadcrumb, ordenamiento y área de filtros.
- Grid responsive de 3, 2 y 1 columnas.
- Header con anuncio, logo, búsqueda de productos, cuenta, carrito y navegación móvil.
- Footer modular con widgets y menú independiente.
- Compatibilidad visual con producto, carrito, checkout y Mi cuenta de WooCommerce.
- Galería WooCommerce con zoom, lightbox y slider.
- CSS separado por responsabilidad y design tokens personalizables.
- Accesibilidad básica: skip link, foco visible, etiquetas ARIA y reducción de movimiento.
- Sin dependencias externas de JavaScript.

## Requisitos

- WordPress 6.4 o superior.
- PHP 7.4 o superior.
- WooCommerce recomendado para las funciones de catálogo.

## Instalación

1. Descargá el ZIP de la versión.
2. En WordPress ingresá a **Apariencia → Temas → Añadir nuevo → Subir tema**.
3. Seleccioná el ZIP, instalalo y activalo.
4. Asigná el menú principal y el menú del pie desde **Apariencia → Menús**.
5. Configurá el logo y el mensaje superior desde **Apariencia → Personalizar**.
6. Para filtros, agregá widgets WooCommerce en **Filtros de tienda**.

## Arquitectura

```text
TA-Catalog-Theme/
├── assets/
│   ├── css/              # Tokens, base, layout, componentes y módulos WooCommerce
│   └── js/               # Navegación y panel móvil de filtros
├── inc/                  # Setup, assets, Customizer, helpers e integración WooCommerce
├── woocommerce/          # Overrides mínimos del archivo y la tarjeta
├── functions.php         # Bootstrap sin lógica de presentación
├── header.php
├── footer.php
├── theme.json
└── style.css             # Metadata oficial del tema
```

La lógica se divide en módulos dentro de `inc/`; los templates se limitan al marcado y los estilos se cargan en orden desde `inc/enqueue.php`. Los overrides de WooCommerce se mantienen deliberadamente mínimos.

## Personalización rápida

Los colores, radios, sombras y ancho máximo viven en `assets/css/tokens.css`. El color de acento también puede cambiarse desde el Customizer sin editar archivos.

## Desarrollo

Validación PHP:

```bash
find . -name '*.php' -not -path './vendor/*' -print0 | xargs -0 -n1 php -l
```

Generación del instalable desde el directorio padre:

```bash
zip -r TA-Catalog-Theme-v0.6.0-alpha.zip TA-Catalog-Theme -x 'TA-Catalog-Theme/.git/*' '*.zip'
```

Consultá [CHANGELOG.md](CHANGELOG.md) para cambios publicados y [ROADMAP.md](ROADMAP.md) para los próximos sprints.
