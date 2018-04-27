<?php

namespace hschulz\Config;

/**
 * This interface describes the methods to get and set a configuration handler
 * for an implementing class therefore making it configurable.
 */
interface Configurable
{

    /**
     *
     * @param ConfigurationInterface $config
     * @return void
     */
    public function setConfiguationHandler(ConfigurationManager $config): void;

    /**
     *
     * @return ConfigurationInterface
     */
    public function getConfigurationHandler(): ConfigurationManager;
}
