<?php

declare(strict_types=1);

namespace Hschulz\Config;

/**
 *
 */
interface ConfigurationManager
{
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
