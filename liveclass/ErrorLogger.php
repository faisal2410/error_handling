<?php
class ErrorLogger
{
    private $logFile;

    public function __construct($logFile = 'app_errors.log')
    {
        $this->logFile = __DIR__ . '/' . $logFile;
        ini_set('log_errors', 'On');
        ini_set('error_log', $this->logFile);
        date_default_timezone_set('Asia/Dhaka');
    }

    public function logError($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        error_log("[$timestamp] $message", 3, $this->logFile);
    }

    public function logException(Exception $e)
    {
        $errorMessage = sprintf(
            "Exception: %s in %s on line %d",
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );
        $this->logError($errorMessage);
    }
}

// Usage
$logger = new ErrorLogger();
$logger->logError("A general error occurred.");
$logger->logException(new Exception("A custom exception occurred."));