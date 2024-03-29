<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body class="fundo-bd-login">
    <div class="container-fluid ContainerLogin">
        <div class="row g-4 mainLogin">
            <div class="col-6">
                <div class="col-12 title-login">
                    <h3 class="mb-2">Login</h3>
                    <br>
                </div>
                <br>
                <form action="./valida.php" method="POST">
                    <div class="row">
                        <div class="col-11">
                            <div class="input-group">
                                <span class="input-group-text">Email</span>
                                <input type="email" class="form-control" id="emailAdmin" name="emailAdmin" placeholder="Seu.email@exemplo.com" required="">
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Senha</span>
                                <input type="password" class="form-control" id="senhaAdmin" name="senhaAdmin" placeholder="Sua senha" required="">
                            </div>
                        </div>
                        <div class="col-7 btn-senha">
                            <a href="#">Esqueceu sua senha?</a>
                        </div>
                        <div class="col-auto btn-cadAdmin">
                            <a href="./cadAdmin.php">Cadastrar administrador.</a>
                        </div>
                        <div class="d-grid gap-2 col-8 mx-auto btn-login">
                            <input class="btn btn-primary" type="submit" name="submit" submit value="Entrar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-auto img-login">
                <img src="./img/icon-admin.png" class="mx-auto d-block">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>


</html>