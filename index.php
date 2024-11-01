<?php
ini_set('display_errors', 1); // Display errors
ini_set('display_startup_errors', 1); // Display startup errors
error_reporting(E_ALL); // Show all types of errors
date_default_timezone_set('Asia/Dhaka');
ini_set('error_log', __DIR__ . '/php-error.log'); // Specify error log file

function testErrorTypes()
{
    // Triggering a notice
    // $undefinedVar;

    // Triggering a warning
    echo 10 / 0;

    // Triggering an error with custom error level
    // trigger_error("This is an E_USER_WARNING", E_USER_WARNING);
    trigger_error("Custom error!", E_USER_ERROR);
    /*
    trigger_error("This is an E_USER_ERROR", E_USER_ERROR);
trigger_error("This is an E_USER_NOTICE", E_USER_NOTICE);
trigger_error("This is an E_USER_DEPRECATED", E_USER_DEPRECATED);
    */ 
}

testErrorTypes();


function logCustomError($message)
{
    $timestamp = date('Y-m-d H:i:s');
    error_log("[$timestamp] $message", 3, __DIR__ . '/custom_errors.log');
}

logCustomError('This is a custom error message.');
