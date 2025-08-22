<html lang="en">
    <title>Read</title>
</html>


<?php

include 'db.php';

$tipo = $_GET['tipo'];

$sql = "SELECT * FROM clientes";

$result = $conn -> query($sql);

if($result -> num_rows > 0){

    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
        </tr>";
    if ($tipo === 'usuario');
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_cliente']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>{$row['telefone']}</td>";
        if ($tipo === 'usuario') {
            echo "<td>
                <a href='update.php?id={$row['id_cliente']}'>Editar</a> |
                <a href='delete.php?id={$row['id_cliente']}'>Excluir</a>
            </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente encontrado.";
}

$sql = "SELECT * FROM usuarios";

$result = $conn -> query($sql);

if($result -> num_rows > 0){

    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
        </tr>";
    if ($tipo === 'usuario');
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_usuarios']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>{$row['telefone']}</td>";
        if ($tipo === 'usuario') {
            echo "<td>
                <a href='update.php?id={$row['id_usuarios']}'>Editar</a> |
                <a href='delete.php?id={$row['id_usuarios']}'>Excluir</a>
            </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}

$sql = "SELECT * FROM produtos";

$result = $conn -> query($sql);

if($result -> num_rows > 0){

    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Descrição </th>
            <th> Quantidade </th>
            <th> Data </th>
        </tr>";
    if ($tipo === 'usuario');
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_produtos']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['quantidade']}</td>
            <td>{$row['data_adicionado']}</td>";
        if ($tipo === 'usuario') {
            echo "<td>
                <a href='update.php?id={$row['id_produtos']}'>Editar</a> |
                <a href='delete.php?id={$row['id_produtos']}'>Excluir</a>
            </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn -> close();

?>

<?php

include 'db.php';

if($tipo === 'usuario'){
    include 'create_user.php';
    include 'create_product.php';
}

$conn -> close();
?>