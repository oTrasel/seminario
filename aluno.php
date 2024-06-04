<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/aluno.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Cadastro de Aluno</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <div id="container">
        <div id="content">
            <div id="itensContent">
                <h3 style="color: white">Cadastro de Prestador</h3>
                <form id="cadastro_prestador" action="../manager/cadastros/cadastro_prestador.php" method="post" role="form" style="display: block;">
                    <div class="form-floating mt-3" style="color: gray;">
                        <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome_prestador" required>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <input type="text" class="form-control" id="nome_usuario" placeholder="Login" name="login_prestador" required>
                        <label for="nome_usuario">Login</label>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <input type="number" class="form-control" id="cpfInput" placeholder="CPF" name="prestador_cpf" required minlength="11" maxlength="11" oninput="VerificaCPF(this.value)">
                        <label for="cpfInput">CPF</label>
                        <p id="cpfMessage"></p>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <input type="tel" class="form-control" id="telefone_prestador" name="prestador_telefone" placeholder="Telefone" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required>
                        <label for="telefone_prestador">Telefone</label>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <select class="form-select mt-2" name="selectFuncao" id="funcaoSelect" required>
                            <?php
                            foreach ($funcao as $funcao_prest) {
                                echo '<option id="' . $funcao_prest['descr_funcao'] . '" value="' . $funcao_prest['id_funcao'] . '">' . $funcao_prest['descr_funcao'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <select class="form-select mt-2" name="selectLocalSv" id="localSelect" required>
                            <?php
                            foreach ($locais_trabalho as $locais) {
                                echo '<option id="' . $locais['nome_local'] . '" value="' . $locais['id_local'] . "|" . $locais['nome_local'] . '">' . $locais['nome_local'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <input onkeyup="validaSenha()" type="password" class="form-control" name="passwd" id="password" placeholder="Senha" required>
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-floating mt-3" style="color: gray;">
                        <input onkeyup="validaSenha()" type="password" class="form-control" id="c_password" placeholder="Confirmar Senha" required>
                        <label for="c_password">Confirmar Senha</label>
                        <p id="confirmPass" style="color: white;"></p>
                    </div>
                    <button class="btn btn-lg btn-outline-primary mt-1 w-100 " type="submit" id="registerBt" disabled>Cadastrar</button>
                </form><!-- FIM login-form-->
            </div><!-- FIM itensContent-->
            <hr style="border: solid 1px black;">
            <button type="button" class="btn btn-outline-secondary mt-1 w-100" data-bs-toggle="modal" data-bs-target="#userCadastrados">
                Verificar Usuários Cadastrados
            </button>
        </div><!-- FIM content-->
    </div><!-- FIM container-->

</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/frameworks/jquery.min.js"></script>
<script src="js/frameworks/html5shiv_3.7.3.min.js"></script>

</html>