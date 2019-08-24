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

Dans le fichier `Kernel.php` du dossier `app`. Ajoutez la configuration comme suit:

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

Notez qui le nom du moteur de template ici est `blade`. C'est ce nom qui doit être utiliser dans la configuration des vues dans le fichier `config/view.php`. Ensuite mettez l'extension à `.blade.php` comme ceci.

```php
return [
  'engine' => 'blade',
  ...
  'extension' => '.blade.php'
  ...
];
```

## Author

**Franck Dakia** est un développeur Full Stack basé actuellement en Afrique, Côte d'ivore. Passioné de code, et développement collaboratif, Speaker, Formateur et Membre de plusieurs communautés de développeurs et plusieur collaborateur.

Contact: [dakiafranck@gmail.com](mailto:dakiafranck@gmail.com) - [@franck_dakia](https://twitter.com/franck_dakia)

**SVP s'il y a un bogue sur le projet veuillez me contacter par email ou laissez moi un message sur le [slack](https://bowphp.slack.com).** or You can **[join us on slask](https://join.slack.com/t/bowphp/shared_invite/enQtNzMxOTQ0MTM2ODM5LTQ3MWQ3Mzc1NDFiNDYxMTAyNzBkNDJlMTgwNDJjM2QyMzA2YTk4NDYyN2NiMzM0YTZmNjU1YjBhNmJjZThiM2Q)**