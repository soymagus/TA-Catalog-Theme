# Arquitectura

TA Catalog Theme conserva un enfoque clásico de WordPress con integración desacoplada de WooCommerce.

## Principios

1. No copiar templates del plugin salvo que una necesidad futura no pueda resolverse mediante hooks.
2. Mantener el bootstrap pequeño: `functions.php` define constantes y carga módulos de `inc/`.
3. Cargar estilos de WooCommerce solamente cuando el plugin está activo.
4. Cargar el CSS y JavaScript de producto individual solamente en `is_product()`.
5. Usar el formulario canónico para la compra; la barra móvil solo lo acciona y no replica su lógica.

## Módulos

| Archivo | Responsabilidad |
| --- | --- |
| `inc/setup.php` | Capacidades, menús y configuración de tema |
| `inc/enqueue.php` | Carga condicional y versionada de assets |
| `inc/customizer.php` | Opciones editables de marca y mensajes comerciales |
| `inc/woocommerce.php` | Wrappers, tarjetas, ficha individual y carrito del header |
| `assets/css/shop.css` | Archivo, toolbar y paginación |
| `assets/css/product-card.css` | Tarjetas y estados del catálogo |
| `assets/css/single-product.css` | Galería, resumen, tabs, relacionados y compra móvil |
| `assets/js/single-product.js` | Puente accesible entre barra móvil y formulario de WooCommerce |

## Compatibilidad

WooCommerce mantiene Schema.org, gestión de variaciones, stock, impuestos, moneda, galería y validación del formulario. El tema solo ordena hooks y aplica presentación, reduciendo el costo de actualización.
