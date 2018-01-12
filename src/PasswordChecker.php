<?php declare(strict_types=1);

namespace ak1\wedding;

class PasswordChecker
{
    /**
     * @var array
     */
    private $dataArray;

    public function __construct(array $dataArray)
    {
        $this->dataArray = $dataArray;
    }

    public function check(string $password): bool
    {
        return in_array($password, $this->dataArray);
    }
}
