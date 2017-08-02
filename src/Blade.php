<?php

namespace Papac;

use Bow\View\EngineAbstract;
use Bow\Application\Configuration;
use duncan3dc\Laravel\Blade as BladeInstance;

class Blade extends extends EngineAbstract
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
     * TwigEngine constructor.
     * @param Configuration $config
     */
    public function __construct(Configuration $config)
    {
    	$this->config = $config;
    	$this->template = new BladeInstance($config['view.path'], $config['view.cache'].'/view');

        return $this->template;
    }

    /**
     * @inheritDoc
     */
    public function render($filename, array $data = [])
    {
    	$filename = $this->checkParseFile($filename);

    	return $this->template->render($filename, $data);
    }

    /**
     * @return \Twig_Environment|\Twig_Loader_Filesystem
     */
    public function getTemplate()
    {
    	return $this->template;
    }
}