<?php declare(strict_types=1);

namespace ak1\karrlein;

use PHPUnit\Framework\TestCase;

class HtmlTemplateTest extends TestCase
{
    public function testCanGetTemplate()
    {
        $template = HtmlTemplate::fromFile(__DIR__ . '/../html/Index.html');

        $actual = $template->getTemplate('%name%');
        $expected = file_get_contents(__DIR__ . '/../html/Index.html');

        $this->assertEquals($expected, $actual);
    }
}
