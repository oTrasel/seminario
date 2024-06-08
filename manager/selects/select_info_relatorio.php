<?php
include("../conexao.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $turmaId = $_POST['id'];

    try {

        $stmt = $pdo->prepare("select 
        vta.id, 
        a.nome,
        n.mat,
        n.hist,
        n.port,
        n.geo,
        round( (n.mat + n.hist + n.port + n.geo) / 4 , 2) AS 'media'
    FROM 
        turma t 
        JOIN vinculo_turma_aluno vta ON vta.id_turma = t.id 
        JOIN nota n ON n.id_vinculo = vta.id 
        JOIN aluno a ON a.id = vta.id_aluno
        where t.dt_fechamento is not null 
        and vta.ativo = 0
        and t.id = :id
    ");
        $stmt->bindParam(':id', $turmaId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll();

        if ($result) {
            // Retornar informações dos alunos em formato HTML para preencher a tabela
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td id="row">' . htmlspecialchars($row['nome']) . '</td>';
                echo '<td id="row">' . htmlspecialchars($row['mat']) . '</td>';
                echo '<td id="row">' . htmlspecialchars($row['hist']) . '</td>';
                echo '<td id="row">' . htmlspecialchars($row['port']) . '</td>';
                echo '<td id="row">' . htmlspecialchars($row['geo']) . '</td>';
                echo '<td id="row">' . htmlspecialchars($row['media']) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td id="row">Nenhuma nota encontrada.</td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
                </tr>';
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
