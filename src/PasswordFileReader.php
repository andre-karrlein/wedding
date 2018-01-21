<?php declare(strict_types=1);

namespace ak1\wedding;

class PasswordFileReader
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string[]
     */
    private $passwords;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->readFile();
    }

    public function getPasswordArray(): array
    {
        return $this->passwords;
    }

    private function readFile(): void
    {
        $fileContent = file_get_contents($this->filePath);

        $this->passwords = explode(';', $fileContent);
    }
}
