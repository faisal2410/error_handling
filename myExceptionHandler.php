<?php

// Define a custom exception handler
function myExceptionHandler($exception)
{
    echo "Custom Exception Handler:\n";
    echo "Exception: " . $exception->getMessage() . "\n";
    echo "File: " . $exception->getFile() . "\n";
    echo "Line: " . $exception->getLine() . "\n";
}

// Register the custom exception handler
set_exception_handler('myExceptionHandler');

// Trigger an exception to see the custom handler in action
throw new Exception("This is an uncaught exception!");
