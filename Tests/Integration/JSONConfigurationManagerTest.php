<?php

declare(strict_types=1);

namespace Hschulz\Config\Tests\Integration;

use function file_put_contents;
use Hschulz\Config\JSONConfigurationManager;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;

final class JSONConfigurationManagerTest extends TestCase
{
    protected string $file = '';

    protected function setUp(): void
    {
        vfsStream::setup('integration');

        $this->file = vfsStream::url('integration/config.json');

        file_put_contents($this->file, '{"test":"test","isValid":true,"1":1.11}');
    }

    public function testCanReadJsonConfigFile(): void
    {
        $config = new JSONConfigurationManager($this->file);

        $this->assertEquals('test', $config['test']);

        $this->assertTrue($config['isValid']);

        $this->assertEquals(1.11, $config['1']);
    }

    public function testCanWriteConfigurationFile(): void
    {
        $config = new JSONConfigurationManager($this->file);

        $config['test'] = 'test';

        $config['isValid'] = true;

        $config[1] = 1.11;

        $this->assertTrue($config->writeConfiguration());
    }
}
