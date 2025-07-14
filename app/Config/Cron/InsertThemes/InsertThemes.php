<?php

namespace App\Config\Cron\InsertThemes;

use App\Config\Cron\CronInterface;
use App\Repository\PostRepository;

class InsertThemes implements CronInterface
{

    public PostRepository $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function run(): void
    {
        $this->processCSV(self::DIRECTORY);
    }

    const DIRECTORY = __DIR__ . '/files';  // Change to the directory where your CSV files are located

    // Function to read the CSV files and process each line
    private function processCSV($directory)
    {
        // Check if the directory exists
        if (!is_dir($directory)) {
            die("The specified directory does not exist.");
        }

        // Open the directory and iterate through the files
        $files = scandir($directory);
        foreach ($files as $file) {
            // Skip the '.' and '..' entries
            if ($file === '.' || $file === '..') {
                continue;
            }

            // Array com os IDs das categorias
            $categoryIds = [1, 2, 8, 5, 8, 6, 8];
            $categoryIndex = 0; // Índice para percorrer o array de IDs de categorias

            // Check if the file is a CSV
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if ($extension === 'csv') {
                // Read the content of the CSV file
                $filePath = $directory . DIRECTORY_SEPARATOR . $file;
                $csvData = self::readCSV($filePath);

                foreach ($csvData as $line) {
                    // Get the current category ID from the list and increment the index
                    $categoryId = $categoryIds[$categoryIndex];

                    // Assign the category ID to the line and unset the original category field
                    $line['category_id'] = $categoryId;
                    unset($line['category']);
                    $line['excerpt'] = $line['description'];
                    unset($line['description']);

                    $line['slug'] = $line['slug'] . '-' . uniqid();
                    // Insert the data into the repository (or process it further)
                    $this->postRepository->create($line);

                    // Print the data for verification
                    print_r($line); // Display the data for verification

                    // Increment the index to move to the next category ID
                    $categoryIndex++;

                    // Reset the index if we have reached the end of the category IDs array
                    if ($categoryIndex >= count($categoryIds)) {
                        $categoryIndex = 0;
                    }
                }
            }
        }
    }

    // Function to read a CSV file
    private static function readCSV($filePath)
    {
        $data = [];

        // Check if the file exists
        if (!file_exists($filePath)) {
            die("File not found: " . $filePath);
        }

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle);  // Read the first line (header)

            // Check if the header is valid
            if ($header !== ['title', 'slug', 'category', 'description', 'keywords']) {
                die("Invalid header in file: " . $filePath);
            }

            // Read the remaining lines (data)
            while (($line = fgetcsv($handle)) !== false) {
                // Associate columns with header names
                $data[] = array_combine($header, $line);
            }

            fclose($handle);
        } else {
            die("Error opening the file: " . $filePath);
        }

        return $data;
    }
}
