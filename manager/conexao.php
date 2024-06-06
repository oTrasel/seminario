<?php

$ip = 'localhost';
$user = 'root';
$nome = 'seminario2';
$senha = '';

// Cria a string de conexão com o MySQL
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$dsn = "mysql:host=$ip;dbname=$nome";

// Cria a conexão
try {
    $pdo = new PDO($dsn, $user, $senha);
} catch (PDOException $e) {

    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Erro ao conectar com o Banco de Dados, verifique a situação com o Administrador do Sistema!')
        window.location.href='index.php';
        </SCRIPT>");
}

?>
