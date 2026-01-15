<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class ExtractJsonTranslations extends Command
{
    protected $signature = 'translations:extract-json';

    protected $description = 'Extrae claves de traducción __("Texto") y las añade a los JSON de lang/ sin sobrescribir';

    public function handle(): int
    {
        $pathsToScan = [
            resource_path('views'),
            app_path(),
        ];

        $extensions = ['php', 'blade.php'];

        $foundKeys = [];

        foreach ($pathsToScan as $path) {
            if (!is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path)
            );

            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }

                $filename = $file->getFilename();

                if (
                    !str_ends_with($filename, '.php') &&
                    !str_ends_with($filename, '.blade.php')
                ) {
                    continue;
                }

                $content = file_get_contents($file->getPathname());

                preg_match_all(
                    '/__\(\s*[\'"](.+?)[\'"]\s*\)/u',
                    $content,
                    $matches
                );

                foreach ($matches[1] as $text) {
                    $text = trim($text);
                    if ($text !== '') {
                        $foundKeys[$text] = true;
                    }
                }
            }
        }

        if (empty($foundKeys)) {
            $this->info('No se encontraron nuevas claves de traducción.');
            return Command::SUCCESS;
        }

        $langPath = base_path('lang');

        if (!is_dir($langPath)) {
            $this->error('No existe el directorio lang/ en la raíz del proyecto.');
            return Command::FAILURE;
        }

        $jsonFiles = glob($langPath . '/*.json');

        if (empty($jsonFiles)) {
            $this->error('No se encontraron archivos JSON en lang/.');
            return Command::FAILURE;
        }

        foreach ($jsonFiles as $jsonFile) {
            $existing = [];

            if (file_exists($jsonFile)) {
                $decoded = json_decode(file_get_contents($jsonFile), true);
                if (is_array($decoded)) {
                    $existing = $decoded;
                }
            }

            $newEntries = [];

            foreach (array_keys($foundKeys) as $key) {
                if (!array_key_exists($key, $existing)) {
                    $newEntries[$key] = '';
                }
            }

            if (empty($newEntries)) {
                continue;
            }

            // IMPORTANTE: mantener el orden original + añadir al final
            $merged = $existing + $newEntries;

            file_put_contents(
                $jsonFile,
                json_encode($merged, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
                . PHP_EOL
            );

            $this->info(
                basename($jsonFile) . ': añadidas ' . count($newEntries) . ' claves nuevas'
            );
        }

        $this->info('Extracción de traducciones completada.');

        return Command::SUCCESS;
    }
}
