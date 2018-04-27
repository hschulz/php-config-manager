<?php

namespace hschulz\Config\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use \hschulz\Config\JSONConfigurationManager;
use \org\bovigo\vfs\vfsStream;
use function \file_put_contents;

final class JSONConfigurationManagerTest extends TestCase {

    protected $file = '';

    protected function setUp() {

        vfsStream::setup('integration');

        $this->file = vfsStream::url('integration/config.json');

        file_put_contents($this->file, '{"test":"test","isValid":true,"1":1.11}');
    }

    /**
     *
     */
    public function testCanReadJsonConfigFile() {

        $config = new JSONConfigurationManager($this->file, 'testing');

        $this->assertEquals('test', $config['test']);

        $this->assertTrue($config['isValid']);

        $this->assertEquals(1.11, $config['1']);
    }

    public function testCanWriteConfigurationFile() {

        $config = new JSONConfigurationManager($this->file, 'testing');

        $config['test'] = 'test';

        $config['isValid'] = true;

        $config[1] = 1.11;

        $this->assertTrue($config->writeConfiguration());
    }
}
