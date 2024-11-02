<?php
class FatalErrorHandler
{
    public function __construct()
    {
        echo "Attempting to create a non-existent object:\n";
        $this->triggerFatalError();
    }

    public function triggerFatalError()
    {
        UndefinedClass::doSomething();
    }
}

function handleShutdown()
{
    $error = error_get_last();
    if ($error && $error['type'] === E_ERROR) {
        echo "Fatal error handled gracefully: {$error['message']}\n";
    }
}

register_shutdown_function('handleShutdown');

new FatalErrorHandler();
echo "hello";