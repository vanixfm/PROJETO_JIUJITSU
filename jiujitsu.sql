-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/08/2024 às 18:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jiujitsu`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id_cad` int(11) NOT NULL,
  `nm_cad` varchar(80) NOT NULL,
  `sexo_cad` char(1) NOT NULL,
  `dt_nasc` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_faixa` int(11) NOT NULL,
  `id_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id_cad`, `nm_cad`, `sexo_cad`, `dt_nasc`, `cpf`, `tel`, `cel`, `email`, `id_login`, `id_perfil`, `id_faixa`, `id_end`) VALUES
(24, 'teste', 'M', '2024-08-16', '123456789101', '33112233', '9911223399', 'teste@email.com', 26, 2, 7, 27);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_end` int(11) NOT NULL,
  `cep` char(15) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `num` int(11) NOT NULL,
  `complem` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` char(2) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_end`, `cep`, `rua`, `num`, `complem`, `bairro`, `cidade`, `uf`, `id_login`) VALUES
(27, '80035-280', 'Terminal Cabral', 2, '123', 'Cabral', 'Curitiba', 'PR', 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `faixa`
--

CREATE TABLE `faixa` (
  `id_faixa` int(11) NOT NULL,
  `cor_faixa` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `faixa`
--

INSERT INTO `faixa` (`id_faixa`, `cor_faixa`) VALUES
(1, 'Branca'),
(2, 'Cinza e Branca'),
(3, 'Cinza'),
(4, 'Cinza e Preta'),
(5, 'Amarela e Branca'),
(6, 'Amarela'),
(7, 'Amarela e Preta'),
(8, 'Laranja e Branca'),
(9, 'Laranja'),
(10, 'Laranja e Preta'),
(11, 'Verde e Branca'),
(12, 'Verde'),
(13, 'Verde e Preta'),
(14, 'Azul'),
(15, 'Roxa'),
(16, 'Marrom'),
(17, 'Preta'),
(18, 'Vermelha e Preta'),
(19, 'Vermelha e Branca'),
(20, 'Vermelha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nm_login` varchar(40) NOT NULL,
  `user_login` varchar(40) NOT NULL,
  `senha_login` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id_login`, `nm_login`, `user_login`, `senha_login`) VALUES
(26, 'teste02', 'teste02', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nm_perfil` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nm_perfil`) VALUES
(1, 'professor'),
(2, 'aluno'),
(3, 'curioso');

-- --------------------------------------------------------

--
-- Estrutura para tabela `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `nm_video` varchar(40) NOT NULL,
  `url_video` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `video`
--

INSERT INTO `video` (`id_video`, `nm_video`, `url_video`) VALUES
(6, 'faixas', 'arquivos/eaa2390b7bdfffe4694deebec7417d60.jpg'),
(7, 'jiu1', 'arquivos/7b910049a8651ff37e157f8c23b98f0a.jpg'),
(8, 'jiu2', 'arquivos/702e5350d23e922e9b918720bd374156.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_cad`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_end`);

--
-- Índices de tabela `faixa`
--
ALTER TABLE `faixa`
  ADD PRIMARY KEY (`id_faixa`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_cad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
