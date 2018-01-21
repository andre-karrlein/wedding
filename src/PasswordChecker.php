<?php declare(strict_types=1);

namespace ak1\wedding;

class PasswordChecker
{
    /**
     * @var PasswordFileReader
     */
    private $fileReader;

    public function __construct(PasswordFileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    public function check(string $password): bool
    {
        return in_array($password, $this->fileReader->getPasswordArray());
    }
}
