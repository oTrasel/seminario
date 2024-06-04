<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include('manager/conexao.php');
if ($_SESSION['logado'] !== true ) {

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
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Document</title>
</head>
<body>
    <?php include('nav.php');?>
    
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/frameworks/jquery.min.js"></script>
<script src="js/frameworks/html5shiv_3.7.3.min.js"></script>
</html>