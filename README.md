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
        $view->pushEngine('blade', \Papac\Blade::class);
    }
}
```

Et ajoutez votre service dans le conteneur.

```php
...
'services' => [
    /**
     * Mettez ici vos service.
     */
     \App\Services\BladeTemplateService::class
]
```

## Utilisez le service fournie

Vous pouvez utiliser directement le service fournir dans le package.

Dans le fichier `classes.php` du dossier `config`. Ajoutez le service comme suit:

```php
...
'services' => [
    /**
     * Mettez ici vos service.
     */
     \Papac\BladeTemplateService::class
]
```

## Author

Dakia Franck