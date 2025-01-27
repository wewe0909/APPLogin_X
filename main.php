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



// ----------------------------------------
// 1. VERIFICAR CONEXIÓN A LA BASE DE DATOS
// ----------------------------------------
if (!isset($_SESSION['connection_checked'])) {
    try {
         // Connection Marysol
      //   $server = new Server("172.17.0.2,1433", "dbtest");
      //   $connection = new Connection($server, "sa", "weWE240240");

        //Connection Abraham
         $server = new Server("172.17.0.3,1433", "PP_DDBB");
         $connection = new Connection($server, "sa", "abraham1405$");
         $_SESSION['connection_checked'] = true; // Evitar verificar en cada recarga
    } catch (Exception $e) {
         $_SESSION['error'] = "Error de conexión: " . $e->getMessage();
         unset($_SESSION['connection_checked']);
         header("Location: frontend.php");
         exit();
    }
}
header("Location: frontend.php");

// ----------------------------------------
// 2. MANEJAR SOLICITUDES POST (SWITCH-CASE)
// ----------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'] ?? '';
        $server = new Server("172.17.0.2,1433", "dbtest");
        $connection = new Connection($server, "sa", "weWE240240");

        switch ($action) {
            case 'select_table_content':
                $table = $_POST['table'] ?? '';
                $command = new Command("sp_select_table_content", $connection);
                $command->addParameter(new CommandParameter("table", $table));
                $result = $command->execute();
                $_SESSION['result'] = $result->getData();
                break;

            case 'insert_user':
                $username = $_POST['username'] ?? '';
                $pwd = $_POST['pwd'] ?? '';
                
                $_SESSION['success'] = "Usuario insertado correctamente";
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