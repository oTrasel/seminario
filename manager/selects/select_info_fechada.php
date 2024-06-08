<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select t.descr_turma,
    DATE_FORMAT(t.dt_fechamento, '%d/%m/%Y %H:%i') as dt_fechamento,
    count(vta.id_aluno) as alunos 
    from turma t 
    join vinculo_turma_aluno vta 
    on vta.id_turma = t.id 
    where dt_fechamento is not null");
    $stmt->execute();
    $row = $stmt->rowCount();
    $fechada = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $erro) {
    echo $erro;
}
?>
