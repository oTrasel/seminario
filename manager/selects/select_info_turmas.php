<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select t.id, 
    t.descr_turma, 
    p.nome, 
    count(vta.id_aluno) as 'alunos',
    DATE_FORMAT(t.dt_abertura, '%d/%m/%Y %H:%i') as dt_abertura,
    case 
            when t.dt_fechamento is null  then 'Não'
            when t.dt_fechamento is not null  then 'Sim'
        end as 'fechada'
    from turma t 
    join professor p 
    on p.id = t.id_professor 
    left join vinculo_turma_aluno vta 
    on vta.id_turma = t.id 
    group by t.id, t.descr_turma, p.nome
    
    
    
     ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $erro) {
    echo $erro;
}
?>
