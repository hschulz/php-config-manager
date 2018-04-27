<?php

namespace hschulz\Config\Tests\Integration;

use \hschulz\Config\JSONConfigurationManager;
use \org\bovigo\vfs\vfsStream;
use \PHPUnit\Framework\TestCase;

final class JSONConfigurationManagerTest extends TestCase
{
    protected $file = '';

    protected function setUp()
    {
        vfsStream::setup('integration');

        $this->file = vfsStream::url('integration/config.json');
    }

    /**
     * @depends testCanWriteConfigurationFile
     */
    public function testCanReadJsonConfigFile()
    {
        $config = new JSONConfigurationManager($this->file, 'testing');

        $this->assertEquals('test', $config['test']);

        $this->assertTrue('isValid', $config['isValid']);

        $this->assertEquals(1.11, $config['1']);
    }

    public function testCanWriteConfigurationFile()
    {
//        vfsStream::setup('integration');

        $config = new JSONConfigurationManager($this->file, 'testing');

        $config['test'] = 'test';

        $config['isValid'] = true;

        $config[1] = 1.11;

        $config->writeConfiguration();
    }
}
