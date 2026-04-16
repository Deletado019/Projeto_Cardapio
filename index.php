<?php
require_once 'backend/conexao.php';

try{
    $sql = "SELECT * FROM tb_produto";
    $comando = $conexao->prepare($sql);
    $comando->execute();

    $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($produtos);

}catch(PDOException $erro){
 error_log($erro->getMessage());
   
    echo "não foi possivel cadastrar";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto - Cardapio</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
    require_once 'includes/header.php';
    ?>
    <main>
        <h1>Cardapio Digital</h1>

       

        <div id="grid-card">
             <?php
        foreach($produtos as $produto):
        ?>
            <div class="card">
                <img  src="assets/img/uploads/<?php echo $produto['imagem']; ?>" alt="">
                <div class="info">
                    <div class="titulo"><?php echo $produto['produto'] ?></div>
                    <div class="categoria"><?php echo $produto['categoria'] ?></div>
                    <div class="valor"><?php echo $produto['valor'] ?></div>
                    <a href="cardapio-info.php?id=<?php echo $produto['id'];?>">
                        <button type="button">Vizualizar</button>
                    </a>
                </div>
            </div>
              <?php
        endforeach;
    ?>
        </div>
      
    </main>
</body>
</html>