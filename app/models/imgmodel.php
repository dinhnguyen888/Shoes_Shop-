<?php 

class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
           return false;
        }
        else return true;
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function fetchAssoc($result) {
        return $result->fetch_assoc();
    }

    public function close() {
        $this->conn->close();
    }

    public function connecterror() {
        $this->conn->connect_error;
    }
    public function exec($sql) {
        return $this->conn->exec($sql);
    }
}
