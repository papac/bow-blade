<?php

namespace Papac;

use Bow\View\EngineAbstract;
use Bow\Application\Configuration;
use duncan3dc\Laravel\BladeInstance as BladeInstance;

class BladeEngine extends EngineAbstract
{
    /**
     * @var BladeInstance
     */
    private $template;

    /**
     * @var string
     */
    protected $name = 'blade';

    /**
     * BladeEngine constructor.
     * 
     * @param Configuration $config
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->template = new BladeInstance($config['view.path'], $config['view.cache'].'/view');
    }

    /**
     * @inheritDoc
     */
    public function render($filename, array $data = [])
    {
        $filename = $this->checkParseFile($filename, false);
        return $this->template->render($filename, $data);
    }

    /**
     * Get the BladeEngine instance
     * 
     * @return BladeInstance
     */
    public function getTemplate()
    {
        return $this->template;
    }
}