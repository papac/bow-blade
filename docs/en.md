## Usage

Install a copy of the package with [composer](https://getcomposer.org).

```bash
composer require papac/bow-blade
```

You can directly use the `\Papac\BladeConfiguration::class` configuration in the package and go to [config](#configuration) or create a Bow configuration. This will give you full control over the configuration if you would like to add code to it.

### configuration manually

```bash
php bow add:configuration BladeConfiguration
```

In the `BladeConfiguration` configuration located in `app/Configurations`, add the following code:

```php
<?php

namespace App\Configurations;

use Bow\View\View;
use Bow\Configuration\Loader;
use Bow\Configuration\Configuration;

class BladeConfiguration extends Configuration
{
  /**
   * @inheritdoc
   */
  public function create(Loader $config)
  {
    $this->container->bind('view', function () use ($config) {
      View::pushEngine('blade', \Papac\BladeEngine::class);
      
      View::configure($config);

      return View::getInstance();
    });
  }

  /**
   * @inheritdoc
   */
  public function run()
  {
    $this->container->make('view');
  }
}
```

## Configuration

In the `Kernel.php` file in the `app` folder. Add the configuration as follows:

```php
/**
 * All app services register
 *
 * @return array
 */
public function configurations()
{
  /**
   * Put here you service
   */
  return [
    // other
    \App\Configurations\BladeConfiguration::class,
  ];
}
```

Note that the name of the template engine here is `blade`. This is the name that should be used in the view configuration in the `config/view.php` file. Then put the extension to `.blade.php` like this.

```php
return [
  'engine' => 'blade',
  ...
  'extension' => '.blade.php'
  ...
];
```

## Author

**Franck DAKIA** is a Full Stack developer based in Africa, Ivory Coast. Passionate about code and collaborative development, speaker, trainer and member of several developer communities and many collaborators.

Contact me at [dakiafranck@gmail.com](mailto:dakiafranck@gmail.com) - [@franck_dakia](https://twitter.com/franck_dakia)

**Please, if there is a bug on the project please contact me by email or leave me a message on the [slack](https://bowphp.slack.com). or [join us on slask](https://join.slack.com/t/bowphp/shared_invite/enQtNzMxOTQ0MTM2ODM5LTQ3MWQ3Mzc1NDFiNDYxMTAyNzBkNDJlMTgwNDJjM2QyMzA2YTk4NDYyN2NiMzM0YTZmNjU1YjBhNmJjZThiM2Q)**