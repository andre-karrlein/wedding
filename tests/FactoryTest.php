<?php

namespace ak1\wedding;

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

    public function testCanCreateLoginPage()
    {
        $factory = new Factory();

        $actual = $factory->createLoginPage();
        $expected = HtmlTemplate::class;

        $this->assertInstanceOf($expected, $actual);
    }

    public function testCanCreatePasswordChecker()
    {
        $factory = new Factory();

        $actual = $factory->createPasswordChecker();
        $expected = PasswordChecker::class;

        $this->assertInstanceOf($expected, $actual);
    }
}
