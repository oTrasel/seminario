<?php
include('../conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        
        foreach($_POST['alunos'] as $aluno) {
            $stmt = $pdo->prepare("insert into vinculo_turma_aluno (id_turma, id_aluno, dt_vinculo, ativo)
            values(:turma, :aluno, now(), 1)");
            $stmt->bindParam(":aluno", $aluno, PDO::PARAM_INT);
            $stmt->bindParam(":turma", $_POST['turma'], PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->rowCount();
            
        }
        echo 'sucesso';
    }catch(PDOException $erro){
        echo $erro;
    }
}else{
    echo 'error';
}



?>