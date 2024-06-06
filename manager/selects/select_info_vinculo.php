<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select 
    t.descr_turma, 
    case 
        when t.dt_fechamento is null and cast(vta.ativo as CHAR) = '1' then 'Não'
        when t.dt_fechamento is not null and cast(vta.ativo as CHAR) = '0' then 'Sim'
    end as 'fechada', 
    a.nome, 
    DATE_FORMAT(vta.dt_vinculo, '%d/%m/%Y %H:%i') as 'dt_vinculo',
    DATE_FORMAT(t.dt_abertura , '%d/%m/%Y %H:%i') as 'dt_abertura'
from 
    vinculo_turma_aluno vta 
join 
    aluno a ON vta.id_aluno = a.id 
join 
    turma t on t.id = vta.id_turma;
 ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    echo $erro;
}
