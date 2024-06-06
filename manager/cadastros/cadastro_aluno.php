<?php
include('../conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aluno']) && isset($_POST['dt_nascimento'])) {
    try{
        $stmt = $pdo->prepare("insert into aluno (nome, dt_nascimento, dt_cadastro) VALUES ( :nome, :dt_nascimento, now())");
        $stmt->bindParam(':nome', $_POST['aluno']);
        $stmt->bindParam(':dt_nascimento', $_POST['dt_nascimento']);
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row === 1){
            echo 'sucesso';
        }
    }catch(PDOException $erro){
        echo $erro;
    }
}else{
    echo 'error';
}



?>