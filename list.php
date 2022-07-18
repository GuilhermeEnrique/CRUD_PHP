<?php
include("./conexao.php");

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    #Calcular o inicio visualização
    $qnt_result_pg = 10; //quantidade de registro por pagina
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_user = "SELECT * FROM user ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
    $result_user = $conn->query($query_user);

    #paginação - somar a quantidade de usuarios
    $query_pg = "SELECT COUNT(id) AS num_result FROM user";
    $result_pg = $conn->query($query_pg);
    $row_pg = $result_pg->fetch_assoc();

    $dados = "<p><strong>Total de registros: </strong>" . $row_pg['num_result'] . " </p>
                <div class='table-responsive'>
                        <table class='table table-striped align-middle'>
                            <thead class='table-dark'>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Sobrenome</th>
                                    <th scope='col'>Username</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Endereço</th>
                                    <th scope='col'>Cidade</th>
                                    <th scope='col'>Estado</th>
                                    <th scope='col'>CEP</th>
                                    <th scope='col'>Configuração</th>
                                </tr>
                            </thead>";

    while ($row = $result_user->fetch_assoc()) {
        extract($row);

        $dados .= "<tr>
                    <th scope='row'>" . $row['id'] . "</th>
                    <td>" . $row['firstName'] . " </td>
                    <td>" . $row['lastName'] . " </td>
                    <td>" . $row['username'] . " </td>
                    <td>" . $row['email'] . " </td>
                    <td>" . $row['address'] . " </td>
                    <td>" . $row['city'] . " </td>
                    <td>" . $row['state'] . " </td>
                    <td>" . $row['cep'] . " </td>
                    <td>
                    <div class='input-group d-grid gap-2 col-6 mx-auto'>
                        <button class='btn btn-outline-success btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown'>Ação</button>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='./editar.php?id=" . $row['id'] . "'>Editar</a></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <li><a class='dropdown-item' href='./delete.php?id=" . $row['id'] . "'>Excluir</a></li>
                        </ul>
                    </div>
                    </td>
            </tr>";
    }
    $dados .= "</tbody>
        </table>
    </div>";

    #quantidade de pagina
    $qnt_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
    $max_links = 2;
    $dados .=  "<hr class='my-4'><nav aria-label='Page navigation example'> ";
    $dados .=  "<ul class='pagination justify-content-center'> ";
    $dados .=  "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios(1)' arai-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            $dados .= "<li class='page-item'><a class='page-link' onclick='listarUsuarios($pag_ant)' href='#'>$pag_ant</a></li>";
        }
    }

    $dados .=  "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

    for ($pg_dep = $pagina + 1; $pg_dep <= $pagina + $max_links; $pg_dep++) {
        if ($pg_dep <= $qnt_pg) {
            $dados .=  "<li class='page-item'><a class='page-link' onclick='listarUsuarios($pg_dep)' href='#'>$pg_dep</a></li>";
        }
    }
    $dados .=  "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($qnt_pg)' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
    $dados .=  "</ul></nav>";

    echo $dados;
} else {
    echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'><symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'><path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/></symbol></svg>
    <div class='alert alert-danger' role='alert'><svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg> Erro: Nenhum usuário encontrado!</div> ";
}
?>
