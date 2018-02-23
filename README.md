# WP Plugin Info · Eliasis plugin

[![Latest Stable Version](https://poser.pugx.org/Eliasis-Framework/wp-plugin-info/v/stable)](https://packagist.org/packages/Eliasis-Framework/wp-plugin-info) [![Latest Unstable Version](https://poser.pugx.org/Eliasis-Framework/wp-plugin-info/v/unstable)](https://packagist.org/packages/Eliasis-Framework/wp-plugin-info) [![License](https://poser.pugx.org/Eliasis-Framework/wp-plugin-info/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/ae2eaedeb5754994824cb23a691a0b65)](https://www.codacy.com/app/Josantonius/wp-plugin-info?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Eliasis-Framework/wp-plugin-info&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/Eliasis-Framework/wp-plugin-info/downloads)](https://packagist.org/packages/Eliasis-Framework/wp-plugin-info) [![Travis](https://travis-ci.org/Eliasis-Framework/wp-plugin-info.svg)](https://travis-ci.org/Eliasis-Framework/wp-plugin-info) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/Eliasis-Framework/wp-plugin-info/branch/master/graph/badge.svg)](https://codecov.io/gh/Eliasis-Framework/wp-plugin-info)

[Versión en español](README-ES.md)

Get and save plugin information from WordPress API to be consumed by other modules.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **WP Plugin Info**, simply:

    $ composer require Eliasis-Framework/wp-plugin-info

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Eliasis-Framework/wp-plugin-info --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/Eliasis-Framework/wp-plugin-info.git

## Available Methods

Available methods in this library:

### - Get plugin information:

```php
get($option, $slug);
```

| Atttribute | Description | Type | Required
| --- | --- | --- | --- |
| $option | Option to get. | string | Yes |
| $slug | WordPress plugin slug. | string | Yes |

**@return** (mixed) → Value or false.

## Quick Start

To use this library with **Composer**:

```php
use Eliasis\Complement\Type\Plugin;

$wp_plugin_info = Plugin::WP_Plugin_Info()->getControllerInstance('Main');
```

## Usage

### - Get plugin name:

```php
# [string]

$wp_plugin_info->get('name', 'plugin-slug'); 
```

### - Get plugin version:

```php
# [string]

$wp_plugin_info->get('version', 'plugin-slug');
```

### - Get plugin author:

```php
# [string]

$author = $wp_plugin_info->get('author', 'plugin-slug');
```

### - Get plugin author profile:

```php
# [string]

$wp_plugin_info->get('author_profile', 'plugin-slug');
```

### - Get plugin contributors:

```php
# [array]

$wp_plugin_info->get('contributors', 'plugin-slug');
```

### - Get plugin requires:

```php
# [string]

$wp_plugin_info->get('requires', 'plugin-slug');
```

### - Get plugin tested:

```php
# [string]

$wp_plugin_info->get('tested', 'plugin-slug');
```

### - Get plugin compatibility:

```php
# [array]

$wp_plugin_info->get('compatibility', 'plugin-slug');
```

### - Get plugin rating:

```php
# [int]

$wp_plugin_info->get('rating', 'plugin-slug');
```

### - Get plugin ratings:

```php
# [array]

$wp_plugin_info->get('ratings', 'plugin-slug');
```

### - Get plugin num ratings:

```php
# [int]

$wp_plugin_info->get('num_ratings', 'plugin-slug');
```

### - Get plugin support threads:

```php
# [int]

$wp_plugin_info->get('support_threads', 'plugin-slug');
```

### - Get plugin support threads resolved:

```php
# [int]

$wp_plugin_info->get('support_threads_resolved', 'plugin-slug');
```

### - Get plugin downloaded:

```php
# [int]

$wp_plugin_info->get('downloaded', 'plugin-slug');
```

### - Get plugin last updated:

```php
# [string]

$wp_plugin_info->get('last_updated', 'plugin-slug');
```

### - Get plugin added:

```php
# [string]

$wp_plugin_info->get('added', 'plugin-slug');
```

### - Get plugin homepage:

```php
# [string]

$wp_plugin_info->get('homepage', 'plugin-slug');
```

### - Get plugin download link:

```php
# [string]

$wp_plugin_info->get('download_link', 'plugin-slug');
```

### - Get plugin tags:

```php
# [array]

$wp_plugin_info->get('tags', 'plugin-slug');
```

### - Get plugin donate link:

```php
# [string]

$wp_plugin_info->get('donate_link', 'plugin-slug');
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Eliasis-Framework/wp-plugin-info.git
    
    $ cd wp-plugin-info

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Eliasis-Framework/wp-plugin-info/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).