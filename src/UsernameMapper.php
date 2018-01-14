<?php declare(strict_types=1);

namespace ak1\wedding;

class UsernameMapper
{
    /**
     * @var UsernameFileReader
     */
    private $usernameFileReader;

    /**
     * @var PasswordFileReader
     */
    private $passwordFileReader;

    public function __construct(
        UsernameFileReader $usernameFileReader,
        PasswordFileReader $passwordFileReader
    ) {
        $this->usernameFileReader = $usernameFileReader;
        $this->passwordFileReader = $passwordFileReader;
    }

    public function map(string $password): string
    {
        $pos = $this->getPasswordKeyPosition($password);
        $username = $this->getMappedUsername($pos);

        return $username;
    }

    private function getPasswordKeyPosition(string $password): int
    {
        return array_search($password, $this->passwordFileReader->getPasswordArray());
    }

    private function getMappedUsername(int $pos): string
    {
        $usernameArray = $this->usernameFileReader->getUsernameArray();

        return $usernameArray[$pos];
    }
}
