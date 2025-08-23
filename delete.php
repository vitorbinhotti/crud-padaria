<?php
include 'db.php';
$id = $_GET['id'];
$tabela = $_GET['tabela'];
if ($tabela === 'usuarios') {
    $sql = "DELETE FROM usuarios WHERE id_usuarios=$id";
} elseif ($tabela === 'clientes') {
    $sql = "DELETE FROM clientes WHERE id_cliente=$id";
} elseif ($tabela === 'produtos') {
    $sql = "DELETE FROM produtos WHERE id_produtos=$id";
}
if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.";
} else {
    echo "Erro" . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: read.php?tipo=usuario");
?>