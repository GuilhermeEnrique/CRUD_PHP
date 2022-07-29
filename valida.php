<?php
// print_r($_REQUEST);

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    //ACESSA SISTEMA
    include_once('./conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    echo $email;
    echo $senha;
} else {
    //SEM ACESSO
    header('Location: login.php');
}
