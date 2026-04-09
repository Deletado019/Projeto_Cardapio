<?php

require_once 'conexao.php';

try{
    $produto    = $_POST['produto'];
    $ingrediente    = $_POST['ingredientes'];
    $valor  = $_POST['valor'];
    $categoria  = $_POST['categoria'];
    $descricao  = $_POST['descricao'];

    // upload da imagem
    // captura a extensão da imagem
    $extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION);
    
    // gera um hash sera usado como nome da imagem
    $hash = uniqid();

    // junta o hash gerado para imagem com a extensao capturada acima
    $novonomeimagem = $hash.'.'.$extensao;

    // caminho onde o upload de imagem sera realizado

    $caminho = "../assets/img/uploads/";

    // junta o caminho e o novo nome da imagem

    $caminhofinal = $caminho . $novonomeimagem;

    // upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$caminhofinal);

    $sql = "INSERT INTO tb_produto(produto,ingredientes,valor,categoria,imagem,descricao)VALUES('$produto','$ingrediente','$valor','$categoria','$novonomeimagem','$descricao')"; 

    $comando = $conexao->prepare($sql);

    $comando->execute();

    echo "Cadastrado com sucesso";



    // upload da imagem

}catch(PDOException $erro){
     
    error_log($erro->getMessage());
   
    echo "não foi possivel cadastrar";
}