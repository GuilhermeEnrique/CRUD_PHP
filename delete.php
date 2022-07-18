<?php
include("./conexao.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM `user` WHERE `id`='$user_id' ";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<script>window.alert('Excluído com Sucesso!');";
        echo "javascript:window.location='view.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" .  $conn->error;
    }
    $conn->close();
}
