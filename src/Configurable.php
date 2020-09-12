<?php

declare(strict_types=1);

namespace Hschulz\Config;

/**
 * This interface describes the methods to get and set a configuration handler
 * for an implementing class therefore making it configurable.
 */
interface Configurable
{
    /**
     * Sets the configuration manager.
     *
     * @param ConfigurationInterface $config The configuration manager
     * @return void
     */
    public function setConfiguationHandler(ConfigurationManager $config): void;

    /**
     * Returns the configuration manager if available.
     *
     * @return ConfigurationInterface|null The configuration manager or null
     */
    public function getConfigurationHandler(): ?ConfigurationManager;
}
