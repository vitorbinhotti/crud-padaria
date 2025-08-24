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
        echo "<h1>Clientes:</h1><table border='1'>
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
        echo "</table>";
    } else {
        echo "Nenhum cliente encontrado.<br>";
    }

    $sql = "SELECT * FROM usuarios";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<h1>Usuários:</h1><table border='1'>
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
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.<br>";
    }
}
$sql = "SELECT * FROM produtos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<h1>Produtos:</h1><table border='1'>
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
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.<br>";
}

$conn->close();

?>

<?php
if ($tipo === 'usuario') {
    include 'create_client.php';
    include 'create_user.php';
    include 'create_product.php';
} elseif($tipo === 'cliente'){
    include 'create_order.php';
}
?>