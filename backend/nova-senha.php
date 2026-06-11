<?php

require_once 'conexao.php';

try{
    $token = $_GET['token'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    if($senha != $confirmar_senha){
        echo "As senhas não coincidem!";
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "SELECT id_login FROM tb_recuperar_senha WHERE token = '$token'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $id_login = $comando->fetch(PDO::FETCH_ASSOC);

    $sql = "UPDATE tb_cadastro_usuario SET senha = '$senha_hash' WHERE id = '{$id_login['id_login']}'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    echo "Senha alterada com sucesso!";

}
catch(PDOException $erro){

      error_log($erro->getMessage());
    echo "não foi possivel recuperar a senha";
}