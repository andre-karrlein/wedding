<?php declare(strict_types=1);

namespace ak1\wedding;

class GuestFileReader
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string[]
     */
    private $guestData;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->readFile();
    }

    public function getGuestData(): array
    {
        return $this->guestData;
    }

    private function readFile(): void
    {
        $fileContent = file_get_contents($this->filePath);

        $this->guestData = explode(';', $fileContent);
    }
}
