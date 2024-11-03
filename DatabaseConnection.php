<?php
class DatabaseException extends Exception
{
    public function errorMessage()
    {
        // Log the actual error for internal debugging
        error_log($this->getMessage(),3,__DIR__.'/'.'mylog.log');
        // Return a generic error for the user
        return "A database error occurred. Please try again later.";
    }
}

try {
    // Code that may throw an exception
    throw new DatabaseException("Connection timed out while accessing database.");
} catch (DatabaseException $e) {
    echo $e->errorMessage();
}
