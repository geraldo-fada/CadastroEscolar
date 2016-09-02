-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2016 at 01:38 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro_escolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `disciplinas`
--

CREATE TABLE `disciplinas` (
  `nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disciplinas`
--

INSERT INTO `disciplinas` (`nome`) VALUES
('Biologia'),
('Física'),
('Matemática'),
('Português');

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professores`
--

INSERT INTO `professores` (`cpf`, `nome`, `idade`) VALUES
('11111111111', 'Teste111', 11),
('13616513165', 'João Teste', 11),
('22222222222', 'João Brugas', 28),
('33333333333', 'Teste 1', 22),
('44444444444', 'Teste 2', 55);

-- --------------------------------------------------------

--
-- Table structure for table `professores_disciplinas`
--

CREATE TABLE `professores_disciplinas` (
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professores_disciplinas`
--

INSERT INTO `professores_disciplinas` (`professor_cpf`, `disciplina_nome`) VALUES
('11111111111', 'Matemática'),
('22222222222', 'Matemática'),
('33333333333', 'Matemática'),
('13616513165', 'Português'),
('44444444444', 'Português');

-- --------------------------------------------------------

--
-- Table structure for table `professores_turmas`
--

CREATE TABLE `professores_turmas` (
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `turma_nome` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professores_turmas`
--

INSERT INTO `professores_turmas` (`professor_cpf`, `turma_nome`) VALUES
('11111111111', 'IN114'),
('13616513165', 'IN114'),
('22222222222', 'IN114'),
('33333333333', 'IN114'),
('44444444444', 'MA420');

-- --------------------------------------------------------

--
-- Table structure for table `provas`
--

CREATE TABLE `provas` (
  `id` int(11) NOT NULL,
  `professor_cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provas`
--

INSERT INTO `provas` (`id`, `professor_cpf`, `disciplina_nome`) VALUES
(1, '22222222222', 'Matemática');

-- --------------------------------------------------------

--
-- Table structure for table `provas_questoes`
--

CREATE TABLE `provas_questoes` (
  `prova_id` int(11) NOT NULL,
  `questao_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provas_questoes`
--

INSERT INTO `provas_questoes` (`prova_id`, `questao_nome`) VALUES
(1, 'Com éç'),
(1, 'Teste');

-- --------------------------------------------------------

--
-- Table structure for table `questoes`
--

CREATE TABLE `questoes` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questoes`
--

INSERT INTO `questoes` (`nome`, `disciplina_nome`, `corpo`) VALUES
('A', 'Matemática', 'e'),
('Com éç', 'Matemática', '$3242342423'),
('Mais um test', 'Matemática', '2=1'),
('Mat', 'Matemática', 'Uma questão é legal. Mas isso é ok. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Nova', 'Matemática', '429jaçslfjaçslfjçl'),
('Outro teste', 'Matemática', 'Olar'),
('Raaa', 'Matemática', 'Afdsaf'),
('Rww', 'Matemática', 'Gasdwde'),
('Ssss', 'Matemática', 'sssss'),
('Teste', 'Matemática', 'Teste');

-- --------------------------------------------------------

--
-- Table structure for table `turmas`
--

CREATE TABLE `turmas` (
  `nome` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `turmas`
--

INSERT INTO `turmas` (`nome`) VALUES
('1102A'),
('IN114'),
('MA420'),
('Testee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `professores_disciplinas`
--
ALTER TABLE `professores_disciplinas`
  ADD PRIMARY KEY (`professor_cpf`,`disciplina_nome`),
  ADD KEY `disciplina_nome` (`disciplina_nome`);

--
-- Indexes for table `professores_turmas`
--
ALTER TABLE `professores_turmas`
  ADD PRIMARY KEY (`professor_cpf`,`turma_nome`),
  ADD KEY `turma_nome` (`turma_nome`);

--
-- Indexes for table `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id`,`professor_cpf`),
  ADD KEY `disciplina_nome` (`disciplina_nome`),
  ADD KEY `professor_cpf` (`professor_cpf`);

--
-- Indexes for table `provas_questoes`
--
ALTER TABLE `provas_questoes`
  ADD PRIMARY KEY (`prova_id`,`questao_nome`),
  ADD KEY `provas_questoes_ibfk_1_idx` (`questao_nome`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `disciplina_nome` (`disciplina_nome`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provas`
--
ALTER TABLE `provas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `professores_disciplinas`
--
ALTER TABLE `professores_disciplinas`
  ADD CONSTRAINT `professores_disciplinas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professores_disciplinas_ibfk_2` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professores_turmas`
--
ALTER TABLE `professores_turmas`
  ADD CONSTRAINT `professores_turmas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professores_turmas_ibfk_2` FOREIGN KEY (`turma_nome`) REFERENCES `turmas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provas`
--
ALTER TABLE `provas`
  ADD CONSTRAINT `provas_ibfk_1` FOREIGN KEY (`professor_cpf`) REFERENCES `professores` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provas_ibfk_2` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provas_questoes`
--
ALTER TABLE `provas_questoes`
  ADD CONSTRAINT `provas_questoes_ibfk_1` FOREIGN KEY (`questao_nome`) REFERENCES `questoes` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provas_questoes_ibfk_2` FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`disciplina_nome`) REFERENCES `disciplinas` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
