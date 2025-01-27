<?php 

class Server {
   private string $serverName;
   private string $databaseName;

   public function __construct($serverName, $databaseName) {
       $this->serverName = $serverName;
       $this->databaseName = $databaseName;
   }

   public function getDsn():string {
       return "sqlsrv:server={$this->serverName};database={$this->databaseName}";
   }
}