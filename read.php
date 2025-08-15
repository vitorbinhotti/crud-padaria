<?php

include 'db.php';

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
    
        while($row = $result -> fetch_assoc()){

            echo " <tr>
                        <td> {$row['id_cliente']} </td>
                        <td> {$row['clientes.nome']} </td>
                        <td> {$row['clientes.email']} </td>
                        <td> {$row['clientes.telefone']} </td>
                        <td>
                            <a href='update.php?id={$row['id_cliente']}'>Editar<a> |
                            <a href='delete.php?id={$row['id_cliente']}'>Excluir</a>
                        </td>
                    </tr>
            ";
        }

    echo "</table>";
}else{
    echo "Nenhum registro encontrado.";
}
$conn -> close();
?>

<a href="create.php">Inserir novo registro.</a>