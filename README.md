# WP Plugin Info · Eliasis module

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/stable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Total Downloads](https://poser.pugx.org/josantonius/wp_plugin-info/downloads)](https://packagist.org/packages/josantonius/wp_plugin-info) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_plugin-info/v/unstable)](https://packagist.org/packages/josantonius/wp_plugin-info) [![License](https://poser.pugx.org/josantonius/wp_plugin-info/license)](https://packagist.org/packages/josantonius/wp_plugin-info)

[Versión en español](README-ES.md)

Get and save plugin information from WordPress API to be consumed by other modules.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Usage](#usage)
- [Contribute](#contribute)
- [Licensing](#licensing)
- [Copyright](#copyright)

---

### Installation

Install plugin module from [Composer](http://getcomposer.org/download/). In the root folder of plugin run:

    $ composer require Josantonius/WP_Plugin-Info

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, sass files, docs...) you can use:

    $ composer require Josantonius/WP_Plugin-Info --prefer-source

Or you can also clone the complete repository with Git:

	$ git clone https://github.com/Josantonius/WP_Plugin-Info.git

### Requirements

This pluggin is supported by PHP versions 5.3 or higher and is compatible with HHVM versions 3.0 or higher.

### Usage

Get plugin information:

```php
<?php
use Eliasis\Module\Module;

$Info = Module::WP_Plugin-Info()->instance('Info');

$name = $Info->get('name', 'plugin-slug');

$slug = $Info->get('slug', 'plugin-slug');

$version = $Info->get('version', 'plugin-slug');

$author = $Info->get('author', 'plugin-slug');

$author_profile = $Info->get('author_profile', 'plugin-slug');

$contributors = $Info->get('contributors', 'plugin-slug');

$requires = $Info->get('requires', 'plugin-slug');

$tested = $Info->get('tested', 'plugin-slug');

$compatibility = $Info->get('compatibility', 'plugin-slug');

$rating = $Info->get('rating', 'plugin-slug');

$ratings = $Info->get('ratings', 'plugin-slug');

$num_ratings = $Info->get('num_ratings', 'plugin-slug');

$support_threads = $Info->get('support_threads', 'plugin-slug');

$support_threads_resolved = $Info->get('support_threads_resolved', 'plugin-slug');

$downloaded = $Info->get('downloaded', 'plugin-slug');

$last_updated = $Info->get('last_updated', 'plugin-slug');

$added = $Info->get('added', 'plugin-slug');

$homepage = $Info->get('homepage', 'plugin-slug');

$download_link = $Info->get('download_link', 'plugin-slug');

$tags = $Info->get('tags', 'plugin-slug');

$donate_link = $Info->get('donate_link', 'plugin-slug');
```

### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Licensing

This project is licensed under **GPL-2.0+**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).
