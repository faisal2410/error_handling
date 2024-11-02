<?php
class FileProcessor
{
    public function readFile($filePath)
    {
        try {
            // Check if file exists
            if (!file_exists($filePath)) {
                throw new FileNotFoundException("File not found: $filePath");
            }

            // Try opening the file
            $fileContent = file_get_contents($filePath);
            if ($fileContent === false) {
                throw new FileReadException("Failed to read the file: $filePath");
            }

            echo "File content: $fileContent\n";
        } catch (FileNotFoundException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        } catch (FileReadException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        } catch (Exception $e) {
            echo "An unexpected error occurred: " . $e->getMessage() . "\n";
        }
    }
}

class FileNotFoundException extends Exception {}
class FileReadException extends Exception {}

$fileProcessor = new FileProcessor();
$fileProcessor->readFile("non_existent_file.txt");
