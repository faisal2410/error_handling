<?php
class PaymentProcessor
{
    public function processPayment($amount)
    {
        try {
            // Simulate checking the payment amount
            $this->checkAmount($amount);
            echo "Payment of $$amount processed successfully.\n";
        } catch (InvalidArgumentException $e) {
            echo "Payment processing error: " . $e->getMessage() . "\n";
        }
    }

    private function checkAmount($amount)
    {
        try {
            // Simulate an error in validation
            if ($amount <= 0) {
                throw new InvalidArgumentException("Invalid payment amount: must be greater than 0.");
            }

            $this->authorizeTransaction($amount);
        } catch (RuntimeException $e) {
            echo "Authorization error: " . $e->getMessage() . "\n";
        }
    }

    private function authorizeTransaction($amount)
    {
        // Simulate an error during transaction authorization
        if ($amount > 1000) {
            throw new RuntimeException("Authorization failed: amount exceeds limit.");
        }
        echo "Transaction authorized.\n";
    }
}

$processor = new PaymentProcessor();
$processor->processPayment(500);
