<?php

class ValidationException extends Exception {}
class AgeException extends Exception {}
class User
{
    private $age;
    private $email;

    public function setAge($age)
    {
        if ($age < 0) {
            throw new AgeException("Age cannot be negative.");
        }
        $this->age = $age;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("Invalid email address.");
        }
        $this->email = $email;
    }
}


try {
    $user = new User();
    $user->setAge(-16);
    $user->setEmail("user@domain");
} catch (AgeException $e) {
    echo "Age Validation Error: " . $e->getMessage();
} catch (ValidationException $e) {
    echo "Email Validation Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
/*
try {
    $user = new User();
    $user->setAge(-1);
} catch (AgeException $e) {
    echo "Age Error: " . $e->getMessage() ."\n";
} catch (ValidationException $e) {
    echo "Validation Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}


try {
    $user = new User();
    $user->setEmail("invalid-email");
} catch (ValidationException $e) {
    echo "Validation Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
*/ 
