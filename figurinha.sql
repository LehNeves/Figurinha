-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2018 às 18:57
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `figurinha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `figurinhas`
--

CREATE TABLE `figurinhas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `caminho` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `figurinhas`
--

INSERT INTO `figurinhas` (`id`, `nome`, `caminho`) VALUES
(1, 'Squirtle', 'squirtle.png'),
(2, 'Onix', 'onix.png'),
(3, 'MewTwo', 'mewTwo.png'),
(4, 'Togepi', 'togepi.png'),
(5, 'Eevee', 'eevee.png'),
(6, 'Riolu', 'riolu.png'),
(7, 'Marill', 'marill.png'),
(8, 'Tepig', 'tepig.png'),
(9, 'Turtwig', 'turtwig.png'),
(10, 'Cyndaquil', 'cyndaquil.png'),
(11, 'Blastoise', 'blastoise.png'),
(12, 'Budew', 'budew.png'),
(13, 'Dialga', 'dialga.png'),
(14, 'Diglett', 'diglett.png'),
(15, 'Ekans', 'ekans.png'),
(16, 'Flareon', 'flareon.png'),
(17, 'Gloom', 'gloom.png'),
(18, 'Huntail', 'huntail.png'),
(19, 'Koffing', 'koffing.png'),
(20, 'Magmortal', 'magmortal.png'),
(21, 'Meowth', 'meowth.png'),
(22, 'Metapod', 'metapod.png'),
(23, 'Persian', 'persian.png'),
(24, 'Psyduck', 'psyduck.png'),
(25, 'Raichu', 'raichu.png'),
(26, 'Rapidash', 'rapidash.png'),
(27, 'Torchic', 'torchic.png'),
(28, 'Umbreon', 'umbreon.png'),
(29, 'Wooper', 'wooper.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `ultimoAcesso` datetime NOT NULL,
  `ultimaFigurinha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `ultimoAcesso`, `ultimaFigurinha`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '2018-12-01 15:56:23', '2018-12-01'),
(2, 'Leandro', 'leandro@email.com', 'leandro', 'leandro', '2018-12-01 15:45:26', '2018-12-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosfigurinhas`
--

CREATE TABLE `usuariosfigurinhas` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `figurinha_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `figurinhas`
--
ALTER TABLE `figurinhas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuariosfigurinhas`
--
ALTER TABLE `usuariosfigurinhas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuariosfigurinhas`
--
ALTER TABLE `usuariosfigurinhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
