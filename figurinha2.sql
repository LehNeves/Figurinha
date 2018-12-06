SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `figurinhas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `caminho` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `troca` (
  `id` int(11) NOT NULL,
  `figurinhas_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `ultimoAcesso` datetime NOT NULL,
  `ultimaFigurinha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `ultimoAcesso`, `ultimaFigurinha`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '2018-12-06 16:09:55', '2018-12-06'),
(2, 'Leandro', 'leandro@email.com', 'leandro', 'leandro', '2018-12-05 12:49:05', '2018-12-05'),
(3, 'melk', 'melk', 'melk', 'melk', '2018-12-05 12:48:10', '2018-12-05'),
(4, 'vagner', 'vagner', 'vagner', 'vagner', '2018-12-05 13:15:28', '2018-12-05'),
(5, 'Ze Da Favela', 'zedafavela@zefavela.com', 'ZeFaveludo', '123Favela', '2018-12-01 17:01:49', '2018-12-01'),
(6, 'Aline', 'reis.araujo.a@hotmail.com', 'Aline', '123456', '2018-12-05 14:07:28', '2018-12-05'),
(7, 'a', 'a', 'a', 'a', '2018-12-06 16:10:09', '2018-12-05');

CREATE TABLE `usuariosfigurinhas` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `figurinha_id` int(11) NOT NULL,
  `disponivel` tinyint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuariosfigurinhas` (`id`, `usuarios_id`, `figurinha_id`, `disponivel`) VALUES
(1, 18, 7, 1),
(2, 18, 20, 1),
(3, 18, 14, 1),
(4, 18, 13, 1),
(5, 18, 7, 1),
(6, 7, 23, 1),
(7, 1, 16, 1),
(8, 7, 14, 0),
(9, 7, 12, 0),
(10, 7, 10, 1),
(11, 1, 19, 0),
(12, 1, 14, 0),
(13, 1, 20, 0),
(14, 7, 22, 1),
(15, 1, 5, 0),
(16, 1, 5, 0),
(17, 1, 10, 0),
(18, 1, 13, 0),
(19, 1, 4, 1),
(20, 1, 10, 0);

ALTER TABLE `figurinhas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `troca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTrocaUsurarios` (`usuario_id`),
  ADD KEY `idTrocaFigurinhas` (`figurinhas_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuariosfigurinhas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `troca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `usuariosfigurinhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `troca`
  ADD CONSTRAINT `idTrocaFigurinhas` FOREIGN KEY (`figurinhas_id`) REFERENCES `figurinhas` (`id`),
  ADD CONSTRAINT `idTrocaUsurarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;