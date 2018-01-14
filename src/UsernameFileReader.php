<?php declare(strict_types=1);

namespace ak1\wedding;

class UsernameFileReader
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string[]
     */
    private $usernames;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->readFile();
    }

    public function getUsernameArray(): array
    {
        return $this->usernames;
    }

    private function readFile(): void
    {
        $fileContent = file_get_contents($this->filePath);

        $this->usernames = explode(';', $fileContent);
    }
}
