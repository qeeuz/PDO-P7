<?php class Database
{
    private $host = "localhost";
    private $db_name = "merryweather";
    private $username = "root";
    private $password = "";
    public $pdo;
    public $stmt;

    public function getConnection() // Correcte naamgeving
    {
        $this->pdo = null;
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->pdo;
    }

    public function execute($query, $params = null)
    {
        try {
            $this->stmt = $this->pdo->prepare($query);
            if ($params !== null) {
                $this->stmt->execute($params);
            } else {
                $this->stmt->execute();
            }
            return $this->stmt; // Return the PDOStatement object
        } catch (PDOException $e) {
            echo "Execution error: " . $e->getMessage();
            return false;
        }
    }
}

