-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_cardapio_digital
CREATE DATABASE IF NOT EXISTS `db_cardapio_digital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_cardapio_digital`;

-- Copiando estrutura para tabela db_cardapio_digital.tb_produto
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(50) NOT NULL,
  `ingredientes` varchar(150) NOT NULL,
  `valor` decimal(20,2) NOT NULL DEFAULT 0.00,
  `categoria` enum('Artesanal','Tradicional','Bebidas','Sobremesa','Porções','Combos') NOT NULL,
  `imagem` longblob NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Inativo','Ativo') NOT NULL DEFAULT 'Ativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_cardapio_digital.tb_produto: ~8 rows (aproximadamente)
INSERT INTO `tb_produto` (`id`, `produto`, `ingredientes`, `valor`, `categoria`, `imagem`, `descricao`, `data_cadastro`, `status`) VALUES
	(3, 'X-Tudo', 'Pão, carne, queijo, presunto, bacon, ovo, salsicha, alface, tomate, milho, ervilha e batata palha.', 32.00, 'Tradicional', _binary 0x363964643232623338373130302e6a7067, 'A experiência completa para quem tem fome de verdade, reunindo todos os melhores ingredientes em uma explosão de sabores.', '2026-04-13 14:06:59', 'Ativo'),
	(4, 'X-Calabresa', 'Pão de hambúrguer, carne, queijo muçarela, fatias de calabresa, cebola e maionese..', 21.00, 'Tradicional', _binary 0x363964643233323635653339332e6a7067, 'Um lanche com pegada artesanal que destaca o sabor marcante da calabresa acebolada combinada com queijo derretido.', '2026-04-13 14:08:54', 'Ativo'),
	(10, 'X-Calabresa', 'Pão de hambúrguer, carne, queijo muçarela, fatias de calabresa, cebola e maionese..', 21.80, 'Artesanal', _binary 0x363964643234346361373233312e6a7067, 'Um lanche com pegada artesanal que destaca o sabor marcante da calabresa acebolada combinada com queijo derretido.', '2026-04-13 14:13:48', 'Ativo'),
	(11, 'X-Bacon', 'Pão de hambúrguer, carne, queijo muçarela, muito bacon frito e maionese.', 23.99, 'Artesanal', _binary 0x363964643265363532376331332e6a7067, 'A escolha ideal para os amantes de crocância e sabor intenso, unindo a suculência da carne ao toque defumado do bacon.', '2026-04-13 14:56:53', 'Ativo'),
	(13, 'Suco Natural de Laranja', 'Laranja pura e gelo (copo de 400ml)', 9.00, 'Bebidas', _binary 0x363964643462366438643330382e6a7067, 'Suco extraído da fruta na hora, rico em vitamina C e sem adição de conservantes.', '2026-04-13 17:00:45', 'Ativo'),
	(14, 'Cerveja Long Neck', 'Cerveja pilsen gelada (Heineken, Stella Artois ou Budweiser)', 10.00, 'Bebidas', _binary 0x363964643462616632326635362e6a7067, 'A opção ideal para relaxar enquanto aproveita um X-Bacon ou X-Tudo caprichado.', '2026-04-13 17:01:51', 'Ativo'),
	(15, 'Suco de Morango Natural', 'Morangos frescos, água gelada e açúcar (ou adoçante) a gosto (copo 400ml).', 11.00, 'Bebidas', _binary 0x363964643464303838613662392e6a7067, 'Um suco vibrante, doce e levemente cítrico, preparado com morangos frescos selecionados para um sabor autêntico e revigorante.', '2026-04-13 17:07:36', 'Ativo'),
	(16, 'Combo Trio de Caipirinhas', '3 Copos de caipirinha (300ml cada) com Cachaça Prata, frutas frescas (Limão, Morango e Maracujá) e gelo.', 45.00, '', _binary 0x363964643464363539343433612e6a7067, 'O melhor da coquetelaria brasileira em um único pedido. Três variações refrescantes para quem não quer escolher um sabor só: a clássica de Limão, a doce de Morango e a tropical de Maracujá.', '2026-04-13 17:09:09', 'Ativo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
