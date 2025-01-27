<?php
session_start(); // Para acceder a los mensajes en sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frontend</title>
</head>
<body>
    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red;"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div style="color: green;"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['result'])): ?>
        <h3>Resultados:</h3>
        <pre><?= print_r($_SESSION['result'], true) ?></pre>
        <?php unset($_SESSION['result']); ?>
    <?php endif; ?>


    <h2>Insertar usuario</h2>
    <form method="POST" action="main.php">
        <input type="hidden" name="action" value="insert_user">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="pwd" placeholder="Contraseña" required>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>