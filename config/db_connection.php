<?php
class DatabaseConnection
{
    private $host = 'mysql-8.0';
    private $db_name = 'test';
    private $username = 'root';
    private $password = 'root';
    public $connection;

    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        $port = 3306;

        $dsn = "mysql:host={$this->host};port={$port};dbname={$this->db_name};charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

$db = new DatabaseConnection();
$connection = $db->getConnection();
