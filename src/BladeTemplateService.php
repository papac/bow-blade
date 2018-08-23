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
        View::pushEngine('blade', BladeEngine::class);

        View::configure($config);
    }

    /**
     * @inheritDoc
     * @throws
     */
    public function start()
    {
        View::getInstance()->setEngine('blade');
    }
}
