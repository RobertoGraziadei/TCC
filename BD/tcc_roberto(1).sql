-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21/01/2025 às 23:48
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

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
(2020316204, 'João gabriel', 310),
(2022310000, 'Fabrycio Abertol', 210),
(2022310001, 'Fulano da silva', 210),
(2022310002, 'Guilherme', 210),
(2022310003, 'José', 210),
(2022310667, 'Bruno de Lima', 310),
(2022310863, 'Bruno Bithencourt', 310),
(2022310916, 'Jonas Pinheiro', 310),
(2022310934, 'Lorenzo dos Reis', 310),
(2022310952, 'Luciano Kubner', 310),
(2022310970, 'Luiz Guilherme', 310),
(2022311000, 'Martin Silveira', 310),
(2022311833, 'Arthur Chaves', 310),
(2022311851, 'Pedro Machado', 310),
(2022311922, 'Jeverson Fagundes', 310),
(2022315529, 'Laura Fonseca', 310),
(2022315574, 'Maria Clara', 310),
(2022315930, 'Roberto Graziadei', 310),
(2022315968, 'Lázaro Saucedo', 310),
(2022316043, 'Uriel Montanha', 310),
(2022324018, 'Antonio mongelo', 310);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplinas` int NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_disciplinas`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplinas`, `nome_disciplina`) VALUES
(9, 'Análise e modelagem de sistema'),
(10, 'Tópicos de Emergentes'),
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
(43, 'Sociologia'),
(44, 'Geografia'),
(45, 'História'),
(46, 'Química');

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `horario`
--

INSERT INTO `horario` (`id_horario`, `dia`, `fk_professor`, `horario_inicio`, `horario_fim`, `fk_sala_n_sala`, `fk_disciplina_id_disciplina`, `fk_turma_id_turma`) VALUES
(41, 'Segunda-Feira', 5, '08:00:00', '09:40:00', 101, 19, 310),
(42, 'Segunda-Feira', 3, '09:55:00', '11:35:00', 101, 10, 310),
(43, 'Segunda-Feira', 13, '13:30:00', '15:10:00', 306, 43, 310),
(44, 'Segunda-Feira', 14, '15:30:00', '17:10:00', 306, 44, 310),
(45, 'Segunda-Feira', 15, '08:00:00', '09:40:00', 208, 45, 210),
(47, 'Segunda-Feira', 13, '11:35:00', '12:25:00', 208, 43, 210),
(48, 'Segunda-Feira', 1, '13:30:00', '15:10:00', 208, 13, 210),
(49, 'Segunda-Feira', 7, '15:30:00', '17:10:00', 100, 16, 210),
(50, 'Sexta-Feira', 18, '08:00:00', '09:40:00', 101, 10, 310),
(51, 'Quarta-Feira', 19, '15:30:00', '18:00:00', 203, 46, 310),
(54, 'Segunda-Feira', 17, '11:35:00', '12:25:00', 203, 12, 210),
(59, 'Quinta-Feira', 7, '09:55:00', '11:35:00', 101, 17, 310);

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
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `presenca`
--

INSERT INTO `presenca` (`id_presenca`, `hr_batida`, `fk_horario_id_horario`, `fk_aluno_matricula`, `presenca`) VALUES
(248, '2024-12-02 00:00:00', 45, 2022310000, 1),
(249, '2024-12-02 00:00:00', 45, 2022310001, 1),
(250, '2024-12-02 00:00:00', 42, 2022310952, 1),
(252, '2024-12-05 00:00:00', 49, 2022310001, 1),
(253, '2024-12-05 00:00:00', 49, 2022310002, 1),
(254, '2024-12-05 00:00:00', 49, 2022310003, 1),
(256, '2024-12-04 00:00:00', 49, 2022310000, 1),
(257, '2024-12-04 00:00:00', 49, 2022310001, 1),
(258, '2024-12-05 00:00:00', 41, 2022310952, 1),
(259, '2024-12-05 00:00:00', 41, 2022310970, 1),
(261, '2024-12-16 00:00:00', 48, 2022310000, 1),
(266, '2024-12-16 00:00:00', 48, 2022310002, 1),
(267, '2024-12-16 00:00:00', 48, 2022310003, 1),
(269, '2024-12-18 00:00:00', 48, 2022310000, 1),
(270, '2024-12-18 00:00:00', 48, 2022310001, 1),
(273, '2024-12-20 08:50:31', 50, 2022315930, 1),
(274, '2025-01-15 17:38:50', 51, 2022315930, 1),
(275, '2025-01-15 00:00:00', 51, 2022310952, 1),
(276, '2025-01-15 00:00:00', 51, 2022310970, 1),
(277, '2025-01-15 00:00:00', 51, 2022311922, 1),
(293, '2025-01-09 00:00:00', 59, 2022324018, 1),
(294, '2025-01-09 00:00:00', 59, 2022311833, 1),
(295, '2025-01-16 00:00:00', 59, 2020316204, 1),
(296, '2025-01-16 00:00:00', 59, 2022310667, 1),
(297, '2025-01-16 00:00:00', 59, 2022311833, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperar-senha`
--

