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
