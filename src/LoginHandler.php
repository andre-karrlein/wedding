<?php declare(strict_types=1);

namespace ak1\wedding;

class LoginHandler
{
    /**
     * @var PasswordChecker
     */
    private $checker;

    /**
     * @var UsernameMapper
     */
    private $mapper;

    public function __construct(
        PasswordChecker $checker,
        UsernameMapper $mapper
    ) {
        $this->checker = $checker;
        $this->mapper = $mapper;
    }

    public function login(string $password): string
    {
        $result =  $this->checker->check($password);

        if (!$result) {
            return '';
        }

        return $this->mapper->map($password);
    }
}
