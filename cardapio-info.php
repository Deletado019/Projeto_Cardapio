<?php

require_once 'backend/conexao.php';

try{
    $id = $_GET['id'];



    $sql = "SELECT * from tb_produto WHERE id=$id";

    $comando = $conexao->prepare($sql);
    $comando->execute();

   $produto = $comando->fetch(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($produto);

}
catch(PDOException $erro){
    error_log($erro->getMessage());
    echo "não foi possivel buscar os dados";
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardapio Digital</title>
    <link rel="stylesheet" href="assets/css/cardapio.css   ">
</head>
<body>
    <main>
        <a href="index.php">Voltar</a>
        <div id="cardapio">
            
            <img src="assets/img/uploads/<?php echo $produto['imagem']; ?>" alt="">
            <div>
                <p id="produto"><?php echo $produto['produto']; ?></p>
                <p id="categoria"><?php echo $produto['categoria'] ?></p>
                <p id="valor">R$ <?php echo $produto['valor'] ?></p>
                <div>
                    <h3>Descrição</h3>
                <p id="descricao"><?php echo $produto['descricao'] ?></p>
                </div>
                <div>
                    <h3>Ingredientes</h3>
                    <p id="ingrediente"><?php echo $produto['ingredientes'] ?></p>
                </div>
                

                <button type="button" id="btn-pedido">Faça seu pedido</button>
            </div>
        </div>
    </main>
    
</body>
</html>