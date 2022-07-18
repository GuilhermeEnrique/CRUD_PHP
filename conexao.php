<?php
#BANCO DE DADOS
$servename = 'db';
$username = 'root';
$password = 'sandbox';
$dbname = 'cadastro';

#CRIAR CONEXÃO
$conn = new mysqli($servename, $username, $password, $dbname);
mysqli_set_charset($conn, "UTF8");

#CHECAR CONEXÃO EXISTENTE
if ($conn -> connect_error) {
    die("Conexao com erro".$conn -> connect_error);
}

?>