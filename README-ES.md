# WP Plugin Info · Eliasis module

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/stable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Total Downloads](https://poser.pugx.org/josantonius/wp_plugin-info/downloads)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/unstable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![License](https://poser.pugx.org/josantonius/wp_plugin-info/license)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Travis](https://travis-ci.org/Josantonius/WP_Plugin-Info.svg)](https://travis-ci.org/Josantonius/WP_Plugin-Info)

[Versión en español](README-ES.md)

Obtener y guardar información de plugins a través de la API de WordPress para ser consumida por otros módulos.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

### Instalación 

Instalar este módulo en el plugin desde [Composer](http://getcomposer.org/download/). En la carpeta raíz del plugin ejecuta:

    $ composer require josantonius/WP_Plugin-Info

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, archivos sass, documentos...) puedes utilizar:

    $ composer require josantonius/WP_Plugin-Info --prefer-source

También puedes clonar el repositorio completo con Git:

	$ git clone https://github.com/Josantonius/WP_Plugin-Info.git

### Requisitos

Este plugin es soportado por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Uso

Obtener información del plugin:

```php
<?php
use Eliasis\Complement\Type\Plugin\Plugin;

$Info = Plugin::WP_Plugin_Info()->instance('Info');
```
```php
$name = $Info->get('name', 'plugin-slug'); //string
```
```php
$slug = $Info->get('slug', 'plugin-slug'); //string
```
```php
$version = $Info->get('version', 'plugin-slug'); //string
```
```php
$author = $Info->get('author', 'plugin-slug'); //string
```
```php
$author_profile = $Info->get('author_profile', 'plugin-slug'); //string
```
```php
$contributors = $Info->get('contributors', 'plugin-slug'); //array
```
```php
$requires = $Info->get('requires', 'plugin-slug'); //string
```
```php
$tested = $Info->get('tested', 'plugin-slug'); //string
```
```php
$compatibility = $Info->get('compatibility', 'plugin-slug'); //array
```
```php
$rating = $Info->get('rating', 'plugin-slug'); //int
```
```php
$ratings = $Info->get('ratings', 'plugin-slug'); //array
```
```php
$num_ratings = $Info->get('num_ratings', 'plugin-slug'); //int
```
```php
$support_threads = $Info->get('support_threads', 'plugin-slug'); //int
```
```php
$support_threads_resolved = $Info->get('support_threads_resolved', 'plugin-slug'); //int
```
```php
$downloaded = $Info->get('downloaded', 'plugin-slug'); //int
```
```php
$last_updated = $Info->get('last_updated', 'plugin-slug'); //string
```
```php
$added = $Info->get('added', 'plugin-slug'); //string
```
```php
$homepage = $Info->get('homepage', 'plugin-slug'); //string
```
```php
$download_link = $Info->get('download_link', 'plugin-slug'); //string
```
```php
$tags = $Info->get('tags', 'plugin-slug'); //array
```
```php
$donate_link = $Info->get('donate_link', 'plugin-slug'); //string
```

### Tests 

Para ejecutar las [pruebas](tests/Asset/Test) simplemente:

    $ git clone https://github.com/Josantonius/WP_Plugin-Info.git
    
    $ cd WP_Plugin-Info

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ phpunit

### ☑ Tareas pendientes

- [x] Completar tests
- [ ] Mejorar la documentación

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