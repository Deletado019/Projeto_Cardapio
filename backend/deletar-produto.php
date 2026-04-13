<?php
require_once 'conexao.php';

try{
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_produto WHERE id = $id";
    $comando = $conexao->prepare($sql);
    $comando->execute();

    header("location:../produto-lista.php");

}catch(PDOException $erro){
 error_log($erro->getMessage());
   
    echo "não foi possivel cadastrar";

}

?>