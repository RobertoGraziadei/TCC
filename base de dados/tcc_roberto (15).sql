-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2024 às 19:57
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

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
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turma` int NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `turma`) VALUES
(2022310000, 'Lázaro Lima', 210),
(2022310001, 'Arthur Chaves', 210),
(2022310002, 'Bruno Lima', 210),
(2022310003, 'Maria Clara', 210),
(2022310952, 'Luciano Kubner', 310),
(2022310970, 'Luiz Guilherme', 310),
(2022311922, 'Jeverson Fagundes', 310),
(2022315930, 'Roberto Graziadei', 310);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplinas` int NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_disciplinas`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `disciplina`
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
-- Estrutura da tabela `horario`
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `dia`, `fk_professor`, `horario_inicio`, `horario_fim`, `fk_sala_n_sala`, `fk_disciplina_id_disciplina`, `fk_turma_id_turma`) VALUES
(12, 'Segunda-Feira', 5, '08:00:00', '23:22:00', 101, 19, 310),
(28, 'Segunda-Feira', 7, '08:00:00', '09:40:00', 101, 17, 310),
(30, 'Segunda-Feira', 7, '08:00:00', '09:40:00', 101, 16, 210),
(31, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 16, 210),
(32, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 16, 210),
(33, 'Segunda-Feira', 7, '08:00:00', '23:55:00', 101, 17, 310);

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`id_presenca`, `hr_batida`, `fk_horario_id_horario`, `fk_aluno_matricula`, `presenca`) VALUES
(171, '2024-11-22 13:24:17', 33, 2022310970, 1),
(172, '2024-11-22 13:24:17', 33, 2022311922, 1),
(174, '2024-11-22 13:24:18', 33, 2022315930, 1),
(175, '2024-11-22 13:24:35', 33, 2022310952, 1),
(184, '2024-11-28 16:47:55', 33, 2022315930, 1),
(185, '2024-11-28 16:52:12', 33, 2022315930, 1),
(186, '2024-11-21 00:00:00', 33, 2022315930, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar-senha`
--

