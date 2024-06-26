<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select t.id, 
    t.descr_turma, 
    p.nome, 
    count(vta.id_aluno) as 'alunos',
    DATE_FORMAT(t.dt_fechamento , '%d/%m/%Y %H:%i') as dt_fechamento,
    case 
            when t.dt_fechamento is null  then 'Não'
            when t.dt_fechamento is not null  then 'Sim'
        end as 'fechada'
    from turma t 
    join professor p 
    on p.id = t.id_professor 
    join vinculo_turma_aluno vta 
    on vta.id_turma = t.id 
    where t.dt_fechamento is not null 
    group by t.id, t.descr_turma, p.nome");
    $stmt->execute();
    $row = $stmt->rowCount();
    $fechada = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $erro) {
    echo $erro;
}
?>
