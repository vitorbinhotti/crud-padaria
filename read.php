<html lang="en">
<title>Read</title>

</html>


<?php

include 'db.php';

$tipo = $_GET['tipo'];

$sql = "SELECT * FROM clientes";

$result = $conn->query($sql);

if ($tipo === 'usuario') {
    if ($result->num_rows > 0) {
        echo "<h2>Clientes:</h2><table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['id_cliente']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>{$row['telefone']}</td>";
            if ($tipo === 'usuario') {
                echo "<td>
                <a href='update.php?id={$row['id_cliente']}&&nome={$row['nome']}&&email={$row['email']}&&telefone={$row['telefone']}&&tabela=clientes'>Editar</a> |
                <a href='delete.php?id={$row['id_cliente']}&&tabela=clientes'>Excluir</a>
            </td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    } else {
        echo "Nenhum cliente encontrado.<br>";
    }

    $sql = "SELECT * FROM usuarios";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<h2>Usuários:</h2><table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['id_usuarios']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>{$row['telefone']}</td>";
            if ($tipo === 'usuario') {
                echo "<td>
                <a href='update.php?id={$row['id_usuarios']}&&nome={$row['nome']}&&email={$row['email']}&&telefone={$row['telefone']}&&tabela=usuarios'>Editar</a> |
                <a href='delete.php?id={$row['id_usuarios']}&&tabela=usuarios'>Excluir</a>
            </td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    } else {
        echo "Nenhum usuário encontrado.<br>";
    }
}
$sql = "SELECT * FROM produtos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<h2>Produtos:</h2><table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Descrição </th>
            <th> Quantidade </th>
            <th> Data de Validade </th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_produtos']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['quantidade']}</td>
            <td>{$row['data_validade']}</td>";
        if ($tipo === 'usuario') {
            echo "<td>
                <a href='update.php?id={$row['id_produtos']}&&nome={$row['nome']}&&descricao={$row['descricao']}&&quantidade={$row['quantidade']}&&data_validade={$row['data_validade']}&&tabela=produtos'>Editar</a> |
                <a href='delete.php?id={$row['id_produtos']}&&tabela=produtos'>Excluir</a>
            </td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
} else {
    echo "Nenhum produto encontrado.<br>";
}
$sql = "SELECT * FROM pedidos";

$result = $conn->query($sql);
if ($tipo === 'usuario') {
    if ($result->num_rows > 0) {
        echo "<h2>Pedidos:</h2><table border='1'>
        <tr>
            <th> ID </th>
            <th> Descrição </th>
            <th> Quantidade </th>
            <th> Data do Pedido </th>
            <th> ID Cliente </th>
            <th> ID Produto </th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['id_pedidos']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['quantidade']}</td>
            <td>{$row['data_pedido']}</td>
            <td>{$row['fk_clientes']}</td>
            <td>{$row['fk_produtos']}</td>";
            if ($tipo === 'usuario') {
                echo "<td>
                <a href='delete.php?id={$row['id_pedidos']}&&tabela=pedidos'>Excluir</a>
            </td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    } else {
        echo "Nenhum pedido encontrado.<br>";
    }
}

$conn->close();

?>

<?php
if ($tipo === 'usuario') {
    echo "<a href='create_client.php'>Adicionar Cliente</a><br>";
    echo "<a href='create_user.php'>Adicionar Usuário</a><br>";
    echo "<a href='create_product.php'>Adicionar Produto</a>";
} elseif ($tipo === 'cliente') {
    include 'create_order.php';
}
?>