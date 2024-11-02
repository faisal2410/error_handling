<?php
class DatabaseConnectionException extends Exception {}

class Database
{
    private $connection;

    public function connect($host, $user, $password, $dbname)
    {
        try {
            $this->connection = new mysqli($host, $user, $password, $dbname);
            if ($this->connection->connect_error) {
                throw new DatabaseConnectionException("Database connection failed: " . $this->connection->connect_error);
            }
            echo "Connected successfully!";
        } catch (DatabaseConnectionException $e) {
            echo $e->getMessage();
        } finally {
            $this->close();
        }
    }

    public function close()
    {
        if ($this->connection) {
            $this->connection->close();
            echo "Connection closed.";
        }
    }
}

$db = new Database();
$db->connect("localhost", "root", "wrong_password", "my_database");