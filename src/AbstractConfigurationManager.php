<?php

namespace hschulz\Config;

use \hschulz\Config\ConfigurationManager;
use \ArrayObject;

/**
 *
 */
abstract class AbstractConfigurationManager
    extends ArrayObject
        implements ConfigurationManager {

    /**
     *
     * @var string
     */
    protected $environment = '';

    /**
     *
     * @param string $environment
     */
    public function __construct(string $environment) {
        parent::__construct();
        $this->environment = $environment;
    }

    /**
     *
     */
    public function __destruct() {
        $this->writeConfiguration();
    }

    /**
     *
     * @return string
     */
    public function getEnvironment(): string {
        return $this->environment;
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public function setEnvironment(string $name): void {
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
