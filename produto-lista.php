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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Lista</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
       <?php
        require_once'includes/header.php';
    ?>
    <main>
        <h1>Cardápio Lista</h1>
   <table border="1px">
    <tr>
        <th>Id</th>
        <th>Imagem</th>
        <th>Produto</th>
        <th>ingredientes</th>
        <th>categoria</th>
        <th>Valor</th>
        <th>descrição</th>
        <th>Data Cadastro</th>
        <th>Ações</th>
    </tr>

    <?php foreach($produtos as $produto): // Trocado ; por : ?>
    <tr>
        <td><?php echo $produto['id']; ?></td>
        <td>
            <img width="90px" height="85px" src="assets/img/uploads/<?php echo $produto['imagem'];?>" alt="">
        </td>
        <td><?php echo $produto['produto']; ?></td>
        <td><?php echo $produto['ingredientes']; ?></td>
        <td><?php echo $produto['categoria']; ?></td>
        <td><?php echo $produto['valor']; ?></td>
        <td><?php echo $produto['descricao']; ?></td>
        <td><?php echo $produto['data_cadastro']; ?></td>
        <td>
            <a onclick="return confirm('deseja deletar?')" href="backend/deletar-produto.php?id=<?php echo $produto['id']?>">Deletar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    </main>
</body>
</html>

