<?php

declare(strict_types=1);

class RecoverableErrorExample
{
    public function addNumbers(int $a, int $b): int
    {
        return $a + $b;
    }
}

try {
    $example = new RecoverableErrorExample();
    echo $example->addNumbers(5, "10");
} catch (TypeError $e) {
    echo "Recoverable error caught: " . $e->getMessage() . "\n";
}
