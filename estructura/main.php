<?php 
header('Content-Type: text/xml');
include_once 'includes.php'; 

try {
   $server = new Server("172.17.0.2,1433","dbtest");
   $connection = new Connection($server, "sa", "weWE240240");
   $command = new Command("sp_select_table_content", $connection);
   $command->addParameter(new CommandParameter("table", "Users"));
   $result = $command->execute();
   $result->printData();
   $connection->close();
 } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
 }


   // $command->addParameter(new CommandParameter("username", "usernuevo"));
   // $command->addParameter(new CommandParameter("pwd", "securepassword123")); 