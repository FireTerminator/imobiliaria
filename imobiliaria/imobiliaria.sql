-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jul-2017 às 19:21
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradoras`
--

CREATE TABLE `administradoras` (
  `idamin` int(11) NOT NULL,
  `CNPJ` bigint(20) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `razaoSocial` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alugueis`
--

CREATE TABLE `alugueis` (
  `idAluguel` int(11) NOT NULL,
  `Pessoas_idPessoa` int(11) NOT NULL,
  `lotes_idlote` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominios`
--

CREATE TABLE `condominios` (
  `idcondominio` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `administradoras_idamin` int(11) NOT NULL,
  `Pessoas_idPessoa` int(11) NOT NULL,
  `AvRua` varchar(100) NOT NULL,
  `num` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `bairro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotes`
--

CREATE TABLE `lotes` (
  `idlote` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `condominios_idcondominio` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `tamanho` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` bigint(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `AvRua` varchar(100) NOT NULL,
  `num` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas_tem_lotes`
--

CREATE TABLE `pessoas_tem_lotes` (
  `idPL` int(11) NOT NULL,
  `Pessoas_idPessoa` int(11) NOT NULL,
  `lotes_idlote` int(11) NOT NULL,
  `dataAquisicao` date NOT NULL,
  `percentual` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradoras`
--
ALTER TABLE `administradoras`
  ADD PRIMARY KEY (`idamin`);

--
-- Indexes for table `alugueis`
--
ALTER TABLE `alugueis`
  ADD PRIMARY KEY (`idAluguel`),
  ADD KEY `fk_alugueis_Pessoas_idPessoa` (`Pessoas_idPessoa`),
  ADD KEY `fk_alugueis_lotes_idlote` (`lotes_idlote`);

--
-- Indexes for table `condominios`
--
ALTER TABLE `condominios`
  ADD PRIMARY KEY (`idcondominio`),
  ADD KEY `administradoras_idamin` (`administradoras_idamin`),
  ADD KEY `Pessoas_idPessoa` (`Pessoas_idPessoa`);

--
-- Indexes for table `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`idlote`),
  ADD KEY `lotes_condominios_idamin` (`condominios_idcondominio`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`idPessoa`);

--
-- Indexes for table `pessoas_tem_lotes`
--
ALTER TABLE `pessoas_tem_lotes`
  ADD PRIMARY KEY (`idPL`),
  ADD KEY `pl_Index1` (`Pessoas_idPessoa`),
  ADD KEY `pl_Index2` (`lotes_idlote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradoras`
--
ALTER TABLE `administradoras`
  MODIFY `idamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alugueis`
--
ALTER TABLE `alugueis`
  MODIFY `idAluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `condominios`
--
ALTER TABLE `condominios`
  MODIFY `idcondominio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lotes`
--
ALTER TABLE `lotes`
  MODIFY `idlote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pessoas_tem_lotes`
--
ALTER TABLE `pessoas_tem_lotes`
  MODIFY `idPL` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alugueis`
--
ALTER TABLE `alugueis`
  ADD CONSTRAINT `fk_alugueis_Pessoas_idPessoa` FOREIGN KEY (`Pessoas_idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alugueis_lotes_idlote` FOREIGN KEY (`lotes_idlote`) REFERENCES `lotes` (`idlote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `condominios`
--
ALTER TABLE `condominios`
  ADD CONSTRAINT `Pessoas_idPessoa` FOREIGN KEY (`Pessoas_idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `administradoras_idamin` FOREIGN KEY (`administradoras_idamin`) REFERENCES `administradoras` (`idamin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_condominios_idamin` FOREIGN KEY (`condominios_idcondominio`) REFERENCES `condominios` (`idcondominio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoas_tem_lotes`
--
ALTER TABLE `pessoas_tem_lotes`
  ADD CONSTRAINT `pl_Index1` FOREIGN KEY (`Pessoas_idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pl_Index2` FOREIGN KEY (`lotes_idlote`) REFERENCES `lotes` (`idlote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
