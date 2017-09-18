<?php

namespace Papac;

use Bow\View\View;
use Bow\Config\Config;
use Bow\Application\Services;

class BladeTemplateService extends Services
{
    /**
     * Démarre le serivce
     */
    public function start()
    {
        View::singleton()->setEngine('blade');
    }

    /**
     * Make view setting
     * 
     * @param Config $config
     */
    public function make(Config $config)
    {
        View::pushEngine('blade', BladeEngine::class);
        View::configure($config);
    }
}