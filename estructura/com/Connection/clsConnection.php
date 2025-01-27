<?php

class Connection {
    private ?PDO $pdo;
    private string $username;
    private string $password;
 
 
    public function __construct(Server $server, $username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->connect($server);
    }
    private function connect(Server $server):void {
        try {
            $this->pdo = new PDO($server->getDsn(), $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
    public function getPdo():PDO {
        return $this->pdo;
    }
 

    public function close():void {
        $this->pdo = null;
    }
 } 


