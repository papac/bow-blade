# Bow blade support

Support [Blade](https://laravel.com/docs/5.4/views) pour bow framework.

## Usage

Installez une copie du package avec [composer](https://getcomposer.org).

```
composer require papac/bow-blade
```

Créez un service bow.

```
php bow add:service BladeTemplate
```

Ajoutez le service dans le conteneur de service.

Dans le service `BladeTemplateService` situé dans `app/Services`.

Dans la methode `make` ajoutez le code suivant

```php
<?php

namespace App\Services;

use Bow\View\View;
use Bow\Application\Configuration;
use Bow\Application\Services as BowService;

class BladeTemplateService extends BowService
{
    /**
     * Démarre le serivce
     */
    public function start()
    {
        View::singleton()->setEngine('blade');
    }

    /**
     * @param Configuration $config
     */
    public function make($config)
    {
        View::configure($config);
        $view = View::singleton();
        $view->pushEngine('blade', \Papac\Blade::class);
    }
}
```

## Author

Dakia Franck