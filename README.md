# Bow blade support

Support [Blade](https://laravel.com/docs/5.7/views) pour bow framework.

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
namespace Papac;

use Bow\View\View;
use Bow\Configuration\Loader;
use Bow\Configuration\Configuration;

class BladeConfiguration extends Configuration
{
  /**
   * Start Plungin
   * 
   * @param Loader $config
   */
  public function create(Loader $config)
  {
    View::configure($config);

    $view = View::singleton();

    $view->pushEngine('blade', \Papac\BladeEngine::class);
  }

  /**
   * Démarre le serivce
   */
  public function run()
  {
    View::singleton()->setEngine('blade');
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
public function configurations()
{
  /**
   * Put here you service
   */
  return [
    \Papac\BladeConfiguration::class,
    // other
  ];
}
```

## Author

Dakia Franck
> SVP s'il y a un bogue sur le projet veuillez me contacter sur mon [slack](https://papac.slack.com)