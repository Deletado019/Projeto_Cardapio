<?php 

require_once 'conexao.php';

require_once 'envia-email.php';

try{
    $email = $_POST['email'];

    // verificar se o email existe no banco de dados
    $sql = "SELECT id,email FROM tb_cadastro_usuario WHERE email = '$email'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $verifica_email = $comando->fetch();

    if($verifica_email != null){
        // armazena o id do usuário para usar na recuperação de senha
        $id = $verifica_email['id'];
        $token = md5(uniqid()); // gera um token aleatório para recuperação de senha
        
        $sql = "DELETE FROM tb_recuperar_senha WHERE id_login = '$id'";
        $comando = $conexao->prepare($sql);
        $comando->execute();


        $sql = "INSERT INTO tb_recuperar_senha(id_login,token) VALUES('$id','$token')";
        $comando = $conexao->prepare($sql);
        $comando->execute();
        }

        // executa a função para enviar o email de recuperação de senha
        enviaEmail($email,$token);

    // aqui você pode implementar a lógica para enviar um email de recuperação de senha para o usuário

    echo "Instruções de recuperação de senha foram enviadas para o seu email!";

}
catch(PDOException $erro){

      error_log($erro->getMessage());
    echo "não foi possivel recuperar a senha";
}