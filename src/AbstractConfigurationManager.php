<?php

declare(strict_types=1);

namespace Hschulz\Config;

use ArrayObject;

/**
 *
 */
abstract class AbstractConfigurationManager extends ArrayObject implements ConfigurationManager
{
    /**
     * The currently set runtime environment for reading and writing some config.
     *
     * @var string
     */
    protected string $environment = '';

    /**
     * Create a new config manager for some environment identificator.
     *
     * @param string $environment Whatever identificator should be used
     */
    public function __construct(string $environment = '')
    {
        parent::__construct();
        $this->environment = $environment;
    }

    /**
     * This is not a reliable way of making sure the config has been saved.
     * It merely acts as last straw that migth work.
     *
     * The register_shutdown_function might work better in case you can't be
     * bothered to call writeConfiguration() anywhere else.
     */
    public function __destruct()
    {
        $this->writeConfiguration();
    }

    /**
     *
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public function setEnvironment(string $name): void
    {
        $this->environment = $name;
    }

    /**
     *
     * @return bool
     */
    abstract public function readConfiguration(): bool;

    /**
     *
     * @return bool
     */
    abstract public function writeConfiguration(): bool;
}