DROP TABLE IF EXISTS `recuperar-senha`;
CREATE TABLE IF NOT EXISTS `recuperar-senha` (
  `email` varchar(255) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `token` char(100) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `recuperar-senha`
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
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-28 16:55:55', 'fc3786bca8539c5458ce946b56a672ca5b4b3ceb42a7658790356bad98359b9abc78f942efc26280093df7f2abbee02b46a2', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-11-28 17:05:36', '4e761db7029080e2ab2387888e797ad024e529bd947fbad16eea67c431516b21f395fabeb53b8414bc36ec05950335037e1f', 0),
('roberto.2022315930@aluno.iffar.edu.br', '2024-12-02 11:57:17', '6e2fc0ba4e586e9faf2b23d9f5523d29f3b25b1cc0537c0650335c558ffde58496f3dddcb16af20fc237d1c3a82962b488bf', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-12-02 12:19:33', 'b5dfc33e97f452f74895495043b8e771702854f3a096f309d67c46f9fc103a2be62045a8d8bff8868d8598deb2a5d992e7ef', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-12-02 12:33:37', '2182e63c7b8d00f1da8580dc3e4ed4e0c589eb7c01274121c746d50c3ebb07b97faf79c54d787fac52e50efeee9648bdd8e7', 1),
('roberto.2022315930@aluno.iffar.edu.br', '2024-12-02 12:37:49', '0bd218b99ca2a70a86a7213b49f9432791940bbcbcf86df6f15a339283ef51a5ca464f6913697dcad8b46f6d617325ce4c36', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email`, `senha`, `nivel`) VALUES
(1, 'Michel Michelon', 'michel@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WEw0bGFDYnc4LjZpZUZOWA$kfFow7/lWeNVEXnGGIz1e0MSG8sob6H7qlcm7ZkwBrE', 2),
(2, 'Roberto Graziadei', 'roberto.2022315930@aluno.iffar.edu.br', '$argon2i$v=19$m=65536,t=4,p=1$TFpIcXd4cnBCbi5ZNEZ2QQ$QoSQtq2QqJaD6fV+gUYDVwt0Iw9FK07f6yDYDQaB2n0', 1),
(3, 'Thiago Krug', 'thiago@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3FrNUF6UlBnNGJPakVxTA$ii3cpOBpcqKovCre3CtQLVXUMY4c+NTTKeNZiOVQpNc', 2),
(5, 'Jhonathan Silveira', 'jhonathan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WDc1WGZyRHBBVE13d3VIRQ$wmBjZgSebHmQH9UjUTxPvNjrz9cTx9904MJ1Yw3F6o4', 2),
(6, 'Fábio Dias', 'fabio@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dk5HUkQ4NjlRT0hPQWVPag$JgEvU53mcDbizg2geQa2HXcfOWq5wWSk5rNg0ECcEq0', 2),
(7, 'Leandro Dallanora', 'leandro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SUo0Zml1MVM2TVd4V3g3dA$YmSy6bOLWaJgppfODp6y2W9t2aljJXHM0vR6Ty3Rg+k', 2),
(9, 'Sushi', 'sushi@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QVkwVnQ4bnNnU2hFVXphQw$zTynl8a73qqLAO5fV4uLaFLFxRt0GS+bA5Tda6xtj8Q', 2),
(11, 'Jeverson pimpim', 'pimpim@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZFpIQjY4QU1GN0I2UnM2UA$dThz4auxL4WCd06GpOqImWn3GWgDILM3CL3gRhDS36E', 2),
(13, 'João Pedro', 'joaopedro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MllodTVTWU5Tb3luaFVHQw$jzEKhhAwRdvtze5lAIB9v4neKkMLcBn82LPkvlURH8k', 2),
(14, 'Anderson Rocha', 'anderson@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eFl4Tk9Uc09mVVRxeHY3eQ$Er2qouN9Am1uDzxffsBUwUv4dF/3xgGDLodicQbChlA', 2),
(15, 'Rilton', 'rilton@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Vy5GeS5RWHJBdE5hMjBXMQ$LBuEYDyu5H1cQoNZ0/EtzxIPJfEiiUDOAHddwFRX8w0', 2),
(16, 'José Braulio', 'josebraulio@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$UUpUekYyRDA5Q3pZOEhEVg$XTmLt5uhOxF0TLZVKllATFW8j6SZGmIg3uyM8k+MhCM', 2),
(17, 'Stéphane', 'stephane@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YlVGbjhwd0MxY215UEhsQg$b/szGZ3Y0XJrr7qXAqv+YGHwj9tQ4eTKuXXhamzN7Zw', 2),
(18, 'Úrsula Ribeiro', 'ursula@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YzhQejBwczdaYUJBb3VKdQ$0gybHuxFCoB0fLFARwbOIjSuDWm2SsC9uTa/5lMQVpw', 2),
(19, 'Vanize da Costa', 'vanize@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$R3RPazFoMU96T1ZITGpRNQ$MYpqmdtBpzeymIjyjFsK8v3X2iDO1Vf+evjAkyTGwRg', 2);

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
