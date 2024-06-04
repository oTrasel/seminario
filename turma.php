<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include('manager/conexao.php');
if ($_SESSION['logado'] !== true) {

    //redireciona para a index.
    header('Location: index.php');
    session_destroy();
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Cadastro de Turmas</title>
</head>

<body>
    <?php 
        include('nav.php'); 
        include('manager/selects/select_info_turmas.php');
    ?>
    <div id="container">
        <div id="content">
            <div id="itensContent">
                <h3 style="color: white">Cadastro de Turmas</h3>
                <form id="cadastro_turma" action="manager/cadastros/cadastro_turma.php" method="post" role="form" style="display: block;">
                    <div class="form-floating mt-3 mb-3" style="color: gray;">
                        <input type="text" class="form-control" id="descr_turma" placeholder="Descrição da Turma" name="turma" required>
                        <label for="descr_turma">Descrição da Turma</label>
                    </div>
                    <button class="btn btn-lg btn-outline-primary mt-1 w-100 " type="submit" id="cadastroBt" disabled>Cadastrar</button>
                </form><!-- FIM login-form-->
            </div><!-- FIM itensContent-->
            <hr style="border: solid 1px black;">
            <button type="button" class="btn btn-outline-secondary mt-1 w-100" data-bs-toggle="modal" data-bs-target="#turmasCadastradas">
                Verificar Turmas Cadastradas
            </button>
        </div><!-- FIM content-->
    </div><!-- FIM container-->


    <div class="modal fade" id="turmasCadastradas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme="dark" style="color: white;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Turmas Cadastrados</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="gridInfos">
                        <table class="table table-striped" id="tableInfos">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" id="tableHead">ID</th>
                                    <th scope="col" id="tableHead">Descrição Da Turma</th>
                                    <th scope="col" id="tableHead">Professor Da Turma</th>
                                    <th scope="col" id="tableHead">Quantiadade de Alunos</th>
                                </tr>
                            </thead>
                            <tbody id="conteudo">
                                <?php
                                if ($row !== 0) {
                                    foreach ($info as $infos) {
                                        echo '
                                    <tr>
                                        <td id="row" > ' . $infos['id'] . '</td>
                                        <td id="row" > ' . $infos['descr_turma'] . '</td>
                                        <td id="row" > ' . $infos['nome'] . '</td>
                                        <td id="row" > ' . $infos['alunos'] . '</td>

                                    </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/frameworks/jquery.min.js"></script>
<script src="js/frameworks/html5shiv_3.7.3.min.js"></script>
<script src="js/frameworks/dataTables.bootstrap5.min.js"></script>
<script src="js/frameworks/jquery.dataTables.min.js"></script>
<script src="js/pages/cadastro_turma.js"></script>

</html>