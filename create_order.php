<?php

include 'db.php';
$id_cliente = $_GET['id_cliente'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['criarPedido'])) {
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];

        $sql = "SELECT quantidade FROM produtos WHERE id_produtos = $produto";
        $result = $conn->query($sql);
        $row_quanti = $result->fetch_assoc();

        $resultado = $row_quanti['quantidade'] - $quantidade;

        $sql = "SELECT disponibilidade FROM produtos WHERE id_produtos = $produto";
        $result = $conn->query($sql);
        $row_disp = $result->fetch_assoc();
        $disponibilidade = $row_disp['disponibilidade'];

        if ($resultado >= 0 && $disponibilidade === '1') {
            $sql = "SELECT nome FROM clientes WHERE id_cliente = $id_cliente";
            $result = $conn->query($sql);
            $row_cli = $result->fetch_assoc();

            $sql = "SELECT nome FROM produtos WHERE id_produtos = $produto";
            $result = $conn->query($sql);
            $row_pro = $result->fetch_assoc();

            $sql_pedido = "INSERT INTO pedidos (descricao,fk_produtos,quantidade,fk_clientes) VALUES ('Produto: {$row_pro['nome']} / Quantidade: $quantidade / Cliente: {$row_cli['nome']}','$produto','$quantidade','$id_cliente')";

            $sql_quantidade = "UPDATE produtos SET quantidade = $resultado WHERE id_produtos = $produto";

            if ($resultado === 0) {
                $sql_disponibilidade = "UPDATE produtos SET disponibilidade = false WHERE id_produtos = $produto";
            }

            if ($conn->query($sql_pedido) !== true) {
                echo "Erro ao criar pedido: " . $conn->error;
            }

            if ($conn->query($sql_quantidade) !== true) {
                echo "Erro ao atualizar quantidade: " . $conn->error;
            }

            if ($resultado === 0) {
                if ($conn->query($sql_disponibilidade) !== true) {
                    echo "Erro ao atualizar disponibilidade: " . $conn->error;
                }
            }

            $conn->close();
            header("Location: orders.php?id_cliente=$id_cliente");
        } else {
            echo "Quantidade indisponível";
            $conn->close();
            header("Location: read.php?id_cliente=$id_cliente");
        }
    }
}




?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar pedido</title>
</head>

<body>
    <form method="POST">
        <h1>Criar Pedido</h1>
        <label for="produto">ID do Produto:</label>
        <input type="number" name="produto" required><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required><br>
        <button type="submit" name="criarPedido">Criar Pedido</button>
    </form>
</body>

</html>