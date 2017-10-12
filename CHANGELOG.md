# CHANGELOG

## 1.0.3 - 2017-10-11

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with `Travis CI` to implement continuous integration.

* Added `wp_plugin-info/src/bootstrap.php` file

* Added `wp_plugin-info/tests/bootstrap.php` file.
* Added `wp_plugin-info/tests/sample-plugin.php` file.

* Added `wp_plugin-info/phpunit.xml.dist` file.
* Added `wp_plugin-info/_config.yml` file.
* Added `wp_plugin-info/.travis.yml` file.

* Deleted `wp-plugin-info/config/paths.php` file.
* Deleted `wp-plugin-info/config/set-hooks.php` file.

* Deleted `Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher\Launcher` class.

* Replaced `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info` class to `Eliasis\Plugins\WP_Plugin_Info\Controller\Info\Info` class.

* Replaced `Eliasis\Plugins\WP_Plugin_Info\Model\Admin\Info\Info` class to `Eliasis\Plugins\WP_Plugin_Info\Model\Info\Info` class.

* Deleted `Eliasis\Plugins\WP_Plugin_Info\Controller\Info\Info->getPluginsInfo()` method.
* Deleted `Eliasis\Plugins\WP_Plugin_Info\Model\Info\Info->getPluginsInfo()` method.

* Deleted `Eliasis\Plugins\WP_Plugin_Info\Controller\Info\Info->updated()` method.

* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Info\Info->isUpdated()` method.

* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest` class.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->setUp()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginInstance()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testCheckIfPluginInfoIsNotUpdated()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetAllPluginInfo()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testCheckIfPluginInfoIsUpdated()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginName()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginSlug()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginVersion()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginAuthor()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginAuthorProfile()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginContributors()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginRequires()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginTested()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginCompatibility()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginRating()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginRatings()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginNumRatings()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginSupportThreads()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginSupportThreadsResolved()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginDownloaded()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginLastUpdated()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginAdded()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginHomepage()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginDownloadLink()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginTags()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginDonateLink()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginUnknownParam()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginUnknownPlugin()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Test\PluginInfoTest->testGetPluginUnknownParamAndPlugin()` method.

## 1.0.2 - 2017-09-09

* Replaced `eliasis-framework/module` to `eliasis-framework/complement` library.

* Deleted `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher` class.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->init()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->admin()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->afterAddMenu()` method.

* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info` class.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginsInfo()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getInfo()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->updated()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginInfo()` method.
* Deleted `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->get()` method.

* Deleted `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info` class.
* Deleted `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info->getPluginsInfo()` method.
* Deleted `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info->setPluginsInfo()` method.

* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher\Launcher` class.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher\Launcher->init()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher\Launcher->admin()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher\Launcher->afterAddMenu()` method.

* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info` class.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginsInfo()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info->getInfo()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info->updated()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginInfo()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Controller\Admin\Info\Info->get()` method.

* Added `Eliasis\Plugins\WP_Plugin_Info\Model\Admin\Info\Info` class.
* Added `Eliasis\Plugins\WP_Plugin_Info\Model\Admin\Info\Info->getPluginsInfo()` method.
* Added `Eliasis\Plugins\WP_Plugin_Info\Model\Admin\Info\Info->setPluginsInfo()` method.

## 1.0.1 - 2017-09-06

* Added `wp-plugin-info/wp_plugin-info.jsond` file.

* Deleted `wp-plugin-info/wp_plugin-info.php` file.

## 1.0.0 - 2017-06-13

* Added `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher` class.
* Added `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->init()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->admin()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Launcher\Launcher->afterAddMenu()` method.

* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info` class.
* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginsInfo()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getInfo()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->updated()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->getPluginInfo()` method.
* Added `App\Modules\WP_Plugin_Info\Controller\Admin\Info\Info->get()` method.

* Added `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info` class.
* Added `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info->getPluginsInfo()` method.
* Added `App\Modules\WP_Plugin_Info\Model\Admin\Info\Info->setPluginsInfo()` method.

* Added `wp-plugin-info/config/add-paths.php` file.
* Added `wp-plugin-info/config/add-urls.php` file.
* Added `wp-plugin-info/config/files.php` file.
* Added `wp-plugin-info/config/namespaces.php` file.
* Added `wp-plugin-info/config/paths.php` file.
* Added `wp-plugin-info/config/set-hooks.php` file.
* Added `wp-plugin-info/config/settings.php` file.

* Added `wp-plugin-info/src/data/plugins.jsond` file.

* Added `eliasis-framework/eliasis` framework.

* Added `composer/installers` library.
