<?php declare(strict_types=1);

namespace ak1\wedding;

class DataSaver
{
    /**
     * @var FileWriter
     */
    private $fileWriter;

    public function __construct(FileWriter $fileWriter)
    {
        $this->fileWriter = $fileWriter;
    }

    public function save(array $data): bool
    {
        $entryString = $this->createEntry($data);
        return $this->writeToFile($entryString);
    }

    private function writeToFile(string $entry): bool
    {
        return $this->fileWriter->write($entry);
    }

    private function createEntry(array $data): string
    {
        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_SANITIZE_STRING);
        $count = filter_var($data['count'], FILTER_SANITIZE_NUMBER_INT);

        $entry = 'Eingetragen von: ' . $_SESSION['user'] .', Name: ' . $name;
        $entry .= ', E-Mail: ' . $email . ', Anzahl Personen: ' . $count . ';';

        return $entry;
    }
}
