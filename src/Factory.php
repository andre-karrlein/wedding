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

    public function createLoginHandler(): LoginHandler
    {
        return new LoginHandler(
            $this->createPasswordChecker(),
            $this->createUsernameMapper()
        );
    }

    private function createPasswordChecker(): PasswordChecker
    {
        return new PasswordChecker($this->createPasswordFileReader());
    }

    private function createPasswordFileReader(): PasswordFileReader
    {
        return new PasswordFileReader(__DIR__ . '/../passwords');
    }

    private function createUsernameMapper(): UsernameMapper
    {
        return new UsernameMapper($this->createUsernameFileReader(), $this->createPasswordFileReader());
    }

    private function createUsernameFileReader(): UsernameFileReader
    {
        return new UsernameFileReader(__DIR__ . '/../usernames');
    }
}
