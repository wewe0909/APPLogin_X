<?php
session_start();
include_once 'includes.php';

// try {
//    $server = new Server("172.17.0.2,1433", "dbtest");
//    $connection = new Connection($server, "sa", "weWE240240");
//    // $command = new Command("sp_select_table_content", $connection);
//    // $command->addParameter(new CommandParameter("table", "Users"));
//    // $result = $command->execute();
//    // $result->printData();
//    // $connection->close();
// } catch (Exception $e) {
//    echo "Error: " . $e->getMessage();
// }
// $command->addParameter(new CommandParameter("username", "usernuevo"));
// $command->addParameter(new CommandParameter("pwd", "securepassword123")); 

header("Location: frontend/php/start.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'] ?? '';

        // Connection Marysol
        // $server = new Server("172.17.0.2,1433", "PP_DDBB");
        // $connection = new Connection($server, "sa", "weWE240240");

        //Connection Abraham
        $server = new Server("172.17.0.3,1433", "PP_DDBB");
        $connection = new Connection($server, "sa", "abraham1405$");
        switch ($action) {
            case 'login':
                
                $username = $_POST['username'] ?? '';
                $pwd = $_POST['pwd'] ?? '';
                
                $_SESSION['success'] = "Usuario insertado correctamente";
                break;

            case 'register':

                break;

            case 'modify':
                
                break;

            default:
                $_SESSION['error'] = "Acción no válida";
                break;
        }

        $connection->close();
        header("Location: frontend.php"); // Redirigir al frontend
        exit();

    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: frontend.php");
        exit();
    }
}

// ----------------------------------------
// 3. REDIRIGIR AL FRONTEND SI ES NECESARIO
// ----------------------------------------
exit();
?>