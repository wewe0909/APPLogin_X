<?php

class Command {
   private string $procedureName;
   private array $parameters = [];
   private PDO $pdo;


   public function __construct($procedureName, Connection $connection) {
       $this->procedureName = $procedureName;
       $this->pdo = $connection->getPdo();
   }


   public function addParameter(CommandParameter $param):void {
       $this->parameters[] = $param;
   }

   public function execute() {
        try {
            $placeholders = implode(', ', array_map(fn($param) => ":{$param->getName()}", $this->parameters));
            $sql = "{CALL {$this->procedureName}($placeholders)}";
            $stmt = $this->pdo->prepare($sql);

            foreach ($this->parameters as $param) {
                $stmt->bindValue(":{$param->getName()}", $param->getValue());
            }

            $stmt->execute();

            return new Result($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error executing command: " . $e->getMessage());
        }
    }

//     public function execute() {
//         try {
//             $placeholders = implode(', ', array_map(fn($param) => ":{$param->getName()}", $this->parameters));
//             $sql = "{CALL {$this->procedureName}($placeholders)}";
//             $stmt = $this->pdo->prepare($sql);

//             // Bind parameters
//             foreach ($this->parameters as $param) {
//                 $stmt->bindValue(":{$param->getName()}", $param->getValue());
//             }

//             // Execute the statement
//             $stmt->execute();

//             // Get the return code
//             $returnCode = $stmt->errorCode() === '00000' ? 0 : -1;  // Assuming 0 is success, -1 is failure

//             // You can return the status code directly if there's no other result set
//             return new Result([], $returnCode);
//         } catch (PDOException $e) {
//             // In case of an exception, return an error code
//             return new Result([], -1);
//         }
//     }

}

