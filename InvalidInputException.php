<?php

class InvalidInputException extends Exception
{
    public function __construct($message = "Invalid input provided", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getCustomMessage()
    {
        return "Custom Error: " . $this->getMessage();
    }
}


function checkNumber($number)
{
    if ($number < 1 || $number > 100) {
        throw new InvalidInputException("Number must be between 1 and 100. Given: $number");
    }
    return "Valid number: $number";
}

try {
    echo checkNumber(150); // This will throw an InvalidInputException
} catch (InvalidInputException $e) {
    echo $e->getCustomMessage(); // Custom message handling
} catch (Exception $e) {
    echo "Standard Exception: " . $e->getMessage();
}