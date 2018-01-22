# Bow blade support

Support [Blade](https://laravel.com/docs/5.4/views) pour bow framework.

## Usage

Installez une copie du package avec [composer](https://getcomposer.org).

```
composer require papac/bow-blade
```

Créez un service bow.
> Ce qui vous donnera complètement le control sur le service si vous voudriez y ajouter du code.

```
php bow add:service BladeTemplate
```

Ajoutez le service dans le conteneur de service. 

Alors dans le service `BladeTemplateService` situé dans `app/Services`.

Dans la methode `make` ajoutez le code suivant

```php
<?php

namespace Papac;

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
        $view->pushEngine('blade', \Papac\BladeEngine::class);
    }
}
```

> Vous pouvez utiliser directement le service fournir dans le package. `Papac\BladeTemplateService::class`.

## Configuration

Dans le fichier `Loader.php` du dossier `app/Kernel`. Ajoutez le service comme suit:

```php
/**
 * All app services register
 *
 * @return array
 */
public function services()
{
    /**
     * Put here you service
     */
    return [
        \Papac\BladeTemplateService::class,
        // other
    ];
}
```

## Author

Dakia Franck