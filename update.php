<?php
include('./conexao.php');

if (!isset($_POST['update'])) {
    $user_id    = $_POST['id'];
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $city       = $_POST['city'];
    $state      = $_POST['state'];
    $cep        = $_POST['cep'];

    $sql = "UPDATE `user` SET `firstName` = '$firstName', `lastName` = '$lastName', `username` = '$username', `email` = '$email', `address` = '$address',
    `city` = '$city', `state` = '$state', `cep` = '$cep' WHERE `id` = '$user_id' ";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<script>window.alert('Atualizado com Sucesso!');";
        echo "javascript:window.location='list.php';</script>";
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
} else {
    echo "<script>window.alert('Error, nenhuma variavel carregada!');";
    echo "javascript:window.location='list.php';</script>";
}
