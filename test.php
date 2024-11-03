<?php
$fiber = new Fiber(function () {
    try {
        echo "Processing...\n";
        throw new Exception("Error in Fiber");
    } catch (Exception $e) {
        echo "Caught exception in Fiber: " . $e->getMessage() . "\n";
    }
    Fiber::suspend();
});

$fiber->start();
$fiber->resume();
echo "test";

/*
Output :
Processing...
Caught exception in Fiber: Error in Fiber
test

*/ 

/*
$fiber = new Fiber(function () {
    echo "Fetching data...\n";
    sleep(2);  // Simulate a delay
    echo "Data fetched!\n";
    Fiber::suspend();
});

echo "Starting async task...\n";
$fiber->start();
echo "Task started in background\n";
// Here we can perform other operations
echo "Doing other work while waiting...\n";
$fiber->resume(); // Resume Fiber after doing other work
echo "All tasks completed!\n";
*/ 

/*
Output :
Starting async task...
Fetching data...
Data fetched!
Task started in background
Doing other work while waiting...
All tasks completed!

*/ 
/*
$fiber = new Fiber(function () {
    echo "Inside fiber\n";
    Fiber::suspend(); // Suspend the fiber, yielding control
    echo "Resuming fiber\n";
});

echo "Starting fiber\n";
$fiber->start(); // Start the fiber
echo "Suspending...\n";
$fiber->resume(); // Resume execution
*/ 

/*
Output :
Starting fiber
Inside fiber
Suspending...
Resuming fiber

*/ 