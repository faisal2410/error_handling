<?php
class ErrorHandlerExample
{
    public function divide($a, $b)
    {
        try {
            if ($b === 0) {
                throw new Exception("Division by zero is not allowed.");
            }
            return $a / $b;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$handler = new ErrorHandlerExample();
echo $handler->divide(10, 0);