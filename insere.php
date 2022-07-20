<?php
        include("./conexao.php");

        #PUXA AS VARIAVEIS DO FORMULARIO
        $firstName = $_POST["firstName"];
        $lastName  = $_POST["lastName"];
        $username  = $_POST["username"];
        $email     = $_POST["email"];
        $address   = $_POST["address"];
        $state     = $_POST["state"];
        $city      = $_POST["city"];
        $cep       = $_POST["cep"];

        #INSERIR OS DADOS
        $sql = "INSERT INTO user(id, firstName, lastName, username, email, `address`, city, `state`, cep) VALUES 
        (null, '$firstName', '$lastName', '$username', '$email', '$address', '$city', '$state', '$cep')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "<script>window.alert('Cadastrado com Sucesso!');";
            echo "javascript:window.location='listar.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

?>