DROP TABLE IF EXISTS `recuperar-senha`;
CREATE TABLE IF NOT EXISTS `recuperar-senha` (
  `email` varchar(255) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `token` char(100) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `recuperar-senha`
--

INSERT INTO `recuperar-senha` (`email`, `data_criacao`, `token`, `usado`) VALUES
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:27:32', '42174167f6be3fbdafd5cf58982cc3ff3df71e3c6671c03111ac4b9f18e2326d8a22a2c565e0878fcbe6e6551ecc87d35dd0', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:31:23', 'e1985d64ca96426bed4d44328c20a10e90182ad2418d46369256657b294b44ec724a5696cf0f9db6c0f7c66428bc0043848f', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:31:59', '432398ae4279113ccd3a5b508ad10c7066d9d0fec4e0f95169a0fcba86aee2c7bcfe5d9de3d81bab5c16b6b1d4309a2e2701', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:32:44', '7ce97bf4c9a577a9443a892056f82b5a637f747edff98f743b3444cb91fd78bc9bd14ab0f72684d8f2f449a621e67483cccc', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:34:15', '456864bc06780d42c627b32ff0aff8c2394915193ccd0d4c76ea528892b3f3778905c54eb5167495d1bb87d910c97fdbc85b', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:35:49', '347e174560b65eb77cc20716665895ade70660eb482c6b8b5acf0ee21c541797a2795c2c7db9ca30da8fb1f98ee0e4675dab', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 19:35:58', 'a7fe6a8e9442ac8bd2771481d32159339020d95bc52c6b228d2f6bceeaf900aceb2711a77c238cbb9ba8bb21f3b15aead37a', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 16:38:25', '4c741e74f3224e4121ca368076ef7f970ed1df356be702d991dd56b912650495fa10c3380d8ab5be8cac036142971b8aca04', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 16:42:08', '61692bd2017cdd46cae1a37a0c752b004aa9ed9dec63d99263da2642ef0eaf5b48b3983432d39116c216680f1541e88b0450', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 16:46:50', '2702edc17a3e80187ed6e90d4b1166dabc6e120ce06eb95fabe9200e6848e6b4f2fe026a97633901b71be2463bf984a114fb', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 16:48:38', 'deffa1f013402464eb44e0ec81f073093a66ff3b7c5e1aa274b2145d56230899c49b3d6a0ae8f3e32e84dd3c500d4576f884', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 16:49:35', '8099207b7e112afbf6c1b14a5f08f605af84be1e94928b4a172f064b8ef5a5e613ee6b61d6725b5c16497425c868a7ee52d9', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-19 17:03:51', '7bee0af072b765945305d866d8e99444ebb8e563ce8fbc15343111d77ddc775c36e995aa6f67b8d6dbe4ed1765d3760e7178', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-21 10:11:39', 'b8d7b6288adb60af8869e8296362fbc83d1ada79d6133df173c9b30f799b68741225f864d52e646116033bf36ad2a2d9f695', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-22 12:32:39', 'b82fb9d62fec06348fc168e63bdf9d22c6d0ef1f8c7bcfcace2b9717a47dd5be6bb83ced47530b580269bce482b50e4f3480', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-28 16:55:55', 'fc3786bca8539c5458ce946b56a672ca5b4b3ceb42a7658790356bad98359b9abc78f942efc26280093df7f2abbee02b46a2', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `n_sala` int NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`n_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `sala`
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
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=12313124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`) VALUES
(110, 'INF11'),
(210, 'INF21'),
(310, 'INF31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email`, `senha`, `nivel`) VALUES
(1, 'Michel Michelon', 'michel@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WEw0bGFDYnc4LjZpZUZOWA$kfFow7/lWeNVEXnGGIz1e0MSG8sob6H7qlcm7ZkwBrE', 1),
(2, 'Roberto Graziadei', 'roberto.2022315930@aluno.iffar.edu.br', '$argon2i$v=19$m=65536,t=4,p=1$T0RlMi5aLmNmUEEwbXF5ZA$3n+TDoSgCS9cbEVmRzJh+miOfD73tjinkgJ6X13UJQg', 1),
(3, 'Thiago Krug', 'thiago@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3FrNUF6UlBnNGJPakVxTA$ii3cpOBpcqKovCre3CtQLVXUMY4c+NTTKeNZiOVQpNc', 2),
(5, 'Jhonathan Silveira', 'jhonathan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WDc1WGZyRHBBVE13d3VIRQ$wmBjZgSebHmQH9UjUTxPvNjrz9cTx9904MJ1Yw3F6o4', 2),
(6, 'Fábio Dias', 'fabio@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dk5HUkQ4NjlRT0hPQWVPag$JgEvU53mcDbizg2geQa2HXcfOWq5wWSk5rNg0ECcEq0', 2),
(7, 'Leandro Dallanora', 'leandro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SUo0Zml1MVM2TVd4V3g3dA$YmSy6bOLWaJgppfODp6y2W9t2aljJXHM0vR6Ty3Rg+k', 2),
(9, 'Sushi', 'sushi@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QVkwVnQ4bnNnU2hFVXphQw$zTynl8a73qqLAO5fV4uLaFLFxRt0GS+bA5Tda6xtj8Q', 2),
(11, 'Jeverson pimpim', 'pimpim@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZFpIQjY4QU1GN0I2UnM2UA$dThz4auxL4WCd06GpOqImWn3GWgDILM3CL3gRhDS36E', 2);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_disciplina` FOREIGN KEY (`fk_disciplina_id_disciplina`) REFERENCES `disciplina` (`id_disciplinas`),
  ADD CONSTRAINT `fk_horario_sala` FOREIGN KEY (`fk_sala_n_sala`) REFERENCES `sala` (`n_sala`),
  ADD CONSTRAINT `fk_horario_turma` FOREIGN KEY (`fk_turma_id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `fk_horario_usuario` FOREIGN KEY (`fk_professor`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `fk_presenca_aluno` FOREIGN KEY (`fk_aluno_matricula`) REFERENCES `aluno` (`matricula`),
  ADD CONSTRAINT `fk_presenca_horario` FOREIGN KEY (`fk_horario_id_horario`) REFERENCES `horario` (`id_horario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
