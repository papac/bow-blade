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
Dans le service `BladeTemplate` situé dans app/Service.
Dans la methode `make` ajoutez le code suivant

```php
use Bow\View\View;

public function make($config)
{
	$view = View::singleton();
	$view->pushEngine('blade', \Papac\Blade::class);
	$view->setEngine('blade');
}
```

## Author

Dakia Franck