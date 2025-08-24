<?php
include 'db.php';
$id_cliente = $_GET['id_cliente'];

$sql = "SELECT * FROM pedidos WHERE fk_clientes = $id_cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Seus pedidos:</h1><table border='1'>
        <tr>
            <th> Descrição </th>
            <th> Data do Pedido </th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['descricao']}</td>
            <td>{$row['data_pedido']}</td>
        </tr>";
    }
    echo "</table><br>";
} else {
    echo "Nenhum pedido encontrado.<br>";
}

echo "<a href='read.php?tipo=cliente&&id_cliente=$id_cliente'>Fazer novo pedido</a><br>";

$conn->close();
?>