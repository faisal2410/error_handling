<?php
class CustomErrorHandler
{
    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        echo "Custom Error: [$errno] $errstr - in $errfile on line $errline";
        echo "\n";
    }
}

// Set the custom error handler
set_error_handler(['CustomErrorHandler', 'handleError']);

// Trigger an error to see the custom handler in action
trigger_error("This is a custom error message", E_USER_NOTICE);