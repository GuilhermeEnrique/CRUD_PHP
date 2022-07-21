<?php
include("./conexao.php");
// Receber a requisição da pesquisa
$requestData = $_REQUEST;

// Indice da coluna na tabela visualizar => nome da coluna no banco de dados
$columns = array(
    0 => 'id',
    1 => 'firstName',
    2 => 'lastName',
    3 => 'username'
);

// Obter quantidade de registros total sem qualquer pesquisa:
$result_user = "SELECT id, firstName, lastName, username FROM user";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

// Obter os dados a serem apresentados:
$result_usuarios = "SELECT id, firstName, lastName, username FROM user";

if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
    $result_usuarios .= " WHERE firstName LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR id LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR lastName LIKE '" . $requestData['search']['value'] . "%' ";
    $result_usuarios .= " OR username LIKE '" . $requestData['search']['value'] . "%' ";
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
    $dado[] = '<a href="#">teste</a>';
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