<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select distinct t.id, t.descr_turma, n.id_vinculo  from turma t 
    join vinculo_turma_aluno vta 
    on vta.id_turma = t.id 
    left join nota n 
    on n.id_vinculo = vta.id 
    where t.dt_fechamento is null
    and n.id_vinculo is null ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info_turma = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {
    echo $erro;
}
