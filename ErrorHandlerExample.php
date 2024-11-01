<?php
// error_reporting(E_ALL);
// alternatively
// error_reporting(E_WARNING|E_ERROR);

/*
*/ 
ini_set('display_errors', 1); // Display errors
ini_set('display_startup_errors', 1); // Display startup errors
// error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL); // Show all types of errors
// ini_set('log_errors', 'On'); enables logging of errors to a file.
ini_set('error_log', __DIR__.'/php-error.log'); // Specify error log file
/*
// In production, turn off display and log errors instead
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/php-error.log'); // Specify error log file
*/ 

class ErrorHandlerExample
{
    public function divide($a, $b)
    {
        try {
            if ($b === 0) {
                throw new Exception("Division by zero is not allowed. Try again",50);
            }
            return $a / $b;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage()."Error code: ".$e->getCode()." File: ".$e->getFile()." Line: ".$e->getLine() ;
            // print_r($e->getTrace());
            // echo $e->getTraceAsString();
        }
    }
}

$handler = new ErrorHandlerExample();
echo $handler->divide(10, 0); // Outputs: Error: Division by zero is not allowed.