-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/09/2024 às 23:37
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc_roberto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turma` int NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2023312334 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `turma`) VALUES
(2022310952, 'Luciano Kubner', 110),
(2022311922, 'Jeverson Fagundes', 120),
(2022315930, 'Roberto Graziadei', 130);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplinas` int NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `professor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_disciplinas`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplinas`, `nome_disciplina`, `professor`) VALUES
(9, 'Análise e modelagem de sistema', 'Thiago Krug'),
(10, 'Tópicos De Emergentes', 'Thiago Krug'),
(12, 'Português', 'Diely'),
(13, 'Matemática', 'Michel'),
(14, 'Inglês', 'Sthéfane'),
(15, 'Programação I', 'Úrsula'),
(16, 'Programação II', 'Leandro'),
(17, 'Programação III', 'Leandro'),
(18, 'Redes I', 'João'),
(19, 'Redes II', 'Jhonathan'),
(20, 'Fundamentos da informática', 'Gustavo'),
(21, 'Hardware I', 'Toni'),
(22, 'Hardware II', 'Toni'),
(24, 'TCC', 'Rafael'),
(25, 'Filosofia', 'Marcelo'),
(26, 'História', 'Rilton'),
(27, 'Geografia', 'Anderson'),
(28, 'Física', 'Fábio'),
(29, 'Artes', 'Márcia'),
(31, 'Argila 2', 'Roberto joga bola');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `dia` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `professor` varchar(100) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `fk_sala_n_sala` int NOT NULL,
  `fk_disciplina_id_disciplina` int NOT NULL,
  `fk_turma_id_turma` int NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `dia`, `professor`, `horario_inicio`, `horario_fim`, `fk_sala_n_sala`, `fk_disciplina_id_disciplina`, `fk_turma_id_turma`) VALUES
(12, 'Segunda-Feira', '', '01:00:00', '23:50:00', 208, 12, 110),
(10, 'Segunda-Feira', '', '08:00:00', '08:50:00', 303, 19, 120),
(11, 'Terça-Feira', '', '01:00:00', '23:50:00', 306, 16, 130),
(13, 'Terça-Feira', '', '08:00:00', '09:50:00', 109, 27, 110),
(14, 'Quarta-Feira', '', '01:00:00', '23:50:00', 301, 28, 120),
(15, 'Quarta-Feira', '', '08:00:00', '09:50:00', 204, 26, 130),
(16, 'Quinta-Feira', '', '01:00:00', '23:50:00', 109, 24, 110),
(17, 'Sexta-Feira', '', '16:55:00', '17:35:00', 301, 10, 120),
(18, 'Sexta-Feira', '', '01:00:00', '23:50:00', 203, 15, 130);

-- --------------------------------------------------------

--
-- Estrutura para tabela `presenca`
--

DROP TABLE IF EXISTS `presenca`;
CREATE TABLE IF NOT EXISTS `presenca` (
  `id_presenca` int NOT NULL AUTO_INCREMENT,
  `hr_batida` datetime NOT NULL,
  `fk_horario_id_horario` int NOT NULL,
  `fk_aluno_matricula` int NOT NULL,
  PRIMARY KEY (`id_presenca`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `presenca`
--

INSERT INTO `presenca` (`id_presenca`, `hr_batida`, `fk_horario_id_horario`, `fk_aluno_matricula`) VALUES
(1, '2024-07-01 08:01:00', 1, 2022315930),
(5, '2024-09-26 19:58:01', 11, 2022315930),
(6, '2024-09-26 20:06:12', 14, 2022311922),
(7, '2024-09-26 20:24:08', 14, 2022311922),
(8, '2024-09-26 20:31:41', 14, 2022311922);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperar-senha`
--

DROP TABLE IF EXISTS `recuperar-senha`;
CREATE TABLE IF NOT EXISTS `recuperar-senha` (
  `email` varchar(255) NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `n_sala` int NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`n_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `sala`
--

INSERT INTO `sala` (`n_sala`, `descricao`) VALUES
(100, 'Laboratório 3'),
(101, 'Laboratório 2'),
(108, 'Laboratório 1'),
(109, '109'),
(203, '203'),
(204, '204'),
(208, '208'),
(301, '301'),
(302, '302'),
(303, '303'),
(306, '306');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`) VALUES
(310, 'INF31'),
(311, 'ADM31'),
(210, 'INF21'),
(211, 'ADM21'),
(110, 'INF11'),
(320, 'INF32'),
(321, 'ADM32'),
(120, 'INF12'),
(130, 'INF13'),
(220, 'INF22'),
(111, 'ADM11'),
(121, 'ADM12'),
(131, 'ADM13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nome_usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`nome_usuario`, `email`, `senha`, `nivel`) VALUES
('Michel Michelon', 'michel@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WEw0bGFDYnc4LjZpZUZOWA$kfFow7/lWeNVEXnGGIz1e0MSG8sob6H7qlcm7ZkwBrE', 2),
('Roberto Graziadei', 'roberto.2022315930@aluno.iffar.edu.br', '$argon2i$v=19$m=65536,t=4,p=1$dEtiZHN1Qmh4TDNnLi5qOA$XGWApYrMheWwOq0SvcQGFfmh3fAcKT19/c6pEsUDOek', 1),
('Roberto silva', 'robertograziadei@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$M2djN21VQ1BtT3BNdm9QRA$KzIbYABbFfanAs1IbAiKLO18IRp2oJ9+bSiCG0xZEpo', 1),
('Thiago Krug', 'thiago@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3FrNUF6UlBnNGJPakVxTA$ii3cpOBpcqKovCre3CtQLVXUMY4c+NTTKeNZiOVQpNc', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
