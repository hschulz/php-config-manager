<?php

namespace hschulz\Config;

/**
 *
 */
interface ConfigurationManager {

    /**
     *
     * @return string
     */
    public function getEnvironment(): string;

    /**
     *
     * @param string $name
     * @return void
     */
    public function setEnvironment(string $name): void;

    /**
     *
     * @return bool
     */
    public function readConfiguration(): bool;

    /**
     *
     * @return bool
     */
    public function writeConfiguration(): bool;
}
