# WP Plugin Info · Eliasis plugin

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp-plugin-info/v/stable)](https://packagist.org/packages/josantonius/wp-plugin-info) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp-plugin-info/v/unstable)](https://packagist.org/packages/josantonius/wp-plugin-info) [![License](https://poser.pugx.org/josantonius/wp-plugin-info/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/34d7488b266949019ee95d7980e1a93e)](https://www.codacy.com/app/Josantonius/wp-plugin-info?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/wp-plugin-info&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/wp-plugin-info/downloads)](https://packagist.org/packages/josantonius/wp-plugin-info) [![Travis](https://travis-ci.org/Josantonius/wp-plugin-info.svg)](https://travis-ci.org/Josantonius/wp-plugin-info) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/Josantonius/wp-plugin-info/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/wp-plugin-info)

[Versión en español](README-ES.md)

Obtener y guardar información de plugins a través de la API de WordPress para ser consumida por otros módulos.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)
---

## Requisitos

Esta biblioteca es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **WP Plugin Info**, simplemente escribe:

    $ composer require Josantonius/wp-plugin-info

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/wp-plugin-info --prefer-source

También puedes **clonar el repositorio** completo con Git:

    $ git clone https://github.com/Josantonius/wp-plugin-info.git

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Obtener información del plugin:

```php
get($option, $slug);
```

| Atributo | Descripción | Tipo de dato | Requerido | Por defecto
| --- | --- | --- | --- |
| $option | Opción a obtener. | string | Sí |
| $slug | Slug del plugin WordPress. | string | Sí |

**@return** (mixed) → Valor o falso.

## Cómo empezar

Para utilizar esta clase con **Composer**:

```php
use Eliasis\Complement\Type\Plugin;

$wp_plugin_info = Plugin::WP_Plugin_Info()->getControllerInstance('Main');
```

## Uso

### - Obtener nombre del plugin:

```php
# [string]

$wp_plugin_info->get('name', 'plugin-slug'); 
```

### - Obtener version del plugin:

```php
# [string]

$wp_plugin_info->get('version', 'plugin-slug');
```

### - Obtener autor del plugin:

```php
# [string]

$author = $wp_plugin_info->get('author', 'plugin-slug');
```

### - Obtener perfil del autor del plugin:

```php
# [string]

$wp_plugin_info->get('author_profile', 'plugin-slug');
```

### - Obtener contribuyentes del plugin:

```php
# [array]

$wp_plugin_info->get('contributors', 'plugin-slug');
```

### - Obtener requisitos del plugin:

```php
# [string]

$wp_plugin_info->get('requires', 'plugin-slug');
```

### - Obtener última version comprobada del plugin:

```php
# [string]

$wp_plugin_info->get('tested', 'plugin-slug');
```

### - Obtener compatibilidad del plugin:

```php
# [array]

$wp_plugin_info->get('compatibility', 'plugin-slug');
```

### - Obtener calificación del plugin:

```php
# [int]

$wp_plugin_info->get('rating', 'plugin-slug');
```

### - Obtener calificaciones del plugin:

```php
# [array]

$wp_plugin_info->get('ratings', 'plugin-slug');
```

### - Obtener calificaciones numéricas del plugin:

```php
# [int]

$wp_plugin_info->get('num_ratings', 'plugin-slug');
```

### - Obtener hilos de soporte abiertos del plugin:

```php
# [int]

$wp_plugin_info->get('support_threads', 'plugin-slug');
```

### - Obtener hilos de soporte resueltos del plugin:

```php
# [int]

$wp_plugin_info->get('support_threads_resolved', 'plugin-slug');
```

### - Obtener número de descargas del plugin:

```php
# [int]

$wp_plugin_info->get('downloaded', 'plugin-slug');
```

### - Obtener fecha de última actualización del plugin:

```php
# [string]

$wp_plugin_info->get('last_updated', 'plugin-slug');
```

### - Obtener fecha en la que fue agregado el plugin:

```php
# [string]

$wp_plugin_info->get('added', 'plugin-slug');
```

### - Obtener página principal del plugin:

```php
# [string]

$wp_plugin_info->get('homepage', 'plugin-slug');
```

### - Obtener enlace de descarga del plugin:

```php
# [string]

$wp_plugin_info->get('download_link', 'plugin-slug');
```

### - Obtener etiquetas del plugin:

```php
# [array]

$wp_plugin_info->get('tags', 'plugin-slug');
```

### - Obtener enlace de donación del plugin:

```php
# [string]

$wp_plugin_info->get('donate_link', 'plugin-slug');
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/wp-plugin-info.git
    
    $ cd wp-plugin-info

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código para [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas. Ver [phpmd.xml](phpmd.xml) y [.php_cs.dist](.php_cs.dist).

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/wp-plugin-info/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 -2018 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).
