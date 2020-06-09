<?php

namespace ToyRobot\Csv\Reader;

/**
 * Class CsvReader
 */
class CsvReader
{
    /**
     * @var string
     */
    const UPLOAD_FOLDER = 'upload';

    /**
     * Get data from CSV file
     *
     * @param string $fileName
     *
     * @return array
     */
    public function getData(string $fileName) : array
    {
        $filePath = sprintf('%s/%s/', dirname(__FILE__, 4), self::UPLOAD_FOLDER);
        $csvFile = sprintf('%s%s', $filePath, $fileName);
        $rows = array_map('str_getcsv', file($csvFile));

        $content = [];
        foreach ($rows as $row) {
            $content[] = $row[0];
        }
        return $content;
    }
}
