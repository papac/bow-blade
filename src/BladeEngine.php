<?php

namespace Papac;

use Bow\Configuration\Loader as Config;
use Bow\View\EngineAbstract;
use duncan3dc\Laravel\BladeInstance as BladeInstance;

class BladeEngine extends EngineAbstract
{
    /**
     * The blade instance
     *
     * @var BladeInstance
     */
    private $template;

    /**
     * The template name
     *
     * @var string
     */
    protected $name = 'blade';

    /**
     * BladeEngine constructor.
     *
     * @param Config $config
     *
     * @return void
     */
    public function __construct(Config $config)
    {
        $this->config = $config;

        $path = (array) realpath($config['view.path']);

        $this->template = new BladeInstance($path[0], $config['view.cache']);

        array_shift($path);

        foreach ($path as $key => $value) {
            $this->template->addPath($value);
        }
    }

    /**
     * {@inheritdoc}
     * @throws
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
