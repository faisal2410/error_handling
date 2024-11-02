<?php

declare(strict_types=1);

class ErrorHandlingExample
{
    public function performCalculation(int $num)
    {
        if ($num < 0) {
            throw new Exception("Number must be positive.");
        }
        echo sqrt($num) . "\n";
    }
}

try {
    $example = new ErrorHandlingExample();
    $example->performCalculation(-5);
} catch (Throwable $e) {
    echo "Caught an error or exception: " . $e->getMessage() . "\n";
}
