<?php

namespace ak1\karrlein;

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testCanCreateMainPage()
    {
        $factory = new Factory();

        $actual = $factory->createMainPage();
        $expected = HtmlTemplate::class;

        $this->assertInstanceOf($expected, $actual);
    }
}
