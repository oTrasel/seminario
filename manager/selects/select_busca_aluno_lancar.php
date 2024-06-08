<?php
include("../conexao.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $turmaId = $_POST['id'];

    try {

        $stmt = $pdo->prepare("select a.nome, vta.id from vinculo_turma_aluno vta 
        join aluno a 
        on a.id = vta.id_aluno 
        where vta.id_turma = :id
and vta.id not in (select id_vinculo from nota n)");
        $stmt->bindParam(':id', $turmaId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll();

        if ($result) {
            // Retornar informações dos alunos em formato HTML para preencher a tabela
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td id="row">' . htmlspecialchars($row['nome']) . '</td>';
                echo '<td id="row"><button type="button" class="btn btn-secondary w-100 h-100" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="' . $row['id'] . '"> <i class="bi bi-pencil-square"></i></button></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td id="row">Nenhum aluno encontrado.</td>
            <td id="row"><i class="bi bi-exclamation-diamond-fill" color="red"></i></td>
                </tr>';
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
