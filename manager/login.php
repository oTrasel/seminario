
<?php
include('conexao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
        
        try{
            $verifica = $pdo->prepare("select id, nome, login, senha from professor 
            where login = :login");
            $verifica->bindParam(':login', $_POST['user']);
            $verifica->execute();
            $row = $verifica->rowCount();
            if($row === 1){
                $resultado = $verifica->fetch(PDO::FETCH_ASSOC);
                if(password_verify($_POST['password'], $resultado['senha']) == 1){

                    $_SESSION['id'] = $resultado['id'];
                    $_SESSION['nome'] = $resultado['nome'];
                    $_SESSION['login'] = $resultado['login'];
                    $_SESSION['logado'] = true;
                    echo 'sucesso';

                }else{
                    echo 'erroLogin';
                }
            }else{
                echo 'erroLogin';
            }

        }catch(Exception $e){
            echo 'erroToken';
        }
    } else {
        echo 'erroRequisicao';
    }
}
?>






