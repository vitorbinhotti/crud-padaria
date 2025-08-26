<?php
include 'db.php';
$id = $_GET['id'];
$tabela = $_GET['tabela'];

$sql_client = "SELECT * FROM pedidos WHERE fk_clientes = $id";
$result = $conn->query($sql_client);
$row = $result->fetch_assoc();

if ($tabela === 'usuarios') {
    $sql = "DELETE FROM usuarios WHERE id_usuarios=$id";
} elseif ($tabela === 'clientes') {
    if ($row['fk_clientes'] == $id) {
        echo "Não é possível excluir este cliente, pois ele possui pedidos associados.";
        exit();
    } else {
        $sql = "DELETE FROM clientes WHERE id_cliente=$id";
    }
} elseif ($tabela === 'produtos') {
    $sql = "DELETE FROM produtos WHERE id_produtos=$id";
 }elseif ($tabela === 'pedidos') {
    $sql = "DELETE FROM pedidos WHERE id_pedidos=$id";
}
if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.";
} else {
    echo "Erro" . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: read.php?tipo=usuario");
