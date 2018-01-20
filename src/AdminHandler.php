<?php declare(strict_types=1);

namespace ak1\wedding;

class AdminHandler
{
    /**
     * @var GuestFileReader
     */
    private $fileReader;

    public function __construct(GuestFileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    public function showResults(): string
    {
        return $this->arrayToString();
    }

    private function arrayToString(): string
    {
        return implode('\n', $this->fileReader->getGuestData());
    }
}
