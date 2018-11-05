# Bow blade support

Support [Blade](https://laravel.com/docs/5.7/views) pour [Bow Framework](https://github.com/bowapp/app).

## Usage

Installez une copie du package avec [composer](https://getcomposer.org).

```bash
composer require papac/bow-blade
```

Vous pouvez utiliser directement la configuration `\Papac\BladeConfiguration::class` fournir dans le package et aller le [confirguer](#configuration) ou bien créer une configuration Bow. Ce qui vous donnera complètement le control sur la configuration si vous voudriez y ajouter du code.

### configuration manuellement

```bash
php bow add:configuration BladeConfiguration
```

Dans la configuration `BladeConfiguration` situé dans `app/Configurations`, ajouter le code suivant:

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
      View::pushEngine('blade', BladeEngine::class);
      
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

Dans le fichier `Loader.php` du dossier `app/Kernel`. Ajoutez la configuration comme suit:

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

## Author

**Franck Dakia** est un développeur Full Stack basé actuellement en Afrique, Côte d'ivore. Passioné de code, et développement collaboratif, Speaker, Formateur et Membre de plusieurs communautés de développeurs.

Contact: [dakiafranck@gmail.com](mailto:dakiafranck@gmail.com) - [@franck_dakia](https://twitter.com/franck_dakia)

**SVP s'il y a un bogue sur le projet veuillez me contacter par email ou laissez moi un message sur le [slack](https://bowphp.slack.com).**