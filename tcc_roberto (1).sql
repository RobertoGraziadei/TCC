-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/03/2024 às 10:26
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

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
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `matricula` int DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `fk_sala_numero` int DEFAULT NULL,
  `fk_turma_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_sala_numero` (`fk_sala_numero`,`fk_turma_nome`),
  KEY `fk_turma_nome` (`fk_turma_nome`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `matricula`, `nome`, `fk_sala_numero`, `fk_turma_nome`) VALUES
(4, 2022315930, 'Roberto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_disciplina`
--

DROP TABLE IF EXISTS `aluno_disciplina`;
CREATE TABLE IF NOT EXISTS `aluno_disciplina` (
  `fk_aluno_id` int DEFAULT NULL,
  `fk_disciplina_id_disciplina` int DEFAULT NULL,
  KEY `fk_aluno_id` (`fk_aluno_id`),
  KEY `fk_disciplina_id_disciplina` (`fk_disciplina_id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dia`
--

DROP TABLE IF EXISTS `dia`;
CREATE TABLE IF NOT EXISTS `dia` (
  `dia` date NOT NULL,
  `id_dia` int DEFAULT NULL,
  PRIMARY KEY (`dia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`) VALUES
(1, 'Português');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas_dia`
--

DROP TABLE IF EXISTS `disciplinas_dia`;
CREATE TABLE IF NOT EXISTS `disciplinas_dia` (
  `fk_disciplinas_id_disciplinas` int DEFAULT NULL,
  `fk_dia_dia` date DEFAULT NULL,
  KEY `fk_disciplinas_id_disciplinas_dd` (`fk_disciplinas_id_disciplinas`),
  KEY `fk_dia_dia_dd` (`fk_dia_dia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina_horario`
--

DROP TABLE IF EXISTS `disciplina_horario`;
CREATE TABLE IF NOT EXISTS `disciplina_horario` (
  `fk_disciplinas_id_disciplinas` int DEFAULT NULL,
  `fk_horario_id_disciplinas` int DEFAULT NULL,
  KEY `fk_disciplinas_id_disciplinas_dh` (`fk_disciplinas_id_disciplinas`),
  KEY `fk_horario_id_disciplinas_dh` (`fk_horario_id_disciplinas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int NOT NULL,
  `horario_aula` time DEFAULT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario_dia`
--

DROP TABLE IF EXISTS `horario_dia`;
CREATE TABLE IF NOT EXISTS `horario_dia` (
  `fk_horario_id_horario` int DEFAULT NULL,
  `fk_dia_dia` date DEFAULT NULL,
  KEY `fk_horario_id_horario_hd` (`fk_horario_id_horario`),
  KEY `fk_dia_dia_hd` (`fk_dia_dia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `numero` int NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_disciplina`
--

DROP TABLE IF EXISTS `turma_disciplina`;
CREATE TABLE IF NOT EXISTS `turma_disciplina` (
  `fk_turma_nome` varchar(255) DEFAULT NULL,
  `fk_disciplina_id_disciplina` int DEFAULT NULL,
  KEY `fk_turma_nome_td` (`fk_turma_nome`),
  KEY `fk_disciplina_id_disciplina_td` (`fk_disciplina_id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_sala_numero` FOREIGN KEY (`fk_sala_numero`) REFERENCES `sala` (`numero`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_turma_nome` FOREIGN KEY (`fk_turma_nome`) REFERENCES `turma` (`nome`);

--
-- Restrições para tabelas `aluno_disciplina`
--
ALTER TABLE `aluno_disciplina`
  ADD CONSTRAINT `fk_aluno_id` FOREIGN KEY (`fk_aluno_id`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_disciplina_id_disciplina` FOREIGN KEY (`fk_disciplina_id_disciplina`) REFERENCES `disciplina` (`id_disciplina`);

--
-- Restrições para tabelas `disciplinas_dia`
--
ALTER TABLE `disciplinas_dia`
  ADD CONSTRAINT `fk_dia_dia_dd` FOREIGN KEY (`fk_dia_dia`) REFERENCES `dia` (`dia`),
  ADD CONSTRAINT `fk_disciplinas_id_disciplinas_dd` FOREIGN KEY (`fk_disciplinas_id_disciplinas`) REFERENCES `disciplina` (`id_disciplina`);

--
-- Restrições para tabelas `disciplina_horario`
--
ALTER TABLE `disciplina_horario`
  ADD CONSTRAINT `fk_disciplinas_id_disciplinas_dh` FOREIGN KEY (`fk_disciplinas_id_disciplinas`) REFERENCES `horario` (`id_horario`),
  ADD CONSTRAINT `fk_horario_id_disciplinas_dh` FOREIGN KEY (`fk_horario_id_disciplinas`) REFERENCES `disciplina` (`id_disciplina`);

--
-- Restrições para tabelas `horario_dia`
--
ALTER TABLE `horario_dia`
  ADD CONSTRAINT `fk_dia_dia_hd` FOREIGN KEY (`fk_dia_dia`) REFERENCES `dia` (`dia`),
  ADD CONSTRAINT `fk_horario_id_horario_hd` FOREIGN KEY (`fk_horario_id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Restrições para tabelas `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `fk_disciplina_id_disciplina_td` FOREIGN KEY (`fk_disciplina_id_disciplina`) REFERENCES `disciplina` (`id_disciplina`),
  ADD CONSTRAINT `fk_turma_nome_td` FOREIGN KEY (`fk_turma_nome`) REFERENCES `turma` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
