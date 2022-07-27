<?php

include("./conexao.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = $user_id";

    $result = $conn->query($sql);

    #puxar os dados dos inputs e anexa a uma variavel
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id         = $row['id'];
            $firstName  = $row['firstName'];
            $lastName   = $row['lastName'];
            $username   = $row['username'];
            $email      = $row['email'];
            $address    = $row['address'];
            $city       = $row['city'];
            $state      = $row['state'];
            $cep        = $row['cep'];
        }
?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Atualizar</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/style.css">
        </head>

        <body class="fundo-bd">
            <div class="container-fluid mainContainer">
                <div class="row g-3 main-editar">

                    <img src="./img/editar.png" class="img-fluid editar-img">

                    <div class="col-md-11 col-lg-12">
                        <h4 class="mb-3">Cadastro do <?php echo $firstName; ?></h4>
                        <form action="./update.php" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                            <div class="row g-3">
                                <div class="input-group">
                                    <span class="input-group-text">Nome e sobronome</span>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required="">
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required="">
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Username</span>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required="">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-text">E-mail</span>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-text">Endereço</span>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Estado</span>
                                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>" required="">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text">Cidade</span>
                                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" required="">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cep; ?>" required="">
                                    <span class="input-group-text">CEP</span>
                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                                <a href="./list.php" class="btn btn-outline-primary" type="button">Ver cadastrados</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    } else {
        header('Location: select.php');
    }
}
?>