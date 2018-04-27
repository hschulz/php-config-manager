<?php

namespace hschulz\Config\Tests\Unit;

use \hschulz\Config\AbstractConfigurationManager;
use \PHPUnit\Framework\TestCase;

final class AbstractConfigurationManagerTest extends TestCase
{
    public function testConcreteImplementation()
    {
        $stub = $this->getMockForAbstractClass(
            AbstractConfigurationManager::class,
            ['testing_start']
        );

        $stub->expects($this->any())
             ->method('readConfiguration')
             ->will($this->returnValue(true));

        $stub->expects($this->any())
             ->method('writeConfiguration')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->readConfiguration(), 'Reading a configuration works');
        $this->assertTrue($stub->writeConfiguration(), 'Writing a configuration works');

        $this->assertEquals('testing_start', $stub->getEnvironment(), 'Reading the environment constructor value works');

        $stub->setEnvironment('testing_end');

        $this->assertEquals('testing_end', $stub->getEnvironment(), 'Reading the set environment value works');
    }
}
