<?php
include("./conexao.php");

#PUXA AS VARIAVEIS DO FORMULARIO
$nome = $_POST["Name"];
$email  = $_POST["email"];
$senha  = $_POST["senha"];
$confSenha = $_POST["Confsenha"];
#Verifica se as senhas coincidem
if ($senha === $confSenha) {
    #INSERIR OS DADOS
    $sql = "INSERT INTO user_admin (id, `name`, email, senha, confSenha) VALUES (null, '$nome', '$email', '$senha', '$confSenha')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "<script>window.alert('Cadastrado com Sucesso!');";
        echo "javascript:window.location='login.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "<script>window.alert('As senhas não coincidem!');";
    echo "javascript:window.location='cadAdmin.php';</script>";
}
?>