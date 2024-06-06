<?php
session_start();
include('conexao.php');

if (isset($_SESSION['logado'])) {
    session_destroy();
    header('Location: ../index.php');
    exit();  // Certifique-se de encerrar o script após redirecionar
}
