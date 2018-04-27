<?php

namespace hschulz\Config\Tests;

use \hschulz\Config\AbstractConfigurationManager;
use \PHPUnit\Framework\TestCase;

class AbstractConfigurationManagerTest extends TestCase
{
    public function testConcreteImplementation()
    {
        $stub = $this->getMockForAbstractClass(
            AbstractConfigurationManager::class,
            ['testing']
        );

        $stub->expects($this->any())
             ->method('readConfiguration')
             ->will($this->returnValue(true));

        $stub->expects($this->any())
             ->method('writeConfiguration')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->readConfiguration(), 'Reading a configuration works');

        $this->assertEquals('testing', $stub->getEnvironment(), 'Reading the set environment works');
    }
}
