<?php
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO clientes (nome,email,telefone) VALUE ('$nome','$email','$telefone')";

       if($conn ->query($sql) === true){
        echo "Novo registro criado com sucesso.";
       }else{
        echo "Erro" . $sql . "<br>" . $conn->error;
       }
       $conn -> close();
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form method="POST" action="create.php">
        <h1>Adicionar clientes:</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="email">Telefone:</label>
        <input type="number"  maxlength="11" name="telefone" required><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>