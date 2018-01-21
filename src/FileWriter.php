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

    public function write(string $content): bool
    {
        if (file_put_contents($this->filePath, $content, FILE_APPEND) > 0) {
            return true;
        }
        return false;
    }
}
