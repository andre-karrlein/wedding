<?php

namespace ak1\wedding;

use PHPUnit\Framework\TestCase;

class PasswordCheckerTest extends TestCase
{

    public function testCanCheckValidPassword()
    {
        $passwordChecker = new PasswordChecker(['test']);

        $actual = $passwordChecker->check('test');

        $this->assertTrue($actual);
    }

    public function testCanCheckInvalidPassword()
    {
        $passwordChecker = new PasswordChecker(['']);

        $actual = $passwordChecker->check('abc');

        $this->assertFalse($actual);
    }
}
