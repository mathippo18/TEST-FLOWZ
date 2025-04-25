<?php

class CSVExporter
{
    public static function export(array $events, string $filename)
    {
        $fp = fopen($filename, 'w');
        fputcsv($fp, ['code', 'date', 'libelle']);

        foreach ($events as $event) {
            fputcsv($fp, [
                $event['code'],
                $event['date'],
                $event['message']
            ]);
        }

        fclose($fp);
    }
}
