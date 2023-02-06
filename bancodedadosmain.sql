-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Fev-2023 às 15:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcadastros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(1, 'Limpeza'),
(2, 'Vestuário Masculino'),
(3, 'Alimentos perecíveis'),
(4, 'Material Escolar'),
(5, 'Eletrônicos'),
(6, 'Carnaval');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenspedido`
--

CREATE TABLE `itenspedido` (
  `id` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itenspedido`
--

INSERT INTO `itenspedido` (`id`, `idPedido`, `idProduto`, `quantidade`, `preco`) VALUES
(1, 2, 12332, 1, 1000),
(2, 2, 12330, 1, 1000),
(3, 3, 12332, 1, 1000),
(4, 3, 12330, 1, 1000),
(5, 2, 12330, 1, 123),
(6, 4, 12332, 1, 10),
(7, 4, 12327, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idPessoa` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `data`, `idPessoa`, `status`) VALUES
(1, '2023-02-04 11:24:39', 3, 0),
(2, '2023-02-04 11:25:35', 3, 0),
(3, '2023-02-04 11:40:42', 3, 0),
(4, '2023-02-04 11:45:51', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(3, 'luciene cavalcanti', 'a@a', '123', 1),
(4, 'Conta sfsfdsdf', 'pasegama@gmail.com', 'ASDFSA', 2),
(5, 'safdsadf', 'a@a', '12345', 3),
(6, 'coxinha', 'coxinha@cs.com', '987', 2),
(7, 'MAria vai com as outras', 'mariaestranha@gmail.com', '345', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` decimal(10,3) NOT NULL,
  `precocusto` decimal(12,2) NOT NULL,
  `precovenda` decimal(10,2) NOT NULL,
  `unidade` varchar(20) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `quantidade`, `precocusto`, `precovenda`, `unidade`, `idcategoria`) VALUES
(12325, 'batata frita 123', '555.000', '666.00', '777.00', 'pacote', 1),
(12327, 'leite 1l', '100.000', '3.00', '5.00', 'caixa', 1),
(12329, 'bala sete belo', '1000.000', '0.15', '0.20', 'unidade', 3),
(12330, 'batata frita', '9999999.999', '123.00', '123.00', 'kg', 4),
(12331, 'água com gás', '100.000', '1.00', '1.60', 'garrafa', 3),
(12332, 'Confeti', '1000.000', '5.00', '10.00', 'pacote', 6),
(12333, 'sadfsadf', '234.000', '234.00', '234.00', 'un', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itenspedido`
--
ALTER TABLE `itenspedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Pedido` (`idPedido`),
  ADD KEY `FK_Produto` (`idProduto`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Pessoa` (`idPessoa`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Categorias` (`idcategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `itenspedido`
--
ALTER TABLE `itenspedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12334;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itenspedido`
--
ALTER TABLE `itenspedido`
  ADD CONSTRAINT `FK_Pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `FK_Produto` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_Pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `FK_Categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
