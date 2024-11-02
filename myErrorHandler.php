<?php

// Define a custom error handler
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    echo "Custom Error Handler:\n";
    echo "Error [$errno]: $errstr\n";
    echo "File: $errfile\n";
    echo "Line: $errline\n";
    return true; // Returning true prevents the PHP internal error handler from executing
}

// Register the custom error handler
set_error_handler("myErrorHandler", E_ALL);

// Trigger an error to see the custom handler in action
// echo $undefinedVariable;


try {
    // Logic that throws an error
    if (!file_exists("nonexistentfile.txt")) {
        throw new Error("File does not exist!");
    }
} catch (Error $e) {
    echo "Caught Error: " . $e->getMessage() . "\n";
}