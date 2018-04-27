<?php

namespace hschulz\Config;

use \hschulz\IOStreams\FileInputStream;
use \hschulz\IOStreams\FileOutputStream;
use \hschulz\IOStreams\JSONInputStream;
use \hschulz\IOStreams\JSONOutputStream;
use \hschulz\IOStreams\WriteModes;

/**
 *
 */
class JSONConfigurationManager extends AbstractConfigurationManager
{

    /**
     *
     * @var string
     */
    protected $file = '';

    /**
     *
     * @param string $file
     * @param string $environment
     */
    public function __construct(string $file, string $environment)
    {
        parent::__construct($environment);
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
        $config = $json->read();
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
                WriteModes::MODE_OVERWRITE_CREATE
            )
        );

        $json->open();
        $isWritten = (bool) $json->write($this->getArrayCopy());
        $json->close();

        return $isWritten;
    }
}
