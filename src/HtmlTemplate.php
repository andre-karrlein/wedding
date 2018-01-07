<?php declare(strict_types=1);

namespace ak1\wedding;

class HtmlTemplate
{
    private $filePath;

    private function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public static function fromFile(string $filePath): HtmlTemplate
    {
        return new self($filePath);
    }

    public function getTemplate(string $name): string
    {
        $template = file_get_contents($this->filePath);
        return str_replace('%name%', $name, $template);
    }
}
