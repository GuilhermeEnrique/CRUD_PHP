<?php
include("./conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-9">
                <h3>
                    Usuários cadastrados
                </h3>
            </div>

            <div class="d-grid gap-2 col-3 float-end">
                <div class="input-group mb-3">
                        <input class="form-control" type="search" placeholder="Pesquisar"  aria-label="Search">
                        <button class="btn btn-success" id="button-addon2" type="submit">Pesquisar</button>
                </div>
            </div>

            <span class="listar-usuarios"></span>

            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="./index.php" class="btn btn-success" type="button">Voltar</a>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/paginacao.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

<?php
$conn->close();
?>