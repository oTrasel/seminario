<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select distinct t.id, t.descr_turma from turma t 
    join vinculo_turma_aluno vta 
    on vta.id_turma = t.id 
    where t.dt_fechamento is null ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info_turma = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $aluno = $pdo->prepare("select a.id, a.nome  from aluno a 
    where a.id not in (select vta.id_aluno from vinculo_turma_aluno vta) ");
    $aluno->execute();
    $row = $aluno->rowCount();
    $info_aluno = $aluno->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    echo $erro;
}
