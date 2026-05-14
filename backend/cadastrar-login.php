<?php

require_once 'conexao.php';

try{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // gera o hash da senha digitada usando o algoritimo ARGON2ID
    $senha_hash = password_hash($senha,PASSWORD_ARGON2ID);

    $sql = "INSERT INTO tb_cadastro_usuario(nome,email,senha)VALUES('$nome','$email','$senha_hash')";

    $comando = $conexao->prepare($sql);

    $comando->execute();

    echo "Cadastrado com sucesso!";

}
catch(PDOException $erro){

      error_log($erro->getMessage());
   
    echo "não foi possivel cadastrar";
}


?>