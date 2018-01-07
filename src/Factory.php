<?php declare(strict_types=1);

namespace ak1\wedding;

class Factory
{
    public function createMainPage(): HtmlTemplate
    {
        return HtmlTemplate::fromFile(__DIR__ . '/../html/Index.html');
    }
}
