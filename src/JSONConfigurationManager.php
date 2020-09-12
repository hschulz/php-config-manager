<?php

declare(strict_types=1);

namespace Hschulz\Config;

use Hschulz\IOStreams\FileInputStream;
use Hschulz\IOStreams\FileOutputStream;
use Hschulz\IOStreams\JSONInputStream;
use Hschulz\IOStreams\JSONOutputStream;
use Hschulz\IOStreams\WriteMode;

/**
 * Example implementation for a json based configuration store.
 * This implementation completely disregards the environment parameter.
 */
class JSONConfigurationManager extends AbstractConfigurationManager
{
    /**
     * The absolute path to the json file.
     *
     * @var string
     */
    protected string $file = '';

    /**
     * Creates a new config manager and tries to read the config file.
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        parent::__construct();
        $this->file = $file;
        $this->readConfiguration();
    }

    /**
     *
     * @return bool
     */
    public function readConfiguration(): bool
    {
        $isRead = false;

        $json = new JSONInputStream(
            new FileInputStream($this->file)
        );

        $json->open();
        $config = $json->readDecoded();
        $json->close();

        if (!empty($config)) {
            $this->exchangeArray($config);
            $isRead = true;
        }

        return $isRead;
    }

    /**
     *
     * @return bool
     */
    public function writeConfiguration(): bool
    {
        $json = new JSONOutputStream(
            new FileOutputStream(
                $this->file,
                WriteMode::MODE_OVERWRITE_CREATE
            )
        );

        $json->open();
        $isWritten = (bool) $json->write($this->getArrayCopy());
        $json->close();

        return $isWritten;
    }
}
