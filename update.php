<?php
include 'db.php';
$id = $_GET['id'];
$tabela = $_GET['tabela'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($tabela === "usuarios") {
        $nome_user = $_POST['nome_user'];
        $email_user = $_POST['email_user'];
        $telefone_user = $_POST['telefone_user'];

        $sql = "UPDATE $tabela SET nome ='$nome_user', email ='$email_user', telefone ='$telefone_user' WHERE id_usuarios = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php?tipo=usuario");
    }
    if ($tabela === "clientes") {
        $nome_cliente = $_POST['nome_cliente'];
        $email_cliente = $_POST['email_cliente'];
        $telefone_cliente = $_POST['telefone_cliente'];

        $sql = "UPDATE $tabela SET nome ='$nome_cliente', email ='$email_cliente', telefone ='$telefone_cliente' WHERE id_cliente = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php?tipo=usuario");
    }
    if ($tabela === "produtos") {
        $nome_produto = $_POST['nome_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $quantidade_produto = $_POST['quantidade_produto'];
        $data_validade = $_POST['data_validade'];

        $sql = "UPDATE $tabela SET nome='$nome_produto', descricao='$descricao_produto', quantidade='$quantidade_produto', data_validade='$data_validade' WHERE id_produtos = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php?tipo=usuario");
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <?php
    if ($tabela === "usuarios") {
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        echo "<form method='POST'>
        <label for='usuario'>Editar Usuário:</label><br>
        <input type='text' placeholder='$nome' name='nome_user'><br>
        <input type='email' placeholder='$email' name='email_user'><br>
        <input type='tel' placeholder='$telefone' name='telefone_user'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    if ($tabela === "clientes") {
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        echo "<form method='POST'>
        <label for='Cliente'>Editar Cliente:</label><br>
        <input type='text' placeholder='$nome' name='nome_cliente'><br>
        <input type='email' placeholder='$email' name='email_cliente'><br>
        <input type='tel' placeholder='$telefone' name='telefone_cliente'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    if ($tabela === "produtos") {
        $nome = $_GET['nome'];
        $descricao = $_GET['descricao'];
        $quantidade = $_GET['quantidade'];
        $data_validade = $_GET['data_validade'];
        echo "<form method='POST'>
        <label for='Produto'>Editar Produto:</label><br>
        <input type='text' placeholder='$nome' name='nome_produto'><br>
        <input type='text' name='descricao_produto' placeholder='$descricao'><br>
        <input type='number' placeholder='$quantidade' name='quantidade_produto'><br>
        <input type='date' value='$data_validade' name='data_validade'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    ?>
</body>

</html>