<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['emailAdmin']) && !empty($_POST['senhaAdmin'])){
    //ACESSA SISTEMA
    include_once('./conexao.php');
    $email = $_POST['emailAdmin'];
    $senha = $_POST['senhaAdmin'];

    $sql = "SELECT * FROM user_admin WHERE email = '$email' and senha = '$senha'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['emailAdmin']);
        unset($_SESSION['senhaAdmin']);
        header('Location: login.php');
    } else {
        $_SESSION['emailAdmin'] = $email;
        $_SESSION['senhaAdmin'] = $senha;
        header('Location: index.php');
    }
    
} else { 
    //SEM ACESSO
    header('Location: login.php');
}
