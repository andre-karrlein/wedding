<?php declare(strict_types=1);

namespace ak1\wedding;

class Factory
{
    public function createMainPage(): HtmlTemplate
    {
        return HtmlTemplate::fromFile(__DIR__ . '/../html/Index.html');
    }

    public function createLoginPage(): HtmlTemplate
    {
        return HtmlTemplate::fromFile(__DIR__ . '/../html/Login.html');
    }

    public function createPasswordChecker(): PasswordChecker
    {
        return new PasswordChecker($this->testData());
    }

    private function testData(): array
    {
        return ['Veronika', 'Andre'];
    }
}
