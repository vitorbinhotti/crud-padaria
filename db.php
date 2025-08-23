<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_padaria";


$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Conexao Falhou: " . $conn -> connect_error);
}

?>