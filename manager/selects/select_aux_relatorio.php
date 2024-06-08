<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select distinct t.id, t.descr_turma from turma t 
    join vinculo_turma_aluno vta 
    on vta.ativo = 0
    where t.dt_fechamento is not null 
     ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info_turma = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {
    echo $erro;
}
