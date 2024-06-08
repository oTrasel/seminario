<?php
header("Cache-Control: no-cache, must-revalidate");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><?php //echo $_SESSION['nome_user']; 
                                ?></a>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'home.php') ? 'active' : ''; ?>" aria-current="page" href="/rastreamentos/seguranca/home.php">Visão Geral</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gerenciamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'turma.php') ? 'active' : ''; ?>" href="turma.php">Cadastro de Turma</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'aluno.php') ? 'active' : ''; ?>" href="aluno.php">Cadastro de Aluno </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'vinculo.php') ? 'active' : ''; ?>" href="vinculo.php">vinculo Aluno -> Turma </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'notas.php') ? 'active' : ''; ?>" href="notas.php">Lançar Notas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'fechar.php') ? 'active' : ''; ?>" href="fechar.php">Fechar Turmas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'relatorio.php') ? 'active' : ''; ?>" href="relatorio.php">Relatório</a></li>

                </li>


            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="manager/logout.php" class="nav-link" style="text-decoration: none;">
                    <button class="btn btn-outline-primary">Logout</button>
                </a>
            </li>
        </ul>
    </div>
</nav>