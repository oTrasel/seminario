<?php
include('../conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['turma'])) {
    try {
        $stmt = $pdo->prepare("update turma set dt_fechamento = now()
        where id = :id");
        $stmt->bindParam(':id', $_POST['turma']);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row === 1) {
            $stmt = $pdo->prepare("update vinculo_turma_aluno set ativo = 0 
            where id_turma = :id");
            $stmt->bindParam(':id', $_POST['turma']);
            $stmt->execute();
            $row2 = $stmt->rowCount();
            if ($row2 >= 1) {
                echo 'sucesso';
            }
        }
    } catch (PDOException $erro) {
        echo $erro;
    }
} else {
    echo 'error';
}
