<?php
include('../conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['turma'])) {
    try{
        $stmt = $pdo->prepare("insert into turma (id_professor, descr_turma) VALUES ( :id, :turma)");
        $stmt->bindParam(':turma', $_POST['turma']);
        $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
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