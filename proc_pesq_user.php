<?php
include("./conexao.php");
// Receber a requisição da pesquisa
$requestData = $_REQUEST;

// Indice da coluna na tabela visualizar => nome da coluna no banco de dados
$columns = array(
    0 => 'id',
    1 => 'firstName',
    2 => 'lastName',
    3 => 'username',
    3 => 'email',
);

// Obter quantidade de registros total sem qualquer pesquisa:
$result_user = "SELECT id, firstName, lastName, username, email FROM user";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

// Obter os dados a serem apresentados:
$result_usuarios = "SELECT id, firstName, lastName, username, email FROM user";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
    $result_usuarios .= " WHERE firstName LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR id LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR lastName LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR username LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR email LIKE '" . $requestData['search']['value'] . "%' ";
}

$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
// Ordenar o resultado
$result_usuarios .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
// var_dump($resultado_usuarios);


// ler e criar os dados em um array:
$dados = array();
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
    $dado = array();
    $dado[] = $row_usuarios["id"];
    $dado[] = $row_usuarios["firstName"];
    $dado[] = $row_usuarios["lastName"];
    $dado[] = $row_usuarios["username"];
    $dado[] = $row_usuarios["email"];
    $dado[] = ' <div style="text-align:center;">
                    <a class="btn btn-primary" href="./editar.php?id=' . $row_usuarios["id"] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a>
                    <a class="btn btn-primary" href="./delete.php?id=' . $row_usuarios["id"] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                    </svg></a></div>';
    $dados[] = $dado;
}
// Criar o array de informações a serem retornadas para o Js
$json_data = array(
    "draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($qnt_linhas),  //Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
    "data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);
