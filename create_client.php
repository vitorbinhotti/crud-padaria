<?php
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['adicionarUsuario'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO usuarios (nome,email,telefone) VALUE ('$nome','$email','$telefone')";

       if($conn ->query($sql) === true){
       }else{
        echo "Erro" . $sql . "<br>" . $conn->error;
       }
       $conn -> close();
       header("Refresh: 0");
    }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form method="POST" action="read.php?tipo=usuario">
        <h1>Adicionar Usuário:</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="email">Telefone:</label>
        <input type="number"  maxlength="11" name="telefone" required><br>
        <button type="submit" name="adicionarUsuario">Adicionar</button>
    </form>
</body>
</html>