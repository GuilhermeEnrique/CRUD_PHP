<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid mainContainer">
        <div class="row g-4 main">
            <div class="col cadastro">
                <img src="./img/cadastro.png" class="mx-auto d-block">
            </div>
            <div class="col form">
                <h3 class="mb-3">Cadastro de usuários</h3>
                <form action="./insere.php" method="POST">
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-text">Nome e sobronome</span>
                            <input type="text" aria-label="First name" class="form-control" id="firstName" name="firstName" required="">
                            <input type="text" aria-label="Last name" class="form-control" id="lastName" name="lastName" required="">
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="seu.email@exemplo.com" required="">
                        </div>
                        <div class="col-md-3">
                            <label for="cep" class="form-label"><abbr title="Código de Endereçamento Postal" class="initialism">CEP</abbr></label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Apenas números" required="">
                        </div>

                        <div class="col-md-9">
                            <label for="address" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Rua Principal, 1234">
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">Estado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">UF</span>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="city" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                        </div>
                        <hr class="my-4">
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                            <a href="./list.php" class="btn btn-outline-primary" type="button">Ver cadastrados</a>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>


</html>