<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include('manager/conexao.php');
if ($_SESSION['logado'] !== true) {
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
    <title>Lançar Notas</title>
</head>

<body>
    <?php
    include('nav.php');
    include('manager/selects/select_alunos_matriculados.php');
    ?>
    <div id="container">
        <div id="content">
            <div id="itensContent">
                <h3 style="color: white">Lançar Notas</h3>
                <div class="form-floating mt-3" style="color: gray;">
                    <select class="form-select mt-2" name="turma" id="selectTurmas" required>
                        <?php
                        foreach ($info_turma as $turma) {
                            echo '<option id="' . $turma['id'] . "|" . $turma['descr_turma'] . '" value="' . $turma['id'] . '">' . $turma['descr_turma'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-lg btn-outline-primary mt-3 w-100" type="button" id="buscarBt">Lançar Notas</button>
            </div>
        </div>
    </div>

    <!-- Modal Alunos Cadastrados -->
    <div class="modal fade" id="alunosCadastrados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme="dark" style="color: white;">
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
                                    <th scope="col" id="tableHead">Nome</th>
                                    <th scope="col" id="tableHead">Ação</th>
                                </tr>
                            </thead>
                            <tbody id="conteudo">
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

    <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true" data-bs-theme="dark" style="color: white;" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Aluno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarForm" action="manager/cadastros/cadastro_nota.php" method="post" role="form" style="display: block;">
                        <div class="form-floating mt-3 mb-3" style="color: gray;">
                            <input type="number" class="form-control" id="mat" placeholder="Matemática" name="matematica" min="0" max="10" required step="0.01">
                            <label for="mat">Matemática</label>
                        </div>
                        <div class="form-floating mt-3 mb-3" style="color: gray;">
                            <input type="number" class="form-control" id="hist" placeholder="História" name="historia" min="0" max="10" required step="0.01">
                            <label for="hist">História</label>
                        </div>
                        <div class="form-floating mt-3 mb-3" style="color: gray;">
                            <input type="number" class="form-control" id="geo" placeholder="Geografia" name="geografia" min="0" max="10" required step="0.01">
                            <label for="geo">Geografia</label>
                        </div>
                        <div class="form-floating mt-3 mb-3" style="color: gray;">
                            <input type="number" class="form-control" id="port" placeholder="Português" name="portugues" min="0" max="10" required step="0.01">
                            <label for="port">Português</label>
                        </div>
                        <input type="hidden" id="idVinculo" name="idVinculo">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#alunosCadastrados">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="cadastroBt">Lançar Notas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/frameworks/html5shiv_3.7.3.min.js"></script>
    <script src="js/frameworks/dataTables.bootstrap5.min.js"></script>
    <script src="js/frameworks/jquery.dataTables.min.js"></script>
    <script src="js/pages/cadastro_notas.js"></script>
</body>

</html>