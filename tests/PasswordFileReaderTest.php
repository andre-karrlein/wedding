<?php declare(strict_types=1);

namespace ak1\wedding;

use PHPUnit\Framework\TestCase;

class PasswordFileReaderTest extends TestCase
{
    public function testCanGetPasswordArray()
    {
        $fileReader = new PasswordFileReader(__DIR__ . '/data/passwords');

        $actual = $fileReader->getPasswordArray();
        $expected = ['Veronika', 'Andre'];

        $this->assertEquals($expected, $actual);
    }
}
