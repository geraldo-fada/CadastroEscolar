-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2016 at 12:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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
('00000000000', 'Teste', 0),
('11111111111', 'Josicreudo', 11),
('22222222222', 'Aninha Tomate', 22);

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
('00000000000', 'Matemática'),
('11111111111', 'Matemática'),
('22222222222', 'Português');

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
('00000000000', 'IN123'),
('11111111111', 'IN123'),
('22222222222', 'MA420');

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
(9, '00000000000', 'Matemática');

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
(9, '1 1'),
(9, 'Caicaibalao'),
(9, 'Caiu'),
(9, 'Chablablau');

-- --------------------------------------------------------

--
-- Table structure for table `questoes`
--

CREATE TABLE `questoes` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_nome` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text CHARACTER SET utf8 NOT NULL,
  `dificuldade` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ano` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questoes`
--

INSERT INTO `questoes` (`nome`, `disciplina_nome`, `corpo`, `dificuldade`, `ano`) VALUES
('1 1', 'Matemática', 'Quanto é 1 1?', 'Fácil', '1 ano'),
('Caicaibalao', 'Português', 'vida erat vitae hendrerit. Nam ullamcorper nulla sed posuere faucibus. Nullam dignissim erat eget sapien fringilla, at condimentum justo ullamc', 'Difícil', '2 ano'),
('Caiu', 'Português', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed urna dui, pretium sit amet tristique ac, fermentum ac libero. Sed at urna dui. Vivamus dapibus gra', 'Médio', '1 ano'),
('Chablablau', 'Português', 'orper. Phasellus blandit enim maximus porttitor dictum. Nulla eleifend aliquam scelerisque. Suspendisse a nisl sed sem convallis tristique. Pellentesque non hendrerit dui, vitae tincidunt neque. ', 'Fácil', '3 ano'),
('Chinbinha', 'Matemática', 'Aliquam mollis ultrices libero at cursus. Fusce sagittis sed sapien eget dictum. Proin interdum nisl justo, eu efficitur risus vestibulum id. Curabitur tempor volutpat volutpat. Morbi vehicula luctus ex vel placerat. In hac habitasse platea dictumst. Integer ullamcorper lorem et odio viverra commodo. Do', 'Difícil', '2 ano');

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
('IN123'),
('MA420');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
