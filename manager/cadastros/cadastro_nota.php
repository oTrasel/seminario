<?php
include('../conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $stmt = $pdo->prepare("insert into nota (id_vinculo, mat, port, hist, geo)
        values (:id, :mat, :port, :hist, :geo)");
        $stmt->bindParam(':id', $_POST['idVinculo']);
        $stmt->bindParam(':mat', $_POST['matematica']);
        $stmt->bindParam(':port', $_POST['portugues']);
        $stmt->bindParam(':hist', $_POST['historia']);
        $stmt->bindParam(':geo', $_POST['geografia']);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row === 1) {
            echo 'sucesso';
        }
    } catch (PDOException $erro) {
        echo $erro;
    }
} else {
    echo 'error';
}
