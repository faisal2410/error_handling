<?php

// Define a custom exception class
class CustomException extends Exception
{
    public function errorMessage()
    {
        return "Custom Exception: [{$this->code}]: {$this->message}\n";
    }
}

// Using try-catch to handle a custom exception
try {
    throw new CustomException("An error occurred", 404);
} catch (CustomException $e) {
    echo $e->errorMessage();
}
