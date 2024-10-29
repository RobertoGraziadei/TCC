-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/10/2024 às 18:38
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
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `turma`) VALUES
(65455, 'Kayane', 210),
(121212, 'Lucio', 110),
(332123, 'MArcio', 110),
(12221221, 'Amora', 210),
(24324234, 'Pedro', 110),
(2022310952, 'Luciano Kubner', 110),
(2022310970, 'Luiz Guilherme', 310),
(2022311922, 'Jeverson Fagundes', 310),
(2022315930, 'Roberto Graziadei', 310),
(2147483647, 'Joao', 110);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplinas` int NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_disciplinas`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplinas`, `nome_disciplina`) VALUES
(9, 'Análise e modelagem de sistema'),
(10, 'Tópicos De Emergentes'),
(12, 'Português'),
(13, 'Matemática'),
(14, 'Inglês'),
(15, 'Programação I'),
(16, 'Programação II'),
(17, 'Programação III'),
(19, 'Redes II'),
(24, 'TCC'),
(27, 'Geografia'),
(28, 'Física'),
(38, 'Banco de Dados'),
(42, 'Eletricidade II');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `dia` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fk_professor` int NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `fk_sala_n_sala` int NOT NULL,
  `fk_disciplina_id_disciplina` int NOT NULL,
  `fk_turma_id_turma` int NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `fk_horario_sala` (`fk_sala_n_sala`),
  KEY `fk_horario_disciplina` (`fk_disciplina_id_disciplina`),
  KEY `fk_horario_turma` (`fk_turma_id_turma`),
  KEY `fk_horario_usuario` (`fk_professor`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `dia`, `fk_professor`, `horario_inicio`, `horario_fim`, `fk_sala_n_sala`, `fk_disciplina_id_disciplina`, `fk_turma_id_turma`) VALUES
(12, 'Segunda-Feira', 5, '08:00:00', '23:22:00', 101, 19, 310),
(28, 'Segunda-Feira', 7, '08:00:00', '09:40:00', 101, 17, 310),
(29, 'Segunda-Feira', 7, '08:00:00', '09:40:00', 101, 15, 110),
(30, 'Segunda-Feira', 7, '08:00:00', '09:40:00', 101, 16, 210),
(31, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 15, 110),
(32, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 16, 210),
(33, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 17, 310);

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
  `presenca` int NOT NULL,
  PRIMARY KEY (`id_presenca`),
  KEY `fk_presenca_horario` (`fk_horario_id_horario`),
  KEY `fk_presenca_aluno` (`fk_aluno_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `presenca`
--

INSERT INTO `presenca` (`id_presenca`, `hr_batida`, `fk_horario_id_horario`, `fk_aluno_matricula`, `presenca`) VALUES
(41, '2024-10-29 14:26:58', 32, 65455, 1),
(42, '2024-10-29 14:45:07', 32, 12221221, 1),
(43, '2024-10-29 14:45:39', 31, 121212, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12313124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`) VALUES
(110, 'INF11'),
(210, 'INF21'),
(310, 'INF31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email`, `senha`, `nivel`) VALUES
(1, 'Michel Michelon', 'michel@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WEw0bGFDYnc4LjZpZUZOWA$kfFow7/lWeNVEXnGGIz1e0MSG8sob6H7qlcm7ZkwBrE', 2),
(2, 'Roberto Graziadei', 'roberto@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dEtiZHN1Qmh4TDNnLi5qOA$XGWApYrMheWwOq0SvcQGFfmh3fAcKT19/c6pEsUDOek', 1),
(3, 'Thiago Krug', 'thiago@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3FrNUF6UlBnNGJPakVxTA$ii3cpOBpcqKovCre3CtQLVXUMY4c+NTTKeNZiOVQpNc', 2),
(5, 'Jhonathan Silveira', 'jhonathan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WDc1WGZyRHBBVE13d3VIRQ$wmBjZgSebHmQH9UjUTxPvNjrz9cTx9904MJ1Yw3F6o4', 2),
(6, 'Fábio Dias', 'fabio@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dk5HUkQ4NjlRT0hPQWVPag$JgEvU53mcDbizg2geQa2HXcfOWq5wWSk5rNg0ECcEq0', 2),
(7, 'Leandro Dallanora', 'leandro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SUo0Zml1MVM2TVd4V3g3dA$YmSy6bOLWaJgppfODp6y2W9t2aljJXHM0vR6Ty3Rg+k', 2),
(9, 'Sushi', 'sushi@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QVkwVnQ4bnNnU2hFVXphQw$zTynl8a73qqLAO5fV4uLaFLFxRt0GS+bA5Tda6xtj8Q', 2),
(11, 'Jeverson pimpim', 'pimpim@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZFpIQjY4QU1GN0I2UnM2UA$dThz4auxL4WCd06GpOqImWn3GWgDILM3CL3gRhDS36E', 2);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_disciplina` FOREIGN KEY (`fk_disciplina_id_disciplina`) REFERENCES `disciplina` (`id_disciplinas`),
  ADD CONSTRAINT `fk_horario_sala` FOREIGN KEY (`fk_sala_n_sala`) REFERENCES `sala` (`n_sala`),
  ADD CONSTRAINT `fk_horario_turma` FOREIGN KEY (`fk_turma_id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `fk_horario_usuario` FOREIGN KEY (`fk_professor`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Restrições para tabelas `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `fk_presenca_aluno` FOREIGN KEY (`fk_aluno_matricula`) REFERENCES `aluno` (`matricula`),
  ADD CONSTRAINT `fk_presenca_horario` FOREIGN KEY (`fk_horario_id_horario`) REFERENCES `horario` (`id_horario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
