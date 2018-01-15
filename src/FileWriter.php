<?php declare(strict_types=1);

namespace ak1\wedding;

class FileWriter
{
    /**
     * @var string
     */
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function writeToFile(string $content): bool
    {
        return true;
    }
}
