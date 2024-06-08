<?php
include('manager/conexao.php');

try {
    $stmt = $pdo->prepare("select 
    t.id AS id_turma,
    t.descr_turma
FROM 
    turma t
JOIN vinculo_turma_aluno vta 
ON t.id = vta.id_turma
JOIN aluno a 
ON vta.id_aluno = a.id
LEFT JOIN nota n 
ON vta.id = n.id_vinculo
WHERE vta.ativo = 1
GROUP BY t.id, t.descr_turma
HAVING COUNT(vta.id) = COUNT(n.id) ");
    $stmt->execute();
    $row = $stmt->rowCount();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    echo $erro;
}
