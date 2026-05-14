<?php

require_once 'conexao.php';

try{
  
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from tb_cadastro_usuario where email = '$email'";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    $dados = $comando->fetch(PDO::FETCH_ASSOC);
   
    if($dados != null){
        // armazena o hash da senha que esta no banco de dados
        $senha_hash_banco = $dados['senha'];
        if(password_verify($senha,$senha_hash_banco)){
            // senha correta
            // iniciar sessão (troca de dados em paginas diferentes)
            session_start();
            $_SESSION['logado'] = "sim";
            header("location: ../produto-lista.php");
        }
        else{
            // senha invalida
            echo "dados invalidos";
        }
    }
    else{
        // email invalido
        echo "dados invalidos";
    }
}
catch(PDOException $erro){
 
 error_log($erro->getMessage());
   
    echo "não foi possivel cadastrar";
}




?>