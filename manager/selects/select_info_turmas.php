<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select t.id, t.descr_turma, p.nome, count(a.nome) as 'alunos'  from turma t 
    join professor p 
    on p.id = t.id_professor 
    left join aluno a 
    on a.id = t.id 
    group by t.id, t.descr_turma, p.nome ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $erro) {
    echo $erro;
}
?>
