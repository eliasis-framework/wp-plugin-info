# WP Plugin Info · Eliasis module

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/stable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Total Downloads](https://poser.pugx.org/josantonius/wp_plugin-info/downloads)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/unstable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![License](https://poser.pugx.org/josantonius/wp_plugin-info/license)](https://packagist.org/packages/josantonius/wp_plugin-info)

[Versión en español](README-ES.md)

Obtener y guardar información de plugins a través de la API de WordPress para ser consumida por otros módulos.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Uso](#uso)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

<p align="center"><strong>Echa un vistazo al código</strong></p>

<p align="center">
  <a href="https://youtu.be/CW8nzBQHpn4" title="Echa un vistazo al código">
  	<img src="https://raw.githubusercontent.com/Josantonius/PHP-Algorithm/master/resources/youtube-thumbnail.jpg">
  </a>
</p>

---

### Instalación 

Instalar este módulo en el plugin desde [Composer](http://getcomposer.org/download/). En la carpeta raíz del plugin ejecuta:

    $ composer require josantonius/WP_Plugin-Info

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, archivos sass, documentos...) puedes utilizar:

    $ composer require josantonius/WP_Plugin-Info --prefer-source

También puedes clonar el repositorio completo con Git:

	$ git clone https://github.com/Josantonius/WP_Plugin-Info.git

### Requisitos

Este plugin es soportado por versiones de PHP 5.3 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Uso

Obtener información del plugin:

```php
<?php
use Eliasis\Module\Module;

$Info = Module::WP_Plugin-Info()->instance('Info');
```
```php
$name = $Info->get('name', 'plugin-slug');
```
```php
$slug = $Info->get('slug', 'plugin-slug');
```
```php
$version = $Info->get('version', 'plugin-slug');
```
```php
$author = $Info->get('author', 'plugin-slug');
```
```php
$author_profile = $Info->get('author_profile', 'plugin-slug');
```
```php
$contributors = $Info->get('contributors', 'plugin-slug');
```
```php
$requires = $Info->get('requires', 'plugin-slug');
```
```php
$tested = $Info->get('tested', 'plugin-slug');
```
```php
$compatibility = $Info->get('compatibility', 'plugin-slug');
```
```php
$rating = $Info->get('rating', 'plugin-slug');
```
```php
$ratings = $Info->get('ratings', 'plugin-slug');
```
```php
$num_ratings = $Info->get('num_ratings', 'plugin-slug');
```
```php
$support_threads = $Info->get('support_threads', 'plugin-slug');
```
```php
$support_threads_resolved = $Info->get('support_threads_resolved', 'plugin-slug');
```
```php
$downloaded = $Info->get('downloaded', 'plugin-slug');
```
```php
$last_updated = $Info->get('last_updated', 'plugin-slug');
```
```php
$added = $Info->get('added', 'plugin-slug');
```
```php
$homepage = $Info->get('homepage', 'plugin-slug');
```
```php
$download_link = $Info->get('download_link', 'plugin-slug');
```
```php
$tags = $Info->get('tags', 'plugin-slug');
```
```php
$donate_link = $Info->get('donate_link', 'plugin-slug');
```

### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Licencia

Este proyecto está licenciado bajo **licencia GPL-2.0+**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com). 