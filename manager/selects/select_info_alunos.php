<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select a.id, 
    a.nome, 
    DATE_FORMAT(a.dt_nascimento, '%d/%m/%Y') as dt_nascimento,  
    DATE_FORMAT(a.dt_cadastro, '%d/%m/%Y %H:%i') as dt_cadastro from aluno a ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $erro) {
    echo $erro;
}
?>
