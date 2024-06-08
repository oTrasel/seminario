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
    <link rel="stylesheet" href="css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <script src="js/frameworks/jquery.min.js"></script>
    <script src="js/frameworks/popper.min.js"></script>
    <script src="js/frameworks/select2.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Fechar Turmas</title>
</head>

<body>
    <?php
    include('nav.php');
    include('manager/selects/select_info_fechar.php');
    include('manager/selects/select_info_fechada.php');
    ?>

    <div id="container">
        <div id="content">
            <div id="itensContent">
                <h3 style="color: white">Fechar Turmas</h3>
                <form id="fecharTurma" action="manager/cadastros/fechar_turma.php" method="post" role="form" style="display: block;">
                    <div class="form-floating mt-3" style="color: gray;">
                        <select class="form-select mt-2" name="turma" id="selectTurmas" required onchange="verificarSelecao()">
                            <?php
                            foreach ($info as $turma) {
                                echo '<option id="' . $turma['id_turma'] . "|" . $turma['descr_turma'] . '" value="' . $turma['id_turma'] . '">' . $turma['descr_turma'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-lg btn-outline-primary mt-3 w-100" type="submit" id="cadastroBt" disabled>Fechar Turma</button>
                </form>
            </div>
            <hr style="border: solid 1px black;">
            <button type="button" class="btn btn-outline-secondary mt-1 w-100" data-bs-toggle="modal" data-bs-target="#turmasFechadas">
                Verificar Turmas Fechadas
            </button>
        </div>
    </div>

    <div class="modal fade" id="turmasFechadas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme="dark" style="color: white;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Alunos Cadastrados</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="gridInfos">
                        <table class="table table-striped" id="tableInfos">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" id="tableHead">Turma</th>
                                    <th scope="col" id="tableHead">Data Fechamento</th>
                                    <th scope="col" id="tableHead">Alunos Matriculados</th>
                                </tr>
                            </thead>
                            <tbody id="conteudo">
                                <?php
                                if ($row !== 0) {
                                    foreach ($fechada as $infos) {
                                        echo '
                                    <tr>
                                        <td id="row" > ' . $infos['descr_turma'] . '</td>
                                        <td id="row" > ' . $infos['dt_fechamento'] . '</td>
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
<script src="js/frameworks/html5shiv_3.7.3.min.js"></script>
<script src="js/frameworks/dataTables.bootstrap5.min.js"></script>
<script src="js/frameworks/jquery.dataTables.min.js"></script>
<script src="js/pages/fechar_turma.js"></script>



</html>