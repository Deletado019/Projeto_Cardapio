<?php

require_once 'conexao.php';

try{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if($senha !== $confirmar_senha){
        echo "As senhas não coincidem!";
        exit;
    }

    // verificar se o email já existe no banco de dados
    $sql = "SELECT * FROM tb_cadastro_usuario WHERE email = '$email'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $verifica_email = $comando->fetch();

    if($verifica_email != null){
        echo "O email já está em uso!";
        exit;
    }

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