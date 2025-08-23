<?php
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['adicionarProduto'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];

        $sql = "INSERT INTO produtos (nome,descricao,quantidade) VALUE ('$nome','$descricao','$quantidade')";

       if($conn ->query($sql) === true){
        echo "Novo registro criado com sucesso.";
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
        <h1>Adicionar produtos:</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="text">Descrição:</label>
        <input type="text" name="descricao" required><br>
        <label for="email">Quantidade:</label>
        <input type="number" name="quantidade" required><br>
        <button type="submit" name="adicionarProduto">Adicionar</button>
    </form>
</body>
</html>