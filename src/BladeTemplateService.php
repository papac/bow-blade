<?php

namespace Papac;

use Bow\View\View;
use Bow\Config\Config;
use Bow\Application\Service;

class BladeTemplateService extends Service
{
    /**
     * @inheritDoc
     * @throws
     */
    public function make(Config $config)
    {
        $config['view.engine'] = 'blade';

        $this->app->capsule('view', function() use ($config) {
            View::pushEngine('blade', BladeEngine::class);
            
            View::configure($config);

            return View::getInstance();
        });
    }

    /**
     * @inheritDoc
     * @throws
     */
    public function start()
    {
        $this->app->capsule('view');
    }
}
