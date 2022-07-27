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

<body class="fundo-bd">
    <div class="container-fluid mainContainer">
        <div class="row g-4 main">
            <div class="col-12">
                <div class="row form">
                    <div class="col-8">
                        <div class="title-login">
                            <h2 class="text-center text-success">
                                Login
                            </h2>
                            <br>
                            <h5>Faça o login para ter acesso a informações restritas.</h5>
                        </div>
                        <form role="form" class="form-login">
                            <div class="col-10">
                                <div class="input-group">
                                    <span class="input-group-text">Email</span>
                                    <input type="email" class="form-control" id="email-login" name="email-login" required="">
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="input-group">
                                    <span class="input-group-text">Senha</span>
                                    <input type="password" class="form-control" id="password" name="password" required="">
                                </div>
                            </div>
                            <a href="#" class="link-primary">Esqueceu sua senha?</a>
                            <div class="d-grid gap-2 col-6 mx-auto btn-login">
                                <a href="./index.php" class="btn btn-primary" type="button">Entrar</a>
                            </div>
                        </form>
                    </div>

                    <div class="col-auto">
                        <img alt="Ícone de administrador" src="./img/icon-admin.png" class="img-login" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>


</html>