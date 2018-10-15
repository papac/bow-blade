<?php

namespace Papac;

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
        $config['view.engine'] = 'blade';

        $this->container->bind('view', function () use ($config) {
            View::pushEngine('blade', BladeEngine::class);
            
            View::configure($config);

            return View::getInstance();
        });
    }

    /**
     * @inheritdoc
     */
    public function start()
    {
        $this->container->make('view');
    }
}
