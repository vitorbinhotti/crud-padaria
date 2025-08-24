<?php
    include 'db.php';

    $sql = 'SELECT id_cliente FROM clientes';
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $id_cliente = $row['id_cliente'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = $_POST['login'];
        if($login == 'cliente'){
            header("Location: read.php?tipo=cliente&&id_cliente=$id_cliente");
        } elseif($login == 'usuario'){
            header('Location: read.php?tipo=usuario');
        }
    }
    $conn -> close();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <button type="submit" name="login" value="cliente">Cliente</button>
        <button type="submit" name="login" value="usuario">Usuário</button>
    </form>
</body>
</html>